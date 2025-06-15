<?php
/**
 * Classe Selecionador
 * Responsável por analisar características de um aluno e escolher a casa adequada,
 * utilizando o chapéu seletor.
 */

namespace Casa;

class Selecionador
{
    private ChapeuSeletor $chapeuSeletor;

    public function __construct(ChapeuSeletor $chapeuSeletor)
    {
        $this->chapeuSeletor = $chapeuSeletor;
    }

    public function selecionarCasa(array $caracteristicasAluno, array $casasDisponiveis): Casa
    {
        return $this->chapeuSeletor->escolherCasa($caracteristicasAluno, $casasDisponiveis);
    }
}
