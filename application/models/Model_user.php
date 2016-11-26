<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_user extends CI_Model
{
	    private $table='Users';


//========================================SELECT============================{
    public function getcompte($log,$mp) {
        
        $res = $this->db->select('*')
                        ->from('user')
                        ->where('login', $log)
                        ->get()
                        ->result_array();
        if(count($res)!=1){
        	return array("error" => 1, "user" => false);
        } 
        else{
            if ( password_verify( $mp, $res['0']['password'] ) ){
                return array("error" => 0, "user" => true, "id"=>$res[0]['Id_User']);
            }
        	else return array("error" => 2, "user" => false);
        }               
       
    }
 
    public function getStock(){
             $res = $this->db->select('s.*, c.nom as nom, c.prix_vente as prix_vente')
                            ->from('stock s, catalogue_produit c')
                            ->where('s.id_produit = c.id_produit')
                            ->get()
                            ->result_array();
            return $res;
    }

    
 public function getProdCommande($idProd){
             $res = $this->db->select('l.*, c.nom as nom, c.prix_vente as prix_vente')
                            ->from('ligne_commande2 l, catalogue_produit c')
                            ->where('l.id_produit = c.id_produit')
                            ->where('l.id_commande',$idProd)
                            ->get()
                            ->result_array();
            return $res;
    }

    public function getInfos($id){
             $res = $this->db->select('*')
                            ->from('user')
                            ->where('id_User', $id)
                            ->get()
                            ->result_array();
            return $res;
    }

    public function searchStock($id){
             $res = $this->db->select('*')
                            ->from('stock')
                            ->where('id_produit', $id)
                            ->get()
                            ->result_array();
            return $res;
    }

    public function searchProdLC($idProd,$idC){
             $res = $this->db->select('*')
                            ->from('ligne_commande2')
                            ->where('id_commande', $idC)
                            ->where('id_produit', $idProd)
                            ->get()
                            ->result_array();
            return $res;
    }



 public function getCatalogue(){
             $res = $this->db->select('*')
                            ->from('catalogue_produit')
                            ->get()
                            ->result_array();
            return $res;
    }

 

public function getnonValideCommande(){
             $res = $this->db->select('*')
                            ->from('commande')
                            ->where('valide',0)
                            ->get()
                            ->result_array();
            return $res;
    }


public function getCommande($motif){
             $res = $this->db->select('*')
                            ->from('commande')
                            ->where('motif',$motif)
                            ->get()
                            ->result_array();
            return $res;
    }
public function gethistorique($date1,$date2){
    $wh = 'date >= \''.$date1.'\' AND date <= \''.$date2.'\'';
    $res = $this->db->select('*')
                            ->from('commande')
                            ->where($wh)
                            ->get()
                            ->result_array();
            return $res;

}
    public function getCommandeById($id){
             $res = $this->db->select('*')
                            ->from('commande')
                            ->where('id_commande',$id)
                            ->get()
                            ->result_array();
            return $res;
    }

   public function getUsers($id){
    
    $where = 'Id_User != \''.$id.'\''; 
             $res = $this->db->select('*')
                            ->from('Users')
                            ->where($where)
                            ->get()
                            ->result_array();
              return $res;
    }

 

//==============================Insert==================================================

public function addProduitStock($idP, $qte)
        {
            return $this->db->set('id_produit', $idP)
                    ->set('quantite',  $qte)
                    ->set('date', 'NOW()', false)
                    ->insert("stock");
                   

        }


public function addProduitCat($nom,$prixAchat,$prixVente)
        {
            return $this->db->set('nom',  $nom)
                    ->set('prix_achat',  $prixAchat)
                    ->set('prix_vente',  $prixVente)
                    ->set('date', 'NOW()', false)
                    ->insert("catalogue_produit");
                   

        }

public function addCommande($motif)
        {
            return $this->db->set('motif',$motif)
                    ->set('date', 'NOW()', false)
                    ->set('valide',0)
                    ->insert("commande");
                   

        }

public function addligneCommande($idC,$idP, $qte)
        {
            return $this->db->set('id_produit', $idP)
                    ->set('qte',  $qte)
                    ->set('id_commande', $idC)
                    ->insert("ligne_commande2");
                   

        }

//===========================END INSERT=====================================


//====================================UPDATE==============================={
    public function updateProdStock($id, $qte) {
        $stock = array(
            'quantite' => $qte
            );
        $res = $this->db->where('id_produit', $id)
                        ->update("stock", $stock);
        return $res;
    }

    public function updateProduitCat($id,$nom,$prixA,$prixV) {
        $tab = array(
            'nom' => $nom,
            'prix_achat' => $prixA,
            'prix_vente' => $prixV,
            );
        $res = $this->db->where('id_produit', $id)
                        ->update("catalogue_produit", $tab);
        return $res;
    }

    public function validerCommande($id) {
        $stock = array(
            'valide' => 1
            );
        $res = $this->db->where('id_commande', $id)
                        ->update("commande", $stock);
        return $res;
    }
//================================END UPDATE==================================}


//==========================DELETE============================================
    public function deleteProduitStock($id){
        $tableName = "stock";
         $res = $this->db->where('id_produit',$id)
                         ->delete($tableName);
         return $res;
    }  

    public function deleteProduitLC($idP,$idC){
        $tableName = "ligne_commande2";
         $res = $this->db->where('id_produit',$idP)
                         ->where('id_commande',$idC)
                         ->delete($tableName);
         return $res;
    }   

     public function deleteCommande($id){
        $tableName = "commande";
         $res = $this->db->where('id_commande',$id)
                         ->delete($tableName);
         return $res;
    } 

}