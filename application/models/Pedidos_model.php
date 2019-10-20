<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pedidos_model extends CI_Model {
    function selectAllPedidos() {
        $this->db->select('*');
        $this->db->from('pedidos_cantina pc');
        $this->db->join('usuarios u', 'u.Id = pc.cliente_id');
        //$this->db->join('alunos a', 'a.aluno_id = pc.cliente_id');
        //$this->db->join('responsavel_aluno ra', 'ra.responsavel_id = pc.cliente_id');
        $this->db->where('YEAR(STR_TO_DATE(pc.created_at, "%Y")) = ', date('Y'));
        $this->db->order_by('pc.pedido_id');
        $query = $this->db->get();
        return $query->result();
    }

    function selectPedidoByID($pedido_id = null) {
        $this->db->select('*');
        $this->db->from('pedidos_cantina');
        $this->db->where('pedido_id', $pedido_id);
        $query = $this->db->get();
        return $query->result();
    }

    function getAllFuncionariosParaSelect() {
        $unidade = $_SESSION['ID_franquia'];
        $this->db->from('usuarios');
        $this->db->where('ID_franquia', $unidade);
        $this->db->where('status', '1');
        $this->db->order_by('nome');
        $query = $this->db->get();
        return $query;
    }

    function selectFuncionariosJson() {
        $options = "<option value='---'> --- </option>";

        $funcionarios = $this->getAllFuncionariosParaSelect();

        foreach ($funcionarios->result() as $funcionario) {
            $options .= "<option value='{$funcionario->Id}'>{$funcionario->nome} {$funcionario->sobrenome}</option>" . PHP_EOL;
        }
        return $options;
    }

    function getAllAlunosParaSelect() {
        $unidade = $_SESSION['ID_franquia'];
        $this->db->from('alunos');
        $this->db->where('unidade_id', $unidade);
        $this->db->order_by('nome_aluno');
        $query = $this->db->get();
        return $query;
    }

    function selectAlunosJson() {
        $options = "<option value='---'> --- </option>";

        $alunos = $this->getAllAlunosParaSelect();

        foreach ($alunos->result() as $aluno) {
            $options .= "<option value='{$aluno->aluno_id}'>{$aluno->nome_aluno}</option>" . PHP_EOL;
        }
        return $options;
    }

    function getAllPaisParaSelect() {
        $unidade = $_SESSION['ID_franquia'];
        $this->db->from('responsavel_aluno');
        $this->db->where('unidade_id', $unidade);
        $this->db->order_by('nome_responsavel');
        $query = $this->db->get();
        return $query;
    }

    function selectPaisJson() {
        $options = "<option value='---'> --- </option>";

        $pais = $this->getAllPaisParaSelect();

        foreach ($pais->result() as $pai) {
            $options .= "<option value='{$pai->responsavel_id}'>{$pai->nome_responsavel}</option>" . PHP_EOL;
        }
        return $options;
    }

    function getAllProdutos() {
        $unidade = $_SESSION['ID_franquia'];
        $this->db->select('*');
        $this->db->from('produtos_cantina');
        $this->db->where('unidade_id', $unidade);
        $query = $this->db->get();
        return $query;
    }

    function selectAllProdutos() {
        $options = "<option value='---'> --- </option>";

        $produtos = $this->getAllProdutos();

        foreach ($produtos->result() as $produto) {
            $options .= "<option value='{$produto->produto_id}'>{$produto->produto_nome}</option>" . PHP_EOL;
        }
        return $options;
    }

    function getValorUnitProduto($produto_id = null) {
        $this->db->select('produto_preco');
        $this->db->from('produtos_cantina');
        $this->db->where('produto_id', $produto_id);
        $query = $this->db->get();
        return $query->result();
    }
}