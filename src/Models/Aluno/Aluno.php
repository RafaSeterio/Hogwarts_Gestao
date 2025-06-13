<?php
namespace App\Models\Aluno;

//modulo 1 


class Aluno implements AlunoInterface {
    private string $nome;
    private string $email;
    private string $nascimento;

    public function __construct(string $nome, string $email, string $nascimento) {
        $this->nome = $nome;
        $this->email = $email;
        $this->nascimento = $nascimento;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getNascimento(): string {
        return $this->nascimento;
    }
}