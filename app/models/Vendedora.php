<?php 
class Vendedora{
       
    private $db;
    public function __construct(){
            $this->db = new Database();
    }
    public function selecionar(){
        $this->db->query("SELECT * from vendedoras WHERE visivel = 1");
        return $this->db->resultados();
    }
    public function cadastrar($dados){
        $this->db->query('INSERT INTO vendedoras(nome_vendedora, email_vendedora, telefone_vendedora, endereco_vendedora) VALUES (:nome, :email, :telefone, :endereco)');
        $this->db->bind(':nome', $dados['nome']);
        $this->db->bind(':email', $dados['email']);
        $this->db->bind(':telefone', $dados['telefone']);
        $this->db->bind(':endereco', $dados['endereco']);
        $this->db->executa();
    }
    public function desativar($id){
        $this->db->query('UPDATE vendedoras SET visivel = 0, data_fim_vinculo = NOW() WHERE id_vendedora= :id');
        $this->db->bind(':id', $id);
        $this->db->executa();
    }
    public function editar($dados){
        $this->db->query("UPDATE vendedoras SET  email_vendedora=:email, telefone_vendedora=:telefone, nome_vendedora=:nome, endereco_vendedora = :endereco WHERE id_vendedora = :id");
        $this->db->bind(":id", $dados['id']);
        $this->db->bind(":nome", $dados['nome']);
        $this->db->bind(":email", $dados['email']);
        $this->db->bind(":telefone", $dados['telefone']);
        $this->db->bind(":endereco", $dados['endereco']);
        
        if($this->db->executa()){
            return true;
        } else {
            return false;
        }
    }
    
}