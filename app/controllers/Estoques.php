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
            "produto" => $this->estoqueModel->selecionarProdutos(),
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
        
        // Se o formulário foi enviado
        if (isset($formulario)) {
            $codProduto = trim($formulario['codigo_produto']);
            $produtosFiltrados = $this->estoqueModel->filtrarProdutos($codProduto);

            $dados = [
                "produto" => $produtosFiltrados,
                "fornecedores" => $this->fornecedorModel->selecionarFornecedores(),

            ];
            
        }
        $this->view('estoques/pesquisa', $dados );
    } 
    public function deletar($idProduto){
        
        $this->estoqueModel->deletarProduto($idProduto);

        Url::redirecionar('estoques/ver');
        Sessao::mensagem('produto', 'Produto deletado com sucesso!');
        
    }
    public function editarProduto(){
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
                    'codigo_produto' => $codProduto,
                    'fornecedor_produto' => $fornecedorProduto,
                    'quantidade_produto' => $quantidadeProduto,
                    'nome_produto' => $nomeProduto,
                    'valor_produto' => $valorProduto
                ];
    
                if($this->estoqueModel->editarProduto($dados)){
                    Url::redirecionar('estoques/ver');
                    Sessao::mensagem('produto', 'Produto editado com sucesso!');
                } else {
                    die("Erro ao armazenar produto no banco de dados");
                }
            }
        }
    }
    public function saidaProduto(){
        $formulario = filter_input_array(INPUT_POST);
    
        if (isset($formulario)) {
            $codProduto = trim($formulario['codigo_produto']);
            $quantidadeProduto = trim($formulario['quantidade_produto']);
            $quantidadeAtual = $this->estoqueModel->encontrarQuantidade($codProduto)->quantidade_produto;
            $codigoExistente = $this->estoqueModel->verificarCodigoExistente($codProduto);
            $quantidadeAtual2 = intval($quantidadeAtual);
            $quantidadeProduto2 = intval($quantidadeProduto);
            var_dump($quantidadeAtual2);
            echo "-------";
            var_dump($quantidadeProduto2);
            

            $valorDebitado = $quantidadeAtual2 - $quantidadeProduto2;
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

            }else{
            
                $dados = [
                    'cod_produto' => $codProduto,
                    'quantidade_produto' => $valorDebitado,
                ];
    
                if($this->estoqueModel->saidaProduto($dados)){
                    Url::redirecionar('estoques/ver');
                    Sessao::mensagem('produto', 'Saída debitada com sucesso!');
                } else {
                    die("Erro ao armazenar produto no banco de dados");
                }
            }
        }
    }
}