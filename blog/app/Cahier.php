<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cahier extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function pitchs() {
    	return $this->hasMany('App/Pitch', 'cahier_id', 'id');
    }

    public function cdcs() {
    	return $this->hasMany('App/CDC', 'cahier_id', 'id');
    }

    public function objectifs() {
    	return $this->hasMany('App/Objectif', 'cahier_id', 'id');
    }

    public function equipes() {
    	return $this->hasMany('App/Equipe', 'cahier_id', 'id');
    }

    public function outils() {
    	return $this->hasMany('App/Outil', 'cahier_id', 'id');
    }

    public function calendriers() {
    	return $this->hasMany('App/Calendrier', 'cahier_id', 'id');
    }

    public function passwords() {
    	return $this->hasMany('App/Password', 'cahier_id', 'id');
    }

    public function crs() {
    	return $this->hasMany('App/CR', 'cahier_id', 'id');
    }

    public function messages() {
    	return $this->hasMany('App/Message', 'cahier_id', 'id');
    }

    public function risques() {
    	return $this->hasMany('App/Risque', 'cahier_id', 'id');
    }

    public function livrables() {
    	return $this->hasMany('App/Livrable', 'cahier_id', 'id');
    }

    public function tests() {
    	return $this->hasMany('App/Test', 'cahier_id', 'id');
    }

    public function recettages() {
    	return $this->hasMany('App/Recettage', 'cahier_id', 'id');
    }

}
