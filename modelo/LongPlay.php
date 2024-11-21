<?php

require_once("Album.php");

class LongPlay extends Album{
    public function __construct(){
        $this->maximo = 10;
     }
}