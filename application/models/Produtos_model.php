<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Produtos_model extends CI_Model {

    function selectAllProdutos() {
        $this->db->select('*');
        $this->db->from('produtos_cantina');
        $this->db->order_by('produto_nome');
        $query = $this->db->get();
        return $query->result();
    }

    function selectProdutoByID($produto_id = null) {
        $this->db->select('*');
        $this->db->from('produtos_cantina');
        $this->db->where('produto_id', $produto_id);
        $query = $this->db->get();
        return $query->result();
    }

}