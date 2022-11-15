<?php

namespace atelier\modele;

use Illuminate\Database\Eloquent\Model;

class Galery extends Model{
    protected $table = 'galery';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function users(){
        return $this->belongsToMany('atelier\modele\User', 'user_galery', 'id_galery', 'id_user');
    }

    public function pictures(){
        return $this->hasMany('atelier\modele\Picture', 'id_galery');
    }

    public function tags(){
        return $this->belongsToMany('atelier\modele\Tag', 'galery_tag', 'id_galery', 'id_tag');
    }
}