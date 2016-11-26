 <!--<link href="<?php echo base_url() ?>assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />-->
 <section class="col-sm-10">
          <div class="panel panel-default">
            <div class="panel-heading">
            <h3 class="panel-title"> Gestion du stock </h3>
            </div>
            <div class="panel-body">
              <form method = "post" action = "<?php echo site_url('user/ajouterStock'); ?>">
                <select name="newProd">
                   <?php 
                    foreach ($catalogue as $cat){
                      echo "<option>".$cat['id_produit'].":".$cat['nom']."</option>";
                    }
                  ?>
                </select>
                Quantité <input type = "number" name = "qte"> 
                <input type="submit" value = "Ajouter"> <br>
              </form>
              <table class="table table-bordered table-responsive table-hover" id="dataTables-example">
                <thead>
                  <tr>
                    <th>Id produit </th> <th>Nom</th> <th>Prix unitaire</th> <th>Quantité</th> <th>Supprimer</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    foreach ($stocks as $stock) {?>
                      <tr > 
                        <td> <?php echo $stock['id_produit'] ?> </td> <td><?php echo $stock['nom'] ?></td> 
                        <td> <?php echo $stock['prix_vente'] ?> </td> <td><?php echo $stock['quantite']?> </td>
                        <td><a href="<?php echo site_url('user/deleteStock');?>?idProduit=<?php echo $stock['id_produit'];?>">X</a></td>
                      </tr>

                  <?php 
                }
                  ?>
                
                </tbody>
              </table>
              
            </div>
          </div>
</section>
