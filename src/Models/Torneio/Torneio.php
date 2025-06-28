<?php
namespace App\Models\Torneio;

class Torneio {
    private string $nome;
    private string $descricao;
    private \DateTime $dataInicio;
    private \DateTime $dataFim;
    private string $local;
    private array $competicoes = [];

    public function __construct(string $nome, string $descricao, \DateTime $dataInicio, \DateTime $dataFim,string $local) {
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->dataInicio = $dataInicio;
        $this->dataFim = $dataFim;
        $this->local = $local;
    }

    public function adicionarCompeticao(Competicao $competicao): void {
        $this->competicoes[$competicao->getNome()] = $competicao;
    }

    public function getCompeticao(string $nome): ?Competicao {
        return $this->competicoes[$nome] ?? null;
    }

    public function getCompeticoes(): array {
        return $this->competicoes;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getDescricao(): string {
        return $this->descricao;
    }

    public function getDataInicio(): \DateTime {
        return $this->dataInicio;
    }

    public function getDataFim(): \DateTime {
        return $this->dataFim;
    }

    public function getLocal(): string {
        return $this->local;
    }
}