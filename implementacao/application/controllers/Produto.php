<?php

class Produto extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Produto_model');
    } 

    /*
     * Listing of produto
     */
    function index()
    {
        $data['produto'] = $this->Produto_model->get_all_produto();
        
        $data['_view'] = 'produto/index';
        $this->load->view('layouts/main',$data);
    }

    function query_autocomplete() {

        $produtoArr = $this->Produto_model->get_produto_by_term($this->input->get('term'));
        
        if (is_array($produtoArr)) {
            foreach ($produtoArr as $key => $value) {
                $arrayOptions[] = [ 
                    'id' => $value['idProduto'],
                    'value' => $value['idProduto'] . ' - ' . $value['nmProduto']
                ];
            }
        } 

        ob_clean();
        echo json_encode($arrayOptions);
        die(); 
    }

    function get_json_produto() {

        $produto = $this->Produto_model->get_produto($this->input->get('idProduto'));
        
        ob_clean();
        echo json_encode($produto);
        die(); 
    }

    /*
     * Adding a new produto
     */
    function add() 
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('vrPrecoVenda', 'Preço de Venda', 'required');
		$this->form_validation->set_rules('nmProduto','Descrição','required');
		$this->form_validation->set_rules('vrPrecoCusto', 'Preço de Custo','required'); 
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'nmProduto' => $this->input->post('nmProduto'),
				'vrPrecoVenda' => $this->input->post('vrPrecoVenda'),
				'vrPrecoCusto' => $this->input->post('vrPrecoCusto'),
				'nrCodigoBarras' => $this->input->post('nrCodigoBarras'),
            );
            
            $produto_id = $this->Produto_model->add_produto($params);
            redirect('produto/index');
        }
        else
        {            
            $data['_view'] = 'produto/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a produto
     */
    function edit($idProduto) 
    {   
        // check if the produto exists before trying to edit it
        $data['produto'] = $this->Produto_model->get_produto($idProduto);
        
        if(isset($data['produto']['idProduto']))
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('vrPrecoVenda', 'Preço de Venda', 'required');
            $this->form_validation->set_rules('nmProduto','Descrição','required');
            $this->form_validation->set_rules('vrPrecoCusto', 'Preço de Custo','required'); 
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'nmProduto' => $this->input->post('nmProduto'),
					'vrPrecoVenda' => $this->input->post('vrPrecoVenda'),
					'vrPrecoCusto' => $this->input->post('vrPrecoCusto'),
					'nrCodigoBarras' => $this->input->post('nrCodigoBarras'),
                );

                $this->Produto_model->update_produto($idProduto,$params);            
                redirect('produto/index');
            }
            else
            {
                $data['_view'] = 'produto/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The produto you are trying to edit does not exist.');
    } 

    /*
     * Deleting produto
     */
    function remove($idProduto)
    {
        $produto = $this->Produto_model->get_produto($idProduto);

        // check if the produto exists before trying to delete it
        if(isset($produto['idProduto']))
        {
            $this->Produto_model->delete_produto($idProduto);
            redirect('produto/index');
        }
        else
            show_error('The produto you are trying to delete does not exist.');
    }
    
}
