<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Financeiro extends CI_Controller {

	public function verificar_sessao() {
        if ($this->session->userdata('logado') == false) {
            redirect('Boletim/login');
        }
    }

    public function index() {
        $this->verificar_sessao();

        $this->load->view('Includes/Header');
        $this->load->view('Includes/Navbar');
        $this->load->view('Includes/Topbar');
        $this->load->view('Financeiro/Resumo');
        $this->load->view('Includes/Footer');
    }
    
    function gerarExcel() {
        $data_inicial = $this->input->post('data_inicial');
        $data_final = $this->input->post('data_final');
        $tipo_cliente = $this->input->post('tipo_cliente');
        $cliente_id = $this->input->post('cliente');

        if ($tipo_cliente == '1') {
            $this->excelTipo1($data_inicial, $data_final, $tipo_cliente, $cliente_id);   
        } else if ($tipo_cliente == '2') {
            $this->excelTipo2($data_inicial, $data_final, $tipo_cliente, $cliente_id);
        } else {
            $this->excelTipo3($data_inicial, $data_final, $tipo_cliente, $cliente_id);
        }
    }

    function gerarPDF() {
        $data_inicial = $this->input->post('data_inicial');
        $data_final = $this->input->post('data_final');
        $tipo_cliente = $this->input->post('tipo_cliente');
        $cliente_id = $this->input->post('cliente');

        if ($tipo_cliente == '1') {
            $this->PDFTipo1($data_inicial, $data_final, $tipo_cliente, $cliente_id);   
        } else if ($tipo_cliente == '2') {
            $this->PDFTipo2($data_inicial, $data_final, $tipo_cliente, $cliente_id);
        } else {
            $this->PDFTipo3($data_inicial, $data_final, $tipo_cliente, $cliente_id);
        }
    }

    function gerarResumo() {
        $data_inicial = implode('-', array_reverse(explode('/', $this->input->post('data_inicial'))));
        $data_final = implode('-', array_reverse(explode('/', $this->input->post('data_final'))));
        $tipo_cliente = $this->input->post('tipo_cliente');
        $cliente_id = $this->input->post('cliente');

        if ($tipo_cliente == '1') {
            $this->ResumoTipo1($data_inicial, $data_final, $cliente_id);   
        } else if ($tipo_cliente == '2') {
            $this->ResumoTipo2($data_inicial, $data_final, $tipo_cliente, $cliente_id);
        } else if ($tipo_cliente == '3'){
            $this->ResumoTipo3($data_inicial, $data_final, $tipo_cliente, $cliente_id);
        } else {
            $this->ResumoTodos($data_inicial, $data_final);
        }
    }

    function ResumoTipo1($data_inicial = null, $data_final = null, $cliente_id = null) {
        $this->load->model('Financeiro_model');
        $data = $this->Financeiro_model->resumo1ByID($data_inicial, $data_final, $cliente_id);
        $total_fiado = 0;
        $totalPagar = 0;
        $total_credito = 0;
        //echo "<pre>";
        //print_r($data);
        //echo "<pre>";

        $output = '
                <h3 align="center">Resumo</h3>
                <table class="table table-striped table-bordered">
                    <tr>
                        <th style="text-align: center;">Data</th>
                        <th style="text-align: center;">Produto</th>
						<th style="text-align: center;">Qtd</th>
                        <th style="text-align: center;">Valor Uni</th>
                        <th style="text-align: center;">Total Compra</th>
                    </tr>
		';
        foreach ($data->result() as $row) {

            if($row->tipo_pag == 1) {
                $output .=  '
                <tr style="color:red;">
                    <td style="text-align: center;">' . date('d/m/Y h:i:s', strtotime($row->created_at)) . '</td>
                    <td style="text-align: center;">' . $row->produto_nome . '</td>
                    <td style="text-align: center;">' . $row->qtd_pedido . '</td>
                    <td style="text-align: center;">R$ ' . number_format($row->produto_preco, 2, ",", ".") . '</td>
                    <td style="text-align: center;">R$ ' . number_format($row->valor_total, 2, ",", ".") . '</td>                
                </tr>
                ';
                $total_fiado = $total_fiado + $row->valor_total;
            } else if ($row->tipo_pag == 3){
                $output .=  '
                <tr style="color:blue;">
                    <td style="text-align: center;">' . date('d/m/Y h:i:s', strtotime($row->created_at)) . '</td>
                    <td style="text-align: center;">' . $row->produto_nome . '</td>
                    <td style="text-align: center;">' . $row->qtd_pedido . '</td>
                    <td style="text-align: center;">R$ ' . number_format($row->produto_preco, 2, ",", ".") . '</td>
                    <td style="text-align: center;">R$ ' . number_format($row->valor_total, 2, ",", ".") . '</td>                
                </tr>
                ';
                $total_credito = $total_credito + $row->valor_total;
            }
            
            
            $totalPagar = $total_credito - $total_fiado;
        }
        $output .= '</table>
        <h3 style="float:right;">Total: R$: ' . $totalPagar . '</h3>';
        //echo $output;
        echo json_encode($output);
    }

    function ResumoTipo2($data_inicial = null, $data_final = null, $tipo_cliente = null, $cliente_id = null) {
        $data = $this->Financeiro_model->resumo2ByID($data_inicial, $data_final, $tipo_cliente, $cliente_id);

        $output = '
                <h3 align="center">Resumo</h3>
                <table class="table table-striped table-bordered">
                    <tr>
                        <th style="text-align: center;">Data</th>
                        <th style="text-align: center;">Produto</th>
						<th style="text-align: center;">Qtd</th>
                        <th style="text-align: center;">Valor Uni</th>
                        <th style="text-align: center;">Total Compra</th>
                        <th>Total Geral</th>
                    </tr>
		';
        foreach ($data->result() as $row) {
            $output .= '
			<tr>
				<td style="text-align: center;">' . date('d/m/Y hh:ii:ss', strtotime($row->created_at)) . '</td>
				<td style="text-align: center;">' . $row->nivel_you_titulo . '</td>
				<td style="text-align: center;">' . $row->nome_franquia . '</td>
				<td style="text-align: center;">R$ ' . number_format($row->acerto_listening, 2, ",", ".") . '</td>
				<td style="text-align: center;">R$ ' . number_format($row->acerto_read_writ, 2, ",", ".") . '</td>                
            </tr>
            <td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
            <td></td>
            <td>' . number_format($row->acerto_read_writ, 2, ",", ".") . '</td>
			';
        }
        $output .= '</table>';
        //echo $output;
        echo json_encode($dados);
    }

    function ResumoTipo3($data_inicial = null, $data_final = null, $tipo_cliente = null, $cliente_id = null) {
        $data = $this->Financeiro_model->resumo3ByID($data_inicial, $data_final, $tipo_cliente, $cliente_id);

        $output = '
                <h3 align="center">Resumo</h3>
                <table class="table table-striped table-bordered">
                    <tr>
                        <th style="text-align: center;">Data</th>
                        <th style="text-align: center;">Produto</th>
						<th style="text-align: center;">Qtd</th>
                        <th style="text-align: center;">Valor Uni</th>
                        <th style="text-align: center;">Total Compra</th>
                        <th>Total Geral</th>
                    </tr>
		';
        foreach ($data->result() as $row) {
            $output .= '
			<tr>
				<td style="text-align: center;">' . $row->nome_aluno . '</td>
				<td style="text-align: center;">' . $row->nivel_you_titulo . '</td>
				<td style="text-align: center;">' . $row->nome_franquia . '</td>
				<td style="text-align: center;">R$ ' . number_format($row->acerto_listening, 2, ",", ".") . '</td>
				<td style="text-align: center;">R$ ' . number_format($row->acerto_read_writ, 2, ",", ".") . '</td>                
            </tr>
            <td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
            <td></td>
            <td>' . number_format($row->acerto_read_writ, 2, ",", ".") . '</td>
			';
        }
        $output .= '</table>';
        //echo $output;
        echo json_encode($dados);
    }

    function gerarPagamento() {
        $tipo_cliente = $this->input->post('tipo_cliente');
        $cliente_id = $this->input->post('cliente');

        if ($tipo_cliente == '1') {
            $this->excelTipo1($data_inicial, $data_final, $tipo_cliente, $cliente_id);   
        } else if ($tipo_cliente == '2') {
            $this->excelTipo2($data_inicial, $data_final, $tipo_cliente, $cliente_id);
        } else {
            $this->excelTipo3($data_inicial, $data_final, $tipo_cliente, $cliente_id);
        }
    }
}