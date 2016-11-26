<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Android extends CI_Controller
{
	
	
    
	public function __construct()
    {
        parent::__construct();
        $this->load->model('model_user', 'user');
    }  
    

    public function index()
	{
		redirect(site_url('android/authentification'));
	}
	
	//================== Méthodes REST Android =================================

	public function ajoutDeplacement()
	{	
	   
	    $res=$this->user->getCompte($this->input->post('login'),$this->input->post('mp'));
		if($res['error']==0){	
		$depart = $this->input->post('depart');
		$arrive = $this->input->post('arrivee');
		$vitesse = $this->input->post('vitesse');
		$distance = $this->input->post('distance');
		$res=$this->user->ajouter_deplacement($res['id'], $depart, $arrive, $vitesse, $distance);
		echo "insertion réeussie !";
		}
		else echo "erreur d'authentification !";
		
	}


	public function authentification()
	{	
	    $res=$this->user->getCompte($this->input->post('login'),$this->input->post('mp'));
		if($res['error']==0){	
		echo "authentification réeussie !";
		}
		else if($res['error']==1){	
		echo "pas de compte associé à ce login !";
		}
		else echo "erreur d'authentification--->mot de passe  !";
	}

	public function creerUser()
	{	

	    
		$log =$this->input->post('login');
		$mp = $this->input->post('password');
		$nom = $this->input->post('nom');
		$prenom = $this->input->post('prenom');
		$age = $this->input->post('age');
		$mail = $this->input->post('mail');
		$res=$this->user->ajouter_user($log, $mp, $nom, $prenom, $age,$mail);
		//var_dump($res);
		if(!$res) {
			$req = $this->user->getInfosByLog($log);
			if(count($req)==0) echo "echec de l'opération--->ce email existe déjà !";
			else echo "echec de l'opération--->ce login existe déjà !";
		}
		else echo "Opération réeussie !";
	}


	public function infosUser()
	{	
	    
	    $res=$this->user->getCompte($this->input->post('login'),$this->input->post('mp'));
		if($res['error']==0){	
			$req = $this->user->getInfosByLog($this->input->post('login'));
			echo json_encode($req[0]);
		}
		else echo "erreur d'authentification !";
		
	}

	public function recordVitesse(){

		$log = $this->input->post('login');
		$mp = $this->input->post('mp');
		$res=$this->user->getCompte($log,$mp);
		if($res['error']==0){	
			$res = $this->user->getInfosByLog($log); 
			$req = $this->user->getVitesseRecords($res[0]['Id_User']);
			if(count($req)!=0) echo json_encode($req[0]);
			else echo json_encode($req);
		}
		else echo "erreur d'authentification !";
	}


	public function recordDistance(){

		$log = $this->input->post('login');
		$mp = $this->input->post('mp');
		$res=$this->user->getCompte($log,$mp);
		if($res['error']==0){	
			$res = $this->user->getInfosByLog($log);
			$req = $this->user->getDistanceRecords($res[0]['Id_User']);
			if(count($req)!=0) echo json_encode($req[0]);
			else echo json_encode($req);
		}
		else echo "erreur d'authentification !";
	}

	//=========================End Méthodes Android========================================

	
}

?>
