<?php

class Cliente extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Cliente_model');
    } 

    /*
     * Listing of clientes
     */
    function index()
    {
        $data['clientes'] = $this->Cliente_model->get_all_clientes();
        
        $data['_view'] = 'cliente/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new cliente
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('nmCliente','Nome do Cliente','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'nmCliente' => $this->input->post('nmCliente'),
				'nmApelido' => $this->input->post('nmApelido'),
				'nrTelefone' => $this->input->post('nrTelefone'),
				'dsEmail' => $this->input->post('dsEmail'),
				'nmEstado' => $this->input->post('nmEstado'),
				'nmCidade' => $this->input->post('nmCidade'),
				'nmBairro' => $this->input->post('nmBairro'),
				'cdCEP' => $this->input->post('cdCEP'),
				'dsEndereco' => $this->input->post('dsEndereco'),
				'tpCliente' => $this->input->post('tpCliente'),
				'nrCPF' => $this->input->post('nrCPF'),
				'nrCNPJ' => $this->input->post('nrCNPJ'),
            );
            
            $cliente_id = $this->Cliente_model->add_cliente($params);
            redirect('cliente/index');
        }
        else
        {            
            $data['_view'] = 'cliente/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a cliente
     */
    function edit($idCliente)
    {   
        // check if the cliente exists before trying to edit it
        $data['cliente'] = $this->Cliente_model->get_cliente($idCliente);
        
        if(isset($data['cliente']['idCliente']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('nmCliente', 'Nome do Cliente','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'nmCliente' => $this->input->post('nmCliente'),
					'nmApelido' => $this->input->post('nmApelido'),
					'nrTelefone' => $this->input->post('nrTelefone'),
					'dsEmail' => $this->input->post('dsEmail'),
					'nmEstado' => $this->input->post('nmEstado'),
					'nmCidade' => $this->input->post('nmCidade'),
					'nmBairro' => $this->input->post('nmBairro'),
					'cdCEP' => $this->input->post('cdCEP'),
					'dsEndereco' => $this->input->post('dsEndereco'),
					'tpCliente' => $this->input->post('tpCliente'),
					'nrCPF' => $this->input->post('nrCPF'),
					'nrCNPJ' => $this->input->post('nrCNPJ'),
                );

                $this->Cliente_model->update_cliente($idCliente,$params);            
                redirect('cliente/index');
            }
            else
            {
                $data['_view'] = 'cliente/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The cliente you are trying to edit does not exist.');
    } 

    /*
     * Deleting cliente
     */
    function remove($idCliente)
    {
        $cliente = $this->Cliente_model->get_cliente($idCliente);

        // check if the cliente exists before trying to delete it
        if(isset($cliente['idCliente']))
        {
            $this->Cliente_model->delete_cliente($idCliente);
            redirect('cliente/index');
        }
        else
            show_error('The cliente you are trying to delete does not exist.');
    }
    
}
