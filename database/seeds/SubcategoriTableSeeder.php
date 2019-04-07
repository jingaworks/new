<?php

use Illuminate\Database\Seeder;
use App\Subcategory;

class SubcategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Legume
        Subcategory::create([
            'nume' => 'Ardei gras',
            'slug' => 'ardei-gras',
            'descriere' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut voluptatum aut ullam corrupti voluptate fugiat voluptatibus qui deleniti nulla neque.',
            'category_id' => 1,
            'user_id' => 1
        ]);
        
        Subcategory::create([
            'nume' => 'Ardei capia',
            'slug' => 'ardei-capia',
            'descriere' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut voluptatum aut ullam corrupti voluptate fugiat voluptatibus qui deleniti nulla neque.',
            'category_id' => 1,
            'user_id' => 1
        ]);
        
        Subcategory::create([
            'nume' => 'Cartofi albi',
            'slug' => 'cartofi-albi',
            'descriere' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut voluptatum aut ullam corrupti voluptate fugiat voluptatibus qui deleniti nulla neque.',
            'category_id' => 1,
            'user_id' => 1
        ]);
        
        Subcategory::create([
            'nume' => 'Cartofi rosii',
            'slug' => 'cartofi-rosii',
            'descriere' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut voluptatum aut ullam corrupti voluptate fugiat voluptatibus qui deleniti nulla neque.',
            'category_id' => 1,
            'user_id' => 1
        ]);
        
        Subcategory::create([
            'nume' => 'Castraveti lungi',
            'slug' => 'castraveti-lungi',
            'descriere' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut voluptatum aut ullam corrupti voluptate fugiat voluptatibus qui deleniti nulla neque.',
            'category_id' => 1,
            'user_id' => 1
        ]);
        
        Subcategory::create([
            'nume' => 'Ceapa uscata',
            'slug' => 'ceapa-uscata',
            'descriere' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut voluptatum aut ullam corrupti voluptate fugiat voluptatibus qui deleniti nulla neque.',
            'category_id' => 1,
            'user_id' => 1
        ]);
        
        // Fructe
        Subcategory::create([
            'nume' => 'Mere',
            'slug' => 'mere',
            'descriere' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut voluptatum aut ullam corrupti voluptate fugiat voluptatibus qui deleniti nulla neque.',
            'category_id' => 2,
            'user_id' => 1
        ]);
        
        Subcategory::create([
            'nume' => 'Pere',
            'slug' => 'pere',
            'descriere' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut voluptatum aut ullam corrupti voluptate fugiat voluptatibus qui deleniti nulla neque.',
            'category_id' => 2,
            'user_id' => 1
        ]);
        
        Subcategory::create([
            'nume' => 'Capsuni',
            'slug' => 'capsuni',
            'descriere' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut voluptatum aut ullam corrupti voluptate fugiat voluptatibus qui deleniti nulla neque.',
            'category_id' => 2,
            'user_id' => 1
        ]);
        
        Subcategory::create([
            'nume' => 'Cirese',
            'slug' => 'cirese',
            'descriere' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut voluptatum aut ullam corrupti voluptate fugiat voluptatibus qui deleniti nulla neque.',
            'category_id' => 2,
            'user_id' => 1
        ]);
        
        Subcategory::create([
            'nume' => 'Visine',
            'slug' => 'visine',
            'descriere' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut voluptatum aut ullam corrupti voluptate fugiat voluptatibus qui deleniti nulla neque.',
            'category_id' => 2,
            'user_id' => 1
        ]);
        
        Subcategory::create([
            'nume' => 'Gutui',
            'slug' => 'gutui',
            'descriere' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut voluptatum aut ullam corrupti voluptate fugiat voluptatibus qui deleniti nulla neque.',
            'category_id' => 2,
            'user_id' => 1
        ]);
        
        // Lactate
        Subcategory::create([
            'nume' => 'Lapte vaca',
            'slug' => 'lapte-vaca',
            'descriere' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut voluptatum aut ullam corrupti voluptate fugiat voluptatibus qui deleniti nulla neque.',
            'category_id' => 3,
            'user_id' => 1
        ]);
        
        Subcategory::create([
            'nume' => 'Lapte-oaie',
            'slug' => 'lapte-oaie',
            'descriere' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut voluptatum aut ullam corrupti voluptate fugiat voluptatibus qui deleniti nulla neque.',
            'category_id' => 3,
            'user_id' => 1
        ]);

        Subcategory::create([
            'nume' => 'Lapte capra',
            'slug' => 'lapte-capra',
            'descriere' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut voluptatum aut ullam corrupti voluptate fugiat voluptatibus qui deleniti nulla neque.',
            'category_id' => 3,
            'user_id' => 1
        ]);
        
        Subcategory::create([
            'nume' => 'Branza vaca',
            'slug' => 'branza-vaca',
            'descriere' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut voluptatum aut ullam corrupti voluptate fugiat voluptatibus qui deleniti nulla neque.',
            'category_id' => 3,
            'user_id' => 1
        ]);
        
        Subcategory::create([
            'nume' => 'Branza oaie',
            'slug' => 'branza-oaie',
            'descriere' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut voluptatum aut ullam corrupti voluptate fugiat voluptatibus qui deleniti nulla neque.',
            'category_id' => 3,
            'user_id' => 1
        ]);
        
        Subcategory::create([
            'nume' => 'Branza capra',
            'slug' => 'branza-capra',
            'descriere' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut voluptatum aut ullam corrupti voluptate fugiat voluptatibus qui deleniti nulla neque.',
            'category_id' => 3,
            'user_id' => 1
        ]);
    }
}
