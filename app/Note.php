<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['note', 'rdv_id', 'user_id'];

    function rdv() {
        return $this->belongsTo(Rdv::class);
    }

    function user() {
        return $this->belongsTo(User::class);
    }
}
