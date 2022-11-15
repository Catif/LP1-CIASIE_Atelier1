<?php

namespace atelier\modele;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model{
    protected $table = 'tag';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['name'];

    public function pictures(){
        return $this->belongsToMany('atelier\modele\Picture', 'picture_tag', 'id_tag', 'id_picture');
    }

    public function galeries(){
        return $this->belongsToMany('atelier\modele\Galery', 'galery_tag', 'id_tag', 'id_galery');
    }

}