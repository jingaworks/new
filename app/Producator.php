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
        'titular', 'serie', 'numar', 'emitent', 'judet', 'viza', 
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function companie()
    {
        return $this->hasOne(Companie::class);
    }


    public function getNumarCertificatAttribute() {
        return $this->serie . '-' . $this->numar;
    }
}
