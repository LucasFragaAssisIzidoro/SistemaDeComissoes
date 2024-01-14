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
        $this->db->query("INSERT INTO produtos(cod_mercadoria, id_fornecedor, nome_produto, quantidade_produto, cor_produto, tamanho_produto) VALUES (:cod_mercadoria, :id_fornecedor, :nome_produto, :quantidade_produto, :cor_produto, :tamanho_produto)");
        $this->db->bind(":cod_mercadoria", $dados['cod_produto']);
        $this->db->bind(":id_fornecedor", $dados['fornecedor_produto']);
        $this->db->bind(":nome_produto", $dados['nome_produto']);
        $this->db->bind(":quantidade_produto", $dados['quantidade_produto']);
        $this->db->bind(":cor_produto", $dados['cor_produto']);
        $this->db->bind(":tamanho_produto", $dados['tamanho_produto']);
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
}