<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companie extends Model
{
    protected $table = 'companii';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nume', 'cui', 'judet', 'localitate', 'adresa', 'producator_id', 
    ];

    public function producator() {
        return $this->belongsTo(Producator::class);
    }
}
