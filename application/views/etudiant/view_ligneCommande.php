 <!--<link href="<?php echo base_url() ?>assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />-->
 <section class="col-sm-10">
          <div class="panel panel-default">
            <div class="panel-heading">
            <h3 class="panel-title"> gestion de la commande <?php echo $commande['motif']?> </h3>
            </div>
            <div class="panel-body">
              <form method = "post" action = "<?php echo site_url('user/ajouterLC'); ?>">
                <select name="newProd">
                   <?php 
                    foreach ($stocks as $stock){
                      echo "<option>".$stock['id_produit'].":".$stock['nom']." à ".$stock['prix_vente']." FCFA [".$stock['quantite']." en stock]</option>";
                    }
                  ?>
                </select>
                Quantité <input type="number" name ="qte" step="1" min="1">
                <input type ="hidden" name ="idC" value ="<?php echo $commande['id_commande']?>">
                <input type="submit" value = "Ajouter à la commande"> <br>
              </form>
              <?php echo $this->session->flashdata('message');?>
               <table class="table table-bordered table-responsive table-hover">
                <thead>
                  <tr>
                    <th>Id produit </th> <th>Nom</th> <th>Prix unitaire</th> <th>Quantité</th> <th>Supprimer</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $prix=0;
                    foreach ($produits as $prod) {
                      $prix = $prix+($prod['qte'] * $prod['prix_vente']);
                      ?>
                      <tr > 
                        <td> <?php echo $prod['id_produit'] ?> </td> <td><?php echo $prod['nom'] ?></td> 
                        <td> <?php echo $prod['prix_vente'] ?> </td> <td><?php echo $prod['qte']?> </td>
                        <td><?php if($valide) echo "-"; else {?> <a href="<?php echo site_url('user/deleteLC');?>?idProduit=<?php echo $prod['id_produit'].'&idC='.$commande['id_commande'].'&qte='.$prod['qte'];?>">X</a> <?php } ?> </td>
                      </tr>
                  <?php 
                }
                  ?>
                </tbody>
              </table>
              <h4 class = " text-danger"> Prix total : <?php echo $prix." CFA";?>
              <?php 
              if($valide) {
                echo "<b class = 'text-success'>Commande validée !</b>";
              }
              else {
              ?> 
               <a class="  btn btn-success col-xs-offset-2 square-btn-adjust" href="<?php echo site_url('user/validerCommande').'?idC='.$commande['id_commande']; ?>" >Valider la commande</a>

              <?php 
              } 
              ?>
              </h4>
            </div>
          </div>
</section>
