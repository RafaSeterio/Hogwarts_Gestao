<?php

namespace Models\Comunicacao;

class Mensagem
{
    private string $destinatario;
    private string $conteudo;

    public function __construct(string $destinatario, string $conteudo)
    {
        $this->destinatario = $destinatario;
        $this->conteudo = $conteudo;
    }

    public function getDestinatario(): string
    {
        return $this->destinatario;
    }

    public function getConteudo(): string
    {
        return $this->conteudo;
    }
}
