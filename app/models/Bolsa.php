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
        // Converta o valor do produto para string com a função number_format
        $valorProdutoString = number_format($dados['valor_item'], 2, '.', '');
    
        $this->db->query("INSERT INTO itens_bolsa (id_bolsa, cod_mercadoria, quantidade, valor_produto) VALUES (:id_bolsa, :cod_mercadoria, :quantidade, :valor_produto)");
        $this->db->bind(":id_bolsa", $dados['id_bolsa']);
        $this->db->bind(":cod_mercadoria", $dados['cod_mercadoria']);
        $this->db->bind(":quantidade", $dados['quantidade']);
        $this->db->bind(":valor_produto", $valorProdutoString); // Use a string formatada para o valor do produto
    
        $this->db->executa();
    }
    
    public function buscarValorPorCodigo($codigo){
        $this->db->query("SELECT valor_produto FROM produtos WHERE cod_mercadoria = :codigo");
        $this->db->bind(':codigo', $codigo);
        $this->db->executa();
        $resultado = $this->db->resultado();
    
        // Verifica se há algum resultado retornado
        if($resultado){
            // Retorna o valor do produto como um número decimal (float)
            return (float)$resultado->valor_produto;
        } else {
            // Retorna falso se não houver resultado encontrado
            return false;
        }
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