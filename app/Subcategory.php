<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nume', 'slug', 'descriere', 'active', 'category_id', 'user_id', 'activated_by', 'activated_at', 
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
