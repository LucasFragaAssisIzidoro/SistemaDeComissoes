<?php

class Estoques extends Controller{
    public function __construct(){
        $this->estoqueModel=$this->model('Estoque');
    }
    public function index(){
        $this->view('estoques/index');
    }
    public function cadastrarprod(){
        $formulario = filter_input_array(INPUT_POST);
    
        if (isset($formulario)) {
            $codeProduct = trim($formulario['codeproduct']);
            $category = trim($formulario['category']);
    
            // Verifica se o código já existe no banco de dados
            $codigoExistente = $this->estoqueModel->verificarCodigoExistente($codeProduct);
    
            if ($codigoExistente) {
                echo Sessao::mensagem('estoque', 'Este código de produto já está em uso!', 'alert alert-danger');
                Url::redirecionar('estoques/index'); // Redireciona para página de formulário
            } else {
                // Se o código não existir, realiza o cadastro
                $dados = [
                    'codeproduct' => $codeProduct,
                    'category' => $category,
                ];
    
                if($this->estoqueModel->cadastrarprod($dados)){
                    echo Sessao::mensagem('estoque', 'Produto cadastrado com sucesso!');
                    Url::redirecionar('estoques/index');
                } else {
                    die("Erro ao armazenar produto no banco de dados");
                }
            }
        }
    }
    public function entrada(){
        $this->view('estoques/entrada');
    }
    public function saida(){
        $this->view('estoques/saida');
    }
    public function ver(){
        $this->view('estoques/ver');
    }
}