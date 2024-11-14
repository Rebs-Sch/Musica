<?php

require_once("IAlbum.php");
require_once("Musica.php");

class Album implements IAlbum{
    protected string $titulo;
    protected string $duracao;
    protected string $gravadora;
    protected string $tipo;
    protected int $maximo;
    protected Musica $musicas = array();

    public function tocarFaixa(){}
    public function pausarFaixa(){}
    public function listarFaixas(){}
    public function Info(){}

    /**
     * Get the value of titulo
     */
    public function getTitulo(): string
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     */
    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of duracao
     */
    public function getDuracao(): string
    {
        return $this->duracao;
    }

    /**
     * Set the value of duracao
     */
    public function setDuracao(string $duracao): self
    {
        $this->duracao = $duracao;

        return $this;
    }

    /**
     * Get the value of gravadora
     */
    public function getGravadora(): string
    {
        return $this->gravadora;
    }

    /**
     * Set the value of gravadora
     */
    public function setGravadora(string $gravadora): self
    {
        $this->gravadora = $gravadora;

        return $this;
    }

    /**
     * Get the value of tipo
     */
    public function getTipo(): string
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     */
    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get the value of musicas
     */
    public function getMusicas(): Musica
    {
        return $this->musicas;
    }

    /**
     * Set the value of musicas
     */
    public function setMusicas(Musica $musicas): self
    {
        $this->musicas = $musicas;

        return $this;
    }
}