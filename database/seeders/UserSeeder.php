<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([
        	'name' => 'Luis Miguel Condori Condori',
        	'role' => 'A',
        	'email' => 'luis.condori@xerteklife.com',
        	'password' => Hash::make('admin')
    	]);
    	DB::table('users')->insert([
        	'name' => 'Rafael Calderón',
        	'role' => 'J',
        	'email' => 'rafel.calderon@xerteklife.com',
        	'password' => Hash::make('xl1597')
    	]);
    	DB::table('users')->insert([
        	'name' => 'María Lopez',
        	'role' => 'J',
        	'email' => 'contacto@xerteklife.com',
        	'password' => Hash::make('xlml6445')
    	]);

    }
}
