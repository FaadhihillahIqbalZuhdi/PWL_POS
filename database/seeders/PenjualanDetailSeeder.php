<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanDetailSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // Detail Penjualan 1 (PNJ001 - Andi)
            [
                'detail_id' => 1,
                'penjualan_id' => 1,
                'barang_id' => 1, // Oreo
                'harga' => 18000,
                'jumlah' => 2,
            ],
            [
                'detail_id' => 2,
                'penjualan_id' => 1,
                'barang_id' => 6, // Chitato
                'harga' => 12000,
                'jumlah' => 1,
            ],
            [
                'detail_id' => 3,
                'penjualan_id' => 1,
                'barang_id' => 11, // Sponge
                'harga' => 10000,
                'jumlah' => 3,
            ],
        
            // Detail Penjualan 2 (PNJ002 - Budi)
            [
                'detail_id' => 4,
                'penjualan_id' => 2,
                'barang_id' => 2, // Kazler Nugget
                'harga' => 25000,
                'jumlah' => 1,
            ],
            [
                'detail_id' => 5,
                'penjualan_id' => 2,
                'barang_id' => 7, // Kentang Goreng
                'harga' => 25000,
                'jumlah' => 2,
            ],
            [
                'detail_id' => 6,
                'penjualan_id' => 2,
                'barang_id' => 12, // Jamur Crispy
                'harga' => 20000,
                'jumlah' => 1,
            ],
        
            // Detail Penjualan 3 (PNJ003 - Citra)
            [
                'detail_id' => 7,
                'penjualan_id' => 3,
                'barang_id' => 3, // Fanta 1 lt
                'harga' => 10000,
                'jumlah' => 2,
            ],
            [
                'detail_id' => 8,
                'penjualan_id' => 3,
                'barang_id' => 8, // Sprite 1 lt
                'harga' => 10000,
                'jumlah' => 1,
            ],
            [
                'detail_id' => 9,
                'penjualan_id' => 3,
                'barang_id' => 13, // Coca Cola
                'harga' => 11000,
                'jumlah' => 1,
            ],
        
            // Detail Penjualan 4 (PNJ004 - Dewi)
            [
                'detail_id' => 10,
                'penjualan_id' => 4,
                'barang_id' => 4, // Aqua 1 lt
                'harga' => 5000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 11,
                'penjualan_id' => 4,
                'barang_id' => 9, // Cleo 1 lt
                'harga' => 6000,
                'jumlah' => 2,
            ],
            [
                'detail_id' => 12,
                'penjualan_id' => 4,
                'barang_id' => 14, // J Water 1 lt
                'harga' => 4000,
                'jumlah' => 1,
            ],
        
            // Detail Penjualan 5 (PNJ005 - Eka)
            [
                'detail_id' => 13,
                'penjualan_id' => 5,
                'barang_id' => 5, // Anggur Merah
                'harga' => 65000,
                'jumlah' => 1,
            ],
            [
                'detail_id' => 14,
                'penjualan_id' => 5,
                'barang_id' => 10, // Atlas
                'harga' => 75000,
                'jumlah' => 1,
            ],
            [
                'detail_id' => 15,
                'penjualan_id' => 5,
                'barang_id' => 15, // Vibes
                'harga' => 300000,
                'jumlah' => 1,
            ],
        
            // Detail Penjualan 6 (PNJ006 - Faisal)
            [
                'detail_id' => 16,
                'penjualan_id' => 6,
                'barang_id' => 1, // Oreo
                'harga' => 18000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 17,
                'penjualan_id' => 6,
                'barang_id' => 6, // Chitato
                'harga' => 12000,
                'jumlah' => 2,
            ],
            [
                'detail_id' => 18,
                'penjualan_id' => 6,
                'barang_id' => 11, // Sponge
                'harga' => 10000,
                'jumlah' => 2,
            ],
            // Detail Penjualan 7 (PNJ007 - Gita)
            [
                'detail_id' => 19,
                'penjualan_id' => 7,
                'barang_id' => 2, // Kazler Nugget
                'harga' => 25000,
                'jumlah' => 2,
            ],
            [
                'detail_id' => 20,
                'penjualan_id' => 7,
                'barang_id' => 7, // Kentang Goreng
                'harga' => 25000,
                'jumlah' => 1,
            ],
            [
                'detail_id' => 21,
                'penjualan_id' => 7,
                'barang_id' => 12, // Jamur Crispy
                'harga' => 20000,
                'jumlah' => 1,
            ],

            // Detail Penjualan 8 (PNJ008 - Hendra)
            [
                'detail_id' => 22,
                'penjualan_id' => 8,
                'barang_id' => 3, // Fanta 1 lt
                'harga' => 10000,
                'jumlah' => 2,
            ],
            [
                'detail_id' => 23,
                'penjualan_id' => 8,
                'barang_id' => 8, // Sprite 1 lt
                'harga' => 10000,
                'jumlah' => 1,
            ],
            [
                'detail_id' => 24,
                'penjualan_id' => 8,
                'barang_id' => 13, // Coca Cola
                'harga' => 11000,
                'jumlah' => 1,
            ],

            // Detail Penjualan 9 (PNJ009 - Intan)
            [
                'detail_id' => 25,
                'penjualan_id' => 9,
                'barang_id' => 4, // Aqua 1 lt
                'harga' => 5000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 26,
                'penjualan_id' => 9,
                'barang_id' => 9, // Cleo 1 lt
                'harga' => 6000,
                'jumlah' => 2,
            ],
            [
                'detail_id' => 27,
                'penjualan_id' => 9,
                'barang_id' => 14, // J Water 1 lt
                'harga' => 4000,
                'jumlah' => 1,
            ],

            // Detail Penjualan 10 (PNJ010 - Joko)
            [
                'detail_id' => 28,
                'penjualan_id' => 10,
                'barang_id' => 5, // Anggur Merah
                'harga' => 65000,
                'jumlah' => 1,
            ],
            [
                'detail_id' => 29,
                'penjualan_id' => 10,
                'barang_id' => 10, // Atlas
                'harga' => 75000,
                'jumlah' => 1,
            ],
            [
                'detail_id' => 30,
                'penjualan_id' => 10,
                'barang_id' => 15, // Vibes
                'harga' => 300000,
                'jumlah' => 1,
            ],
        ];
        DB::table('t_penjualan_details')->insert($data);
    }
}
