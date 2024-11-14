<?php

require_once("Autor.php");

class Musica {
    private string $titulo;
    private string $genero;
    private string $duracao; //Não farei nenhum cálculo com esse número, e o float ficaria errôneo quando se trata de tempo, então uso o string.
    private Autor $autor;
}