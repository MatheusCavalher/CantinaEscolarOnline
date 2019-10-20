<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller {

	public function verificar_sessao() {
        if ($this->session->userdata('logado') == false) {
            redirect('Cantina/login');
        }
    }

    public function index() {

    }

    function Cadastrar_Pedido() {
        $this->verificar_sessao();

        $this->load->model('Pedidos_model');
        $DadosProdutos = [
            'options_produtos' => $this->Pedidos_model->selectAllProdutos()
        ];

        $this->load->view('Includes/Header');
        $this->load->view('Includes/Navbar');
        $this->load->view('Includes/Topbar');
        $this->load->view('Pedidos/Cadastrar_Pedido', $DadosProdutos);
        $this->load->view('Includes/Footer');
    }

    function Cadastro_Pedido() {
        $this->verificar_sessao();

		$data['tipo_cliente'] = $this->input->post('tipo_cliente');
        $data['cliente_id'] = $this->input->post('cliente');
        $data['produto_id'] = $this->input->post('produto');
        $data['unidade_id'] = $_SESSION['ID_franquia'];
        $data['qtd_pedido'] = $this->input->post('produto_qtd');
        $data['tipo_pag'] = $this->input->post('tipo_pag');
        $data['valor_total'] = $this->input->post('valor_total');
		$data['obs_pedido'] = $this->input->post('obs_pedido');
        date_default_timezone_set('America/Sao_Paulo');
        $data['created_at'] = date("Y-m-d h:i:s");
        $data['created_user'] = $_SESSION['user_id'];

        if ($this->db->insert('pedidos_cantina', $data)) {
            redirect('Pedidos/Cadastrar_Pedido');
        } else {
            redirect('Pedidos/Cadastrar_Pedido');
        }
    }
    function PegaValorUnitProd(){
        $this->verificar_sessao();

        //echo "<pre>";
        //print_r($this->input->post('produto'));
        //echo "<pre>";
        
        $this->load->model('Pedidos_model');
        $dados = $this->Pedidos_model->getValorUnitProduto($this->input->post('produto'));
        echo json_encode($dados);
    }

    function ProcuraClientePorTipo() {
        $this->verificar_sessao();
        $this->load->model('Pedidos_model');

        //echo "<pre>";
        //print_r($this->input->post('tipo_cliente'));
        //echo "<pre>";
        if($this->input->post('tipo_cliente') == '1') {
            $this->load->model('Pedidos_model');
            $dados = $this->Pedidos_model->selectFuncionariosJson($this->input->post('tipo_cliente'));
            echo json_encode($dados);
        } elseif ($this->input->post('tipo_cliente') == '2') {
            $this->load->model('Pedidos_model');
            $dados = $this->Pedidos_model->selectAlunosJson($this->input->post('tipo_cliente'));
            echo json_encode($dados);
        } elseif($this->input->post('tipo_cliente') == '3') {
            $this->load->model('Pedidos_model');
            $dados = $this->Pedidos_model->selectPaisJson($this->input->post('tipo_cliente'));
            echo json_encode($dados);
        } else {
            echo json_encode("");
        }
        
        
    }
    
}