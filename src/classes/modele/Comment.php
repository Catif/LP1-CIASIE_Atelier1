<?php

namespace atelier\modele;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model{
    protected $table = 'comment';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function user(){
        return $this->belongsTo('atelier\modele\User', 'id_user');
    }

    public function picture(){
        return $this->belongsTo('atelier\modele\Picture', 'id_picture');
    }
}