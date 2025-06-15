<?php
/**
 * Classe RHService
 * Serviço de gerenciamento de funcionários e professores de Hogwarts.
 * Permite registrar, listar e buscar funcionários.
 */

namespace Funcionario;

class RHService
{
    private array $funcionarios = [];

    public function registrarFuncionario(Funcionario $funcionario): void
    {
        $this->funcionarios[] = $funcionario;
    }

    public function listarFuncionarios(): array
    {
        return $this->funcionarios;
    }

    public function buscarPorNome(string $nome): ?Funcionario
    {
        foreach ($this->funcionarios as $funcionario) {
            if ($funcionario->getNome() === $nome) {
                return $funcionario;
            }
        }
        return null;
    }
}
