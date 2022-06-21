<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [             
            [
                'kode' => 'aaaaa00000',
                'nama' => 'TV 21 inch',
                'foto' => 'a',
                'harga' => '1200000',
                'stok' => '12'
            ],
            [
                'kode' => 'aaaaa11111',
                'nama' => 'TV 21 inch',
                'foto' => 'a',
                'harga' => '1200000',
                'stok' => '12'
            ],
            [
                'kode' => 'aaaaa22222',
                'nama' => 'TV 21 inch',
                'foto' => 'a',
                'harga' => '1200000',
                'stok' => '12'
            ],
            [
                'kode' => 'aaaaa33333',
                'nama' => 'TV 21 inch',
                'foto' => 'a',
                'harga' => '1200000',
                'stok' => '12'
            ],
            [
                'kode' => 'aaaaa44444',
                'nama' => 'TV 21 inch',
                'foto' => 'a',
                'harga' => '1200000',
                'stok' => '12'
            ],
            [
                'kode' => 'aaaaa55555',
                'nama' => 'TV 21 inch',
                'foto' => 'a',
                'harga' => '1200000',
                'stok' => '12'
            ],
            [
                'kode' => 'aaaaa66666',
                'nama' => 'TV 21 inch',
                'foto' => 'a',
                'harga' => '1200000',
                'stok' => '12'
            ],
            [
                'kode' => 'aaaaa77777',
                'nama' => 'TV 21 inch',
                'foto' => 'a',
                'harga' => '1200000',
                'stok' => '12'
            ],
            [
                'kode' => 'aaaaa88888',
                'nama' => 'TV 21 inch',
                'foto' => 'a',
                'harga' => '1200000',
                'stok' => '12'
            ],
            [
                'kode' => 'aaaaa99999',
                'nama' => 'TV 21 inch',
                'foto' => 'a',
                'harga' => '1200000',
                'stok' => '12'
            ],
            [
                'kode' => 'bbbbb00000',
                'nama' => 'TV 21 inch',
                'foto' => 'a',
                'harga' => '1200000',
                'stok' => '12'
            ],
            [
                'kode' => 'bbbbb11111',
                'nama' => 'TV 21 inch',
                'foto' => 'a',
                'harga' => '1200000',
                'stok' => '12'
            ],
            [
                'kode' => 'bbbbb22222',
                'nama' => 'TV 21 inch',
                'foto' => 'a',
                'harga' => '1200000',
                'stok' => '12'
            ],
            [
                'kode' => 'bbbbb33333',
                'nama' => 'TV 21 inch',
                'foto' => 'a',
                'harga' => '1200000',
                'stok' => '12'
            ],
            [
                'kode' => 'bbbbb44444',
                'nama' => 'TV 21 inch',
                'foto' => 'a',
                'harga' => '1200000',
                'stok' => '12'
            ],
            [
                'kode' => 'bbbbb55555',
                'nama' => 'TV 21 inch',
                'foto' => 'a',
                'harga' => '1200000',
                'stok' => '12'
            ],
            [
                'kode' => 'bbbbb66666',
                'nama' => 'TV 21 inch',
                'foto' => 'a',
                'harga' => '1200000',
                'stok' => '12'
            ],
            [
                'kode' => 'bbbbb77777',
                'nama' => 'TV 21 inch',
                'foto' => 'a',
                'harga' => '1200000',
                'stok' => '12'
            ],
            [
                'kode' => 'bbbbb88888',
                'nama' => 'TV 21 inch',
                'foto' => 'a',
                'harga' => '1200000',
                'stok' => '12'
            ],
            [
                'kode' => 'bbbbb99999',
                'nama' => 'TV 21 inch',
                'foto' => 'a',
                'harga' => '1200000',
                'stok' => '12'
            ],
        ];
        DB::table('barang')->insert($data);
    }
}
