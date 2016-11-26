<!DOCTYPE HTML>
<html>

  <head>
   <link href="<?php echo base_url() ?>assets/css/bootstrap.css" rel="stylesheet">
   <link href="<?php echo base_url() ?>assets/css/tuto.css" rel="stylesheet">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script src="<?php echo base_url() ?>assets/js/jquery-2.1.4.min.js"></script>
   
  </head>

  <body>

<div class="container " id="arriere">
  <div class="row ">
     <div class="col-lg-3">
       
     </div>
     <div class="col-lg-4">
        <center><h1 class="center">E.G.C.P</h1></center> 
        <h4>Espace Gestion Commande/Produit</h4>
      </div>
      <div class="col-lg-5 text-rigth">
        <h4>Bienvenue  <?php echo $this->session->userdata('infos')[0]['Prenom']." ".$this->session->userdata('infos')[0]['Nom'];?> <a class=" col-xs-offset-2 btn btn-danger square-btn-adjust" href="<?php echo site_url('deconnexion'); ?>">déconnexion</a></h4>
      </div>  
  </div>
</div>


    <div class="container"> 
  <div class="row">
    <nav class="navbar  navbar-inverse responsive"  role="navigation">
    <div class="navbar-collapse collapse">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Moudy : gestion de stock </a>
        </div>
      <ul class="nav nav-tabs col-xs-offset-3">
        <li <?php if($active=="accueil") echo 'class="active"'; ?>><a href="<?php echo site_url('user/accueil'); ?>" >Accueil</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Historique</a>
           <ul class="dropdown-menu">
            <li><a href="">Mois dernier</a></li>
            <li><a href="<?php echo site_url('user/historique'); ?>">Choisir date</a></li>
            <li><a href="">Réinitialiser</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ajout produit</a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url('user/catalogue'); ?>">Catalogue</a></li>
            <li><a href="<?php echo site_url('user/stock'); ?>">stock </a></li>
            <li><a href="">Autre</a></li>
          </ul>
        </li>
        <li class="dropdown" <?php if($active=="records") echo 'class="active"'; ?>>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Les produits</a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url('user/stock'); ?>">Stock </a></li>
            <li><a href="<?php echo site_url('user/catalogue'); ?>">Catalogue</a></li>
          </ul>
        </li>
        <li <?php if($active=="commande") echo 'class="active"'; ?> >
          <a href="<?php echo site_url('user/commande'); ?>">Commande</a>
        </li>
      </ul>
    </div> 
  </nav>
  
  </div>
</div>
    <div class="container">
      <div class="row col-sm-12">
        <nav class="col-sm-2">          
          <ul class="nav nav-pills nav-stacked">
            <li class="active"> <a href="#"> <span class="glyphicon glyphicon-home"></span> Home </a> </li>
            <li> <a href="#"> <span class="glyphicon glyphicon-book"></span> Catalogue</a> </li>
            <li> <a href=""> <span class="glyphicon glyphicon-user"></span> Utilisateurs </a> </li>
            <li> <a href=""> <span class="glyphicon glyphicon-user"></span> Demandes reçu </a> </li>
          </ul>
        </nav>