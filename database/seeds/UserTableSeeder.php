<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Producator;
use App\Companie;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'email' => 'jinga.works@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        $producator = Producator::create([
            'titular' => 'Jinga Laurentiu',
            'serie' => 'CT',
            'numar' => '1000000',
            'emitent' => 'Constanta',
            'judet' => 'Constanta',
            'viza' => '2019',
            'user_id' => $user->id
        ]);
        
        Companie::create([
            'nume' => 'Jinga Works',
            'cui' => 10000000,
            'judet' => 'Constanta',
            'localitate' => 'Constanta',
            'adresa' => 'my address',
            'producator_id' => $producator->id
        ]);
    }
}
