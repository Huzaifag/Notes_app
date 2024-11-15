<?php

namespace Database\Seeders;
use App\Models\Notes;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password'=> bcrypt('huxi123.'),
        ]);

        Notes::factory(100)->create();
    }
}


# Php artisan db:seed
# Php artisan migrate --seed