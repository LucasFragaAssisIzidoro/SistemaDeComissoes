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
    public function cadastrarFornecedores($dados){
        $this->db->query('INSERT INTO fornecedores(nome_fornecedor, email_fornecedor, telefone_fornecedor) VALUES (:nome, :email, :telefone)');
        $this->db->bind(':nome', $dados['nome']);
        $this->db->bind(':email', $dados['email']);
        $this->db->bind(':telefone', $dados['telefone']);
        $this->db->executa();
    }
    public function deletar($idFornecedor){
        $this->db->query('DELETE FROM fornecedores WHERE id_fornecedor = :id_fornecedor');
        $this->db->bind(':id_fornecedor', $idFornecedor);
        $this->db->executa();

    }
}