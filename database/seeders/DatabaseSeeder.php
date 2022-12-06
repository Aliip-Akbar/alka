<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
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
    }
}
