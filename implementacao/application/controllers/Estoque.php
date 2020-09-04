<?php

class Estoque extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Estoque_model');
    } 

    /*
     * Listing of estoque
     */
    function index()
    {
        $data['estoque'] = $this->Estoque_model->get_all_estoque();
        
        $data['_view'] = 'estoque/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new estoque
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'Produto_idProduto' => $this->input->post('Produto_idProduto'),
				'Filial_idFilial' => $this->input->post('Filial_idFilial'),
				'qtdEstoqueProduto' => $this->input->post('qtdEstoqueProduto'),
            );
            
            $estoque_id = $this->Estoque_model->add_estoque($params);
            redirect('estoque/index');
        }
        else
        {            
            $data['_view'] = 'estoque/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a estoque
     */
    function edit($idEstoque)
    {   
        // check if the estoque exists before trying to edit it
        $data['estoque'] = $this->Estoque_model->get_estoque($idEstoque);
        
        if(isset($data['estoque']['idEstoque']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'Produto_idProduto' => $this->input->post('Produto_idProduto'),
					'Filial_idFilial' => $this->input->post('Filial_idFilial'),
					'qtdEstoqueProduto' => $this->input->post('qtdEstoqueProduto'),
                );

                $this->Estoque_model->update_estoque($idEstoque,$params);            
                redirect('estoque/index');
            }
            else
            {
                $data['_view'] = 'estoque/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The estoque you are trying to edit does not exist.');
    } 

    /*
     * Deleting estoque
     */
    function remove($idEstoque)
    {
        $estoque = $this->Estoque_model->get_estoque($idEstoque);

        // check if the estoque exists before trying to delete it
        if(isset($estoque['idEstoque']))
        {
            $this->Estoque_model->delete_estoque($idEstoque);
            redirect('estoque/index');
        }
        else
            show_error('The estoque you are trying to delete does not exist.');
    }
    
}
