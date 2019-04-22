<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nume', 'slug', 'descriere', 'active', 'user_id', 'activated_by', 'activated_at', 
    ];

    public function subcategorii() {
        return $this->hasMany(Subcategory::class)->orderBy('nume');
    }
}
