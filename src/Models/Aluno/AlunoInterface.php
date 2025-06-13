<?php
namespace App\Models\Aluno;

//modulo 1
interface AlunoInterface {
    public function getNome(): string;
    public function getEmail(): string;
    public function getNascimento(): string;
}
