<?php 
class Fornecedor{
       
    private $db;
    public function __construct(){
            $this->db = new Database();
    }
    public function selecionarFornecedores(){
        $this->db->query("SELECT * from fornecedores");
        return $this->db->resultados();
    }
}