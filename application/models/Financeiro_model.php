<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Financeiro_model extends CI_Model {
    function resumo1ByID($data_inicial = null, $data_final = null, $cliente_id = null) {
        $this->db->select('pc.*, u.nome, u.sobrenome, prod.produto_nome, prod.produto_preco');
        $this->db->from('pedidos_cantina pc');
        $this->db->join('usuarios u', 'u.Id = pc.cliente_id');
        $this->db->join('produtos_cantina prod', 'prod.produto_id = pc.produto_id', 'right');
        $this->db->where("pc.created_at BETWEEN '$data_inicial 00:00:00'  AND '$data_final 23:59:59' ");  
        $this->db->where('pc.cliente_id', $cliente_id);
        $this->db->where('pc.tipo_pag', '1');
        $this->db->or_where('pc.tipo_pag','3'); 
        $this->db->order_by('pc.created_at asc');
        $query = $this->db->get();
        return $query;
    }

    function resumo2ByID($data_inicial = null, $data_final = null, $cliente_id = null) {
        $this->db->select('*');
        $this->db->from('pedidos_cantina pc');
        $this->db->join('alunos a', 'a.aluno_id = pc.cliente_id');
        $this->db->where("pc.created_at BETWEEN '$data_inicial' AND '$data_final'");  
        $this->db->where('pc.cliente_id', $cliente_id);
        $this->db->order_by('pc.created_at asc');
        $query = $this->db->get();
        return $query->result();
    }

    function resumo3ByID($data_inicial = null, $data_final = null, $cliente_id = null) {
        $this->db->select('*');
        $this->db->from('pedidos_cantina pc');
        $this->db->join('responsavel_aluno ra', 'ra.responsavel_id = pc.cliente_id');
        $this->db->where("pc.created_at BETWEEN '$data_inicial' AND '$data_final'");  
        $this->db->where('pc.cliente_id', $cliente_id);
        $this->db->order_by('pc.created_at asc');
        $query = $this->db->get();
        return $query->result();
    }

    function resumoTodos($data_inicial = null, $data_final = null) {
        $this->db->select('*');
        $this->db->from('pedidos_cantina pc');
        $this->db->join('usuarios u', 'u.Id = pc.cliente_id');
        $this->db->where("pc.created_at BETWEEN '$data_inicial' AND '$data_final'");  
        $this->db->where('pc.cliente_id', $cliente_id);
        $this->db->order_by('pc.created_at asc');
        $query = $this->db->get();
        return $query->result();
    }
}