<?php
namespace App\Models\Torneio;

use App\Models\Aluno\AlunoInterface;

class AlunoCompeticao implements AlunoInterface {
    private string $nome;
    private string $casa;
    private string $email;
    private string $nascimento;
    private int $pontuacaoTotal = 0;

    public function __construct(string $nome, string $casa, string $email, string $nascimento) {
        $this->nome = $nome;
        $this->casa = $casa;
        $this->email = $email;
        $this->nascimento = $nascimento;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getCasa(): string {
        return $this->casa;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getNascimento(): string {
        return $this->nascimento;
    }

    public function adicionarPontuacao(int $pontos): void {
        $this->pontuacaoTotal += $pontos;
    }

    public function getPontuacaoTotal(): int {
        return $this->pontuacaoTotal;
    }
}