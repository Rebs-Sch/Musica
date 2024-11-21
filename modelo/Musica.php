<?php

require_once("IMusica.php");

class Musica {
    private string $titulo;
    private string $genero;
    private string $duracao; //Não farei nenhum cálculo com esse número, e o float ficaria errôneo quando se trata de tempo, então uso o string.
    //private Autor $autor; faz mais sentido isso estar no álbum, e não na música.
    //vou passar um atributo de album para cá, utilizando da associação, porque para cadastrar faz mais sentido, eu acho... ou não, as vezes eu não preciso da associação para guardar as músicas nele, e isso é curioso......... tenho que ver o que eu posso fazer.

    public function listar(){
        echo $this->titulo." | ".$this->genero." | ".$this->duracao."\n";
    }

    public function getTitulo(): string{
        return $this->titulo;
    }
    public function setTitulo(string $titulo): self{
        $this->titulo = $titulo;
        return $this;
    }

    public function getGenero(): string{
        return $this->genero;
    }
    public function setGenero(string $genero): self{
        $this->genero = $genero;
        return $this;
    }

    public function getDuracao(): string{
        return $this->duracao;
    }
    public function setDuracao(string $duracao): self{
        $this->duracao = $duracao;

        return $this;
    }
}