 <link href="<?php echo base_url() ?>assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
 <link href="<?php echo base_url() ?>assets/css/tuto.css" rel="stylesheet" />
 <section class="col-sm-10">
          <div class="panel panel-default">
            <?php //var_dump($donnees); echo $donnees[0]['Nom'];?>
            <div class="panel-heading">
              <h3 class="panel-title">Forum</h3>
            </div>
            <div class="panel-body">
              <?php 
              if(isset($sujets)){
                foreach ($sujets as $sujet) {?>
                  <!--echo "<h3><a href = '".site_url('user/messages')."?sujet =".$sujet['idSujet']."'>".$sujet['titre']."</a></h3>";-->
                  <h3> <a href="<?php echo site_url('user/messages'); ?>?idSujet=<?php echo $sujet['idSujet'];?>"><?php echo $sujet['titre'];?></a> </h3>
               <?php }
              }
              else{ //var_dump($messages);
                  foreach ($messages as $msg) {?>
                  <div class="message" style="width:90%; text-align:left"><?php echo $msg['message']."<br>"; if($msg['idUser']==$idUser) echo "<a href ='".site_url('user/supprimerMessage')."?idMessage=".$msg['idMessage']."&idSujet=".$sujet."'>Supprimer</a>" ?></div>
                  <?php }?>
                  <form method = "post" action = "<?php echo site_url('user/ajouterMessage'); ?>" class ="col-lg-6">
                    <input type="hidden" name ="idSujet" value ="<?php echo $sujet?>" >
                    <input type="hidden" name ="idUser" value ="<?php echo $idUser?>" >
                    <legend>Poster un message </legend>
                   <div class = "form-group">
                  <label for "msg" >Message:</label>
                  <TEXTAREA id ="msg" name="message" class ="form-control"></TEXTAREA>
                  <input type = "submit" value ="valider" > 
                 </form>
            <?php }?>
            </div>
          </div>
</section>
