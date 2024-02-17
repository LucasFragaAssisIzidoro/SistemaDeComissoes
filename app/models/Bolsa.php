<?php

class Bolsa{
       
    private $db;
    public function __construct(){
        $this->db = new Database();
    }
    public function cadastrarBolsa($dados){
        $this->db->query("INSERT INTO bolsas(id_vendedora, data_vencimento, nome_vendedora) VALUES (:id_vendedora, :data_vencimento, :nome_vendedora)");
        $this->db->bind(":id_vendedora", $dados['id']);
        $this->db->bind(":data_vencimento", $dados['data']);
        $this->db->bind(":nome_vendedora", $dados['nome']);

        if($this->db->executa()){
            return $this->db->ultimoIdInserido();
        } else {
            return false;
        }
    }
    public function cadastrarItens($dados){
        $this->db->query("INSERT INTO itens_bolsa (id_bolsa, cod_mercadoria, quantidade, valor_produto) VALUES (:id_bolsa, :cod_mercadoria, :quantidade, :valor_produto)");
        $this->db->bind(":id_bolsa", $dados['id_bolsa']);
        $this->db->bind(":cod_mercadoria", $dados['cod_mercadoria']);
        $this->db->bind(":quantidade", $dados['quantidade']);
        $this->db->bind(":valor_produto", $dados['valor_produto']);

        $this->db->executa();
    }
    public function selecionarBolsas(){
        $this->db->query("SELECT * FROM bolsas");
        $this->db->executa();
        return $this->db->resultados();
    } 
    public function selecionarItens($id){
        $this->db->query("SELECT * FROM itens_bolsa WHERE id_bolsa = $id");
        $this->db->executa();
        return $this->db->resultados();
    }
    public function selecionarBolsasPorId($id){
        $this->db->query("SELECT * FROM bolsas WHERE id_bolsa = $id");
        $this->db->executa();
        return $this->db->resultados();
    }
}