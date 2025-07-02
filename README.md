Módulo 1 – Convite e Cadastro de Alunos
Responsável: Rafaela Setério Silva

Objetivo
Este módulo é responsável por gerenciar o processo de entrada dos alunos em Hogwarts. Inclui o envio de convites e o cadastro inicial no sistema.

Funcionalidades
Envio e validação de convites para novos alunos.

Cadastro com dados pessoais (nome, idade, origem mágica etc.).

Interface para padronizar o uso das classes.

Regras de negócio no CadastroService.

Classes
Aluno.php – Representa o aluno com seus atributos e métodos.

Convite.php – Responsável pela criação e envio de convites.

CadastroService.php – Lógica para validar e cadastrar alunos.

AlunoInterface.php – Interface implementada pela classe Aluno.


Módulo 2 – Seleção de Casas
Responsável: Giovanna Katherine

Objetivo
Este módulo automatiza o processo de Seleção das Casas em Hogwarts, realizando a análise das características dos alunos e associando-os à casa mais compatível por meio do Chapéu Seletor.

Funcionalidades
Registro das quatro casas de Hogwarts com suas respectivas características.

Avaliação das características do aluno.

Seleção automática da casa ideal usando regras de compatibilidade.

Aplicação de polimorfismo no comportamento do Chapéu Seletor.

Classes
Casa.php – Representa uma casa de Hogwarts com nome, características e pontos.

Selecionador.php – Responsável por intermediar a seleção, utilizando o chapéu seletor.

ChapeuSeletor.php – Define a lógica de escolha da casa com base em compatibilidade de características (polimorfismo).

Módulo 3 – Gerenciamento de Torneios e Competições
Responsável: Leonardo 

Objetivo
Este módulo é responsável por automatizar o gerenciamento dos Torneios internos (como o Torneio Tribruxo e a Copa das Casas), organizando inscrições, desafios e pontuações.

Funcionalidades
Cadastro de torneios com período, local e descrição.
Criação de competições com regras.
Inscrição de alunos por casa (Grifinória, Sonserina, Corvinal, Lufa-Lufa) ou escolas diferentes.
Registro de resultados individuais por competição.
Cálculo automático de pontuação das casas.
Geração de rankings de pontuação em tempo real.


Classes
AlunoCompeticao.php - Representa o aluno em competições, implementa AlunoInterface (nome, email, nascimento) e adiciona atributo casa e controle de pontuação.

Competicao.php - Modela uma competição específica.

Torneio.php - Agrupa competições e inscritos.

Inscricao.php - Vincula aluno a torneio.

Ranking.php - Gera resultados e relatórios.

TorneioService.php - Coordena todas as operações.



Módulo 4 – Controle Acadêmico e Disciplinar
Responsável: Rafaela Setério Silva

Objetivo
Este módulo trata do desempenho acadêmico dos alunos, além de registrar advertências disciplinares.

Funcionalidades
Cadastro de disciplinas.

Registro de avaliações e notas.

Emissão de advertências.

Criação de histórico acadêmico.

Classes
Disciplina.php – Representa uma disciplina/matéria.

Avaliacao.php – Armazena informações de avaliações e notas.

Advertencia.php – Registra penalidades disciplinares.

RegistroAcademico.php – Guarda o histórico acadêmico do aluno.

Módulo 5 – Gerenciamento de Professores e Funcionários
Responsável: Giovanna

 Objetivo
Este módulo centraliza o cadastro e gerenciamento dos profissionais de Hogwarts, como professores e demais funcionários, facilitando a organização por turno, disciplina e turmas.

 Funcionalidades
Cadastro de professores com suas respectivas disciplinas e turmas.

Cadastro de outros funcionários com seus cargos e turnos.

Listagem de todos os profissionais registrados.

Busca de funcionário pelo nome.

Uso de herança entre Funcionario e Professor.

Classes
Funcionario.php – Classe base que representa qualquer funcionário de Hogwarts.

Professor.php – Herda de Funcionario e adiciona disciplina e turmas.

RHService.php – Serviço responsável pelo cadastro, listagem e busca de funcionários.

Módulo 6 – Sistema de Alertas e Comunicação
Responsável: Wendles

Objetivo
Este módulo é responsável por gerenciar o envio de notificações e alertas para os usuários do sistema (alunos, professores e coordenadores), garantindo uma comunicação eficaz sobre eventos, mudanças, resultados e lembretes importantes.

Funcionalidades
Cadastro de tipos de alerta (urgente, informativo, lembrete).

Envio de mensagens segmentadas por perfil (aluno, professor, casa, escola, etc.).

Integração com eventos do sistema (ex: resultados de competições, mudanças em aulas, novos anúncios).

Histórico de mensagens enviadas.

Confirmação de leitura por parte dos usuários.

Agendamento de alertas para envio futuro.

Classes
Alerta.php – Representa um alerta individual com tipo, título, mensagem, data de envio e status de leitura.

UsuarioMensagem.php – Modela o vínculo entre um usuário e uma mensagem recebida, permitindo controle individual de leitura.

ComunicacaoService.php – Gerencia o envio de alertas e mensagens, incluindo lógica de segmentação e agendamento.
