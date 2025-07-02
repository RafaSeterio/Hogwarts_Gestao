<?php
//=============================================================================
// TESTES MÓDULO 4: ACADÊMICO (Versão Demonstrativa)
//=============================================================================

require_once 'vendor/autoload.php';

use App\Models\Academico\Advertencia;
use App\Models\Academico\Disciplina;
use App\Models\Academico\RegistroAcademico;
use App\Models\Aluno\Aluno;
use App\Models\Funcionario\Professor;

echo "\n🏰 SISTEMA DE GESTÃO DE HOGWARTS - MÓDULO 4\n";
echo "📚 SISTEMA ACADÊMICO\n";
echo "=" . str_repeat("=", 50) . "\n\n";

// ===== DEMONSTRAÇÃO 1: SISTEMA DE ADVERTÊNCIAS =====
echo "1️⃣  SISTEMA DE ADVERTÊNCIAS\n";
echo "-" . str_repeat("-", 30) . "\n";

// Criar alguns alunos para testar
$aluno1 = new Aluno('Harry Potter', 'harry@hogwarts.edu', '1980-07-31');
$aluno2 = new Aluno('Draco Malfoy', 'draco@hogwarts.edu', '1980-06-05');

// Criar advertências
$advertencias = [
    new Advertencia($aluno1, 'Chegou atrasado à aula de Poções'),
    new Advertencia($aluno1, 'Não trouxe o livro de Transfiguração'),
    new Advertencia($aluno2, 'Comportamento inadequado em sala'),
    new Advertencia($aluno2, 'Desrespeito ao professor Snape')
];

echo "⚠️  Aplicando advertências:\n";
foreach ($advertencias as $index => $advertencia) {
    echo sprintf("   Advertência %d: ", $index + 1);
    $advertencia->aplicar();
}

echo "\n✅ Total de advertências aplicadas: " . count($advertencias) . "\n\n";

// ===== DEMONSTRAÇÃO 2: SISTEMA DE DISCIPLINAS =====
echo "2️⃣  SISTEMA DE DISCIPLINAS\n";
echo "-" . str_repeat("-", 30) . "\n";

// Criar professores (usando classe real, não mock)
$professores = [
    new Professor('Prof. Severus Snape', 'Noturno', 'Poções', [], 'snape@hogwarts.edu'),
    new Professor('Prof. Minerva McGonagall', 'Integral', 'Transfiguração', [], 'minerva@hogwarts.edu'),
    new Professor('Prof. Filius Flitwick', 'Matutino', 'Feitiços', [], 'flitwick@hogwarts.edu'),
    new Professor('Prof. Pomona Sprout', 'Vespertino', 'Herbologia', [], 'sprout@hogwarts.edu')
];




// Criar disciplinas
$disciplinas = [
    new Disciplina('Poções', $professores[0]),
    new Disciplina('Transfiguração', $professores[1]),
    new Disciplina('Feitiços', $professores[2]),
    new Disciplina('Herbologia', $professores[3])
];

echo "🎓 Disciplinas cadastradas:\n";
foreach ($disciplinas as $index => $disciplina) {
    echo sprintf("   %d. %s - %s\n", 
        $index + 1,
        $disciplina->getNome(),
        $disciplina->getProfessor()->getNome()
    );
}

echo "\n";

// ===== DEMONSTRAÇÃO 3: REGISTRO ACADÊMICO =====
echo "3️⃣  REGISTRO ACADÊMICO\n";
echo "-" . str_repeat("-", 30) . "\n";

// Criar registros acadêmicos para os alunos
$registroHarry = new RegistroAcademico($aluno1);
$registroDraco = new RegistroAcademico($aluno2);

// Adicionar notas para Harry
$registroHarry->adicionarNota($disciplinas[0], 6.5); // Poções
$registroHarry->adicionarNota($disciplinas[1], 9.0); // Transfiguração
$registroHarry->adicionarNota($disciplinas[2], 8.5); // Feitiços
$registroHarry->adicionarNota($disciplinas[3], 7.8); // Herbologia

// Adicionar notas para Draco
$registroDraco->adicionarNota($disciplinas[0], 9.2); // Poções
$registroDraco->adicionarNota($disciplinas[1], 7.0); // Transfiguração
$registroDraco->adicionarNota($disciplinas[2], 8.8); // Feitiços
$registroDraco->adicionarNota($disciplinas[3], 6.5); // Herbologia

// Exibir registros
function exibirRegistroAcademico($aluno, $registro) {
    echo sprintf("👤 REGISTRO DE %s:\n", strtoupper($aluno->getNome()));
    $notas = $registro->getNotas();
    $soma = 0;
    $count = 0;
    
    foreach ($notas as $disciplina => $nota) {
        echo sprintf("   %s: %.1f\n", $disciplina, $nota);
        $soma += $nota;
        $count++;
    }
    
    $media = $count > 0 ? $soma / $count : 0;
    echo sprintf("   MÉDIA GERAL: %.2f\n", $media);
    
    if ($media >= 7.0) {
        echo "   STATUS: ✅ APROVADO\n";
    } else {
        echo "   STATUS: ❌ REPROVADO\n";
    }
    echo "\n";
}

exibirRegistroAcademico($aluno1, $registroHarry);
exibirRegistroAcademico($aluno2, $registroDraco);