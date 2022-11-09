<?php

namespace atelier\modele;

use Illuminate\Database\Eloquent\Model;

class User extends Model{
    protected $table = 'user';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function galeries(){
        return $this->belongsToMany('atelier\modele\Galery', 'user_galery', 'id_user', 'id_galery');
    }
    
    public function comments(){
        return $this->hasMany('atelier\modele\Comment', 'id_user');
    }

    public function organizations(){
        return $this->belongsToMany('atelier\modele\Organization', 'user_organization', 'id_user', 'id_organization');
    }
}