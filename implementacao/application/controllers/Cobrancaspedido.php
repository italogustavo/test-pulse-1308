<?php

class Cobrancaspedido extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Cobrancaspedido_model');
    } 

    /*
     * Listing of cobrancaspedido
     */
    function index()
    {
        $data['cobrancaspedido'] = $this->Cobrancaspedido_model->get_all_cobrancaspedido();
        
        $data['_view'] = 'cobrancaspedido/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new cobrancaspedido
     */
    function add()
    {   
        $this->load->model('Pedidoestoque_model'); 

        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'PedidoEstoque_idPedidoEstoque' => $this->input->post('PedidoEstoque_idPedidoEstoque'),
				'FormaPagamento_idFormaPagamento' => $this->input->post('FormaPagamento_idFormaPagamento')
            );

            $pedido = $this->Pedidoestoque_model->get_pedidoestoque($this->input->post('PedidoEstoque_idPedidoEstoque'));
            
            $params['vrCobranca'] = $pedido['vrTotal']; 
            
            $cobrancaspedido_id = $this->Cobrancaspedido_model->add_cobrancaspedido($params);
            
            $this->Pedidoestoque_model->processar_pedidoestoque($this->input->post('PedidoEstoque_idPedidoEstoque'));

            redirect('pedidoestoque/add'); 
        }
        else
        {   
            $this->load->model('Formapagamento_model'); 
            $data['all_formapagamento'] = $this->Formapagamento_model->get_all_formapagamento();

            $data['pedido'] = $this->Pedidoestoque_model->get_pedidoestoque($this->input->get('pedidoestoque_id'));
             
            $data['_view'] = 'cobrancaspedido/add';
            $this->load->view('layouts/main',$data); 
        }
    }  

    /*
     * Editing a cobrancaspedido
     */
    function edit($idCobrancasPedido)
    {   
        // check if the cobrancaspedido exists before trying to edit it
        $data['cobrancaspedido'] = $this->Cobrancaspedido_model->get_cobrancaspedido($idCobrancasPedido);
        
        if(isset($data['cobrancaspedido']['idCobrancasPedido']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'PedidoEstoque_idPedidoEstoque' => $this->input->post('PedidoEstoque_idPedidoEstoque'),
					'FormaPagamento_idFormaPagamento' => $this->input->post('FormaPagamento_idFormaPagamento'),
                );

                $this->Cobrancaspedido_model->update_cobrancaspedido($idCobrancasPedido,$params);            
                redirect('cobrancaspedido/index');
            }
            else
            {
                $data['_view'] = 'cobrancaspedido/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The cobrancaspedido you are trying to edit does not exist.');
    } 

    /*
     * Deleting cobrancaspedido
     */
    function remove($idCobrancasPedido)
    {
        $cobrancaspedido = $this->Cobrancaspedido_model->get_cobrancaspedido($idCobrancasPedido);

        // check if the cobrancaspedido exists before trying to delete it
        if(isset($cobrancaspedido['idCobrancasPedido']))
        {
            $this->Cobrancaspedido_model->delete_cobrancaspedido($idCobrancasPedido);
            redirect('cobrancaspedido/index');
        }
        else
            show_error('The cobrancaspedido you are trying to delete does not exist.');
    }
    
}
