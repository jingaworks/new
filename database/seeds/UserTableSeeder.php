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
            'region' => 'Constanta',
            'place' => 'Constanta',
            'viza' => '2019',
            'phone' => '0735123456',
            'user_id' => $user->id
        ]);
        
        Companie::create([
            'name' => 'Jinga Works',
            'cui' => 10000000,
            'region' => 'Constanta',
            'place' => 'Constanta',
            'phone' => '0712345678',
            'address' => 'my address',
            'producator_id' => $producator->id
        ]);
    }
}
