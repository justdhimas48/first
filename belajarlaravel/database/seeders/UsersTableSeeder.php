<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
            DB::table('users')->truncate(); //for cleaning earlier data to avoid duplicate entries
            DB::table('users')->insert([
              'name' => 'the admin user',
              'email' => 'iamadmin@gmail.com',
              'role' => 'admin',
              'password' => Hash::make('password'),
            ]);
            DB::table('users')->insert([
              'name' => 'the seller user',
              'email' => 'iamaseller@gmail.com',
              'role' => 'seller',
              'password' => Hash::make('password'),
            ]);
          }
    }

