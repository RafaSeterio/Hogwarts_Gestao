<?php
declare(strict_types = 1);

require_once __DIR__ . '/vendor/autoload.php';

use App\Models\Torneios\Desafio;
use App\Models\Torneios\Inscricao;
use App\Models\Torneios\Ranking;
use App\Models\Torneios\Torneio;
use App\Models\Torneios\Aluno;

//TORNEIO E DESAFIO 01
$torneio = new Torneio("Torneio Tribruxo", "Desafios mágicos", "1994-11-24", "Vários Locais");
$desafio1 = new Desafio("Dragão", "Enfrentar um dragão", 50);
$desafio2 = new Desafio("O Lago", "Mergulhar no lago", 40);
$desafio3 = new Desafio("O Labirinto", "Atravessar o labirinto mágico", 60);

$torneio->adicionarDesafio($desafio1);
$torneio->adicionarDesafio($desafio2);
$torneio->adicionarDesafio($desafio3);

//TORNEIO E DESAFIO 02

$torneio02 = new Torneio("Copa das Casas 2025", "Competição anual entre as casas de Hogwarts", "2025-06-15", "Grande Salão");
$desafio4 = new Desafio("Duelo Mágico", "Enfrentar adversários em duelos de feitiços", 50);
$desafio5 = new Desafio("Prova de Poções", "Preparar uma poção complexa", 40);
$desafio6 = new Desafio("Caça ao Tesouro Encantado", "Encontrar um objeto mágico escondido", 60);

$torneio02->adicionarDesafio($desafio4);
$torneio02->adicionarDesafio($desafio5);
$torneio02->adicionarDesafio($desafio6);

// ALUNOS TORINEIO 01
$harry = new Aluno("Harry Potter", "Grifinória");
$cedric = new Aluno("Cedric Diggory", "Lufa-Lufa");
$fleur = new Aluno("Fleur Delacour", "Beauxbatons");
$viktor = new Aluno("Viktor Krum", "Durmstrang");

// ALUNOO TORNEIO 02
$debora = new Aluno("Debora Duarte", "Corvinal");
$elise = new Aluno("Elise ", "Corvinal");
$frida = new Aluno("Frida Faria", "Corvinal");

$anna = new Aluno("Anna Alvez ", "Grifinória");
$bella = new Aluno(" Bella Barros", "Grifinória");
$cristina = new Aluno("Cristina Carvalho", "Grifinória");

$gilda = new Aluno("Gilda Gonçalvez", "Lufa-Lufa");
$helena = new Aluno("Helena Huew", "Lufa-Lufa");
$irma = new Aluno("Ima LaDulce ", "Lufa-Lufa");

$joanna = new Aluno("Joanna James ", "Sonserina");
$kait = new Aluno("Kait Kutz", "Sonserina");
$leonor = new Aluno("Leonor Luz ", "Sonserina");






// Criar sistema de ranking
$sistema = new Ranking();


// Inscrever e adicionar alunos do torneio 01
$inscricao1 = new Inscricao($harry, $torneio);
$inscricao2 = new Inscricao($cedric, $torneio);
$inscricao3 = new Inscricao($fleur, $torneio);
$inscricao4 = new Inscricao($viktor, $torneio);

$sistema->adicionarInscricao($inscricao1);
$sistema->adicionarInscricao($inscricao2);
$sistema->adicionarInscricao($inscricao3);
$sistema->adicionarInscricao($inscricao4);

// Simular resultados dos desafios
echo "=== SIMULANDO COMPETIÇÃO ===\n\n";

// Desafio do Dragão
$sistema->registrarResultado("Harry Potter", "Dragão", 45);
$sistema->registrarResultado("Cedric Diggory", "Dragão", 42);
$sistema->registrarResultado("Fleur Delacour", "Dragão", 38);
$sistema->registrarResultado("Viktor Krum", "Dragão", 48);

echo "Após Desafio do Dragão:\n";
echo $sistema->exibirRankingTempoReal() . "\n";

// Desafio do Lago Negro
$sistema->registrarResultado("Harry Potter", "Lago Negro", 38);
$sistema->registrarResultado("Cedric Diggory", "Lago Negro", 35);
$sistema->registrarResultado("Fleur Delacour", "Lago Negro", 32);
$sistema->registrarResultado("Viktor Krum", "Lago Negro", 36);

echo "Após Desafio do Lago Negro:\n";
echo $sistema->exibirRankingTempoReal() . "\n";

// Desafio do Labirinto
$sistema->registrarResultado("Harry Potter", "Labirinto", 55);
$sistema->registrarResultado("Cedric Diggory", "Labirinto", 58);
$sistema->registrarResultado("Fleur Delacour", "Labirinto", 45);
$sistema->registrarResultado("Viktor Krum", "Labirinto", 52);
$sistema->registrarResultado("Hermione Granger", "Labirinto", 56);

echo "RESULTADO FINAL:\n";
echo $sistema->exibirRankingTempoReal() . "\n";

// Relatórios detalhados
echo "=== RELATÓRIOS DETALHADOS ===\n\n";

echo " ----- RELATÓRIO COMPLETO ----- \n";
$relatorio = $sistema->gerarRelatorioCompleto();
print_r($relatorio);

echo "\nRELATÓRIO DA GRIFINÓRIA:\n";
$relatorioGrifinoria = $sistema->gerarRelatorioPorCasa("Grifinória");
print_r($relatorioGrifinoria);

echo "\nRELATÓRIO DA LUFA-LUFA \n";
$relatorioGrifinoria = $sistema->gerarRelatorioPorCasa("Lufa-Lufa");
print_r($relatorioGrifinoria);

echo "\nRELATÓRIO DO DESAFIO DO DRAGÃO:\n";
$relatorioDragao = $sistema->gerarRelatorioPorDesafio("Dragão");
print_r($relatorioDragao);