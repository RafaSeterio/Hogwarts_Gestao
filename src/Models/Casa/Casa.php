<?php
/**
 * Classe Casa
 * Representa uma das casas de Hogwarts.
 * Cada casa possui um nome, características e um número de pontos.
 */

namespace Casa;

class Casa
{
    private string $nome;
    private array $caracteristicas;
    private int $pontos;

    public function __construct(string $nome, array $caracteristicas)
    {
        $this->nome = $nome;
        $this->caracteristicas = $caracteristicas;
        $this->pontos = 0;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getCaracteristicas(): array
    {
        return $this->caracteristicas;
    }

    public function getPontos(): int
    {
        return $this->pontos;
    }

    public function adicionarPontos(int $pontos): void
    {
        $this->pontos += $pontos;
    }
}
