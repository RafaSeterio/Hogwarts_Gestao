<?php
namespace App\Models\Aluno;
//modulo 1 
class CadastroService {
    public function cadastrar(AlunoInterface $aluno): void {
        echo "Aluno cadastrado: {$aluno->getNome()} - {$aluno->getEmail()}" . PHP_EOL;
    }
}
