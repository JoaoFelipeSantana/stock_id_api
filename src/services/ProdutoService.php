<?php
    namespace src\services;

    use src\models\Produto;
    use src\DAO\ProdutoDAO;

    class ProdutoService {
        private $dao;

        public function __construct() {
            $this->dao = new ProdutoDao();
        }
        
        public function criar ($nome, $descricao, $categoria, $quantidade, $dt_fabricacao, $dt_validade, $valor_compra, $valor_venda) {  
            $produto = new Produto($nome, $descricao, $categoria, $quantidade, $dt_fabricacao, $dt_validade, $valor_compra, $valor_venda);
            
            $this->dao->save($produto);

            return ['sucess' => 'Produto CRIADO com sucesso'];
        }

        public function selecionarTudo() {
            return $this->dao->findAll();
        }

        public function selecionarUm($id) {
            return $this->dao->findOne($id);
        }

        public function editar($id, $nome, $descricao, $categoria, $quantidade, $dt_fabricacao, $dt_validade, $valor_compra, $valor_venda) {
            $result = $this->dao->findOne($id);

            if(!$result) {
                return ['error' => 'Produto nao encontrado'];
            }

            $produto = new Produto($nome, $descricao, $categoria, $quantidade, $dt_fabricacao, $dt_validade, $valor_compra, $valor_venda);
            $produto->setId($id);

            $this->dao->update($produto);

            return ['sucess' => 'Produto EDITADO com sucesso'];
        }

        public function deletar($id) {
            $result = $this->dao->findOne($id);

            if(!$result) {
                return ['error' => 'Produto nao encontrado'];
            }

            $this->dao->delete($id);

            return ['sucess' => 'Produto DELETADO com sucesso'];
        }
    }


?>