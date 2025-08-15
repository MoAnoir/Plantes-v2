<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Toxication extends Model
{
    protected $table = 'toxications';
    protected $fillable = ['nom', 'description'];

    // Relation avec les plantes (via plante_toxication)
    public function plantes()
    {
        return $this->belongsToMany(Plante::class, 'plante_toxication', 'toxicacion_id', 'plante_id');
    }
}