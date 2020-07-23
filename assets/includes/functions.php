<?php
//this document contient all the fonctions du site
include('identifiants.php');

function notFound($text){
	?>
	<div class="container alert alert-dismissible" style="background:#fff; padding:50px; border:1px solid silver; border-radius:50px;">
		<button type="button" class="close" data-dismiss="alert">&and;</button>
		<center>
			<h1 style="font-size:7vw; font-family:roboto; color:silver;">OUPS <span style="font-size:2vw; font-family:roboto; color:silver;">ERREUR</span> 404</h1>
			<h4>Nous n'avons pas pu trouver cette page</h4>
			<p><?php echo $text ?> ::: <a href="index.php" style="color:orange">Retour à l'accueil</a></p>
			<img src="assets/images/dog-404-page.jpg" class="img-fluid" style="max-height:500px">
		</center>
	</div>
	<?php
}

function erreur($text){
	?>
	<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert">&and;</button>
		<p><?php echo $text ?></p>
	</div>
	<?php
}

function jobSection($Elt, $EltTxt, $type, $categorie, $cat){
	?>
	<section class="w3l-grids-hny-2">
		<div class="grids-hny-2-mian py-5">
			<div class="container py-lg-5">
				<h3 class="hny-title mb-0 text-center"><span>Nos <?php echo $Elt ?></span> <span class="fa fa-hand-o-right"></span> <?php echo $EltTxt ?></h3>
				<hr>
				<!---------------boutons-------------------->
				<div style="position:sticky; top:0px; text-align:center; background-image: linear-gradient(silver 20%, rgba(255,255,255,0.1)); padding-left:7px; padding-right:7px; padding-bottom:35px; z-index:990;">
					<button class="btn btn-default" onclick="openNav()" style="border-radius:15px; background:#000; color:#fff; margin-bottom:2px;"><span class="fa fa-align-center"></span> Filtrer Les <?php echo $Elt ?></button> :: 
					<a href="jobs.php?type=work&categorie=sans-diplome"><button class="btn btn-default" onclick="openNav()" style="border-radius:15px; background:#000; color:#fff; margin-bottom:2px;"><span class="fa fa-car"></span> Jobs Sans Diplôme</button></a> :: 
					<a href="jobs.php?type=work&categorie=avec-diplome"><button class="btn btn-default" onclick="openNav()" style="border-radius:15px; background:#000; color:#fff; margin-bottom:2px;"><span class="fa fa-graduation-cap"></span> Jobs Avec Diplôme</button></a> :: 
					<a href="jobs.php?type=hire&categorie=sans-diplome"><button class="btn btn-default" onclick="openNav()" style="border-radius:15px; background:#000; color:#fff; margin-bottom:2px;"><span class="fa fa-home"></span> Récruter Sans Diplôme</button></a> :: 
					<a href="jobs.php?type=hire&categorie=avec-diplome"><button class="btn btn-default" style="border-radius:15px; background:#000; color:#fff; margin-bottom:2px;"><span class="fa fa-building"></span> Récruter Avec Diplôme</button></a>
				</div>
				<!---------------//boutons-------------------->
				<!---------------side menu----------------------------->
				<div id="mySidenav" class="sidenav">
					<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&and;</a>
					<p>Afficher les jobs</p>
					<i>:: Sans Diplôme ::</i>
					<a href="jobs.php?type=work&categorie=sans-diplome&cat=menagere"><span class="fa fa-home"></span> Ménagère</a>
					<a href="jobs.php?type=work&categorie=sans-diplome&cat=chauffeur"><span class="fa fa-taxi"></span> Chauffeur</a>
					<a href="jobs.php?type=work&categorie=sans-diplome&cat=commercant"><span class="fa fa-shopping-basket"></span> Commerçant</a>
					<a href="jobs.php?type=work&categorie=sans-diplome&cat=macon"><span class="fa fa-building-o"></span> Maçon</a>
					<a href="jobs.php?type=work&categorie=sans-diplome&cat=garagistre"><span class="fa fa-car"></span> Garagiste</a>
					<a href="jobs.php?type=work&categorie=sans-diplome&cat=couturier"><span class="fa fa-child"></span> Couturier</a>
					<a href="jobs.php?type=work&categorie=sans-diplome&cat=menuisier"><span class="fa fa-gavel"></span> Ménuisier</a>
					<a href="jobs.php?type=work&categorie=sans-diplome&cat=cybercafe"><span class="fa fa-laptop"></span> CyberCafé</a>
					<a href="jobs.php?type=work&categorie=sans-diplome&cat=autre"><span class="fa fa-list-alt"></span> Autre</a>
					<hr>
					<i>:: Avec Diplôme ::</i>
					<a href="jobs.php?type=work&categorie=avec-diplome"><span class="fa fa-graduation-cap"></span> Tout</a>
					<hr>
					<p>Récruter les personnes</p>
					<a href="jobs.php?type=hire&categorie=sans-diplome"><span class="fa fa-home"></span> Sans diplôme</a>
					<a href="jobs.php?type=hire&categorie=avec-diplome"><span class="fa fa-building"></span> Avec diplôme</a>
				</div>
				<!---------------//side menu----------------------------->
				<div class="welcome-grids row mt-5" id="main">
					<?php
					$page=(isset($_GET['p']))?(htmlspecialchars($_GET['p'])):1;
					$page = (int) $page;
					$maxElts = 24;
					$min=0;
					//echo $page;
					if ($page>=2){
						$min=($page-1)*$maxElts;
					}
					if ($cat=='tout'){
						$query=$db->prepare('SELECT COUNT(*) FROM jobs WHERE jb_type=:type');
						$query->bindValue(':type', $type, PDO::PARAM_STR);
						$query->execute();
						$nbr=$query->fetchcolumn();
						$query=$db->prepare('SELECT jb_id, jb_photo, jb_titre FROM jobs WHERE jb_type=:type ORDER BY jb_id DESC LIMIT :min, :max');
						$query->bindValue(':type', $type, PDO::PARAM_STR);
						$query->bindValue(':min', $min, PDO::PARAM_INT);
						$query->bindValue(':max', $maxElts, PDO::PARAM_INT);
						$query->execute();
					}else {
						$query=$db->prepare('SELECT COUNT(*) FROM jobs WHERE jb_type=:type AND jb_categorie=:cat');
						$query->bindValue(':cat', $cat, PDO::PARAM_STR);
						$query->bindValue(':type', $type, PDO::PARAM_STR);
						$query->execute();
						$nbr=$query->fetchcolumn();
						$query=$db->prepare('SELECT jb_id, jb_photo, jb_titre FROM jobs WHERE jb_type=:type AND jb_categorie=:cat ORDER BY jb_id DESC LIMIT :min, :max');
						$query->bindValue(':type', $type, PDO::PARAM_STR);
						$query->bindValue(':min', $min, PDO::PARAM_INT);
						$query->bindValue(':max', $maxElts, PDO::PARAM_INT);
						$query->bindValue(':cat', $cat, PDO::PARAM_STR);
						$query->execute();
					}
					if ($nbr==0){
						erreur("Aucun résultat trouvé <span class='fa fa-frown'></span>. Il semble qu'il n'y a rien ici pour l'instant. Essayez de filtrer en cliquand sur le bouton \"Filtrer Les Jobs\" ci-dessus.");
					}else{
						while ($data=$query->fetch()){
							?>
							<div class="col-lg-2 col-md-4 col-4 welcome-image">
								<div class="boxhny13" style="background-image:url('assets/images/jobs/<?php echo $data['jb_photo'] ?>'); height:160px; width:160px; border-radius:50%; background-position:center; background-size:cover;">
									<a href="job-infos.php?jb=<?php echo $data['jb_id'] ?>">
										<div class="boxhny-content">
											<h3 class="title"><span class="fa fa-eye"></span> Détails</h3>
										</div>
									</a>
								</div>
								<?php if (strlen($data['jb_titre'])<=30) echo '<h4 class="title"><a href="job-infos.php?jb='.$data['jb_id'].'">'.$data['jb_titre'].'</a></h4>';
								else echo '<h4 class="title"><a href="job-infos.php?jb='.$data['jb_id'].'">'.substr($data['jb_titre'],0,28).'...</a></h4>'; ?>
							</div>
							<?php
						}
					}
					$query->closeCursor();
					?>
				</div>
				<hr>
				<!-- pages -->
				<div class="container">
					<div class="row">
						<div class="col-12" style="margin-bottom: 50px">
							<center>
								<?php
								$query=$db->prepare('SELECT COUNT(*) FROM jobs WHERE jb_type=:type');
								$query->bindValue(':type', $type, PDO::PARAM_STR);
								$query->execute();
								$nbr_elt=$query->fetchcolumn();

								$nbr_pages = $nbr_elt/$maxElts; //$maxElts est le nombre de produits par page (defini ci-haut)
								?>
								<ul class="pagination">
									<?php
									if ($page<=1){
										?>
										<li class="page-item disabled"><a class="page-link" href="" style="color:silver">Précédent</a></li>
										<?php
									}
									else{
										?>
										<li class="page-item"><a class="page-link" href="jobs.php?type=work&categorie=sans-diplome&p=<?php echo $page-1; ?>" style="color:#000">Précédent</a></li>
										<?php
									}
									//--------------
									$limit=0;
									for ($p=0; $p<$nbr_pages; $p++){
										if ($p==$page-1){ //nous sommes sur la page en question
											?>
											<li class="page-item active"><a class="page-link" href="jobs.php?type=work&categorie=sans-diplome&p=<?php echo $page; ?>" style="color:#000; background:orange;"><?php echo $p+1; ?></a></li>
											<?php
										}
										else{
											?>
											<li class="page-item"><a class="page-link" href="jobs.php?type=work&categorie=sans-diplome&p=<?php echo $p+1; ?>" style="color:#000"><?php echo $p+1; ?></a></li>
											<?php
										}
										$limit=$p;
									}
									//---------------
									if ($limit<$page){ //i.e c'est la dernière page
										?>
										<li class="page-item disabled"><a class="page-link" href="" style="color:silver">Suivant</a></li>
										<?php
									}
									else{
										?>
										<li class="page-item"><a class="page-link" href="jobs.php?type=work&categorie=sans-diplome&p=<?php echo $page+1; ?>" style="color:#000">Suivant</a></li>
										<?php
									}
								?>
								</ul>
							</center>
						</div>
					</div>
				</div>
				<!-- //pages -->
			</div>
		</div>
	</section>
	<?php
}
?>