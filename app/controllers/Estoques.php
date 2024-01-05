<?php

class Estoques extends Controller{
    public $estoqueModel;

    public function __construct(){
        $this->estoqueModel=$this->model('Estoque');
    }
    public function index(){
        $this->view('estoques/index');
    }
    public function cadastrarmercadoria(){
        $formulario = filter_input_array(INPUT_POST);
    
        if (isset($formulario)) {
            $codMercadoria = trim($formulario['cod_mercadoria']);
            $categoriaMercadoria = trim($formulario['categoria_mercadoria']);
    
            $codigoExistente = $this->estoqueModel->verificarCodigoExistente($codMercadoria);
    
            if ($codigoExistente) {
               http_response_code(401);
               echo json_encode(['error' => 'Código em uso!']);
               exit;

            }elseif(!is_numeric($codMercadoria)){
                http_response_code(400);
                echo json_encode(['error' => 'Formato inválido!']);
                exit;

            }elseif(!is_string($categoriaMercadoria)){
                http_response_code(400);
                echo json_encode(['error' => 'Formato inválido!']);
                exit;
            }else {
            
                $dados = [
                    'cod_mercadoria' => $codMercadoria,
                    'categoria_mercadoria' => $categoriaMercadoria,
                ];
    
                if($this->estoqueModel->cadastrarmercadoria($dados)){
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