<?php 
class Estoque{
       
    private $db;
    public function __construct(){
            $this->db = new Database();
    }
    //mercadoria
    public function cadastrarmercadoria($dados){
        $this->db->query("INSERT INTO mercadorias(cod_mercadoria, categoria_mercadoria) VALUES (:cod_mercadoria, :categoria_mercadoria)");
        $this->db->bind(":cod_mercadoria", $dados['cod_mercadoria']);
        $this->db->bind(":categoria_mercadoria", $dados['categoria_mercadoria']);
        if($this->db->executa()){
            return true;
        }else{
            return false;
        }
    }
    public function verificarCodigoExistente($codMercadoria){
        $this->db->query("SELECT cod_mercadoria FROM mercadorias WHERE cod_mercadoria = :cod_mercadoria");
        $this->db->bind(":cod_mercadoria", $codMercadoria);
        $this->db->executa();

        return $this->db->resultado() ? true : false;
    }

    //produto
    public function cadastrarproduto($dados){
        $this->db->query("INSERT INTO produtos(cod_mercadoria, id_fornecedor, nome_produto, quantidade_produto, valor_produto) VALUES (:cod_mercadoria, :id_fornecedor, :nome_produto, :quantidade_produto, :valor_produto)");
        $this->db->bind(":cod_mercadoria", $dados['cod_produto']);
        $this->db->bind(":id_fornecedor", $dados['fornecedor_produto']);
        $this->db->bind(":nome_produto", $dados['nome_produto']);
        $this->db->bind(":quantidade_produto", $dados['quantidade_produto']);
        $this->db->bind("valor_produto", $dados['valor_produto']);
        if($this->db->executa()){
            return true;
        }else{
            return false;
        }
    }
    public function selecionarProdutos(){
        $this->db->query("SELECT * FROM produtos");
        $this->db->executa();
        return $this->db->resultados();
    }
    public function filtrarProdutos($codProduto) {
        $this->db->query("SELECT * FROM produtos WHERE cod_mercadoria LIKE :codProduto");
        $this->db->bind(':codProduto', "%$codProduto%");
        $this->db->executa();
        return $this->db->resultados();
    }
    public function deletarProduto($idProduto){
        $this->db->query("DELETE FROM PRODUTOS WHERE cod_mercadoria = :codMercadoria");
        $this->db->bind(':codMercadoria', "$idProduto");
        $this->db->executa();
    }

    public function editarProduto($dados){
        $this->db->query("UPDATE produtos SET  id_fornecedor=:id_fornecedor, nome_produto=:nome_produto, quantidade_produto=:quantidade_produto, valor_produto=:valor_produto WHERE cod_mercadoria = :cod_mercadoria");
        $this->db->bind(":id_fornecedor", $dados['fornecedor_produto']);
        $this->db->bind(":nome_produto", $dados['nome_produto']);
        $this->db->bind(":quantidade_produto", $dados['quantidade_produto']);
        $this->db->bind(":valor_produto", $dados['valor_produto']);
        $this->db->bind(":cod_mercadoria", $dados['codigo_produto']);
        
        if($this->db->executa()){
            return true;
        } else {
            return false;
        }
    }
    public function saidaProduto($dados){
        $this->db->query("UPDATE produtos SET quantidade_produto=:quantidade_produto WHERE cod_mercadoria = :cod_mercadoria");
        $this->db->bind(":quantidade_produto", $dados['quantidade_produto']);
        $this->db->bind(":cod_mercadoria", $dados['cod_produto']);
        
        if($this->db->executa()){
            return true;
        } else {
            return false;
        }
    }
    public function entradaProduto($dados){
        $this->db->query("UPDATE produtos SET quantidade_produto=:quantidade_produto WHERE cod_mercadoria = :cod_mercadoria");
        $this->db->bind(":quantidade_produto", $dados['quantidade_produto']);
        $this->db->bind(":cod_mercadoria", $dados['cod_produto']);
        
        if($this->db->executa()){
            return true;
        } else {
            return false;
        }
    }
    public function encontrarQuantidade($codMercadoria){
        $this->db->query('SELECT quantidade_produto FROM produtos WHERE cod_mercadoria = :cod_mercadoria' );
        $this->db->bind(":cod_mercadoria", $codMercadoria);
        $this->db->executa();
        return $this->db->resultado();
    }
      
}