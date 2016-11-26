<!DOCTYPE HTML>
<html>

  <head>
    <link href="<?php echo base_url() ?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/tuto.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  </head>

  <body>

    <div class="container " id="arriere">
      <div class="row ">
         <div class="col-lg-3">
    
         </div>
         <div class="col-lg-4">
            <center><h1 class="center">E.G.C.P</h1></center> 
            <h3>Espace de gestion de stock </h3>
          </div>
          <div class="col-lg-5 text-rigth">
            <h3 class=" col-xs-offset-4">Bienvenue  sur votre espace </h3>
          </div>  
      </div>
    </div>


    <div class="container"> 
      <div class="row">
          <nav class="navbar  navbar-inverse "  role="navigation">
            <div class="navbar-collapse collapse">
                <div class="navbar-header">
                  <a class="navbar-brand" href="#">Moudy projet gestion de stock</a>
                </div>
            </div> 
          </nav>
      </div>
    </div>
   

    <div class="container">
         
      <div class="row col-sm-12">
        <nav class="col-sm-2"><!-- Menu de gauche !-->      
          <ul class="nav nav-pills nav-stacked">
            <li class="active"> <a href="#"> <span class="glyphicon glyphicon-home"></span> Accueil Moudy  </a> </li>
            <li> <a href="#"> <span class="glyphicon glyphicon-book"></span> Bibliothèque </a> </li>
            <li> <a href="#"> <span class="glyphicon glyphicon-facetime-video"></span> Annuaire </a> </li>
            <li> <a href="#"> <span class="glyphicon glyphicon-headphones"></span> Musiques </a> </li>
          </ul>
        </nav><!-- END!!!! Menu de gauche !-->
        <div class="col-sm-8"> <!-- Formulaire !-->
          <?php echo " <h3 class = 'text-danger'>".$this->session->flashdata('message')."</h3>";?>
          <?php echo form_open("auth");?>
            <legend> Connexion à l'EGCP</legend>
            <div class="form-group">
              <label for="login">Login :</label>
              <input type="text" name="login" id="login" value="<?php set_value('login')?>" class="form-control">
              <?php echo form_error('login','<div class="error">','</div>') ?>
            </div>
            <div class="form-group">
              <label for="mp">Mot de passe :</label>
              <input type="password" name="mp" id="mp" class="form-control">
              <?php echo form_error('mp','<div class="error">','</div>') ?>
            </div>
            <input type="submit" value="Connexion">
          <?php echo form_close();?>


        </div>

         <nav class="col-sm-2"><!-- Menu droit !-->      
          <ul class="nav nav-pills nav-stacked">
            <li class="active"><h3> Liens utils </h3> </li>
            <li> <a href="#">  google </a> </li>
            <li> <a href="#"> </span> Test </a> </li>
            <li> <a href="#"> </span> Test </a> </li>
          </ul>
        </nav><!-- END!!!! Menu droit !-->
        
      </div>
    </div>  