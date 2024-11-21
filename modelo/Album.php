<?php

require_once("IAlbum.php");
require_once("Autor.php");

class Album implements IAlbum{
    protected string $titulo;
    protected string $gravadora;
    protected Autor $autor;
    protected int $maximo;
    protected $musicas = array(); //teoricamente, é para isso ser um array que armazena dados do tipo Musica, ou seja, tudo o que eu der array_push para cá, será um objeto do tipo música, acho... Se bem que isso não faz muito sentido, musicas é um array, é uma variável do tipo array, não é? então eu deveria tirar isso daqui e implementar a associação no música. Isso possívelmente vai foder um pouco a lógica que eu criei até agora, mas dou um jeito.
    protected int $completo; //diz se o álbum é completo ou não. Uso isso para a verificação na hora de cadastrar a música a algum album. Boleano não funcionou, então vai ter que ser int.

    public function listar(){
        echo "Album: ".$this->titulo." | ".$this->gravadora." | ".$this->autor->getNome()."\nMúsicas:\n";
        
        foreach ($this->musicas as $m) {
            echo $m->listar();
        }
    }

    public function tocarFaixa($nf){
        echo "♫♪ Você está tocando a música ".$this->musicas[$nf]->getTitulo(). ". ♪♫\n";
    }
    public function pausarFaixa($nf){
        echo "Você pausou a música ".$this->musicas[$nf]->getTitulo(). ".\n";
    }
    public function pularFaixa($nf){}

    public function getTitulo(): string{
        return $this->titulo;
    }
    public function setTitulo(string $titulo): self{
        $this->titulo = $titulo;
        return $this;
    }

    public function getGravadora(): string{
        return $this->gravadora;
    }
    public function setGravadora(string $gravadora): self{
        $this->gravadora = $gravadora;
        return $this;
    }
    
    public function getAutor(): Autor{
        return $this->autor;
    }
    public function setAutor(Autor $autor): self{
        $this->autor = $autor;
        return $this;
    }

    public function getMusicas(): array{
        return $this->musicas;
    }
    public function setMusicas($musica){
        array_push($this->musicas, $musica);
    }

    public function getMaximo(): int{
        return $this->maximo;
    }

    public function getCompleto(): int{
        return $this->completo;
    }
    public function setCompleto(int $completo): self{
        $this->completo = $completo;
        return $this;
    }
}