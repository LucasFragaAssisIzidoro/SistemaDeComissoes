<?php

class Estoques extends Controller{
    public $estoqueModel;
    public $fornecedorModel;

    public function __construct(){
        $this->estoqueModel=$this->model('Estoque');
        $this->fornecedorModel=$this->model('Fornecedor');
    }
    public function index(){

        $dados = [
            "fornecedores" => $this->fornecedorModel->selecionarFornecedores(),
        ];
        $this->view('estoques/index', $dados);
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
                    
                } else {
                    die("Erro ao armazenar produto no banco de dados");
                }
            }
        }
    }
    public function cadastrarproduto(){
        $formulario = filter_input_array(INPUT_POST);
    
        if (isset($formulario)) {
            $codProduto = trim($formulario['codigo_produto']);
            $nomeProduto = trim($formulario['nome_produto']);
            $fornecedorProduto = trim($formulario['fornecedor_produto']);
            $quantidadeProduto = trim($formulario['quantidade_produto']);
            $valorProduto = $formulario['valor_produto'];
            
    
            $codigoExistente = $this->estoqueModel->verificarCodigoExistente($codProduto);
    
            if (!$codigoExistente) {
               http_response_code(400);
               echo json_encode(['error' => 'Codigo nao cadastrado!']);
               exit;

            }elseif(!is_numeric($codProduto)){
                http_response_code(400);
                echo json_encode(['error' => 'Formato inválido!']);
                exit;

            }
            elseif(!is_numeric($quantidadeProduto)){
                http_response_code(400);
                echo json_encode(['error' => 'Formato inválido!']);
                exit;

            }elseif(!is_string($fornecedorProduto)){
                http_response_code(400);
                echo json_encode(['error' => 'Formato inválido!']);
                exit;

            }else{
            
                $dados = [
                    'cod_produto' => $codProduto,
                    'fornecedor_produto' => $fornecedorProduto,
                    'quantidade_produto' => $quantidadeProduto,
                    'nome_produto' => $nomeProduto,
                    'valor_produto' => $valorProduto
                ];
    
                if($this->estoqueModel->cadastrarproduto($dados)){
                   
                } else {
                    die("Erro ao armazenar produto no banco de dados");
                }
            }
        }
    }
    public function saida(){
        $this->view('estoques/saida');
    }
    public function ver(){

        $dados = [
            "produto" => $this->estoqueModel->selecionarProdutos(),
            "fornecedores" => $this->fornecedorModel->selecionarFornecedores(),
        ];
        $this->view('estoques/ver', $dados);

    }
    public function pesquisa(){
        $formulario = filter_input_array(INPUT_POST);
    
        
        echo "Dados do formulário recebidos: <pre>";
        print_r($formulario);
        echo "</pre>";
    
        if (isset($formulario)) {
            $codProduto = trim($formulario['codigo_produto']);
            $corProduto = trim($formulario['cor_produto']);
            $tamanhoProduto = trim($formulario['tamanho_produto']);
        }
    
        $dados = [
            "produto" => $this->estoqueModel->filtrarProdutos($tamanhoProduto, $corProduto, $codProduto),
            "fornecedores" => $this->fornecedorModel->selecionarFornecedores(),
        ];
    
        $this->view('estoques/pesquisa', $dados);
    }
}