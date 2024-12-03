<?php
    namespace src\DAO;

    use src\models\Produto;
    use src\config\connection;
    use PDO;
    
    class ProdutoDAO {
        private $conn;

        public function __construct() {
            $database = new Connection();
            $this->conn = $database->getConnection();
        }

        public function save(Produto $produto) {
            $nome_produto = $produto->getNome();
            $descricao = $produto->getDescricao();
            $categoria = $produto->getCategoria();
            $quantidade = $produto->getQuantidade();
            $dt_fabricacao = $produto->getDt_fabricacao();
            $dt_validade = $produto->getDt_validade();
            $valor_compra = $produto->getValor_compra();
            $valor_venda = $produto->getValor_venda();

            $query = "INSERT INTO produto (nome, descricao, categoria, quantidade, dt_fabricacao, dt_validade, valor_compra, valor_venda) VALUES (:nome,:descricao, :categoria, :quantidade, :dt_fabricacao, :dt_validade, :valor_compra, :valor_venda)";
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":nome", $nome_produto);
            $stmt->bindParam(":descricao", $descricao);
            $stmt->bindParam(":categoria", $categoria);
            $stmt->bindParam(":quantidade", $quantidade);
            $stmt->bindParam(":dt_fabricacao", $dt_fabricacao);
            $stmt->bindParam(":dt_validade", $dt_validade);
            $stmt->bindParam(":valor_compra", $valor_compra);
            $stmt->bindParam(":valor_venda", $valor_venda);

            $stmt->execute();
        }

        public function findALL() {
            $query = "SELECT * FROM produto";
            $stmt = $this->conn->prepare($query);
            
            $stmt->execute();

            $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
            return $result;
        }

        public function findOne($id) {
            $query = "SELECT * FROM produto WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            
            $stmt->bindParam(":id", $id);
            
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        public function update(Produto $produto) {
            $id = $produto->getId();
            $nome_produto = $produto->getNome();
            $descricao = $produto->getDescricao();
            $categoria = $produto->getCategoria();
            $quantidade = $produto->getQuantidade();
            $dt_fabricacao = $produto->getDt_fabricacao();
            $dt_validade = $produto->getDt_validade();
            $valor_compra = $produto->getValor_compra();
            $valor_venda = $produto->getValor_venda();

            $query = "UPDATE produto SET nome = :nome, descricao = :descricao, categoria = :categoria, quantidade = :quantidade,
            dt_fabricacao = :dt_fabricacao, dt_validade = :dt_validade, valor_compra = :valor_compra, valor_venda = :valor_venda
            WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":nome", $nome_produto);
            $stmt->bindParam(":descricao", $descricao);
            $stmt->bindParam(":categoria", $categoria);
            $stmt->bindParam(":quantidade", $quantidade);
            $stmt->bindParam(":dt_fabricacao", $dt_fabricacao);
            $stmt->bindParam(":dt_validade", $dt_validade);
            $stmt->bindParam(":valor_compra", $valor_compra);
            $stmt->bindParam(":valor_venda", $valor_venda);

            $stmt->execute();
        }

        public function delete($id) {
            $query = "DELETE FROM produto WHERE id = :id";       
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":id", $id);

            $stmt->execute();
        }
    }

?>