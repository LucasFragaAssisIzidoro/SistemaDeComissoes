<?php

class Vendedoras extends Controller
{
    public $estoqueModel;
    public $fornecedorModel;
    public $vendedoraModel;

    public function __construct()
    {
        $this->estoqueModel = $this->model('Estoque');
        $this->fornecedorModel = $this->model('Fornecedor');
        $this->vendedoraModel = $this->model('Vendedora');
    }
    public function index()
    {
        $this->view('vendedoras/index');
    }

    public function cadastrar()
    {
        $formulario = filter_input_array(INPUT_POST);

        if (isset($formulario)) {
            $nome = trim($formulario['nome']);
            $telefone = trim($formulario['telefone']);
            $email = trim($formulario['email']);
            $endereco = trim($formulario['endereco']);
        }
        $dados = [
            'nome' => $nome,
            'telefone' => $telefone,
            'email' => $email,
            'endereco' => $endereco
        ];
        if ($this->vendedoraModel->cadastrar($dados)) {
            Sessao::mensagem("vendedora", "Vendedora cadastrada com sucesso!");
            Url::redirecionar('vendedoras/ver');
            $this->view('vendedoras/cadastrar');
        } else {
            Sessao::mensagem("vendedora", "Vendedora cadastrada com sucesso!");
            Url::redirecionar('vendedoras/ver');
            $this->view('vendedoras/cadastrar');
        }
    }
    public function ver()
    {

        $dados = [
            'vendedora' => $this->vendedoraModel->selecionar(),
        ];

        $this->view('vendedoras/ver', $dados);
    }
    public function deletar($id)
    {
        $this->vendedoraModel->desativar($id);
        Url::redirecionar('vendedoras/ver');
        Sessao::mensagem('vendedora', 'Vendedora deletada com sucesso!');

        $this->view('vendedoras/deletar');
    }
    public function editar()
    {
        $formulario = filter_input_array(INPUT_POST);

        if (isset($formulario)) {
            $id = trim($formulario['id']);
            $nome = trim($formulario['nome']);
            $email = trim($formulario['email']);
            $telefone = trim($formulario['telefone']);
            $endereco = trim($formulario['endereco']);


            $dados = [
                'id' => $id,
                'nome' => $nome,
                'email' => $email,
                'telefone' => $telefone,
                'endereco' => $endereco
            ];

            if ($this->vendedoraModel->editar($dados)) {
                Url::redirecionar('vendedoras/ver');
                Sessao::mensagem('vendedora', 'Vendedora editada com sucesso!');
            } else {
                die("Erro ao armazenar fornecedor no banco de dados");
            }
        }
    }
}
