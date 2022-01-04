<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prospect extends Model
{
    protected $fillable = [
        'civilite',
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
        'form_legale',
        'user_id'
    ];

    function user() {
        return $this->belongsTo(User::class);
    }

    function rdv() {
        return $this->hasOne(Rdv::class);
    }
}
