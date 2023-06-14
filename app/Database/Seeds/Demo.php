<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Demo extends Seeder
{
    public function run()
    {
        $authorize = $auth = service('authorization');
        $authorize->addUserToGroup(1, 'admin');
        $authorize->addUserToGroup(2, 'pemilik');

        //ruko
        $data = [
            'alamat' => 'Koya Barat',
            'lat' => '-2.672313',
            'lng' => '140.827509',
            'harga' => 12000000,
            'pemilik' => 'Akhlak',
            'telp' => '082238204776',
            'idUser' => 2
        ];
        $this->db->table('ruko')->insert($data);

        //kriteria
        $data = [
            ['kriteria' => 'harga', 'bobot' => 18],
            ['kriteria' => 'ukuran', 'bobot' => 16],
            ['kriteria' => 'fasilitas', 'bobot' => 15],
            ['kriteria' => 'lokasi', 'bobot' => 13],
            ['kriteria' => 'kondisi jalan', 'bobot' => 11],
            ['kriteria' => 'lingkungan', 'bobot' => 9],
            ['kriteria' => 'listrik', 'bobot' => 7],
            ['kriteria' => 'lantai', 'bobot' => 5],
            ['kriteria' => 'halaman parkir', 'bobot' => 2],
            ['kriteria' => 'air', 'bobot' => 4],
        ];
        $this->db->table('kriteria')->insertBatch($data);

        //subkriteria
        $data = [
            //harga
            ['fkKriteria' => 1, 'subkriteria' => '< 26 Juta', 'nilai' => 1],
            ['fkKriteria' => 1, 'subkriteria' => '26 Juta - 30 Juta', 'nilai' => 2],
            ['fkKriteria' => 1, 'subkriteria' => '31 Juta - 60 Juta', 'nilai' => 3],
            ['fkKriteria' => 1, 'subkriteria' => '> 60 Juta', 'nilai' => 4],

            //ukuran
            ['fkKriteria' => 2, 'subkriteria' => '< 5 x 10 m', 'nilai' => 1],
            ['fkKriteria' => 2, 'subkriteria' => '5 x 10 m - 5 x 20 m', 'nilai' => 2],
            ['fkKriteria' => 2, 'subkriteria' => '> 5 x 20 m', 'nilai' => 3],

            //lokasi
            ['fkKriteria' => 3, 'subkriteria' => 'koya barat', 'nilai' => 0],
            ['fkKriteria' => 3, 'subkriteria' => 'koya timur', 'nilai' => 0],

            //fasilitas
            ['fkKriteria' => 4, 'subkriteria' => 'kamar mandi', 'nilai' => 1],
            ['fkKriteria' => 4, 'subkriteria' => 'kamar mandi dan kamar tidur', 'nilai' => 2],
            ['fkKriteria' => 4, 'subkriteria' => 'kamar mandi, kamar tidur dan dapur', 'nilai' => 3],

            //kondisi jalan
            ['fkKriteria' => 5, 'subkriteria' => 'jalan beraspal', 'nilai' => 4],
            ['fkKriteria' => 5, 'subkriteria' => 'jalan timbunan', 'nilai' => 3],
            ['fkKriteria' => 5, 'subkriteria' => 'jalan berlubang', 'nilai' => 2],
            ['fkKriteria' => 5, 'subkriteria' => 'jalan corcoran semen', 'nilai' => 1],

            //lingkungan
            ['fkKriteria' => 6, 'subkriteria' => 'perumahan', 'nilai' => 3],
            ['fkKriteria' => 6, 'subkriteria' => 'sekolah', 'nilai' => 1],
            ['fkKriteria' => 6, 'subkriteria' => 'pasar', 'nilai' => 2],

            //listrik
            ['fkKriteria' => 7, 'subkriteria' => 'prabayar', 'nilai' => 2],
            ['fkKriteria' => 7, 'subkriteria' => 'pascabayar', 'nilai' => 1],

            //lantai
            ['fkKriteria' => 8, 'subkriteria' => '2 lantai', 'nilai' => 2],
            ['fkKriteria' => 8, 'subkriteria' => '1 lantai', 'nilai' => 1],

            //halaman parkir
            ['fkKriteria' => 9, 'subkriteria' => 'kendaraan roda 2', 'nilai' => 1],
            ['fkKriteria' => 9, 'subkriteria' => 'kendaraan roda 4', 'nilai' => 2],
            ['fkKriteria' => 9, 'subkriteria' => 'kendaraan roda 6', 'nilai' => 3],

            //air
            ['fkKriteria' => 10, 'subkriteria' => 'sumur bor', 'nilai' => 2],
            ['fkKriteria' => 10, 'subkriteria' => 'PDAM', 'nilai' => 1],
        ];
        $this->db->table('subkriteria')->insertBatch($data);
    }
}
