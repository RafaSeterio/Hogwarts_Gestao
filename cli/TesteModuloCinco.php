<?php

require_once __DIR__ . '/vendor/autoload.php'; // ajuste se necessário

use Funcionario\Funcionario;
use Funcionario\Professor;
use Funcionario\RHService;

echo "\n=== TESTE DO MÓDULO 5: FUNCIONÁRIOS E PROFESSORES ===\n";

// Criar serviço de RH
$rh = new RHService();

// Criar professores
$prof1 = new Professor("Minerva McGonagall", "Manhã", "Transfiguração", ["1A", "2B"]);
$prof2 = new Professor("Severo Snape", "Tarde", "Poções", ["3A"]);

// Criar outro funcionário
$zelador = new Funcionario("Argus Filch", "Zelador", "Integral");

// Registrar todos
$rh->registrarFuncionario($prof1);
$rh->registrarFuncionario($prof2);
$rh->registrarFuncionario($zelador);

// Listar funcionários
foreach ($rh->listarFuncionarios() as $f) {
    echo "- Nome: " . $f->getNome() . ", Cargo: " . $f->getCargo() . ", Turno: " . $f->getTurno() . "\n";
}

// Buscar um professor
$buscado = $rh->buscarPorNome("Severo Snape");
if ($buscado) {
    echo "Funcionário encontrado: " . $buscado->getNome() . "\n";
} else {
    echo "Funcionário não encontrado.\n";
}


?>