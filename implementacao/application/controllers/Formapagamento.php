<?php

class Formapagamento extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Formapagamento_model');
    } 

    /*
     * Listing of formapagamento
     */
    function index()
    {
        $data['formapagamento'] = $this->Formapagamento_model->get_all_formapagamento();
        
        $data['_view'] = 'formapagamento/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new formapagamento
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'descricao' => $this->input->post('descricao'),
				'qtdMaxParcelas' => $this->input->post('qtdMaxParcelas'),
            );
            
            $formapagamento_id = $this->Formapagamento_model->add_formapagamento($params);
            redirect('formapagamento/index');
        }
        else
        {            
            $data['_view'] = 'formapagamento/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a formapagamento
     */
    function edit($idFormaPagamento)
    {   
        // check if the formapagamento exists before trying to edit it
        $data['formapagamento'] = $this->Formapagamento_model->get_formapagamento($idFormaPagamento);
        
        if(isset($data['formapagamento']['idFormaPagamento']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'descricao' => $this->input->post('descricao'),
					'qtdMaxParcelas' => $this->input->post('qtdMaxParcelas'),
                );

                $this->Formapagamento_model->update_formapagamento($idFormaPagamento,$params);            
                redirect('formapagamento/index');
            }
            else
            {
                $data['_view'] = 'formapagamento/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The formapagamento you are trying to edit does not exist.');
    } 

    /*
     * Deleting formapagamento
     */
    function remove($idFormaPagamento)
    {
        $formapagamento = $this->Formapagamento_model->get_formapagamento($idFormaPagamento);

        // check if the formapagamento exists before trying to delete it
        if(isset($formapagamento['idFormaPagamento']))
        {
            $this->Formapagamento_model->delete_formapagamento($idFormaPagamento);
            redirect('formapagamento/index');
        }
        else
            show_error('The formapagamento you are trying to delete does not exist.');
    }
    
}
