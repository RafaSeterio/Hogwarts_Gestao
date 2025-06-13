<?php
namespace App\Models\Academico;

//modulo 4 

use App\Models\Funcionario\Professor;

class Disciplina {
    private string $nome;
    private Professor $professor;

    public function __construct(string $nome, Professor $professor) {
        $this->nome = $nome;
        $this->professor = $professor;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getProfessor(): Professor {
        return $this->professor;
    }
}
