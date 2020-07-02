<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaginaProdus extends Model
{
    protected $table = 'pagina_produse';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'subcategory_id', 'user_id', 'nume', 'slug', 'descriere',
    ];
}
