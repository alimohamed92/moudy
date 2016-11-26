<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Deconnexion extends CI_Controller
{
	private $data = array();
	

	public function index()
	{
		$this->session->sess_destroy();
		redirect(site_url('auth'));
	}

	
}

?>
