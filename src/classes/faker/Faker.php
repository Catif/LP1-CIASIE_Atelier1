<?php

namespace atelier\faker;

class Faker{
    protected string $url;

    public function __construct(string $url){
        $this->url = $url;
    }
    public function getImage(){
        $id = rand(0,1084);
        $width = rand(720,3840);
        $height = rand(720,2160);

        return $this->url . "id/" . $id . "/" . $width . "/" . $height;
    }
}