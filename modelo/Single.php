<?php

require_once("Album.php");

class Single extends Album{
   public function __construct(){
      $this->maximo = 1;
   }
}