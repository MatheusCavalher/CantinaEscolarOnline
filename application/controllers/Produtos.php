<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller {

	public function verificar_sessao() {
        if ($this->session->userdata('logado') == false) {
            redirect('Cantina/login');
        }
    }

    public function index() {
        $this->verificar_sessao();

        $this->load->model('Produtos_model');
        $DadosProdutos = [
            'produtos' => $this->Produtos_model->selectAllProdutos()
        ];

        $this->load->view('Includes/Header');
        $this->load->view('Includes/Navbar');
        $this->load->view('Includes/Topbar');
        $this->load->view('Produtos/Listar_Produtos', $DadosProdutos);
        $this->load->view('Includes/Footer');
    }

    public function Cadastrar_Produto() {
        $this->verificar_sessao();

        //$this->load->model('Produtos_model');
        //$DadosProduto = [
            //'' => $this->Produtos_model->selectAllAlunosByUnidade($unidade)
        //];

        $this->load->view('Includes/Header');
        $this->load->view('Includes/Navbar');
        $this->load->view('Includes/Topbar');
        $this->load->view('Produtos/Cadastrar_Produto');
        $this->load->view('Includes/Footer');
    }

    function Cadastro_Produto() {
        $this->verificar_sessao();

        $data['produto_nome'] = $this->input->post('produto_nome');
        $data['produto_preco'] = $this->input->post('produto_preco');
        $data['produto_qtd'] = $this->input->post('produto_qtd');
        $data['unidade_id'] = $_SESSION['ID_franquia'];
        date_default_timezone_set('America/Sao_Paulo');
        $data['created_at'] = date("Y-m-d h:i:s");
        $data['created_user'] = $_SESSION['user_id'];

        if ($this->db->insert('produtos_cantina', $data)) {
            redirect('Produtos');
        } else {
            redirect('Produtos');
        }
    }

    function Editar_Produto($produto_id = null) {
        $this->verificar_sessao();

        $this->load->model('Produtos_model');
        $DadosProduto = [
            'produto' => $this->Produtos_model->selectProdutoByID($produto_id)
        ];

        $this->load->view('Includes/Header');
        $this->load->view('Includes/Navbar');
        $this->load->view('Includes/Topbar');
        $this->load->view('Produtos/Editar_Produto', $DadosProduto);
        $this->load->view('Includes/Footer');
    }

    function Salvar_Produto() {
        $this->verificar_sessao();
        $produto_id = $this->input->post('produto_id');

        $data['produto_nome'] = $this->input->post('produto_nome');
        $data['produto_preco'] = $this->input->post('produto_preco');
        $data['produto_qtd'] = $this->input->post('produto_qtd');
        date_default_timezone_set('America/Sao_Paulo');
        $data['updated_at'] = date("Y-m-d h:i:s");

        $this->db->where('produto_id', $produto_id);
        if ($this->db->update('produtos_cantina', $data)) {

            redirect('Produtos');
        } else {
            redirect('Produtos');
        }
    }
    
    function Excluir_Produto($produto_id = null) {
        $this->verificar_sessao();

        $this->db->where('produto_id', $produto_id);
        if ($this->db->delete('produtos_cantina')) {
            redirect('Produtos');
        } else {
            redirect('Produtos');
        }
    }

}