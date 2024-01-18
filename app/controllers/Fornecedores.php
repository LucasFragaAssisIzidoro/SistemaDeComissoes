<?php

class Fornecedores extends Controller
{
    public $estoqueModel;
    public $fornecedorModel;

    public function __construct()
    {
        $this->estoqueModel = $this->model('Estoque');
        $this->fornecedorModel = $this->model('Fornecedor');
    }
    public function index()
    {
        $this->view('fornecedores/index');
    }

    public function cadastrarFornecedor()
    {
        $formulario = filter_input_array(INPUT_POST);

        if (isset($formulario)) {
            $nome = trim($formulario['nome']);
            $telefone = trim($formulario['telefone']);
            $email = trim($formulario['email']);
        }
        $dados = [
            'nome' => $nome,
            'telefone' => $telefone,
            'email' => $email
        ];
        if ($this->fornecedorModel->cadastrarFornecedores($dados)) {
            Sessao::mensagem("fornecedor", "fornecedor cadastrado com sucesso!");
            Url::redirecionar('fornecedores/index');
            $this->view('fornecedores/cadastrarFornecedor');
        } else {
            Sessao::mensagem("fornecedor", "Fornecedor cadastrado com sucesso!");
            Url::redirecionar('fornecedores/index');
            $this->view('fornecedores/cadastrarFornecedor');
        }
    }
    public function ver()
    {

        $dados = [
            'fornecedor' => $this->fornecedorModel->selecionarFornecedores(),
        ];

        $this->view('fornecedores/ver', $dados);
    }
    public function deletar($id)
    {
        $this->fornecedorModel->desativar($id);
        Url::redirecionar('fornecedores/ver');
        Sessao::mensagem('fornecedor', 'Fornecedor deletado com sucesso!');

        $this->view('fornecedores/deletar');
    }
    public function editar()
    {
        $formulario = filter_input_array(INPUT_POST);

        if (isset($formulario)) {
            $idFornecedor = trim($formulario['id_fornecedor']);
            $nomeFornecedor = trim($formulario['nome_fornecedor']);
            $emailFornecedor = trim($formulario['email_fornecedor']);
            $telefoneFornecedor = trim($formulario['telefone_fornecedor']);


            $dados = [
                'id_fornecedor' => $idFornecedor,
                'nome_fornecedor' => $nomeFornecedor,
                'email_fornecedor' => $emailFornecedor,
                'telefone_fornecedor' => $telefoneFornecedor,
            ];

            if ($this->fornecedorModel->editar($dados)) {
                Url::redirecionar('fornecedores/ver');
                Sessao::mensagem('fornecedor', 'Fornecedor editado com sucesso!');
            } else {
                die("Erro ao armazenar fornecedor no banco de dados");
            }
        }
    }
}
