<?php

namespace atelier\modele;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model{
    protected $table = 'picture';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function galerie(){
        return $this->belongsTo('atelier\modele\Galery', 'id_galery');
    }

    public function comments(){
        return $this->hasMany('atelier\modele\Comment', 'id_picture');
    }

    public function tags(){
        return $this->belongsToMany('atelier\modele\Tag', 'picture_tag', 'id_picture', 'id_tag');
    }
}