<?php

require_once("modelo/Album.php");
require_once("modelo/Autor.php");
require_once("modelo/ExtendedPlay.php");
require_once("modelo/LongPlay.php");
require_once("modelo/Musica.php");
require_once("modelo/Single.php");

$albuns = array();

do{

echo"\n
+------------------------+\n
|          Menu          |\n
+------------------------+\n
| 1 - Cadastrar álbum    |\n 
| 2 - Cadastrar musca    |\n
| 3 - Listar álbuns      |\n
| 4 - Ouvir álbum        |\n
| 0 - Sair               |\n
+------------------------+\n";
$esc = readline();

switch($esc){
    case 1:
        echo "\nQual é o tipo do Album que deseja cadastrar?\n";

    default:
    echo "\nOpção inválida, tente novamente.\n";
    break;
}


}while($esc != 0);