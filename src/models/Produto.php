<?php
    namespace src\models;

    class Produto {
        private $id;
        private $nome;
        private $descricao;
        private $categoria;
        private $quantidade;
        private $dt_fabricacao;
        private $dt_validade;
        private $valor_compra;
        private $valor_venda;

        // Construtor
        public function __construct($nome, $descricao, $categoria, $quantidade, $dt_fabricacao, 
                                    $dt_validade, $valor_compra, $valor_venda) {
            $this->nome = $nome;
            $this->descricao = $descricao;
            $this->categoria = $categoria;
            $this->quantidade = $quantidade;
            $this->dt_fabricacao = $dt_fabricacao;
            $this->dt_validade = $dt_validade;
            $this->valor_compra = $valor_compra;
            $this->valor_venda = $valor_venda;
        }
        
        // Métodos acessores
        public function getId() {
            return $this->id;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getDescricao() {
            return $this->descricao;
        }

        public function getCategoria() {
            return $this->categoria;
        }

        public function getQuantidade() {
            return $this->quantidade;
        }

        public function getDt_fabricacao() {
            return $this->dt_fabricacao;
        }

        public function getDt_validade() {
            return $this->dt_validade;
        }

        public function getValor_compra() {
            return $this->valor_compra;
        }

        public function getValor_venda() {
            return $this->valor_venda;
        }

        // Métodos modificadores
        public function setId($id) {
            $this->id = $id;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function setDescricao($descricao) {
            $this->descricao = $descricao;
        }

        public function setQuantidade($quantidade) {
            $this->quantidade = $quantidade;
        }

        public function setDt_fabricacao($dt_fabricacao) {
            $this->dt_fabricacao = $dt_fabricacao;
        }

        public function setDt_validade($dt_validade) {
            $this->dt_validade = $dt_validade;
        }

        public function setValor_compra($valor_compra) {
            $this->valor_compra = $valor_compra;
        }

        public function setValor_venda($valor_venda) {
            $this->valor_venda = $valor_venda;
        }

    }
?>