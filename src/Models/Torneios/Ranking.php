<?php
namespace App\Models\Torneios;

class Ranking {
    private array $inscricoes = [];
    private array $rankingCasas = [];
    private array $rankingAlunos = [];

    public function adicionarInscricao(Inscricao $inscricao): void {
        $this->inscricoes[] = $inscricao;
    }

    public function registrarResultado(string $nomeAluno, string $nomeDesafio, int $pontos): void {
        foreach ($this->inscricoes as $inscricao) {
            if ($inscricao->getAluno()->getNome() === $nomeAluno) {
                $inscricao->registrarPontuacao($nomeDesafio, $pontos);
                $this->atualizarRankings();
                break;
            }
        }
    }

    private function atualizarRankings(): void {
        $this->rankingCasas = [];
        $this->rankingAlunos = [];

        
        foreach ($this->inscricoes as $inscricao) {
            $aluno = $inscricao->getAluno();
            $casa = $aluno->getCasa();
            $pontuacaoTotal = $inscricao->getPontuacaoTotal();

            
            if (!isset($this->rankingCasas[$casa])) {
                $this->rankingCasas[$casa] = 0;
            }
            $this->rankingCasas[$casa] += $pontuacaoTotal;

            
            $this->rankingAlunos[$aluno->getNome()] = [
                'nome' => $aluno->getNome(),
                'casa' => $casa,
                'pontuacao' => $pontuacaoTotal,
                'detalhes' => $inscricao->getPontuacoesPorDesafio()
            ];
        }

        
        arsort($this->rankingCasas);
        uasort($this->rankingAlunos, function($a, $b) {
            return $b['pontuacao'] <=> $a['pontuacao'];
        });
    }

    public function getRankingCasas(): array {
        return $this->rankingCasas;
    }

    public function getRankingAlunos(): array {
        return $this->rankingAlunos;
    }

    public function gerarRelatorioCompleto(): array {
        return [
            'ranking_casas' => $this->getRankingCasas(),
            'ranking_alunos' => $this->getRankingAlunos(),
            'total_inscricoes' => count($this->inscricoes)
        ];
    }

    public function gerarRelatorioPorCasa(string $casa): array {
        $alunosDaCasa = array_filter($this->rankingAlunos, function($aluno) use ($casa) {
            return $aluno['casa'] === $casa;
        });

        return [
            'casa' => $casa,
            'pontuacao_total' => $this->rankingCasas[$casa] ?? 0,
            'alunos' => $alunosDaCasa
        ];
    }

    public function gerarRelatorioPorDesafio(string $nomeDesafio): array {
        $resultados = [];
        
        foreach ($this->inscricoes as $inscricao) {
            $pontuacoes = $inscricao->getPontuacoesPorDesafio();
            if (isset($pontuacoes[$nomeDesafio])) {
                $resultados[] = [
                    'aluno' => $inscricao->getAluno()->getNome(),
                    'casa' => $inscricao->getAluno()->getCasa(),
                    'pontuacao' => $pontuacoes[$nomeDesafio]
                ];
            }
        }


        usort($resultados, function($a, $b) {
            return $b['pontuacao'] <=> $a['pontuacao'];
        });

        return [
            'desafio' => $nomeDesafio,
            'resultados' => $resultados
        ];
    }

    public function exibirRankingTempoReal(): string {
        $output = "=== RANKING TEMPO REAL ===\n\n";
        
        $output .= " --- RANKING DAS CASAS ---:\n";
        $posicao = 1;
        foreach ($this->rankingCasas as $casa => $pontos) {
            $output .= "{$posicao}º {$casa}: {$pontos} pontos\n";
            $posicao++;
        }
        
        $output .= "\n  --- TOP 3 ALUNOS ---\n";
        $contador = 0;
        foreach ($this->rankingAlunos as $dadosAluno) {
            if ($contador >= 3) break;
            $output .= ($contador + 1) . "º {$dadosAluno['nome']} ({$dadosAluno['casa']}): {$dadosAluno['pontuacao']} pontos\n";
            $contador++;
        }
        
        return $output;
    }
}

?>