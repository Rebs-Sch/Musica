<?php

require_once("Album.php");

class ExtendedPlay extends Album{
    public function __construct(){
        $this->maximo = 5;
     }
}