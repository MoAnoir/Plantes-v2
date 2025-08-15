<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formule extends Model
{
    protected $table = 'formules';
    protected $fillable = [
        'nom', 'nom_alternatif', 'description', 'indications', 'posologie',
        'contre_indications', 'pharmacologie', 'toxicologie', 'composition',
        'etudes_cliniques', 'remarques', 'categorie', 'date_creation', 'statut'
    ];

    // Relation avec les plantes (via formule_plante)
    public function plantes()
    {
        return $this->belongsToMany(Plante::class, 'formule_plante', 'formule_id', 'plante_id')
                    ->withPivot('role_formule', 'pourcentage_formule')
                    ->withTimestamps();
    }

    // Relation avec les syndromes (via formule_syndrome)
    public function syndromes()
    {
        return $this->belongsToMany(Syndrome::class, 'syndrome_formule', 'id_formule', 'id_syndrome')
                    ->withTimestamps();
    }
}