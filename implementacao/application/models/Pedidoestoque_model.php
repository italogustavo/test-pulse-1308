<?php

class Pedidoestoque_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get pedidoestoque by idPedidoEstoque
     */
    function processar_pedidoestoque($idPedidoEstoque)
    {
        $pedido = $this->db->get_where('PedidoEstoque', array('idPedidoEstoque' => $idPedidoEstoque))->row_array();
        $itens = $this->db->get_where('ItensPedido', array('PedidoEstoque_idPedidoEstoque' => $idPedidoEstoque, 'status' => 'ativo'))->result_array();


        if (is_array($itens)) {
            foreach ($itens as $key => $produto) { 
                
                $estoqueFields = $this->db->get_where('Estoque', array('Filial_idFilial' => $pedido['Filial_idFilial'], 'Produto_idProduto' => $produto['Produto_idProduto']))->row_array();

                if (!isset($estoqueFields['idEstoque'])) { 
                    $this->db->simple_query('INSERT INTO Estoque (Produto_idProduto, Filial_idFilial, qtdEstoqueProduto) VALUES ('.$produto['Produto_idProduto'].', '.$pedido['Filial_idFilial'].', 0)'); 

                    $estoqueFields = $this->db->get_where('Estoque', array('Filial_idFilial' => $pedido['Filial_idFilial'], 'Produto_idProduto' => $produto['Produto_idProduto']))->row_array();
                }  

                $saldoFinal = 0;
                if ($pedido['tpPedido'] == 'SAIDA') {
                    $saldoFinal = $estoqueFields['qtdEstoqueProduto'] - $produto['qtdProduto'];
                } elseif ($pedido['tpPedido'] == 'ENTRADA') {
                    $saldoFinal = $estoqueFields['qtdEstoqueProduto'] + $produto['qtdProduto'];
                } else {
                    return;
                }

                if ($saldoFinal > 0) {
                    $update_estoque = $this->db->simple_query('UPDATE Estoque SET qtdEstoqueProduto = '.$saldoFinal.' WHERE idEstoque = '.$estoqueFields['idEstoque'].';');

                    if ($update_estoque) { 
                        $this->db->simple_query('UPDATE ItensPedido SET status = \'processado\' WHERE idItensPedido = '.$produto['idItensPedido'].';');
                    } 

                }

            }
        } 

        $pedido['statusPedido'] = 'finalizado';

        $this->update_pedidoestoque($idPedidoEstoque, $pedido);
    }
    
    /*
     * Get pedidoestoque by idPedidoEstoque
     */
    function atualizar_pedido($idPedidoEstoque)
    {
        $pedido = $this->db->get_where('PedidoEstoque', array('idPedidoEstoque' => $idPedidoEstoque))->row_array();

        $this->db->where('PedidoEstoque_idPedidoEstoque', $idPedidoEstoque); 
        $produtos = $this->db->get('ItensPedido')->result_array(); 

        $vrDescontos = 0;
        $vrFretes = 0;
        $vrTotalBruto = 0;
        $vrTotalLiquido = 0;

        if (is_array($produtos)) {
            foreach ($produtos as $key => $produto) {
                if ($produto['status'] == 'ativo' || $produto['status'] == 'processado') {
                    $vrDescontos += $produto['vrDesconto']; 
                    $vrFretes += $produto['vrFrete']; 
                    $vrTotalBruto += ($produto['qtdProduto'] * $produto['vrUnitario']); 
                    $vrTotalLiquido += ($produto['qtdProduto'] * $produto['vrUnitario']) - $produto['vrDesconto'] + $produto['vrFrete'];
                }
            }
        } 

        $pedido['vrBruto'] = $vrTotalBruto;
        $pedido['vrDesconto'] = $vrDescontos;
        $pedido['vrFrete'] = $vrFretes;
        $pedido['vrTotal'] = $vrTotalLiquido;
        $pedido['qtdItens'] = count($produtos);

        $this->update_pedidoestoque($idPedidoEstoque, $pedido);

    }
    
    /*
     * Get pedidoestoque by idPedidoEstoque
     */
    function get_pedidoestoque($idPedidoEstoque)
    {
        return $this->db->get_where('PedidoEstoque',array('idPedidoEstoque'=>$idPedidoEstoque))->row_array();
    }
        
    /*
     * Get all pedidoestoque
     */
    function get_all_pedidoestoque() 
    {
        $this->db->select('*'); 
        $this->db->from('PedidoEstoque');
        $this->db->join('Cliente', 'Cliente.idCliente = PedidoEstoque.Cliente_idCliente');
        $this->db->join('Usuario', 'Usuario.idUsuario = PedidoEstoque.Usuario_idUsuario');
        
        $this->db->order_by('idPedidoEstoque', 'asc');
        return $this->db->get()->result_array();
    }
        
    /*
     * function to add new pedidoestoque
     */
    function add_pedidoestoque($params)
    {
        $this->db->insert('PedidoEstoque',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update pedidoestoque
     */
    function update_pedidoestoque($idPedidoEstoque,$params)
    {
        $this->db->where('idPedidoEstoque',$idPedidoEstoque);
        return $this->db->update('PedidoEstoque',$params);
    }
    
    /*
     * function to delete pedidoestoque
     */
    function delete_pedidoestoque($idPedidoEstoque)
    {
        return $this->db->delete('PedidoEstoque',array('idPedidoEstoque'=>$idPedidoEstoque));
    }
}
