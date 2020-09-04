<?php

class Pedidoestoque extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pedidoestoque_model');
    } 

    /*
     * Listing of pedidoestoque
     */
    function index()
    {
        $data['pedidoestoque'] = $this->Pedidoestoque_model->get_all_pedidoestoque();
        
        $data['_view'] = 'pedidoestoque/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new pedidoestoque
     */
    function add() 
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'Filial_idFilial' => $this->input->post('Filial_idFilial'),
				'Usuario_idUsuario' => $this->input->post('Usuario_idUsuario'),
				'tpPedido' => $this->input->post('tpPedido'),
				'Cliente_idCliente' => $this->input->post('Cliente_idCliente'), 
				'dsObservacaoEntrega' => $this->input->post('dsObservacaoEntrega'),
                'statusPedido' => 'digitando',
                'dtPedido' => date('Y-m-d H:i:s'), 
            );
            
            $pedidoestoque_id = $this->Pedidoestoque_model->add_pedidoestoque($params);
            redirect('itenspedido/add?pedidoestoque_id='.$pedidoestoque_id); 
        }
        else
        {
			$this->load->model('Filial_model');
			$data['all_filiais'] = $this->Filial_model->get_all_filiais();

			$this->load->model('Usuario_model');
			$data['all_usuario'] = $this->Usuario_model->get_all_usuario();

			$this->load->model('Cliente_model');
			$data['all_clientes'] = $this->Cliente_model->get_all_clientes();
            
            $data['_view'] = 'pedidoestoque/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a pedidoestoque
     */
    function edit($idPedidoEstoque)
    {   
        // check if the pedidoestoque exists before trying to edit it
        $data['pedidoestoque'] = $this->Pedidoestoque_model->get_pedidoestoque($idPedidoEstoque);
        
        if(isset($data['pedidoestoque']['idPedidoEstoque']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'Filial_idFilial' => $this->input->post('Filial_idFilial'),
					'Usuario_idUsuario' => $this->input->post('Usuario_idUsuario'),
					'tpPedido' => $this->input->post('tpPedido'),
					'Cliente_idCliente' => $this->input->post('Cliente_idCliente'),
					'vrBruto' => $this->input->post('vrBruto'),
					'vrDesconto' => $this->input->post('vrDesconto'),
					'vrFrete' => $this->input->post('vrFrete'),
					'vrTotal' => $this->input->post('vrTotal'),
					'qtdItens' => $this->input->post('qtdItens'),
					'dtPedido' => $this->input->post('dtPedido'),
					'dsObservacaoEntrega' => $this->input->post('dsObservacaoEntrega'),
                );

                $this->Pedidoestoque_model->update_pedidoestoque($idPedidoEstoque,$params);            
                redirect('pedidoestoque/index');
            }
            else
            {
				$this->load->model('Filial_model');
				$data['all_filiais'] = $this->Filial_model->get_all_filiais();

				$this->load->model('Usuario_model');
				$data['all_usuario'] = $this->Usuario_model->get_all_usuario();

				$this->load->model('Cliente_model');
				$data['all_clientes'] = $this->Cliente_model->get_all_clientes();

                $data['_view'] = 'pedidoestoque/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The pedidoestoque you are trying to edit does not exist.');
    } 

    /*
     * Deleting pedidoestoque
     */
    function remove($idPedidoEstoque)
    {
        $pedidoestoque = $this->Pedidoestoque_model->get_pedidoestoque($idPedidoEstoque);

        // check if the pedidoestoque exists before trying to delete it
        if(isset($pedidoestoque['idPedidoEstoque']))
        {
            $this->Pedidoestoque_model->delete_pedidoestoque($idPedidoEstoque);
            redirect('pedidoestoque/index');
        }
        else
            show_error('The pedidoestoque you are trying to delete does not exist.');
    }
    
}
