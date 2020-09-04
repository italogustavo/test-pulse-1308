<?php

class Usuario extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Usuario_model');
    } 

    /*
     * Listing of usuario
     */
    function index()
    {
        $data['usuario'] = $this->Usuario_model->get_all_usuario();
        
        $data['_view'] = 'usuario/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new usuario
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('nmUsuario','Nome','required');
		$this->form_validation->set_rules('cdLogin','Login','required');
        $this->form_validation->set_rules('cdSenha','Senha','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'cdSenha' => $this->input->post('cdSenha'),
				'nmUsuario' => $this->input->post('nmUsuario'),
				'cdLogin' => $this->input->post('cdLogin'),
				'ativo' => 1,
            );
            
            $usuario_id = $this->Usuario_model->add_usuario($params);
            redirect('usuario/index');
        }
        else
        {            
            $data['_view'] = 'usuario/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a usuario
     */
    function edit($idUsuario)
    {   
        // check if the usuario exists before trying to edit it
        $data['usuario'] = $this->Usuario_model->get_usuario($idUsuario);
        
        if(isset($data['usuario']['idUsuario']))
        {
            $this->load->library('form_validation'); 

			$this->form_validation->set_rules('nmUsuario','Nome','required');
			$this->form_validation->set_rules('cdLogin','Login','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'nmUsuario' => $this->input->post('nmUsuario'),
					'cdLogin' => $this->input->post('cdLogin'),
                );

                if ($this->input->post('cdSenha') != '') {
                    $params['cdSenha'] = $this->input->post('cdSenha');
                }

                $this->Usuario_model->update_usuario($idUsuario,$params);            
                redirect('usuario/index'); 
            }
            else
            {
                $data['_view'] = 'usuario/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The usuario you are trying to edit does not exist.');
    } 

    /*
     * Deleting usuario
     */
    function remove($idUsuario)
    {
        $usuario = $this->Usuario_model->get_usuario($idUsuario);

        // check if the usuario exists before trying to delete it
        if(isset($usuario['idUsuario']))
        {
            $this->Usuario_model->delete_usuario($idUsuario);
            redirect('usuario/index');
        }
        else
            show_error('The usuario you are trying to delete does not exist.');
    }
    
}
