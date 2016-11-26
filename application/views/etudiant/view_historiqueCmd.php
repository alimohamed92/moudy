  <link href="<?php echo base_url() ?>assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
 <section class="col-sm-10">
          <div class="panel panel-default">
            <div class="panel-heading">
            <?php if($histo){?>
              <h3 class="panel-title"> historique des commandes   <b><?php echo $date1.' au '.$date2;?> </h3>
            </div>
            <div class="panel-body">
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
            <?php 
          }  else {
            ?>
            <form method = "post" action = "<?php echo site_url('user/historique'); ?>" >
            Du :<input type = "date" name ="date1"/> Au :<input type = "date"name = "date2" /> 
            <input type = "submit" value ="OK"/>
            </form>
          <?php }?>
          </div>
          
</section>
