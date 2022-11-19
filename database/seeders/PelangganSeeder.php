<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use DB;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$faker = Faker::create('id_ID');

    	for($i = 1; $i <= 5; $i++){

    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('pelanggans')->insert([
    			'nama_pelanggan' => $faker->name,
                'alamat'=> $faker->address,
                'telp'=> $faker->phoneNumber,
                'email' => $faker->email,
    		]);

    	}
        $faker = Faker::create('id_ID');

    	for($i = 1; $i <= 5; $i++){

    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('mitras')->insert([
    			'nama_mitra' => $faker->company,
                'alamat'=> $faker->address,
                'telp'=> $faker->phoneNumber,
                'email' => $faker->email,
    		]);

    	}

}
}
