<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'nume' => 'Legume',
            'slug' => 'legume',
            'descriere' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut voluptatum aut ullam corrupti voluptate fugiat voluptatibus qui deleniti nulla neque.',
            'user_id' => 1
        ]);

        Category::create([
            'nume' => 'Fructe',
            'slug' => 'fructe',
            'descriere' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut voluptatum aut ullam corrupti voluptate fugiat voluptatibus qui deleniti nulla neque.',
            'user_id' => 1
        ]);

        Category::create([
            'nume' => 'Lactate',
            'slug' => 'lactate',
            'descriere' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut voluptatum aut ullam corrupti voluptate fugiat voluptatibus qui deleniti nulla neque.',
            'user_id' => 1
        ]);
    }
}
