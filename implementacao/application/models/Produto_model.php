<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Produto_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get produto by idProduto
     */
    function get_produto($idProduto)
    {
        return $this->db->get_where('Produto',array('idProduto'=>$idProduto))->row_array();
    }
        
    /*
     * Get all produto
     */
    function get_all_produto()
    {
        $this->db->order_by('idProduto', 'desc');
        return $this->db->get('Produto')->result_array();
    }

        
    /*
     * Get all produto
     */ 
    function get_produto_by_term($term)
    {
        $this->db->or_like('nrCodigoBarras', $term); 
        $this->db->or_like('nmProduto', $term);
        $this->db->or_like('idProduto', $term);
        $this->db->order_by('idProduto', 'desc');
        return $this->db->get('Produto')->result_array();
    }
        
    /*
     * function to add new produto
     */
    function add_produto($params)
    {
        $this->db->insert('Produto',$params); 
        return $this->db->insert_id();
    }
    
    /*
     * function to update produto
     */
    function update_produto($idProduto,$params)
    {
        $this->db->where('idProduto',$idProduto);
        return $this->db->update('Produto',$params);
    }
    
    /*
     * function to delete produto
     */
    function delete_produto($idProduto)
    {
        return $this->db->delete('Produto',array('idProduto'=>$idProduto));
    }
}