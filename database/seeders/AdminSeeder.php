<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$lfeiJoKGGW0RpqILG7P7VezwEAKKvILiqSYGB8uxPGUpK5amqnWmS', // password
                  ]);
        $user->assignRole(['admin','instructor']);
    }
}
