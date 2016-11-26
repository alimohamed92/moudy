<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Auth extends CI_Controller
{
	 public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('model_user', 'user');
    }    

	public function index()
	{	//si la session est active
		if(  $this->session->userdata('log_user')==true ){
			redirect(site_url('user/accueil'));
		}

		//sinon
		else{
			$this->form_validation->set_rules('login', 'login', 'trim|required');
	        $this->form_validation->set_rules('mp', 'mot de passe', 'trim|required');
	        if($this->form_validation->run()==true){ 
	        	$res=$this->user->getCompte($this->input->post('login'),$this->input->post('mp'));
				if($res['error']==0){
						$this->session->set_userdata('log_user',true);
						$this->session->set_userdata('idUser',$res['id']);
					    redirect(site_url('user/accueil'));
					
				}
				else{
					 $this->session->set_flashdata('message',"erreur d'authentification");
					 $this->load->view("view_auth");
				}
	       }
	        else{
	        	$this->load->view("view_auth");
	        }
		}
		
		
	}





	
}

?>
