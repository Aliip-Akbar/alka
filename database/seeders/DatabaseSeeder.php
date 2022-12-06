<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
        [
        	'name' => 'Gudang',
        	'username' => 'gudang',
            'password' => bcrypt('12345'),
            'level' => 3,
            'email' => 'gudang@gudang.com'
        ]);
        DB::table('users')->insert(
            [
                'name' => 'Administrator',
                'username' => 'admin',
                'password' => bcrypt('12345'),
                'level' => 1,
                'email' => 'admin@admin.com'
            ]);
            DB::table('users')->insert(
                [
                    'name' => 'kasir',
                    'username' => 'kasir',
                    'password' => bcrypt('12345'),
                    'level' => 2,
                    'email' => 'Kasir@Kasir.com'
                ]);
            DB::table('barangs')->insert(
                [
                    'nama_barang' => 'Buku',
                    'kd_barang' => 'Brg1001',
                    'kategori' => 'Atk',
                    'satuan_beli' => 'Lusin',
                    'harga_beli' => 51000,
                    'satuan_jual' => 'Pcs',
                    'harga_normal' => 1500,
                    'harga_mitra' => 2000,
                    'harga_grosir' => 1000,
                    'stok' => 50,
                    'point' => 10,
                ]);
                DB::table('barangs')->insert(
                    [
                        'nama_barang' => 'Pulpen',
                        'kd_barang' => 'Brg1002',
                        'kategori' => 'Atk',
                        'satuan_beli' => 'Lusin',
                        'harga_beli' => 51000,
                        'satuan_jual' => 'Pcs',
                        'harga_normal' => 1500,
                        'harga_mitra' => 2000,
                        'harga_grosir' => 1000,
                        'stok' => 50,
                        'point' => 10,
                    ]);
                    DB::table('barangs')->insert(
                        [
                            'nama_barang' => 'Penggaris',
                            'kd_barang' => 'Brg1003',
                            'kategori' => 'Atk',
                            'satuan_beli' => 'Lusin',
                            'harga_beli' => 51000,
                            'satuan_jual' => 'Pcs',
                            'harga_normal' => 1500,
                            'harga_mitra' => 2000,
                            'harga_grosir' => 1000,
                            'stok' => 50,
                            'point' => 10,
                        ]);
                        $faker = Faker::create('id_ID');

                        for($i = 1; $i <= 5; $i++){

                              // insert data ke table pegawai menggunakan Faker
                            DB::table('pelanggans')->insert([
                                'nama_pelanggan' => $faker->name,
                                'alamat'=> $faker->address,
                                'telp'=> $faker->phoneNumber,
                                'email' => $faker->email,
                                'j_pelanggan' => 'mitra',
                            ]);

                        }
                        $faker = Faker::create('id_ID');

                        for($i = 1; $i <= 5; $i++){

                              // insert data ke table pegawai menggunakan Faker
                            DB::table('pelanggans')->insert([
                                'nama_pelanggan' => $faker->name,
                                'alamat'=> $faker->address,
                                'telp'=> $faker->phoneNumber,
                                'email' => $faker->email,
                                'j_pelanggan' => 'biasa',
                            ]);

                        }

                        DB::table('kategoris')->insert([
                            'nama_kategori' => 'Atk',
                            'k_kategori' => 'Alat Tulis Kantor'
                        ]);
                        DB::table('kategoris')->insert([
                            'nama_kategori' => 'Pecah Belah',
                            'k_kategori' => 'Pecah Belah'
                        ]);

                        DB::table('satuans')->insert([
                            'nama_satuan' => 'Lusin',
                        ]);
                        DB::table('satuans')->insert([
                            'nama_satuan' => 'Pcs',
                        ]);
                        DB::table('satuans')->insert([
                            'nama_satuan' => 'Liter',
                        ]);
                        DB::table('satuans')->insert([
                            'nama_satuan' => 'Kg',
                        ]);
                        DB::table('satuans')->insert([
                            'nama_satuan' => 'M',
                        ]);
    }
}
