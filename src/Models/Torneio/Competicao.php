<?php
namespace App\Models\Torneio;

class Competicao {
    private string $nome;
    private string $regras;
    private \DateTime $data;
    private string $local;
    private int $pontuacaoMaxima;
    private array $participantes = [];

    public function __construct(string $nome, string $regras, \DateTime $data, string $local,int $pontuacaoMaxima) {
        $this->nome = $nome;
        $this->regras = $regras;
        $this->data = $data;
        $this->local = $local;
        $this->pontuacaoMaxima = $pontuacaoMaxima;
    }

    public function adicionarParticipante(AlunoCompeticao $aluno): void {
        $this->participantes[$aluno->getEmail()] = $aluno;
    }

    public function getParticipantes(): array {
        return $this->participantes;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getRegras(): string {
        return $this->regras;
    }

    public function getData(): \DateTime {
        return $this->data;
    }

    public function getLocal(): string {
        return $this->local;
    }

    public function getPontuacaoMaxima(): int {
        return $this->pontuacaoMaxima;
    }
}