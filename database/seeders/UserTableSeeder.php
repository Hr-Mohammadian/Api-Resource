<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!User::count()) {
            $this->registerData();
        }
    }
    private function registerData()
    {
        User::create([
            'name' => 'user1',
            'email' => 'user1@webamooz.net',
            'password' => bcrypt('password')
        ]);

        User::create([
            'name' => 'user2',
            'email' => 'user2@webamooz.net',
            'password' => bcrypt('password')
        ]);
    }
}
