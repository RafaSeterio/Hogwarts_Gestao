<?php
namespace App\Models\Torneio;

class Ranking {
    private array $inscricoes = [];
    private array $rankingCasas = [];
    private array $rankingAlunos = [];

    public function adicionarInscricao(Inscricao $inscricao): void {
        $this->inscricoes[] = $inscricao;
    }

    public function registrarResultado(string $nomeAluno, string $nomeCompeticao, int $pontos): bool {
        foreach ($this->inscricoes as $inscricao) {
            if ($inscricao->getAluno()->getNome() === $nomeAluno) {
                $inscricao->registrarPontuacao($nomeCompeticao, $pontos);
                $this->atualizarRankings();
                return true;
            }
        }
        return false;
    }

    private function atualizarRankings(): void {
        $this->rankingCasas = ['Grifinória' => 0, 'Sonserina' => 0, 'Corvinal' => 0, 'Lufa-Lufa' => 0, 'Beauxbatons' => 0, 'Durmstrang' => 0];
        $this->rankingAlunos = [];

        foreach ($this->inscricoes as $inscricao) {
            $aluno = $inscricao->getAluno();
            $casa = $aluno->getCasa();
            $pontuacao = $inscricao->getPontuacaoTotal();

            $this->rankingCasas[$casa] += $pontuacao;
            $this->rankingAlunos[$aluno->getEmail()] = [
                'aluno' => $aluno,
                'pontuacao' => $pontuacao,
                'detalhes' => $inscricao->getPontuacoesPorCompeticao()
            ];
        }

        arsort($this->rankingCasas);
        uasort($this->rankingAlunos, fn($a, $b) => $b['pontuacao'] <=> $a['pontuacao']);
    }

    public function getRankingCasas(): array {
        return $this->rankingCasas;
    }

    public function getRankingAlunos(): array {
        return $this->rankingAlunos;
    }

    public function exibirQuadroResultados(): string {
        $output = "=== QUADRO DE RESULTADOS ===\n\n";
        $output .= "Ranking das Casas:\n";
        
        $posicao = 1;
        foreach ($this->rankingCasas as $casa => $pontos) {
            $output .= sprintf("%d. %-10s: %4d pontos\n", $posicao++, $casa, $pontos);
        }

        $output .= "\nTop 3 Alunos:\n";
        $contador = 0;
        foreach ($this->rankingAlunos as $dados) {
            if (++$contador > 3) break;
            $output .= sprintf("%d. %-20s (%-9s): %4d pontos\n", 
                $contador, 
                $dados['aluno']->getNome(), 
                $dados['aluno']->getCasa(), 
                $dados['pontuacao']
            );
        }

        return $output;
    }
}