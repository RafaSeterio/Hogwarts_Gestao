<?php 
namespace App\Models\Torneios;

class Aluno {
    private string $nome;
    private string $casa;

    public function __construct(string $nome, string $casa) {
        $this->nome = $nome;
        $this->casa = $casa;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getCasa(): string {
        return $this->casa;
    }
}