<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preoccupation extends Model
{
    use HasFactory;

    protected $fillable = [
        'auteur', 'telephone', 'universite', 'etablissement', 'date_soumission',
        'description', 'preuve', 'priorite', 'gestionnaire_nom', 'methode_resolution',
        'module_concerne', 'progiciel_concerne', 'date_debut_traitement', 'date_fin_traitement',
        'duree_resolution', 'status'
    ];

    public function gestionnaire()
    {
        return $this->belongsTo(User::class, 'gestionnaire_id');
    }
}
