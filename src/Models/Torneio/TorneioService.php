<?php
namespace App\Models\Torneio;

class TorneioService {
    private Torneio $torneio;
    private Ranking $ranking;

    public function __construct(Torneio $torneio) {
        $this->torneio = $torneio;
        $this->ranking = new Ranking();
    }

    public function inscreverAluno(AlunoCompeticao $aluno): Inscricao {
        $inscricao = new Inscricao($aluno, $this->torneio);
        $this->ranking->adicionarInscricao($inscricao);
        
        foreach ($this->torneio->getCompeticoes() as $competicao) {
            $competicao->adicionarParticipante($aluno);
        }
        
        return $inscricao;
    }

    public function registrarResultado(string $nomeAluno, string $nomeCompeticao, int $pontos): void {
        if (!$this->ranking->registrarResultado($nomeAluno, $nomeCompeticao, $pontos)) {
            throw new \RuntimeException("Aluno não encontrado ou competição inválida");
        }
    }

    public function gerarRelatorioCasas(): array {
        return $this->ranking->getRankingCasas();
    }

    public function gerarRelatorioAlunos(): array {
        return $this->ranking->getRankingAlunos();
    }

    public function exibirQuadroResultados(): string {
        return $this->ranking->exibirQuadroResultados();
    }

    public function getTorneio(): Torneio {
        return $this->torneio;
    }
}