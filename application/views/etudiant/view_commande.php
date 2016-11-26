 <!--<link href="<?php echo base_url() ?>assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />-->
 <section class="col-sm-10">
          <div class="panel panel-default">
            <div class="panel-heading">
            <h3 class="panel-title"> Création des commande </h3>
            </div>
            <div class="panel-body">
              <div>
                <h4>Nouvelle commande</h4>
                <?php echo $this->session->flashdata('message');?>
                <form method = "post" action = "<?php echo site_url('user/newCommande'); ?>">
                  Motif <input type="text" name ="nomC">
                  <input type="submit" value = "Créer"> <br>
                </form>
              </div>
              <div>
                <table class="table table-bordered table-responsive table-hover">
                <thead>
                  <tr>
                    <th>Id commande </th> <th>Nom</th> <th>Date</th> <th>Modifier</th><th>Supprimer</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    foreach ($commandes as $cmd) {?>
                      <tr> 
                        <td> <?php echo $cmd['id_commande'] ?> </td> <td><?php echo $cmd['motif'] ?></td> 
                        <td> <?php echo $cmd['date'] ?> </td> 
                        <td><a href="<?php echo site_url('user/ligneCommande');?>?idCommande=<?php echo $cmd['id_commande'];?>"><span class="glyphicon glyphicon-pencil"></spam></a></td>
                        <td><a href="<?php echo site_url('user/deleteCommande');?>?idC=<?php echo $cmd['id_commande'];?>">X</a></td>
                      </tr>
                  <?php 
                }
                  ?>
                
                </tbody>
              </table>
              </div>
            </div>
          </div>
</section>
