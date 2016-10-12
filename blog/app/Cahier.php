<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cahier extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function pitchs(){
        return $this->hasMany('App/Pitch', 'cahier_id', 'id');
    }

}
