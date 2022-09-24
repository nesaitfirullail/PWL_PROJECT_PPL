<?php

namespace Tests\Unit;

use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_login_form()
    {
        $response = $this->get('/auth/login.blade');

        $response->assertStatus(404);
    }

    public function test_input_barang()
    {
        $response = $this->get('/data/barang/create.blade');

        $response->assertStatus(500);
    }

    public function test_detail_barang()
    {
        $response = $this->get('/data/barang/detail.blade');

        $response->assertStatus(500);
    }

    public function test_edit_barang()
    {
        $response = $this->get('/data/barang/edit.blade');

        $response->assertStatus(500);
    }

    public function test_input_supplier()
    {
        $response = $this->get('/data/supplier/create.blade');

        $response->assertStatus(500);
    }

    public function test_detail_supplier()
    {
        $response = $this->get('/data/supplier/detail.blade');

        $response->assertStatus(500);
    }

    public function test_edit_supplier()
    {
        $response = $this->get('/data/supplier/edit.blade');

        $response->assertStatus(500);
    }

    public function test_input_karyawan()
    {
        $response = $this->get('/data/karyawan/create.blade');

        $response->assertStatus(500);
    }

    public function test_detail_karyawan()
    {
        $response = $this->get('/data/karyawan/detail.blade');

        $response->assertStatus(500);
    }

    public function test_edit_karyawan()
    {
        $response = $this->get('/data/karyawan/edit.blade');

        $response->assertStatus(500);
    }

    public function test_input_pelanggan()
    {
        $response = $this->get('/data/pelanggan/create.blade');

        $response->assertStatus(500);
    }

    public function test_detail_pelanggan()
    {
        $response = $this->get('/data/pelanggan/detail.blade');

        $response->assertStatus(500);
    }

    public function test_edit_pelanggan()
    {
        $response = $this->get('/data/pelanggan/edit.blade');

        $response->assertStatus(500);
    }

    public function test_input_penjualan()
    {
        $response = $this->get('/transaksi/penjualan/create.blade');

        $response->assertStatus(200);
    }

    public function test_cetak_penjualan()
    {
        $response = $this->get('/transaksi/penjualan/cetak_pdf.blade');

        $response->assertStatus(200);
    }

    public function test_input_pembelian()
    {
        $response = $this->get('/transaksi/pembelian/create.blade');

        $response->assertStatus(200);
    }

    public function test_cetak_pembelian()
    {
        $response = $this->get('/transaksi/pembelian/cetak_pdf.blade');

        $response->assertStatus(200);
    }
}
