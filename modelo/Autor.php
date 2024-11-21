<?php

class Autor{
    private string $nome;
    private string $nacionalidade;
    private int $NumOuvintes;

    public function getNome(): string{
        return $this->nome;
    }
    public function setNome(string $nome): self{
        $this->nome = $nome;
        return $this;
    }

    public function getNacionalidade(): string{
        return $this->nacionalidade;
    }
    public function setNacionalidade(string $nacionalidade): self{
        $this->nacionalidade = $nacionalidade;
        return $this;
    }

    public function getNumOuvintes(): int
    {
        return $this->NumOuvintes;
    }
    public function setNumOuvintes(int $NumOuvintes): self{
        $this->NumOuvintes = $NumOuvintes;
        return $this;
    }
}