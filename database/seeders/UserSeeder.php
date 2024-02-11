<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory()->count(10)->create(['role' => 'user']);
    }
}
