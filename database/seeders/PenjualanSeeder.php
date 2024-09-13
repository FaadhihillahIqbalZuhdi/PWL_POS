<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder {
    public function run(): void {
        $data = [
            // Penjualan 1
            [
                'penjualan_id' => 1,
                'user_id' => 1, // Contoh user_id
                'pembeli' => 'Andi',
                'penjualan_kode' => 'PNJ001',
                'penjualan_tanggal' => '2024-09-10 10:00:00',
            ],
            // Penjualan 2
            [
                'penjualan_id' => 2,
                'user_id' => 2,
                'pembeli' => 'Budi',
                'penjualan_kode' => 'PNJ002',
                'penjualan_tanggal' => '2024-09-10 12:00:00',
            ],
            // Penjualan 3
            [
                'penjualan_id' => 3,
                'user_id' => 3,
                'pembeli' => 'Citra',
                'penjualan_kode' => 'PNJ003',
                'penjualan_tanggal' => '2024-09-11 09:30:00',
            ],
            // Penjualan 4
            [
                'penjualan_id' => 4,
                'user_id' => 1,
                'pembeli' => 'Dewi',
                'penjualan_kode' => 'PNJ004',
                'penjualan_tanggal' => '2024-09-11 14:00:00',
            ],
            // Penjualan 5
            [
                'penjualan_id' => 5,
                'user_id' => 2,
                'pembeli' => 'Eka',
                'penjualan_kode' => 'PNJ005',
                'penjualan_tanggal' => '2024-09-12 11:00:00',
            ],
            // Penjualan 6
            [
                'penjualan_id' => 6,
                'user_id' => 3,
                'pembeli' => 'Faisal',
                'penjualan_kode' => 'PNJ006',
                'penjualan_tanggal' => '2024-09-12 15:00:00',
            ],
            // Penjualan 7
            [
                'penjualan_id' => 7,
                'user_id' => 1,
                'pembeli' => 'Gita',
                'penjualan_kode' => 'PNJ007',
                'penjualan_tanggal' => '2024-09-13 10:15:00',
            ],
            // Penjualan 8
            [
                'penjualan_id' => 8,
                'user_id' => 2,
                'pembeli' => 'Hendra',
                'penjualan_kode' => 'PNJ008',
                'penjualan_tanggal' => '2024-09-13 14:45:00',
            ],
            // Penjualan 9
            [
                'penjualan_id' => 9,
                'user_id' => 3,
                'pembeli' => 'Intan',
                'penjualan_kode' => 'PNJ009',
                'penjualan_tanggal' => '2024-09-14 09:00:00',
            ],
            // Penjualan 10
            [
                'penjualan_id' => 10,
                'user_id' => 1,
                'pembeli' => 'Joko',
                'penjualan_kode' => 'PNJ010',
                'penjualan_tanggal' => '2024-09-14 13:30:00',
            ],
        ];
        DB::table('t_penjualans')->insert($data);
    }
}