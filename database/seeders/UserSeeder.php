<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'                  => 'Admin',
            'email'                 => 'andiimron43@gmail.com',
            'email_verified_at'     => date('d-m-Y H:i:s', time()),
            'password'              => bcrypt('admin'),
            'created_at'            => date('d-m-Y H:i:s', time()),
            'updated_at'            => date('d-m-Y H:i:s', time()),

        ]);
    }
}
