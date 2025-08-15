<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plante extends Model
{
    protected $table = 'plantes';
    protected $fillable = ['nom_chinois', 'nom_latin', 'partie_utilisee', 'description', 'image'];

    // Relation avec les formules (via formule_plante)
    public function formules()
    {
        return $this->belongsToMany(Formule::class, 'formule_plante', 'plante_id', 'formule_id')
                    ->withPivot('role_formule', 'pourcentage_formule')
                    ->withTimestamps();
    }

    public function toxications()
    {
        return $this->belongsToMany(Toxication::class, 'plante_toxication', 'plante_id', 'toxicacion_id');
    }
}