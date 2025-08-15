<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Signe extends Model
{
    protected $table = 'signes';
    protected $fillable = ['nom', 'description'];

    // Relation avec les syndromes (via syndrome_signe)
    public function syndromes()
    {
        return $this->belongsToMany(Syndrome::class, 'syndrome_signe', 'signe_id', 'syndrome_id');
    }
}