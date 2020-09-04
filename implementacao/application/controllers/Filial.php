<?php

class Filial extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Filial_model');
    } 

    /*
     * Listing of filiais
     */
    function index()
    {
        $data['filiais'] = $this->Filial_model->get_all_filiais();
        
        $data['_view'] = 'filial/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new filial
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'dsRazaoSocial' => $this->input->post('dsRazaoSocial'),
				'nmApelidoFilial' => $this->input->post('nmApelidoFilial'),
				'nrCNPJ' => $this->input->post('nrCNPJ'),
				'cdCEP' => $this->input->post('cdCEP'),
				'nmEstado' => $this->input->post('nmEstado'),
				'nmCidade' => $this->input->post('nmCidade'),
				'nmBairro' => $this->input->post('nmBairro'),
				'dsEndereco' => $this->input->post('dsEndereco'),
            );
            
            $filial_id = $this->Filial_model->add_filial($params);
            redirect('filial/index');
        }
        else
        {            
            $data['_view'] = 'filial/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a filial
     */
    function edit($idFilial)
    {   
        // check if the filial exists before trying to edit it
        $data['filial'] = $this->Filial_model->get_filial($idFilial);
        
        if(isset($data['filial']['idFilial']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'dsRazaoSocial' => $this->input->post('dsRazaoSocial'),
					'nmApelidoFilial' => $this->input->post('nmApelidoFilial'),
					'nrCNPJ' => $this->input->post('nrCNPJ'),
					'cdCEP' => $this->input->post('cdCEP'),
					'nmEstado' => $this->input->post('nmEstado'),
					'nmCidade' => $this->input->post('nmCidade'),
					'nmBairro' => $this->input->post('nmBairro'),
					'dsEndereco' => $this->input->post('dsEndereco'),
                );

                $this->Filial_model->update_filial($idFilial,$params);            
                redirect('filial/index');
            }
            else
            {
                $data['_view'] = 'filial/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The filial you are trying to edit does not exist.');
    } 

    /*
     * Deleting filial
     */
    function remove($idFilial)
    {
        $filial = $this->Filial_model->get_filial($idFilial);

        // check if the filial exists before trying to delete it
        if(isset($filial['idFilial']))
        {
            $this->Filial_model->delete_filial($idFilial);
            redirect('filial/index');
        }
        else
            show_error('The filial you are trying to delete does not exist.');
    }
    
}
