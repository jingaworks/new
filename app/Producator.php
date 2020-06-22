<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producator extends Model
{
    protected $table = 'producatori';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titular', 'serie', 'numar', 'place', 'region', 'viza', "phone",
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function companie()
    {
        return $this->hasOne(Companie::class);
    }

    public function subcategorii()
    {
        return $this->hasMany(Subcategory::class, 'user_id', 'user_id');
    }

    public function produse()
    {
        return $this->belongsToMany(Subcategory::class);
    }

    public function getNumarCertificatAttribute() {
        return $this->serie . '-' . $this->numar;
    }

}
