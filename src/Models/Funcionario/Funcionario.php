<?php
/**
 * Classe Funcionario
 * Representa um funcionário de Hogwarts, incluindo professores.
 * Armazena informações como nome, cargo e turno de trabalho.
 */

namespace Funcionario;

class Funcionario
{
    protected string $nome;
    protected string $cargo;
    protected string $turno;

    public function __construct(string $nome, string $cargo, string $turno)
    {
        $this->nome = $nome;
        $this->cargo = $cargo;
        $this->turno = $turno;
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
}
