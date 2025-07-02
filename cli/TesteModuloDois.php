<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Models\Casa\Casa;
use App\Models\Casa\Selecionador;
use App\Models\Casa\ChapeuSeletor;

echo "\n=== TESTE DO MÓDULO 2: SELEÇÃO DE CASAS ===\n";

// Criar casas
$grifinoria = new Casa("Grifinória", ["coragem", "determinação", "força"]);
$sonserina  = new Casa("Sonserina",  ["ambição", "astúcia", "liderança"]);
$lufalufa   = new Casa("Lufa-Lufa",  ["lealdade", "paciência", "trabalho duro"]);
$corvinal   = new Casa("Corvinal",   ["inteligência", "sabedoria", "criatividade"]);

$casas = [$grifinoria, $sonserina, $lufalufa, $corvinal];

// Características do aluno
$caracteristicasAluno = ["inteligência", "criatividade", "paciência"];

// Seleção de casa
$chapeu = new ChapeuSeletor();
$selecionador = new Selecionador($chapeu);

$casaEscolhida = $selecionador->selecionarCasa($caracteristicasAluno, $casas);

echo "O aluno foi selecionado para a casa: " . $casaEscolhida->getNome() . "\n";


?>