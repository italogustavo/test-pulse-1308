<?php

class Itenspedido extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Itenspedido_model');
        $this->load->model('Pedidoestoque_model');
        $this->load->model('Estoque_model');
    } 

    /*
     * Listing of itenspedido
     */
    function index($PedidoEstoque_idPedidoEstoque)
    {
        $data['itenspedido'] = $this->Itenspedido_model->get_all_itenspedido($PedidoEstoque_idPedidoEstoque);
        $data['pedido'] = $this->Pedidoestoque_model->get_pedidoestoque($PedidoEstoque_idPedidoEstoque);
        
        $data['pedidoestoque_id'] = $PedidoEstoque_idPedidoEstoque;
        $this->load->view('itenspedido/index', $data); 
    } 

    /*
     * Adding a new itenspedido
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {
            
            $item = $this->Itenspedido_model->get_itenspedido_by_idPedido_idProduto($this->input->post('PedidoEstoque_idPedidoEstoque'), $this->input->post('Produto_idProduto'));
            if ($item['idItensPedido'] > 0) {
                echo json_encode([
                    'sucesso' => 0,
                    'msg' => 'Produto já foi adicionado ao pedido.'
                ]);
                die(); 
            }

            $pedido = $this->Pedidoestoque_model->get_pedidoestoque($this->input->post('PedidoEstoque_idPedidoEstoque'));
            $estoque = $this->Estoque_model->get_estoque_by_idProduto_idFilial($this->input->post('Produto_idProduto'), $pedido['Filial_idFilial']);
            
            if ($pedido['tpPedido'] == 'SAIDA' && $estoque['qtdEstoqueProduto'] < $this->input->post('qtdProduto')) {
                echo json_encode([ 
                    'sucesso' => 0,
                    'msg' => 'Estoque insuficiente para realizar uma saída.'
                ]);
                die(); 
            }

            $params = array( 
				'PedidoEstoque_idPedidoEstoque' => $this->input->post('PedidoEstoque_idPedidoEstoque'),
				'Produto_idProduto' => $this->input->post('Produto_idProduto'),
				'qtdProduto' => $this->input->post('qtdProduto'),
				'vrUnitario' => $this->input->post('vrUnitario'),
				'vrDesconto' => $this->input->post('vrDesconto'),
				'vrFrete' => $this->input->post('vrFrete'),
				'vrTotalProduto' => ($this->input->post('qtdProduto') * $this->input->post('vrUnitario')) - $this->input->post('vrDesconto') + $this->input->post('vrFrete'),
                'status' => $this->input->post('status'),
            );

            $itenspedido_id = $this->Itenspedido_model->add_itenspedido($params);

            $this->Pedidoestoque_model->atualizar_pedido($this->input->post('PedidoEstoque_idPedidoEstoque')); 
            if ($itenspedido_id > 0) {
                echo json_encode([
                    'sucesso' => 1,
                    'msg' => 'Produto adicionado com sucesso.'
                ]);
                die(); 
            }
        } else {

            $pedido = $this->Pedidoestoque_model->get_pedidoestoque($this->input->get('pedidoestoque_id'));

            if ($pedido['statusPedido'] == 'finalizado') {
                $data['pedidoFinalizado'] = true;
            }

            $data['_view'] = 'itenspedido/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a itenspedido
     */
    function edit($idItensPedido)
    {   
        // check if the itenspedido exists before trying to edit it
        $data['itenspedido'] = $this->Itenspedido_model->get_itenspedido($idItensPedido);
        
        if(isset($data['itenspedido']['idItensPedido']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'PedidoEstoque_idPedidoEstoque' => $this->input->post('PedidoEstoque_idPedidoEstoque'),
					'Produto_idProduto' => $this->input->post('Produto_idProduto'),
					'qtdProduto' => $this->input->post('qtdProduto'),
					'vrUnitario' => $this->input->post('vrUnitario'),
					'vrDesconto' => $this->input->post('vrDesconto'),
					'vrFrete' => $this->input->post('vrFrete'),
					'vrTotalProduto' => $this->input->post('vrTotalProduto'),
					'nrSequencial' => $this->input->post('nrSequencial'),
					'cdUnidade' => $this->input->post('cdUnidade'),
                );

                $this->Itenspedido_model->update_itenspedido($idItensPedido,$params);            
                redirect('itenspedido/index');
            }
            else
            {
                $data['_view'] = 'itenspedido/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The itenspedido you are trying to edit does not exist.');
    } 

    /*
     * Deleting itenspedido
     */
    function remove($idItensPedido)
    {
        $itenspedido = $this->Itenspedido_model->get_itenspedido($idItensPedido);

        // check if the itenspedido exists before trying to delete it
        if(isset($itenspedido['idItensPedido']))
        {
            $paramUpdate['status'] = 'cancelado'; 
            $this->Itenspedido_model->update_itenspedido($idItensPedido, $paramUpdate); 
            $this->Pedidoestoque_model->atualizar_pedido($this->input->get('pedidoestoque_id')); 
            redirect('itenspedido/add?pedidoestoque_id='.$this->input->get('pedidoestoque_id'));
        }
        else
            show_error('The itenspedido you are trying to delete does not exist.');
    }
    
}
