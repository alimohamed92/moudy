 <!--<link href="<?php echo base_url() ?>assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />-->
 <section class="col-sm-10">
          <div class="panel panel-default">
            <div class="panel-heading">
              <?php echo " <h5 class = 'text-succes'>".$this->session->flashdata('message')."</h5>"; //var_dump($amisId);?>
              <h3 class="panel-title">List des utilisateurs</h3>
            </div>
            <div class="panel-body">
              <table class="table table-bordered table-responsive table-hover" id="dataTables-example">
                <thead>
                  <tr>
                    <th>Nom</th> <th>Prénom</th> <th>Age</th> <th>email</th> <th>Date d'Inscription</th><th>reccords</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    foreach ($users as $user) {?>
                      <tr  > 
                        <td> <?php echo $user['Nom'] ?> </td> <td><?php echo $user['Prenom'] ?></td> 
                        <td> <?php echo $user['Age'] ?> </td> <td><?php echo $user['mail']?> </td>
                        <td><?php echo $user['dateInscription']?> </td><td><?php /*echo $user['Id_User'];*/ if( in_array($user['Id_User'], $amisId)) {echo "Ami";} else {?><a href="<?php echo site_url('user/demandeAmi'); ?>?idContact=<?php echo $user['Id_User']?>" class="glyphicon glyphicon-user">ajouter</a> <?php }?></td>
                      </tr>

                  <?php 
                }
                  ?>
                
                </tbody>
              </table>
            </div>
          </div>
</section>
