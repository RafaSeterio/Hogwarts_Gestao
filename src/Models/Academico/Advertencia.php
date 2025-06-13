<?php
namespace App\Models\Academico;

//modulo 4 

use App\Models\Aluno\AlunoInterface;

class Advertencia {
    private AlunoInterface $aluno;
    private string $descricao;

    public function __construct(AlunoInterface $aluno, string $descricao) {
        $this->aluno = $aluno;
        $this->descricao = $descricao;
    }

    public function aplicar(): void {
        echo "Advertência aplicada a {$this->aluno->getNome()}: {$this->descricao}" . PHP_EOL;
    }

    public function getDescricao(): string {
        return $this->descricao;
    }
}
