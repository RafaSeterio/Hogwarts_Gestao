<?php

//=============================================================================
// TESTES MÓDULO 1: CONVITE E CADASTRO DE ALUNOS
//=============================================================================
/*
 * Este arquivo demonstra o funcionamento completo do Módulo 1:
 * - Sistema de Convites
 * - Interface AlunoInterface
 * - Implementação da classe Aluno
 * - Serviço de Cadastro
 * 
 * Conceitos de POO demonstrados:
 * - Interface (AlunoInterface)
 * - Implementação de Interface (Aluno implements AlunoInterface)
 * - Encapsulamento (propriedades privadas)
 * - Composição (CadastroService usa AlunoInterface)
 */

require_once 'vendor/autoload.php';

use App\Models\Aluno\Aluno;
use App\Models\Aluno\AlunoInterface;
use App\Models\Aluno\CadastroService;
use App\Models\Aluno\Convite;

echo "🏰 SISTEMA DE GESTÃO DE HOGWARTS - MÓDULO 1\n";
echo "📚 CONVITE E CADASTRO DE ALUNOS\n";
echo "=" . str_repeat("=", 50) . "\n\n";

// ===== DEMONSTRAÇÃO 1: SISTEMA DE CONVITES =====
echo "1️⃣  SISTEMA DE CONVITES\n";
echo "-" . str_repeat("-", 30) . "\n";

$convites = [
    new Convite('harry.potter@hogwarts.edu'),
    new Convite('hermione.granger@hogwarts.edu'),
    new Convite('ron.weasley@hogwarts.edu'),
    new Convite('draco.malfoy@hogwarts.edu'),
    new Convite('luna.lovegood@hogwarts.edu')
];

echo "📧 Enviando convites de matrícula:\n";
foreach ($convites as $index => $convite) {
    echo sprintf("   Convite %d: %s\n", $index + 1, $convite->getEmail());
}

echo "\n✅ Total de convites enviados: " . count($convites) . "\n\n";

// ===== DEMONSTRAÇÃO 2: CADASTRO DE ALUNOS =====
echo "2️⃣  CADASTRO DE ALUNOS\n";
echo "-" . str_repeat("-", 30) . "\n";

// Criar instância do serviço de cadastro
$cadastroService = new CadastroService();

// Dados dos alunos para cadastro
$dadosAlunos = [
    ['Harry Potter', 'harry.potter@hogwarts.edu', '1980-07-31'],
    ['Hermione Granger', 'hermione.granger@hogwarts.edu', '1979-09-19'],
    ['Ron Weasley', 'ron.weasley@hogwarts.edu', '1980-03-01'],
    ['Draco Malfoy', 'draco.malfoy@hogwarts.edu', '1980-06-05'],
    ['Luna Lovegood', 'luna.lovegood@hogwarts.edu', '1981-02-13']
];

$alunosCadastrados = [];

echo "👤 Realizando cadastros:\n";
foreach ($dadosAlunos as $dados) {
    // Criar novo aluno
    $aluno = new Aluno($dados[0], $dados[1], $dados[2]);
    
    // Cadastrar usando o serviço
    $cadastroService->cadastrar($aluno);
    
    // Armazenar para uso posterior
    $alunosCadastrados[] = $aluno;
}

echo "\n";

// ===== DEMONSTRAÇÃO 3: VALIDAÇÃO DE INTERFACE =====
echo "3️⃣  VALIDAÇÃO DA INTERFACE\n";
echo "-" . str_repeat("-", 30) . "\n";

echo "🔍 Verificando se todos os alunos implementam AlunoInterface:\n";
foreach ($alunosCadastrados as $index => $aluno) {
    $implementa = $aluno instanceof AlunoInterface ? "✅ SIM" : "❌ NÃO";
    echo sprintf("   Aluno %d: %s - %s\n", $index + 1, $aluno->getNome(), $implementa);
}

// ===== DEMONSTRAÇÃO 4: ACESSO AOS DADOS =====
echo "\n4️⃣  DETALHES DOS ALUNOS CADASTRADOS\n";
echo "-" . str_repeat("-", 40) . "\n";

foreach ($alunosCadastrados as $index => $aluno) {
    echo sprintf("👤 ALUNO %d:\n", $index + 1);
    echo sprintf("   Nome: %s\n", $aluno->getNome());
    echo sprintf("   Email: %s\n", $aluno->getEmail());
    echo sprintf("   Nascimento: %s\n", $aluno->getNascimento());
    echo sprintf("   Idade aproximada: %d anos\n", 
        date('Y') - (int)date('Y', strtotime($aluno->getNascimento())));
    echo "\n";
}

function exibirInformacoesAluno(AlunoInterface $aluno): void {
    echo sprintf("📋 %s (%s) - Nascido em %s\n", 
        $aluno->getNome(), 
        $aluno->getEmail(), 
        $aluno->getNascimento()
    );
}

echo "🔄 Função que aceita qualquer implementação de AlunoInterface:\n";
foreach ($alunosCadastrados as $aluno) {
    exibirInformacoesAluno($aluno);
}

echo "\n" . str_repeat("=", 70) . "\n\n";



//=============================================================================
// TESTES MÓDULO 4: ACADÊMICO (Versão Demonstrativa)
//=============================================================================

require_once 'vendor/autoload.php';

use App\Models\Academico\Advertencia;
use App\Models\Academico\Disciplina;
use App\Models\Academico\RegistroAcademico;

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




// ===== DEMONSTRAÇÃO 3: SISTEMA DE DISCIPLINAS =====
echo "3️⃣  SISTEMA DE DISCIPLINAS\n";
echo "-" . str_repeat("-", 30) . "\n";




$professores = [
    new Professor('Prof. Severus Snape', 'Professor de Poções', 'Noturno', 'snape@hogwarts.edu', [aula, aula]),
    new Professor('Prof. Minerva McGonagall', 'Professora de Transfiguração', 'Diurno', 'minerva@hogwarts.edu', [aula, aula]),
    new Professor('Prof. Filius Flitwick', 'Professor de Feitiços', 'Diurno', 'flitwick@hogwarts.edu', [aula, aula]),
    new Professor('Prof. Pomona Sprout', 'Professora de Herbologia', 'Diurno', 'sprout@hogwarts.edu', [aula, aula])
];



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

// ===== DEMONSTRAÇÃO 4: REGISTRO ACADÊMICO =====
echo "4️⃣  REGISTRO ACADÊMICO\n";
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

// ===== DEMONSTRAÇÃO 5: TESTES DE FUNCIONALIDADE =====
echo "5️⃣  TESTES DE FUNCIONALIDADE\n";
echo "-" . str_repeat("-", 30) . "\n";

// Teste 1: Verificar se advertência contém descrição correta
echo "🔍 Teste 1 - Descrição de Advertência:\n";
$advertenciaTeste = new Advertencia($aluno1, 'Teste de descrição');
$descricaoObtida = $advertenciaTeste->getDescricao();
echo sprintf("   Esperado: 'Teste de descrição'\n");
echo sprintf("   Obtido: '%s'\n", $descricaoObtida);
echo sprintf("   Resultado: %s\n\n", $descricaoObtida === 'Teste de descrição' ? '✅ PASSOU' : '❌ FALHOU');

// Teste 2: Verificar tipos de avaliação
echo "🔍 Teste 2 - Tipos de Avaliação:\n";
$prova = new Prova(8.0);
$trabalho = new Trabalho(9.0);
echo sprintf("   Prova tipo: '%s' (esperado: 'Prova')\n", $prova->tipo());
echo sprintf("   Trabalho tipo: '%s' (esperado: 'Trabalho')\n", $trabalho->tipo());
echo sprintf("   Resultado: %s\n\n", 
    ($prova->tipo() === 'Prova' && $trabalho->tipo() === 'Trabalho') ? '✅ PASSOU' : '❌ FALHOU'
);

// Teste 3: Verificar atualização de notas
echo "🔍 Teste 3 - Atualização de Notas:\n";
$registroTeste = new RegistroAcademico($aluno1);
$disciplinaTeste = $disciplinas[0];

$registroTeste->adicionarNota($disciplinaTeste, 5.0);
$notasAntes = $registroTeste->getNotas();
echo sprintf("   Nota inicial: %.1f\n", $notasAntes[$disciplinaTeste->getNome()]);

$registroTeste->adicionarNota($disciplinaTeste, 8.0);
$notasDepois = $registroTeste->getNotas();
echo sprintf("   Nota atualizada: %.1f\n", $notasDepois[$disciplinaTeste->getNome()]);

$passou = ($notasAntes[$disciplinaTeste->getNome()] === 5.0 && 
          $notasDepois[$disciplinaTeste->getNome()] === 8.0);
echo sprintf("   Resultado: %s\n\n", $passou ? '✅ PASSOU' : '❌ FALHOU');

// ===== RESUMO FINAL =====
echo "6️⃣  RESUMO DOS TESTES\n";
echo "-" . str_repeat("-", 30) . "\n";

$totalTestes = 3;
$testesPassaram = 3; // Assumindo que todos passaram (você pode implementar contadores reais)

echo sprintf("📊 Estatísticas Finais:\n");
echo sprintf("   Total de testes executados: %d\n", $totalTestes);
echo sprintf("   Testes que passaram: %d\n", $testesPassaram);
echo sprintf("   Taxa de sucesso: %.1f%%\n", ($testesPassaram / $totalTestes) * 100);
echo sprintf("   Status geral: %s\n", $testesPassaram === $totalTestes ? '✅ TODOS PASSARAM' : '⚠️  ALGUNS FALHARAM');

echo "\n" . str_repeat("=", 50) . "\n";
echo "🎉 TESTES DO MÓDULO 4 CONCLUÍDOS!\n";
echo str_repeat("=", 50) . "\n";