<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class data extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'Administrator',
        	'username' => 'admin',
            'password' => bcrypt('12345'),
            'level' => 1,
            'email' => 'admin@admin.com'
        ],
        [
        	'name' => 'Kasir',
        	'username' => 'kasir',
            'password' => bcrypt('12345'),
            'level' => 2,
            'email' => 'kasit@kasir.com'
        ],
        [
        	'name' => 'Gudang',
        	'username' => 'gudang',
            'password' => bcrypt('12345'),
            'level' => 3,
            'email' => 'gudang@gudang.com'
        ]);
    }
}
