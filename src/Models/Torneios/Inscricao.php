<?php
namespace App\Models\Torneios;

class Inscricao {
    private Aluno $aluno;
    private Torneio $torneio;
    private array $pontuacoesPorDesafio = [];

    public function __construct(Aluno $aluno, Torneio $torneio){
        $this->aluno = $aluno;
        $this->torneio = $torneio;
    }

    function getAluno(): Aluno {
        return $this->aluno;
    }

    function getTorneio(): Torneio {
        return $this->torneio;
    }

    function getPontuacaoTotal(): int {
        return array_sum($this->pontuacoesPorDesafio);
    }

    function getPontuacoesPorDesafio(): array {
        return $this->pontuacoesPorDesafio;
    }

    public function registrarPontuacao(string $nomeDesafio, int $pontos): void {
        $this->pontuacoesPorDesafio[$nomeDesafio] = $pontos;
    }
}

?>