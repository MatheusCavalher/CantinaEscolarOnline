<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function verificar_sessao() {
        if ($this->session->userdata('logado') == false) {
            redirect('Boletim/login');
        }
    }

    public function index() {
        $this->verificar_sessao();
    }
    
    public function login() {
		$this->load->view('Includes/Html_Header');
        $this->load->view('Boletim/Login');
		$this->load->view('Includes/Html_Footer');
    }
}