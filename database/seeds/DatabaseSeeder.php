<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Producator;
use App\Companie;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);

        factory(User::class, 50)->create()->each(function ($user) {
            //create one producer for each user
            $producator = factory(Producator::class)->create(['user_id'=>$user->id]);
            $company = array_random([0, 1]);
            
            // create company for some producers
            if($company == 1) {
                factory(Companie::class)->create(['producator_id' => $producator->id]);
            }
        });

        $this->call(CategoriTableSeeder::class);
        $this->call(SubcategoriTableSeeder::class);
    }
}
