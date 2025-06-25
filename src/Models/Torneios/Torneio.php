<?php
    namespace App\Models\Torneios;

    class Torneio {
        private string $nome;
        private string $descricao;
        private string $data;
        private string $local;
        private array $desafios = [];

        public function __construct(string $nome, string $descricao, string $data, string $local){
            $this -> nome = $nome;
            $this -> descricao = $descricao;
            $this -> data = $data;
            $this -> local = $local;
        }

        function getNome(){
            return $this->nome;
        }

        function getDescricao(){
            return $this -> descricao;
        }

        function getData(){
            return $this-> data;
        }

        function getLocal(){
            return $this->local;
        }

        function getDesafios(): array{
            return $this->desafios;
        }



        public function adicionarDesafio(Desafio $desafio) : void{
            $this->desafios[] = $desafio;
        }
        
    }
?>