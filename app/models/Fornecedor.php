<?php 
class Fornecedor{
       
    private $db;
    public function __construct(){
            $this->db = new Database();
    }
    public function selecionarFornecedores(){
        $this->db->query("SELECT * from fornecedores WHERE visivel = 1");
        return $this->db->resultados();
    }
    public function cadastrarFornecedores($dados){
        $this->db->query('INSERT INTO fornecedores(nome_fornecedor, email_fornecedor, telefone_fornecedor) VALUES (:nome, :email, :telefone)');
        $this->db->bind(':nome', $dados['nome']);
        $this->db->bind(':email', $dados['email']);
        $this->db->bind(':telefone', $dados['telefone']);
        $this->db->executa();
    }
    public function desativar($idFornecedor){
        $this->db->query('UPDATE fornecedores SET visivel = 0 WHERE id_fornecedor = :id_fornecedor');
        $this->db->bind(':id_fornecedor', $idFornecedor);
        $this->db->executa();
    }
    public function editar($dados){
        $this->db->query("UPDATE fornecedores SET  email_fornecedor=:email_fornecedor, telefone_fornecedor=:telefone_fornecedor, nome_fornecedor=:nome_fornecedor WHERE id_fornecedor = :id_fornecedor");
        $this->db->bind(":id_fornecedor", $dados['id_fornecedor']);
        $this->db->bind(":nome_fornecedor", $dados['nome_fornecedor']);
        $this->db->bind(":email_fornecedor", $dados['email_fornecedor']);
        $this->db->bind(":telefone_fornecedor", $dados['telefone_fornecedor']);
        
        if($this->db->executa()){
            return true;
        } else {
            return false;
        }
    }
    
}