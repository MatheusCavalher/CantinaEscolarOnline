<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cantina extends CI_Controller {

	public function verificar_sessao() {
        if ($this->session->userdata('logado') == false) {
            redirect('Cantina/login');
        }
    }

    public function index() {
        $this->verificar_sessao();

        $this->load->view('Includes/Header');
        $this->load->view('Includes/Navbar');
        $this->load->view('Includes/Topbar');
        $this->load->view('Dashboard');
        $this->load->view('Includes/Footer');
    }
    
    public function login() {
        $this->load->view('Login');
    }

    public function logar() {
        $login = trim($this->input->post('login'));
        $senha = trim(md5($this->input->post('senha')));

        $this->db->where('senha', $senha);
        $this->db->where('login', $login);
        $data['usuarios'] = $this->db->get('usuarios')->result();

        if (count($data['usuarios']) == 1 && $data['usuarios'][0]->status == 1) {

            $dados['user_id'] = $data['usuarios'][0]->Id;
            $dados['nome'] = $data['usuarios'][0]->nome;
            $dados['sobrenome'] = $data['usuarios'][0]->sobrenome;
            $dados['nivel'] = $data['usuarios'][0]->nivel;
            $dados['ID_franquia'] = $data['usuarios'][0]->ID_franquia;
            $dados['ID_setor'] = $data['usuarios'][0]->ID_setor;
            $dados['email'] = $data['usuarios'][0]->email;
            $dados['logado'] = true;

            $this->db->where('senha', $senha);
            $this->db->where('login', $login);
            date_default_timezone_set('America/Sao_Paulo');
            $dataEntrada['DataEntrada'] = date('Y-m-d H:i:s', time());
            $this->db->update('usuarios', $dataEntrada);

            $this->session->set_userdata($dados);

            echo json_encode("success");
        } else {
            echo json_encode("Login ou senha inválidos");
        }
    }
	
	public function logout() {
        $this->session->sess_destroy();
        redirect('Cantina');
    }
    
}