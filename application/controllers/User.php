<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class User extends CI_Controller
{
	private $data = array();
	
    
	public function __construct()
    {
        parent::__construct();
        $this->load->model('model_user', 'user');
    }  
    

    public function index()
	{
		redirect(site_url('auth'));
	}
	
	public function accueil()
	{	
		$this->check_login_user();
		$res=$this->user->getInfos( $this->session->userdata('idUser') );
		$this->session->set_userdata('infos',$res);
		$data['active']="accueil";
		$this->load->view("etudiant/base_etud", $data);
		$this->load->view("etudiant/view_forum2");
		$this->load->view("etudiant/view_footer");	
	}


	public function stock()
	{	
		$this->check_login_user();
		$res=$this->user->getStock();
		$data['stocks']=$res;
		$data['active']="stock"; 
		$data['catalogue'] = $this->user->getCatalogue();
		$this->load->view("etudiant/base_etud", $data);
		$this->load->view("etudiant/view_records",$data);
		$this->load->view("etudiant/view_footer");	
	}
	
	

	public function ajouterStock()
	{	
		$this->check_login_user();
		$res= $this->input->post('newProd');
		$tab = explode(":",$res);
		$idProd = $tab[0];
		$resSearch = $this->user->searchStock($idProd);
		if( count($resSearch)!=1 ){
			$this->user->addProduitStock($idProd,$this->input->post('qte'));
		}
		else{
			$qte = $resSearch[0]['quantite'] + $this->input->post('qte'); 
			$this->user->updateProdStock($idProd,$qte);
		}
		redirect(site_url('user/stock'));
	}


	public function deleteStock()
	{	
		$this->check_login_user();
		$res=$this->user->deleteProduitStock($this->input->get('idProduit'));
		redirect(site_url('user/stock'));
	}

public function catalogue()
	{	
		$this->check_login_user();
		$res=$this->user->getCatalogue();
		if( $this->input->get('idProduit') !=null ){
			$data['modifId'] = $this->input->get('idProduit');
		}
		else $data['modifId'] = null;
		$data['catalogue']=$res;
		$data['active']="catalogue"; 
		$this->load->view("etudiant/base_etud", $data);
		$this->load->view("etudiant/view_catalogue",$data);
		$this->load->view("etudiant/view_footer");	
	}
	
public function ajouterCatalogue()
	{	
		$this->check_login_user();
		$nom = $this->input->post('nom');
		$prixA = $this->input->post('pAchat');
		$prixV = $this->input->post('pVente');
		$this->user->addProduitCat($nom,$prixA,$prixV);
	
		redirect(site_url('user/catalogue')); 
	}


public function updateCatalogue()
	{	
		$this->check_login_user();
		if( $this->input->get('idProduit') !=null ){
			$url = "user/catalogue?idProduit=".$this->input->get('idProduit');
			redirect(site_url($url)); 
		}
		$id = $this->input->post('id');
		$nom = $this->input->post('nom');
		$prixA = $this->input->post('pAchat');
		$prixV = $this->input->post('pVente');
		$this->user->updateProduitCat($id,$nom,$prixA,$prixV);
	
		redirect(site_url('user/catalogue')); 
	}


	public function commande()
	{	
		$this->check_login_user();
		$res=$this->user->getnonValideCommande();
		$data['commandes']=$res;
		$data['active']="commande"; 
		$this->load->view("etudiant/base_etud", $data);
		$this->load->view("etudiant/view_commande",$data);
		$this->load->view("etudiant/view_footer");	
	}



	public function historique()
	{	
		$this->check_login_user();
		$dte1 = $this->input->post('date1');
		$dte2 = $this->input->post('date2');
		if($dte1==null){
			$data['histo'] = false;
			$data['active']="historiqueCmd";
		}
		else{
			$res=$this->user->gethistorique($dte1,$dte2);
			$data['histo'] = true;
			$data['commandes']=$res;
			$data['date1'] = $dte1;
			$data['date2'] = $dte2;
			$data['active']="historique"; 
		}

		$this->load->view("etudiant/base_etud", $data);
		$this->load->view("etudiant/view_historiqueCmd",$data);
		$this->load->view("etudiant/view_footer");
	}

	public function validerCommande()
	{	
		$this->check_login_user();
		$res=$this->user->validerCommande($this->input->get('idC'));
		$url = "user/ligneCommande?valide=1&idCommande=".$this->input->get('idC');
		redirect(site_url($url));

		
	}
	
	
	public function newCommande()
	{	
		$this->check_login_user();
		var_dump($this->user->getCommande($this->input->post('nomC')));
		if(count($this->user->getCommande($this->input->post('nomC')))==0){
			$this->user->addCommande($this->input->post('nomC'));
			$res=$this->user->getCommande($this->input->post('nomC'));
			$url ="user/ligneCommande?idCommande=".$res[0]['id_commande'];
			$this->session->set_flashdata('message',"<h4 class = 'text-success'> Opération réeussie : veuillez maintenant ajouter des articles à la commande</h4>");
			redirect(site_url($url)); 
		}
		else {
			$this->session->set_flashdata('message'," <h3 class = 'text-danger'>Echec de l'opération : cette commande existe déjà !</h4>");
			redirect(site_url('user/commande'));
		}
	
	}


	public function deleteCommande()
	{	
		$this->check_login_user();
		$idC =$this->input->get('idC');
		if(count($this->user->getProdCommande($idC)) == 0){
			$res=$this->user->deleteCommande($idC);
			$this->session->set_flashdata('message',"<h4 class = 'text-success'>Opération de suppression réeussie</h4>");
			redirect(site_url('user/commande'));
		}
		else{
			$this->session->set_flashdata('message'," <h4 class = 'text-warning'>Vous devez d'abord supprimer tous les arrticles de la commande</h4>");
			$url ="user/ligneCommande?idCommande=".$idC;
			redirect(site_url($url));
		}
		
		
	}


	public function ligneCommande()
	{	
		$this->check_login_user();
		$idC = $this->input->get('idCommande');
		$res=$this->user->getProdCommande($idC);
		$data['stocks']=$this->user->getStock();
		$data['produits']=$res;
		$data['commande']=$this->user->getCommandeById($idC)[0];
		$data['active']="commande";
		$data['valide']=false;  
		if($data['commande']['valide']==1) $data['valide']=true;  
		if($this->input->get('valide') !=null) $data['valide']=true;  
		$this->load->view("etudiant/base_etud", $data);
		$this->load->view("etudiant/view_ligneCommande",$data);
		$this->load->view("etudiant/view_footer");	
	}


	public function ajouterLC()
	{	
		$this->check_login_user();
		$res= $this->input->post('newProd');
		$tab = explode(":",$res);
		$idProd = $tab[0];
		$prod = $this->user->searchStock($idProd);
		if(count($this->user->searchProdLC($idProd,$this->input->post('idC')))==0){
			if($prod[0]['quantite'] > $this->input->post('qte')){
			$this->user->addligneCommande($this->input->post('idC'),$idProd,$this->input->post('qte'));
			$qte = $prod[0]['quantite']-$this->input->post('qte');
			$this->user->updateProdStock($idProd, $qte);
			}
			else {
 					$this->session->set_flashdata('message',"<h4 class = 'text-danger'> Veuillez réduire la quantité : la quantité saisie est supérieure à la quantité disponnible en stock</h4>");

			}
		}
		else {
			 	$this->session->set_flashdata('message'," <h4 class = 'text-danger'>Echec : Cet article a déjà été ajouté, pour augmenter la qte, supprimer d'abore l'article de la commande, ensuite il faut le rajouter  avec la bonne quantité</h4>");
		}
		
		$url = "user/ligneCommande?idCommande=".$this->input->post('idC');
		redirect(site_url($url));
	}

	public function deleteLC()
	{	
		$this->check_login_user();
		$idProd = $this->input->get('idProduit');
		$res=$this->user->deleteProduitLC($idProd,$this->input->get('idC'));
		$prod = $this->user->searchStock($idProd);
		$qte = $prod[0]['quantite']+$this->input->get('qte');
		$this->user->updateProdStock($idProd, $qte);
		$url = "user/ligneCommande?idCommande=".$this->input->get('idC');
		redirect(site_url($url));
	}

	private function check_login_user() {
		
        if( !$this->session->userdata("log_user") ) {
            redirect(site_url('auth'));
        }
    }

	
}

?>
