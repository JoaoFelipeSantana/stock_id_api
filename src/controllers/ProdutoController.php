<?php
    namespace src\controllers;

    use src\services\ProdutoService;

    class ProdutoController {
        private $serviceProduto;

        public function __construct() {
            $this->serviceProduto = new ProdutoService();
        }

        public function criar() {
            $data = json_decode(file_get_contents("php://input"));
            echo json_encode($this->serviceProduto->criar($data->nome, $data->descricao, $data->categoria, $data->quantidade,
                                                        $data->dt_fabricacao, $data->dt_validade, $data->valor_compra, $data->valor_venda));
        }

        public function selecionarTudo() {
            $result = $this->serviceProduto->selecionarTudo();
            echo json_encode($result);
        }

        public function selecionarUm($param) {
            $id = $param[0] ?? null;

            $result = $this->serviceProduto->selecionarUm($id);

            if($result) {
                echo json_encode($result);
                return $result;
            }
            else {
                echo json_encode(['message' => 'Produto nao encontrado']);
            }
        }

        public function editar() {
            $data = json_decode(file_get_contents("php://input"));

            echo json_encode($this->serviceProduto->editar($data-> id, $data->nome, $data->descricao, $data->categoria, $data->quantidade,
            $data->dt_fabricacao, $data->dt_validade, $data->valor_compra, $data->valor_venda));
        }

        public function deletar($param) {
            $id = $param[0] ?? null;

            $result = $this->serviceProduto->deletar($id);

            if ($result) {
                echo json_encode($result);
            }
        }


    }
?>