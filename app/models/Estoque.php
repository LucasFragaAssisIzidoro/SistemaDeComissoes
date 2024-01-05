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
        $this->db->query("INSERT INTO produtos(id_mercadoria, id_fornecedor, quantidade_produto, cor_produto, tamanho_produto) VALUES (:id_mercadoria, :id_fornecedor, :quantidade_produto, :cor_produto, :tamanho_produto)");
        $this->db->bind(":id_mercadoria", $dados['cod_mercadoria']);
        $this->db->bind(":categoria_mercadoria", $dados['categoria_mercadoria']);
        if($this->db->executa()){
            return true;
        }else{
            return false;
        }
    }
}