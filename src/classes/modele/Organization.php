<?php

namespace atelier\modele;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model{
    protected $table = 'organization';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function users(){
        return $this->belongsToMany('atelier\modele\User', 'user_organization', 'id_organization', 'id_user');
    }
}