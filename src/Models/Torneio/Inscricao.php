<?php
namespace App\Models\Torneio;

class Inscricao {
    private AlunoCompeticao $aluno;
    private Torneio $torneio;
    private array $pontuacoesPorCompeticao = [];

    public function __construct(AlunoCompeticao $aluno, Torneio $torneio) {
        $this->aluno = $aluno;
        $this->torneio = $torneio;
    }

    public function getAluno(): AlunoCompeticao {
        return $this->aluno;
    }

    public function getTorneio(): Torneio {
        return $this->torneio;
    }

    public function registrarPontuacao(string $nomeCompeticao, int $pontos): void {
        $this->pontuacoesPorCompeticao[$nomeCompeticao] = $pontos;
        $this->aluno->adicionarPontuacao($pontos);
    }

    public function getPontuacaoTotal(): int {
        return array_sum($this->pontuacoesPorCompeticao);
    }

    public function getPontuacoesPorCompeticao(): array {
        return $this->pontuacoesPorCompeticao;
    }
}