<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'suryadaffa64@gmail.com',
            'email' => 'suryadaffa64@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$2gjcA5Gtwlqu/q4baBLBhOAXeeA.pyuvrEwRUABNl8UP/iBfcz4Ve',
        ])->assignRole('writer', 'admin');
        
    }
}
