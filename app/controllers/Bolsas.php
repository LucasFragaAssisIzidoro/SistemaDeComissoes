<?php 

class Bolsas extends Controller{
    public $estoqueModel;
    public $fornecedorModel;
    public $bolsasModel;
    public $vendedorasModel;

    public function __construct(){
        $this->estoqueModel=$this->model('Estoque');
        $this->fornecedorModel=$this->model('Fornecedor');
        $this->fornecedorModel=$this->model('Bolsa');
        $this->vendedorasModel=$this->model('Vendedora');
    }
    public function index(){

        $dados = [
            'vendedoras' => $this->vendedorasModel->selecionar(),
        ];
        $this->view('bolsas/index', $dados);
    }
    public function filtrodevendedora(){

        $dados = [
            'vendedoras' => $this->vendedorasModel->selecionar(),
        ];
        $this->view('bolsas/filtrodevendedoras', $dados);
    }

}