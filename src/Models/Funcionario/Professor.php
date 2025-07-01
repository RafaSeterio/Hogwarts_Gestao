<?php
/**
 * Classe Professor
 * Especialização da classe Funcionario, adiciona a disciplina e as turmas que o professor ministra.
 */

namespace App\Models\Funcionario;

use App\Models\Funcionario\Funcionario;

class Professor extends Funcionario
{
    private string $disciplina;
    private array $turmas;

    public function __construct(string $nome, string $turno, string $disciplina, array $turmas)
    {
        parent::__construct($nome, 'Professor', $turno);
        $this->disciplina = $disciplina;
        $this->turmas = $turmas;
    }

    public function getDisciplina(): string
    {
        return $this->disciplina;
    }

    public function getTurmas(): array
    {
        return $this->turmas;
    }

    public function adicionarTurma(string $turma): void
    {
        if (!in_array($turma, $this->turmas)) {
            $this->turmas[] = $turma;
        }
    }
}
