<?php
declare(strict_types = 1);

//require_once __DIR__ . '../vendor/autoload.php';
require_once 'vendor/autoload.php';

use App\Models\Torneio\Torneio;
use App\Models\Torneio\Competicao;
use App\Models\Torneio\TorneioService;
use App\Models\Torneio\AlunoCompeticao;



$torneio = new Torneio(
    "Torneio Corrida", 
    "Corrida de Vassoura",
    new \DateTime('2024-10-31'),
    new \DateTime('2025-06-24'),
    "Salão Principal"
);


$competicao1 = new Competicao("Corrida Campo","10 voltas em torno do campo  de quadribol", new \DateTime('2024-11-24'), "Campo", 40);
$competicao2 = new Competicao("Corrida Floresta","20 voltas em torno da floresta proibida", new \DateTime('2025-02-24'),"Floresta",60);
$competicao3 = new Competicao("Corrida Hogsmeade","30 voltas em torno de Hogsmeade", new \DateTime('2025-06-24'),"Hogsmeade",70);

$torneio->adicionarCompeticao($competicao1);
$torneio->adicionarCompeticao($competicao2);
$torneio->adicionarCompeticao($competicao3);


$torneioService = new TorneioService($torneio);


$aluno1 = new AlunoCompeticao("Victor Knutz", "Sonserina", "victor@hogwarts.com", "2008-06-30");
$aluno2 = new AlunoCompeticao("Florence Diaz", "Corvinal", "florences@hogwarts.com", "2009-10-30");
$aluno3 = new AlunoCompeticao("Carl Dan", "Lufa-Lufa", "carl@hogwarts.com", "2008-09-15");
$aluno4 = new AlunoCompeticao("Henry Parker", "Grifinória", "henry@hogwarts.com", "2009-07-31");
$aluno5 = new AlunoCompeticao("Anna Alvez", "Sonserina", "anna@hogwarts.com", "2009-01-23");
$aluno6 = new AlunoCompeticao("Bella Barn", "Corvinal", "bella@hogwarts.com", "2008-02-04");
$aluno7 = new AlunoCompeticao("Cristina Cruz", "Lufa-Lufa", "cristina@hogwarts.com", "2009-03-15");
$aluno8 = new AlunoCompeticao("Donna Duran", "Grifinória", "donna@hogwarts.com", "2008-04-26");


$torneioService->inscreverAluno($aluno1);
$torneioService->inscreverAluno($aluno2);
$torneioService->inscreverAluno($aluno3);
$torneioService->inscreverAluno($aluno4);
$torneioService->inscreverAluno($aluno5);
$torneioService->inscreverAluno($aluno6);
$torneioService->inscreverAluno($aluno8);
$torneioService->inscreverAluno($aluno7);

echo " ===== 25º TORNEIO CORRIDA DE VASSOURAS ===== \n";

$torneioService->registrarResultado("Victor Knutz", "Corrida Campo", 35);
$torneioService->registrarResultado("Florence Diaz", "Corrida Campo", 40);
$torneioService->registrarResultado("Carl Dan", "Corrida Campo", 25);
$torneioService->registrarResultado("Henry Parker", "Corrida Campo", 20);
$torneioService->registrarResultado("Anna Alvez", "Corrida Campo", 30);
$torneioService->registrarResultado("Bella Barn", "Corrida Campo", 5);
$torneioService->registrarResultado("Cristina Cruz", "Corrida Campo", 10);
$torneioService->registrarResultado("Donna Duran", "Corrida Campo", 15);


echo "\nApós etapa 1 - Corrida Campo:\n ";
echo $torneioService->exibirQuadroResultados();
$relatorioAlunos = $torneioService->gerarRelatorioAlunos();
$relatorioCasas = $torneioService->gerarRelatorioCasas();



$torneioService->registrarResultado("Victor Knutz", "Corrida Floresta", 50);
$torneioService->registrarResultado("Florence Diaz", "Corrida Floresta", 30);
$torneioService->registrarResultado("Carl Dan", "Corrida Floresta", 35);
$torneioService->registrarResultado("Henry Parker", "Corrida Floresta", 55);
$torneioService->registrarResultado("Anna Alvez", "Corrida Floresta", 25);
$torneioService->registrarResultado("Bella Barn", "Corrida Floresta", 40);
$torneioService->registrarResultado("Cristina Cruz", "Corrida Floresta", 45);
$torneioService->registrarResultado("Donna Duran", "Corrida Floresta", 60);


echo "\nApós etapa 2 - Corrida Floresta:\n";
echo $torneioService->exibirQuadroResultados();
$relatorioAlunos = $torneioService->gerarRelatorioAlunos();
$relatorioCasas = $torneioService->gerarRelatorioCasas();



$torneioService->registrarResultado("Victor Knutz", "Corrida Hogsmeade", 45);
$torneioService->registrarResultado("Florence Diaz", "Corrida Hogsmeade", 65);
$torneioService->registrarResultado("Carl Dan", "Corrida Hogsmeade", 35);
$torneioService->registrarResultado("Henry Parker", "Corrida Hogsmeade", 40);
$torneioService->registrarResultado("Anna Alvez", "Corrida Hogsmeade", 70);
$torneioService->registrarResultado("Bella Barn", "Corrida Hogsmeade", 60);
$torneioService->registrarResultado("Cristina Cruz", "Corrida Hogsmeade", 50);
$torneioService->registrarResultado("Donna Duran", "Corrida Hogsmeade", 55);


echo "\nApós etapa 3 - Corrida Hogsmeade - RESULTADO FINAL: \n";
echo $torneioService->exibirQuadroResultados();
$relatorioAlunos = $torneioService->gerarRelatorioAlunos();
$relatorioCasas = $torneioService->gerarRelatorioCasas();

