<?php
namespace App\Models\Academico;

//modulo 4 

use App\Models\Aluno\AlunoInterface;

class RegistroAcademico {
    private AlunoInterface $aluno;
    private array $notas = [];

    public function __construct(AlunoInterface $aluno) {
        $this->aluno = $aluno;
    }

    public function adicionarNota(Disciplina $disciplina, float $nota): void {
        $this->notas[$disciplina->getNome()] = $nota;
    }

    public function getNotas(): array {
        return $this->notas;
    }
}
