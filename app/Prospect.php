<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prospect extends Model
{
    protected $fillable = [
        'SIREN',
        'mail',
        'tel',
        'raison_sociale',
        'professions',
        'prenom',
        'nom',
        'role',
        'adresse',
        'code_postal',
        'ville',
        'fixe',
        'annee_de_creation',
        'form_legale'
    ];
}
