<?php
/**
 * Classe Funcionario
 * Representa um funcionário de Hogwarts, incluindo professores.
 * Armazena informações como nome, cargo e turno de trabalho.
 */

namespace App\Models\Funcionario;

class Funcionario
{
    protected string $nome;
    protected string $cargo;
    protected string $turno;
    protected string $email;

    public function __construct(string $nome, string $cargo, string $turno, string $email)
    {
        $this->nome = $nome;
        $this->cargo = $cargo;
        $this->turno = $turno;
        $this->email = $email;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getCargo(): string
    {
        return $this->cargo;
    }

    public function getTurno(): string
    {
        return $this->turno;
    }

    public function setTurno(string $turno): void
    {
        $this->turno = $turno;
    }
     public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    public function getEmail(): string
    {
    return $this->email;
    }
}
