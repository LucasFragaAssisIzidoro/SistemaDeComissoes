<?php 

class Bolsas extends Controller{
    public $estoqueModel;
    public $fornecedorModel;
    public $bolsasModel;
    public $vendedorasModel;

    public function __construct(){
        $this->estoqueModel=$this->model('Estoque');
        $this->fornecedorModel=$this->model('Fornecedor');
        $this->bolsasModel=$this->model('Bolsa');
        $this->vendedorasModel=$this->model('Vendedora');
    }
    public function index(){

        $dados = [
            'vendedoras' => $this->vendedorasModel->selecionar(),
        ];
        $this->view('bolsas/index', $dados);
    }
    public function cadastrar(){
        $formulario =  filter_input_array(INPUT_POST);
        var_dump($formulario);
        $idVendedora = trim($formulario['vendedora']);
        $nomeVendedora = trim($formulario['nome']);
        $dataVencimento = trim($formulario['data_vencimento']);

        $dadosBolsa = [
            'id' => $idVendedora,
            'data'=>$dataVencimento,
            'nome'=>$nomeVendedora
        ];
        $idBolsa = $this->bolsasModel->cadastrarBolsa($dadosBolsa);

        foreach ($formulario as $chave => $valor) {
            if (strpos($chave, 'codigo_') === 0) {
                $indice = substr($chave, strrpos($chave, '_') + 1);
                if (isset($formulario['quantidade_' . $indice])) {
                    $dadosItem = [
                        'id_bolsa'=> $idBolsa,
                        'cod_mercadoria' => $valor,
                        'quantidade' => $formulario['quantidade_' . $indice]
                    ];
                    // Chama a função para cadastrar um item na bolsa
                    $this->bolsasModel->cadastrarItens($dadosItem);
                }
            }
        }
        Url::redirecionar('bolsas/ver');
   
    }
    public function ver(){

        $dados=[
            'bolsas' => $this->bolsasModel->selecionarBolsas()
        ];

        $this->view('bolsas/ver', $dados);

    }

    public function itens($id){

        $dados=[
            'itens' => $this->bolsasModel->selecionarItens($id),
            'bolsa'=> $this->bolsasModel->selecionarBolsasPorId($id)
        ];

        $this->view('bolsas/itens', $dados);

    }

}