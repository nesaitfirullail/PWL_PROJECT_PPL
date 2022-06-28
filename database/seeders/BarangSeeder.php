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
                'kode' => 'aclgdc1111',
                'nama' => 'AC LG Dualcool',
                'foto' => 'public/images/AC-LG-Dualcool.jpg',
                'harga' => '2200000',
                'stok' => '25',
            ],
        ];
        DB::table('barang')->insert($data);
    }
}
?>