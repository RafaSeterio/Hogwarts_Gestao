<?php
namespace App\Models\Torneios;

class Desafio {
    private string $nome;
    private string $descricao;
    private int $pontuacaoMaxima;

    public function __construct(string $nome,string $descricao, int $pontuacaoMaxima){
        $this-> nome = $nome;
        $this->descricao = $descricao;
        $this->pontuacaoMaxima = $pontuacaoMaxima;
    }

    function getNome(): string{
        return $this->nome;
    }

    function getDescicao(): string{
        return $this->descricao;
    }

     function getPontuacaoMAxima(): int {
        return $this->pontuacaoMaxima;
    }
}

?>