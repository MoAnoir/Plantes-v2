<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Syndrome extends Model
{
    protected $table = 'syndromes';
    protected $primaryKey = 'id_syndrome';
    protected $fillable = ['nom_syndrome', 'description', 'categorie', 'organe_associe'];

    // Relation avec les formules (via formule_syndrome)
    public function formules()
    {
        return $this->belongsToMany(Formule::class, 'syndrome_formule', 'id_syndrome', 'id_formule')
                    ->withTimestamps();
    }

    // Relation avec les signes (via syndrome_signe)
    public function signes()
    {
        return $this->belongsToMany(Signe::class, 'syndrome_signe', 'syndrome_id', 'signe_id');
    }
}