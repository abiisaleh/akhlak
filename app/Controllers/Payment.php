<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PesananModel;
use App\Models\RukoModel;
use Xendit\Xendit;

class Payment extends BaseController
{
    public function sewa()
    {
        $data = $this->request->getPost();

        $ruko = model('RukoModel')->find($data['idRuko']);

        Xendit::setApiKey('xnd_development_5J1A8ar7422uMjI2O6rEGV7n25MMGVAVE2NvTuTwaV8fuzaZqqO0ZBjVJ61nRma');

        $harga = $ruko['harga'];
        $persentase = 1; //persentase biaya admin
        $admin = $harga * $persentase / 100;

        $total = $harga + $admin;

        //tambahkan ke data pesanan
        $pesanan = [
            'fkRuko'        => $data['idRuko'],
            'nama'          => $data['nama'],
            'telp'          => $data['telp'],
            'tanggal'       => date('now'),
            'total'         => $total,
            'pembayaran'    => 'pending',
        ];
        $PesananModel = new PesananModel;
        $PesananModel->insert($pesanan);
        $idPesanan = $PesananModel->getInsertID();

        session()->set('pesanan', $idPesanan);

        // Melakukan pembayaran menggunakan Xendit
        $params = array(
            'external_id' => 'SEWARUKO-' . $data['idRuko'],
            'amount' => $total,
            'description' => 'DP Sewa Ruko. untuk pembatalan silahkan klik link berikut ' . base_url('pembatalan/' . $idPesanan),
            'currency' => 'IDR',
            'invoice_duration' => 86400,
            'customer' => [
                'given_names' => $data['nama'],
                'email' => 'abi.saleh.25@gamil.com',
                'mobile_number' => $data['telp'],
            ],
            'customer_notification_preference' => [
                'invoice_created' => [
                    'whatsapp',
                    'sms',
                    'email'
                ],
                'invoice_reminder' => [
                    'whatsapp',
                    'sms',
                    'email'
                ],
                'invoice_paid' => [
                    'whatsapp',
                    'sms',
                    'email'
                ],
                'invoice_expired' => [
                    'whatsapp',
                    'sms',
                    'email'
                ]
            ],
            'success_redirect_url' => base_url('sewa/berhasil'),
            'failure_redirect_url' => base_url('sewa/gagal'),
            'payment_methods' => ['MANDIRI', 'BCA', 'BNI', 'BRI'],
            'locale' => 'id',
            'fees' => [
                [
                    'type' => 'admin',
                    'value' => $admin
                ]
            ]
        );

        $invoice =  \Xendit\Invoice::create($params);

        session()->set('ruko', $ruko);
        session()->set('total', $harga + $admin);

        // Mengarahkan pengguna ke halaman pembayaran Xendit
        return redirect()->to($invoice['invoice_url']);
    }

    public function berhasil()
    {
        $data = session()->get('ruko');

        //kirim uang sewa ke pemilik ruko
        Xendit::setApiKey('xnd_development_5J1A8ar7422uMjI2O6rEGV7n25MMGVAVE2NvTuTwaV8fuzaZqqO0ZBjVJ61nRma');

        $params = [
            'external_id' => 'disb-12345678',
            'amount' => $data['harga'],
            'bank_code' => 'MANDIRI',
            'account_holder_name' => 'Muhamad Abi Saleh',
            'account_number' => '1540016302717',
            'description' => 'Disbursement from Example'
        ];

        $response = \Xendit\Disbursements::create($params);

        //ubah status menjadi terjual
        $RukoModel = new RukoModel;
        $RukoModel->update($data['idRuko'], ['status' => 2]);

        $idPesanan = session()->get('pesanan');

        //tambahkan ke data pesanan
        $PesananModel = new PesananModel;
        $PesananModel->update($idPesanan, ['pembayaran' => 'lunas']);

        return view('pages/user/sewa-berhasil');
    }

    public function gagal()
    {
        return view('pages/user/sewa-gagal');
    }

    public function pembatalan($idPesanan)
    {
        $pesanan = model('PesananModel')->find($idPesanan);

        //ubah status ruko menjadi disewakan
        model('RukoModel')->update($pesanan['fkRuko'], ['status' => 0]);

        //hapus pesanan
        model('PesananModel')->delete($idPesanan);

        //potong uang pemesanan

        return view('pages/user/sewa-batal');
    }
}
