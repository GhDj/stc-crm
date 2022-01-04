<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rdv extends Model
{
    protected $fillable = ['date','time', 'agent','rvp','prospect_id','user_id','status'];

    function prospect() {
        return $this->belongsTo(Prospect::class, 'prospect_id');
    }

    function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
