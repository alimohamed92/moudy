 <!--<link href="<?php echo base_url() ?>assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />-->
 <section class="col-sm-10">
          <div class="panel panel-default">
            <div class="panel-heading">
            <h3 class="panel-title"> Catalogue produit </h3>
            </div>
            <div class="panel-body">
              <form method = "post" action = "<?php echo site_url('user/ajouterCatalogue'); ?>">
                Nom produit <input type = "text" name = "nom"> 
                Prix d'achat <input type = "number" name = "pAchat">
                Prix de vente <input type = "number" name = "pVente">
                <input type="submit" value = "Ajouter"> <br>
              </form>
              <table class="table table-bordered table-responsive table-hover" id="dataTables-example">
                <thead>
                  <tr>
                    <th>Id produit </th> <th>Nom</th> <th>Prix d'achat</th> <th>Prix de vente</th> <th>Date d'ajout</th> <th>Modifier</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                 // var_dump($modifId);
                    foreach ($catalogue as $cat) { 
                      if($modifId !=null && $cat['id_produit']==$modifId){?>
                        <td> <?php echo $cat['id_produit'] ?>
                        <form method = "post" action = "<?php echo site_url('user/updateCatalogue'); ?>">
                          <td> <input type = "text" name = "nom" value = "<?php echo $cat['nom'] ?>"> </td>
                          <td> <input type = "number" name = "pAchat" value = "<?php echo $cat['prix_achat'] ?>"> </td>
                          <td> <input type = "number" name = "pVente" value ="<?php echo $cat['prix_vente'] ?>"> </td>
                          <td><?php echo $cat['date'] ?></td>
                          <input type ="hidden" name = "id" value ="<?php echo $cat['id_produit'] ?>">
                          <td> <input type="submit" value = "Modifier">  </td>
                        </form>
                      <?php 
                        }//end IF
                         else {
                      ?>
                      <tr > 
                        <td> <?php echo $cat['id_produit'] ?> </td> <td><?php echo $cat['nom'] ?></td> 
                        <td> <?php echo $cat['prix_achat'] ?> </td> <td><?php echo $cat['prix_vente']?> </td>
                        <td><?php echo $cat['date'] ?></td>
                        <td><a href="<?php echo site_url('user/updateCatalogue');?>?idProduit=<?php echo $cat['id_produit'];?>"><span class="glyphicon glyphicon-pencil"></spam></a></td>
                      </tr>

                  <?php }//end Else
                } //end For
                  ?>
                
                </tbody>
              </table>
              
            </div>
          </div>
</section>
