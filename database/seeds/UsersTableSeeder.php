<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        User::create([
            'username'  => 'User One',
            'email'     => 'user.one@example.com',
            'password'  => Hash::make('P@ssw0rd')
        ]);

        User::create([
            'username'  => 'Administrator',
            'email'     => 'admin@example.com',
            'password'  => Hash::make('P@ssw0rd')
        ]);
    }
}
