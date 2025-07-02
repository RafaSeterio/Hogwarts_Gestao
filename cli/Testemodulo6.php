<?php

require_once __DIR__ . '/vendor/autoload.php'; // ajuste conforme necessário

use Comunicacao\Alerta;
use Comunicacao\Mensagem;
use Comunicacao\ComunicadorService;

echo "\n=== TESTE DO MÓDULO 6: SISTEMA DE ALERTAS E COMUNICAÇÃO ===\n";

// Criar serviço de comunicação
$comunicador = new ComunicadorService();

// Criar e enviar mensagens
$mensagem1 = $comunicador->enviarMensagem(
    "professor@hogwarts.edu",
    ["aluno1@hogwarts.edu", "aluno2@hogwarts.edu"],
    "Aviso de Aula",
    "A aula de Defesa Contra as Artes das Trevas foi adiantada para amanhã."
);

$mensagem2 = $comunicador->enviarMensagem(
    "direcao@hogwarts.edu",
    ["todos@hogwarts.edu"],
    "Comunicado Geral",
    "A Copa das Casas será concluída neste sábado no Salão Principal."
);

// Marcar uma mensagem como lida
$mensagem1->marcarComoLida();

// Exibir mensagens enviadas
echo "\nMensagens Enviadas:\n";
foreach ($comunicador->getHistoricoMensagens() as $mensagem) {
    echo "- Título: " . $mensagem->getTitulo() . "\n";
    echo "  De: " . $mensagem->getRemetente() . "\n";
    echo "  Para: " . implode(", ", $mensagem->getDestinatarios()) . "\n";
    echo "  Conteúdo: " . $mensagem->getConteudo() . "\n";
    echo "  Lida: " . ($mensagem->foiLida() ? "Sim" : "Não") . "\n\n";
}

// Criar alerta diretamente
$alerta = new Alerta("Urgente", "Alerta de Segurança", "Evacuação imediata do castelo", "2025-07-01");
echo "Alerta criado:\n";
echo "- Tipo: " . $alerta->getTipo() . "\n";
echo "- Título: " . $alerta->getTitulo() . "\n";
echo "- Mensagem: " . $alerta->getMensagem() . "\n";
echo "- Data: " . $alerta->getData() . "\n";