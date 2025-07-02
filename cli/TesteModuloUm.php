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



