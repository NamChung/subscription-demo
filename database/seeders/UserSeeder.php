<?php
namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'username' => 'user',
            'name' => 'user',
            'email' => 'user@example.com',
            'password' => 'password',
            'status' => 1,
            'email_verified_at' => now(),
            'remember_token' => \Str::random(10),
        ]);
    }
}
