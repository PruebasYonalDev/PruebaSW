<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 5)->create();

        // User::create([
        //     'nit' => '007',
        //     'name' => 'James Bond',
        //     'email' => 'jm@jm.com',
        //     'password' => bcsqrt('qwer1234')
        // ]);
    }
}
