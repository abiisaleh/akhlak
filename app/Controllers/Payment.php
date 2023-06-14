<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Xendit\Xendit;
use Xendit\Exceptions\ApiException;

class Payment extends BaseController
{
    public function sewa()
    {
        $data = $this->request->getPost();

        $ruko = model('RukoModel')->find($data['idRuko']);

        Xendit::setApiKey('xnd_development_5J1A8ar7422uMjI2O6rEGV7n25MMGVAVE2NvTuTwaV8fuzaZqqO0ZBjVJ61nRma');

        $response = \Xendit\Invoice::retrieve('648970e83a1e4b65a201d777');
        dd($response);

        $harga = $ruko['harga'];
        $persentase = 1; //persentase biaya admin
        $admin = $harga * $persentase / 100;

        // Melakukan pembayaran menggunakan Xendit
        $params = array(
            'external_id' => 'SEWARUKO-123',
            'amount' => $harga + $admin,
            'description' => 'DP Sewa Ruko',
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

        session()->setFlashdata('ruko', $ruko);

        // Mengarahkan pengguna ke halaman pembayaran Xendit
        return redirect()->to($invoice['invoice_url']);
    }

    public function berhasil()
    {
        $data = session()->getFlashdata('ruko');

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
        $ruko = [
            'idRuko' => $data['idRuko'],
            'status' => 1
        ];

        model('RukoModel')->save($ruko);

        return view('pages/user/sewa-berhasil');
    }

    public function gagal()
    {
        return view('pages/user/sewa-gagal');
    }
}
