<!--
Author: Josué
Author URL: jose.init.dev@gmail.com
License: All Rights Reserved Josué Yao
License URL: http://mailto:jose.init.dev@gmail.com
First version date : 2020-07-21
Version: 1.0  -  date: 2020-07-21
-->
<?php
include('assets/includes/constants.php');
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php
        if (isset($titre_page)){
            ?><title><?php echo $titre_page ?></title><?php
        }
        else{
            ?><title>Trouver Jobs Côte d'Ivoire :: <?php echo $nom_site ?></title><?php
        }
        
        if (isset($description_page)){
            ?><meta name="description" content="<?php echo $description_page ?>" /><?php
        }
        else{
            ?><meta name="description" content="Vous cherchez du travail ? Quelque soit le type, vous êtes au bon endroit : taxi, femme de ménage, manager, technicien, mecanicien, couturier, directeur ... quelque soit le type de job que vous voulez en Côte d'Ivoire. Si vous voulez embaucher des gens, vous trouverez tous les types de profils sur <?php echo $nom_site ?>" /><?php
        }
        ?>
		<!-- metas -->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="keywords" content="<?php echo $nom_site ?>, trouver job en côte d'ivoire, chercher travail ci, devenir taximan en ci, devenir couturier en ci, comment travail sans diplôme en côte d'ivoire, travail sans diplôme en ci, travail avec diplôme en ci, embaucher pour son entreprise, vendeur de garba en ci, job ci, emploi ci, côte d'ivoire jobs, recherche d'emploi, abidjan jobs, offres d'emploi en côte d'ivoire, emplois, recrutement côte d'ivoire, jobs de vacance en côte d'ivoire" />
		<!-- //metas -->
		<!-- links -->
		<link rel="stylesheet" href="assets/css/style2.css">
		<link rel="shortcut icon" type="image/x-icon" href="assets/images/icon-site.png" type="text/css" media="all" />
<!--
		<link href="//fonts.googleapis.com/css?family=Oswald:300,400,500,600&display=swap" rel="stylesheet">
		<link href="//fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
-->
		<script src='https://kit.fontawesome.com/a076d05399.js'></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- //links -->
        <?php
        //-----------permet de reconnaitre le client--------------
        if (isset($_SESSION['cl_nom']) and isset($_SESSION['cl_id'])){
            $cl_nom=$_SESSION['cl_nom'];
            $cl_id=$_SESSION['cl_id'];
        }
        else if (isset($_COOKIE['cl_nom']) and isset($_COOKIE['cl_id']))
        {
            $cl_nom=$_COOKIE['cl_nom'];
            $cl_id=$_COOKIE['cl_id'];
        }
        else
        {
            $cl_nom = $nom_site;
            $cl_id = 0;
        }
        //-----------//permet de reconnaitre le client--------------
        ?>
	</head>
	<body onload="pageLoading()">
		<?php
		include('assets/includes/identifiants.php');
		include('assets/includes/functions.php');
		?>
		<section class="w3l-banner-slider-main inner-pagehny">
		  <div class="breadcrumb-infhny">
			<div class="top-header-content">
			  <header class="tophny-header">
				<div class="container-fluid">
				  <div class="top-right-strip row">
					<!--left-->
					<div class="top-hny-left-content col-lg-6 pl-lg-0">
					  <h6>Tout le monde a un talent, <a href="jobs.php">trouvez du tavail<span class="fa fa-hand-o-right hand-icon" aria-hidden="true"></span> <span class="hignlaite"> en cliquant ici </span></a></h6>
					</div>
					<!--//left-->
					<!--right-->
					<ul class="top-hnt-right-content col-lg-6">
					  <li class="button-log usernhy">
						  <?php if ($cl_id<=0){ ?>
							<a class="btn-open" href="#" >
							  <span class="fa fa-user" aria-hidden="true" title="Connectez-vous à votre compte"></span>
							</a>
						  <?php }else{ ?>
							<a href="compte.php">
							  <?php
							  $clphoto=$db->prepare('SELECT cl_photo FROM clients WHERE cl_id=:id');
							  $clphoto->bindValue(':id', $cl_id, PDO::PARAM_INT);
							  $clphoto->execute();
							  $clphoto=$clphoto->fetch();
							  $clphoto=$clphoto['cl_photo'];
							  echo '<img src="assets/images/clients/'.$clphoto.'" class="img-fluid" title="Accéder à mon compte">';
							  ?>
							</a>
						  <?php } ?>
					  </li>
					  <li class="transmitvcart galssescart2 cart cart box_1">
						  <a href="jobs.php?type=work">
						  <button class="top_transmitv_cart" type="submit" name="submit" value="">
								Travailler
							  	<span class="fa fa-suitcase"></span>
						  </button>
						  </a>
					  </li>
					  <li class="transmitvcart galssescart2 cart cart box_1">
						  <a href="jobs.php?type=hire">
						  <button class="top_transmitv_cart" type="submit" name="submit" value="">
								Embaucher
							  	<span class="fa fa-building"></span>
						  </button>
						  </a>
					  </li>
					</ul>
					<!--//right-->
					<div class="overlay-login text-left">
					  <button type="button" class="overlay-close1">
						<i class="fa fa-times" aria-hidden="true"></i>
					  </button>
					  <div class="wrap">
						<h5 class="text-center mb-4">Connectez-Vous</h5>
						<div class="login-bghny p-md-5 p-4 mx-auto mw-100">
						  <!--/login-form-->
						  <form action="#" method="post">
							<div class="form-group">
							  <p class="login-texthny mb-2">Téléphone ou Addresse email</p>
							  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
								placeholder="Ex: 05181818" name="num" required="">
							</div>
							<div class="form-group">
							  <p class="login-texthny mb-2">Mot de passe</p>
							  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="" name="mdp" required="">
							</div>
							<button type="submit" class="submit-login btn mb-4">Connexion</button>

						  </form>
							
							<div class="form-check mb-2">
								<i class="privacy-policy"><a href="?query=mdp-oublie" style="color:#fff"><span class="fa fa-arrow-right"></span> Mot de passe oublié ?</a></i>
								<i class="privacy-policy"><a href="#" class="overlay-close1" style="color:#fff"><span class="fa fa-arrow-right"></span> Pas encore de compte ?</a></i>
							</div>
						  <!--//login-form-->
						</div>
						<!---->
					  </div>
					</div>
				  </div>
				</div>
				<!--nav-->
				<nav class="navbar navbar-expand-lg navbar-light">
				  <div class="container-fluid serarc-fluid">
					<a class="navbar-brand" href="index.php">
					  <?php echo substr($nom_site,0,3) ?><span class="lohny"><?php echo substr($nom_site,3,1) ?></span><?php echo substr($nom_site,4) ?></a>
					<!-- if logo is image enable this   
							<a class="navbar-brand" href="#index.html">
							  <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
							</a> -->
					<!--/search-right-->
					<div class="search-right">

					  <a href="#search" title="search"><span class="fa fa-search mr-2" aria-hidden="true"></span>
						<span class="search-text">Trouvez votre job</span></a>
					  <!-- search popup -->

					  <div id="search" class="pop-overlay">
						<div class="popup">

						  <form action="search.php" method="post" class="search-box">
							<input type="search" placeholder="Ex: taximan" name="search" required="required" autofocus="">
							<button type="submit" class="btn">Chercher</button>
						  </form>
							<br>
							<center><a href="search.php"><span class="fa fa-info-circle"></span> Ou passez en recherche affinée <b style="color:orange">ici</b> <span class="fa fa-running"></span></a></center>

						</div>

						<a class="close" href="#">×</a>
					  </div>
					  <!-- /search popup -->
					</div>
					<!--//search-right-->
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					  <span class="navbar-toggler-icon fa fa-bars"> </span>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
					  <ul class="navbar-nav ml-auto">
						<li class="nav-item">
						  <a class="nav-link" href="index.php">Accueil</a>
						</li>
						<li class="nav-item active">
						  <a class="nav-link" href="jobs.php">Jobs</a>
						</li>
						<li class="nav-item">
						  <a class="nav-link" href="jobs.php?type=work">Travailler</a>
						</li>
						<li class="nav-item active">
						  <a class="nav-link" href="jobs.php?type=hire">Embaucher</a>
						</li>
						<li class="nav-item">
						  <a class="nav-link" href="about.php">A Propos</a>
						</li>
						<li class="nav-item active">
						  <a class="nav-link" href="contact.php">Contact</a>
						</li>
					  </ul>

					</div>
				  </div>
				</nav>
				<!--//nav-->
			  </header>