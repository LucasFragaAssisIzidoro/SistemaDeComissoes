<?php 

class Fornecedores extends Controller{
    public $estoqueModel;
    public $fornecedorModel;

    public function __construct(){
        $this->estoqueModel=$this->model('Estoque');
        $this->fornecedorModel=$this->model('Fornecedor');
    }
    public function index(){
        $this->view('fornecedores/index');
    }
    
    public function cadastrarFornecedor(){
        $formulario = filter_input_array(INPUT_POST);

        if (isset($formulario)) {
            $nome = trim($formulario['nome']);
            $telefone = trim($formulario['telefone']);
            $email= trim($formulario['email']);  
        }
        $dados = [
            'nome' => $nome,
            'telefone' => $telefone,
            'email' => $email
        ];
        if($this->fornecedorModel->cadastrarFornecedores($dados)){
            Sessao::mensagem("fornecedor", "fornecedor cadastrado com sucesso!");
            Url::redirecionar('fornecedores/index');
            $this->view('fornecedores/cadastrarFornecedor');
        }else{
            Sessao::mensagem("fornecedor", "Fornecedor cadastrado com sucesso!");
            Url::redirecionar('fornecedores/index');
            $this->view('fornecedores/cadastrarFornecedor');
        }
    }
    public function ver(){

        $dados = [
            'fornecedor' => $this->fornecedorModel->selecionarFornecedores(),
        ];
        
        $this->view('fornecedores/ver', $dados);
    }
    public function deletar($id){
        $this->fornecedorModel->deletar($id);
        Url::redirecionar('fornecedores/ver');
        Sessao::mensagem('fornecedor', 'Fornecedor deletado com sucesso!');
        
        $this->view('fornecedores/deletar');
    }
}