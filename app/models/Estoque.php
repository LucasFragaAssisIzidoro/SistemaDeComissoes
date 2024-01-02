<?php 
class Estoque{
       
    private $db;
    public function __construct(){
            $this->db = new Database();
    }
    public function cadastrarprod($dados){
        $this->db->query("INSERT INTO produtos(cod_produto, categoria) VALUES (:cod_produto, :categoria)");
        $this->db->bind(":cod_produto", $dados['codeproduct']);
        $this->db->bind(":categoria", $dados['category']);
        if($this->db->executa()){
            return true;
        }else{
            return false;
        }
    }
    public function verificarCodigoExistente($codeProduct){
        $this->db->query("SELECT cod_produto FROM produtos WHERE cod_produto = :cod_produto");
        $this->db->bind(":cod_produto", $codeProduct);
        $this->db->executa();

        return $this->db->resultado() ? true : false;
    }
}