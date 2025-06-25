<?php

namespace Models\Comunicacao;

class Comunicador
{
    /**
     * @var Alerta[]
     */
    private array $alertas = [];

    public function adicionarAlerta(Alerta $alerta): void
    {
        $this->alertas[] = $alerta;
    }

    public function enviarTodos(): void
    {
        foreach ($this->alertas as $alerta) {
            $alerta->exibir();
            echo "----------------------\n";
        }
    }
}