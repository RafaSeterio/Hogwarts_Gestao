<?php

namespace Models\Comunicacao;

class Alerta
{
    private Mensagem $mensagem;
    private string $nivel; // Exemplo: "informativo", "urgente", etc.

    public function __construct(Mensagem $mensagem, string $nivel = "informativo")
    {
        $this->mensagem = $mensagem;
        $this->nivel = $nivel;
    }

    public function exibir(): void
    {
        echo "[{$this->nivel}] Alerta para {$this->mensagem->getDestinatario()}:\n";
        echo "{$this->mensagem->getConteudo()}\n";
    }
}