<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{public function run(): void
    {
        $data = [
            [
                'barang_id' => 1,
                'kategori_id' => 1,
                'barang_kode' => 'B001',
                'barang_nama' => 'Oreo',
                'harga_beli' => 10000,
                'harga_jual' => 18000,
            ],
            [
                'barang_id' => 2,
                'kategori_id' => 2,
                'barang_kode' => 'B002',
                'barang_nama' => 'Kazler Nugget',
                'harga_beli' => 18000,
                'harga_jual' => 25000,
            ],
            [
                'barang_id' => 3,
                'kategori_id' => 3,
                'barang_kode' => 'B003',
                'barang_nama' => 'Fanta 1 lt',
                'harga_beli' => 7000,
                'harga_jual' => 10000,
            ],
            [
                'barang_id' => 4,
                'kategori_id' => 4,
                'barang_kode' => 'B004',
                'barang_nama' => 'Aqua 1 lt',
                'harga_beli' => 3000,
                'harga_jual' => 5000,
            ],
            [
                'barang_id' => 5,
                'kategori_id' => 5,
                'barang_kode' => 'B005',
                'barang_nama' => 'Anggur Merah',
                'harga_beli' => 50000,
                'harga_jual' => 65000,
            ],
            [
                'barang_id' => 6,
                'kategori_id' => 1,
                'barang_kode' => 'B006',
                'barang_nama' => 'Chitato',
                'harga_beli' => 10000,
                'harga_jual' => 12000,
            ],
            [
                'barang_id' => 7,
                'kategori_id' => 2,
                'barang_kode' => 'B007',
                'barang_nama' => 'Kentang Goreng',
                'harga_beli' => 20000,
                'harga_jual' => 25000,
            ],
            [
                'barang_id' => 8,
                'kategori_id' => 3,
                'barang_kode' => 'B008',
                'barang_nama' => 'Sprite 1 lt',
                'harga_beli' => 8000,
                'harga_jual' => 10000,
            ],
            [
                'barang_id' => 9,
                'kategori_id' => 4,
                'barang_kode' => 'B009',
                'barang_nama' => 'Cleo 1 lt',
                'harga_beli' => 4000,
                'harga_jual' => 6000,
            ],
            [
                'barang_id' => 10,
                'kategori_id' => 5,
                'barang_kode' => 'B010',
                'barang_nama' => 'Atlas',
                'harga_beli' => 60000,
                'harga_jual' => 75000,
            ],
            [
                'barang_id' => 11,
                'kategori_id' => 1,
                'barang_kode' => 'B011',
                'barang_nama' => 'Sponge',
                'harga_beli' => 8000,
                'harga_jual' => 10000,
            ],
            [
                'barang_id' => 12,
                'kategori_id' => 2,
                'barang_kode' => 'B012',
                'barang_nama' => 'Jamur Crispy',
                'harga_beli' => 15000,
                'harga_jual' => 20000,
            ],
            [
                'barang_id' => 13,
                'kategori_id' => 3,
                'barang_kode' => 'B013',
                'barang_nama' => 'Coca Cola',
                'harga_beli' => 9000,
                'harga_jual' => 11000,
            ],
            [
                'barang_id' => 14,
                'kategori_id' => 4,
                'barang_kode' => 'B014',
                'barang_nama' => 'J Water 1 lt',
                'harga_beli' => 2500,
                'harga_jual' => 4000,
            ],
            [
                'barang_id' => 15,
                'kategori_id' => 5,
                'barang_kode' => 'B015',
                'barang_nama' => 'Vibes',
                'harga_beli' => 250000,
                'harga_jual' => 300000,
            ],
        ];
        DB::table('m_barangs') -> insert($data);        
    }
}
