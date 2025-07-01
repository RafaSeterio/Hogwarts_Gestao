<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Models\Aluno\Aluno;
use App\Models\Aluno\Convite;
use App\Models\Aluno\CadastroService;

use App\Models\Academico\Disciplina;
use App\Models\Academico\Advertencia;
use App\Models\Academico\RegistroAcademico;
use App\Models\Funcionario\Professor;

echo "============================\n";
echo "TESTES DO MÓDULO 1: Aluno\n";
echo "============================\n";

// Criar um convite
$convite = new Convite("harry@hogwarts.com");
echo "Convite enviado para: " . $convite->getEmail() . "\n";

// Criar um aluno
$aluno = new Aluno("Harry Potter", "harry@hogwarts.com", "31/07/1980");

// Cadastrar o aluno
$cadastro = new CadastroService();
$cadastro->cadastrar($aluno);

echo "Aluno cadastrado com sucesso: " . $aluno->getNome() . " - " . $aluno->getEmail() . "\n";

echo "\n============================\n";
echo "TESTES DO MÓDULO 4: Acadêmico\n";
echo "============================\n";

// Criar professor

$professor = new Professor("Remus Lupin", "Professor de DCAT", "Noturno", ["3º Ano A", "3º Ano B"]);


// Criar disciplina
$disciplina = new Disciplina("Defesa Contra as Artes das Trevas", $professor);
echo "Disciplina criada: " . $disciplina->getNome() . " com o professor " . $disciplina->getProfessor()->getNome() . "\n";

// Registrar nota
$registro = new RegistroAcademico($aluno);
$registro->adicionarNota($disciplina, 9.5);
echo "Nota registrada: " . $registro->getNotas()[$disciplina->getNome()] . " para a disciplina " . $disciplina->getNome() . "\n";

// Aplicar advertência
$advertencia = new Advertencia($aluno, "Brigou no corredor");
$advertencia->aplicar();
echo "Advertência aplicada: " . $advertencia->getDescricao() . " ao aluno " . $aluno->getNome() . "\n";

echo "\nTodos os testes foram executados com sucesso!\n";
