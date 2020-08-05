			<?php
			include('assets/includes/constants.php');
			$type=(isset($_GET['type']))?(htmlspecialchars($_GET['type'])):'Bienvenue';
			$titre_page='Jobs :: '.$nom_site;
			$description_page='Trouvez facilement un travail ou un employé où que vous soyez partout en Afrique. A la recherche d\'emploi ? Vous êtes au bon endroit. Ou bien souhaitez-vous embaucher quelqu\'un ? Vous êtes aussi au bon endroit. Essayez nos services maintenant sans plus tarder.';
			$title="Jobs";
			include('top.php');
			?>
			<div class="breadcrumb-contentnhy">
				<div class="container">
					<nav aria-label="breadcrumb">
						<h2 class="hny-title text-center"><?php echo $title ?></h2>
						<ol class="breadcrumb mb-0">
							<li><a href="index.php">Accueil</a>
							<span class="fa fa-angle-double-right"></span></li>
							<li class="active"><a href="jobs.php"><?php echo $title ?></a>
							<span class="fa fa-angle-double-right"></span></li>
							<li class="active"><?php echo $type ?></li>
						</ol>
					</nav>
				</div>
			</div>
		</div> <!-- don't delete this -->
	</div> <!-- don't delete this -->
</section> <!-- don't delete this -->


<!-- jobs -->
<?php
$categorie=(isset($_GET['categorie']))?(htmlspecialchars($_GET['categorie'])):'';
$cat=(isset($_GET['cat']))?(htmlspecialchars($_GET['cat'])):'tout';
switch($type){
	case 'work': //aafficher all les jobs
		switch($categorie){
			case 'sans-diplome':
				jobSection($cl_nom, "sans diplôme", "sans_diplome", "sans-diplome", $cat, $type);
			break;
			case 'avec-diplome':
				jobSection($cl_nom, "avec diplôme", "avec_diplome", "avec-diplome", $cat, $type);
			break;
			default:
				notFound("Oups ! Requette introuvable <span class='fa fa-frown'></span>");
			break;
		}
	break;
	case 'hire': //afficher clients profiles
		switch($categorie){
			case 'sans-diplome':
				userSection($cl_nom, "non diplômés", "sans_diplome", "sans-diplome", $cat, $type);
			break;
			case 'avec-diplome':
				userSection($cl_nom, "diplômés", "avec_diplome", "avec-diplome", $cat, $type);
			break;
			default:
				notFound("Oups ! Requette introuvable <span class='fa fa-frown'></span>");
			break;
		}
	break;
	case 'Bienvenue': //afficher all the jobs and clients profiles
		?>
		<section class="w3l-grids-hny-2">
			<div class="grids-hny-2-mian py-5">
				<div class="container-fluid py-lg-5" id="work">
					<!---------------boutons-------------------->
					<div class="d-none d-md-block" style="position:sticky; top:0px; text-align:center; background-image: linear-gradient(black 10%, rgba(255,255,255,0.1)); padding-left:7px; padding-right:7px; padding-bottom:35px; z-index:990;">
						<a href="jobs.php?type=work&categorie=sans-diplome"><button class="btn btn-default" style="border-radius:15px; background:#000; color:#fff; margin-bottom:2px;"><span class="fa fa-car"></span> Jobs Sans Diplôme</button></a> :: 
						<a href="jobs.php?type=work&categorie=avec-diplome"><button class="btn btn-default" style="border-radius:15px; background:#000; color:#fff; margin-bottom:2px;"><span class="fa fa-graduation-cap"></span> Jobs Avec Diplôme</button></a> :: 
						<a href="jobs.php?type=hire&categorie=sans-diplome"><button class="btn btn-default" style="border-radius:15px; background:#000; color:#fff; margin-bottom:2px;"><span class="fa fa-home"></span> Récruter Sans Diplôme</button></a> :: 
						<a href="jobs.php?type=hire&categorie=avec-diplome"><button class="btn btn-default" style="border-radius:15px; background:#000; color:#fff; margin-bottom:2px;"><span class="fa fa-building"></span> Récruter Avec Diplôme</button></a>
					</div>
					<!---------------//boutons-------------------->
					<!-- offre emplois -->
					<section class="w3l-grids-hny-2">
						<div class="grids-hny-2-mian py-5">
							<div class="container-fluid py-lg-5" style="margin-right:0px; margin-left:0px;">
								<div class="row">
									<div class="col-md-6" style="padding:7px;">
										<div style="border-style:outset; border-radius:7px; background:#f7f7f7;">
											<div style="background:#f1f1f1">
												<h3 class="hny-title mb-0 text-center" style="font-size:25px"><span>Jobs</span> sans diplôme</h3>
												<p class="mb-4 text-center">Travaillez maintenant, plusieurs offres d'emploi de tout type...</p>
												<hr>
											</div>
											<?php
											$query=$db->prepare('SELECT COUNT(*) FROM jobs WHERE jb_type="sans_diplome"');
											$query->execute();
											$nbr=$query->fetchcolumn();
											if ($nbr>0){ ?>
												<div class="row welcome-grids mt-5" id="no-diplome-job-section" style="margin-right:0px; margin-left:0px;">
													<?php include('assets/includes/noDiplomeJob.php'); ?>
												</div>
												<?php
												//this code is created by Josué - jose.init.dev@gmail.com
											} ?>
											<!-- ajax reload part of page -->
											<script>
												window.setInterval(function(){
													loadDoc();
												}, 3000);
												function loadDoc() {
												  var xhttp = new XMLHttpRequest();
												  xhttp.onreadystatechange = function() {
													if (this.readyState == 4 && this.status == 200) {
													  document.getElementById("no-diplome-job-section").innerHTML =
													  this.responseText;
													}
												  };
												  xhttp.open("GET", "assets/includes/noDiplomeJob.php", true);
												  xhttp.send();
												}
											</script>
											<!-- //ajax reload part of page -->
										</div>
									</div>
									<div class="col-md-6" style="padding:7px;">
										<div style="border-style:outset; border-radius:7px; background:#f7f7f7;">
											<div style="background:#f1f1f1">
												<h3 class="hny-title mb-0 text-center" style="font-size:25px">Jobs <span>avec diplôme</span></h3>
												<p class="mb-4 text-center">Travaillez maintenant, plusieurs offres d'emploi de tout type...</p>
												<hr>
											</div>
											<?php
											$query=$db->prepare('SELECT COUNT(*) FROM jobs WHERE jb_type="avec_diplome"');
											$query->execute();
											$nbr=$query->fetchcolumn();
											if ($nbr>0){ ?>
												<div class="row welcome-grids mt-5" id="diplome-job-section" style="margin-right:0px; margin-left:0px;">
													<?php include('assets/includes/diplomeJob.php'); ?>
												</div>
												<?php
											} ?>
											<!-- ajax reload part of page -->
											<script>
												window.setInterval(function(){
													loadDoc2();
												}, 3500);
												function loadDoc2() {
												  var xhttp = new XMLHttpRequest();
												  xhttp.onreadystatechange = function() {
													if (this.readyState == 4 && this.status == 200) {
													  document.getElementById("diplome-job-section").innerHTML =
													  this.responseText;
													}
												  };
												  xhttp.open("GET", "assets/includes/diplomeJob.php", true);
												  xhttp.send();
												}
											</script>
											<!-- //ajax reload part of page -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
					<!-- //offre emplois -->

					<hr id="hire">
					<?php
					$query=$db->prepare('SELECT COUNT(*) FROM clients WHERE cl_type="employer" AND cl_cherche_job=1');
					$query->execute();
					$nbr=$query->fetchcolumn();
					if ($nbr>0){
						?>
						<h3 class="hny-title mb-0 text-center" style="font-size:25px">Embaucher quelqu'un ? <span>Ils cherchent un job ici <span class="fa fa-hand-o-down"></span></span></h3>
						<p class="mb-4 text-center">Trouvez la personne à embaucher sans vous prendre la tête... Cliquez sur <strong>voir plus</strong> pour les trier.</p>
						<div class="welcome-grids row mt-5" id="cv-employer-section">
							<?php include('assets/includes/cvEmployer.php'); ?>
						</div>
						<!-- ajax reload part of page -->
						<script>
							window.setInterval(function(){
								loadDoc3();
							}, 3200);
							function loadDoc3() {
							  var xhttp = new XMLHttpRequest();
							  xhttp.onreadystatechange = function() {
								if (this.readyState == 4 && this.status == 200) {
								  document.getElementById("cv-employer-section").innerHTML =
								  this.responseText;
								}
							  };
							  xhttp.open("GET", "assets/includes/cvEmployer.php", true);
							  xhttp.send();
							}
						</script>
						<!-- //ajax reload part of page -->
						<?php
					}
					else{
						erreur("<span class='fas fa-meh-rolling-eyes'></span> Aaih, contenu vide. A parament, il n'y personne qui cherche du travail.");
					} ?>
				</div>
			</div>
		</section>
		<?php
	break;
	default:
		notFound("Oups ! Requette introuvable <span class='fa fa-frown'></span>");
	break;
}
?>

<!-- //inscription-->
<section class="w3l-subscription-6">
	<div class="subscription-infhny">
		<div class="container-fluid">
			<div class="subscription-grids row" style="background-color: #f4f4f4">
				<div class="subscription-right form-right-inf col-lg-6 p-md-5 p-4">
					<div class="p-lg-5 py-md-0 py-3">
						<h3 class="hny-title">Créez un compte et trouvez le <span>job de votre rêve maintenant <i class="fas fa-grin-hearts"></i></span></h3>
							<p>Trouver une bonne, un taximan, un couturier, un garagiste (...), un manager, un ingénieur, un technicien (...)</p>
						<form action="search.php" method="post" class="search-box mt-lg-5 mt-4">
							<div class="forms-gds">
								<div class="form-input">
									<input type="email" name="search" placeholder="Entrez une adresse mail pour créer votre compte" required="" style="background:#000; color:#fff">
								</div>
								<div class="form-input"><button class="btn">Inscription</button></div>
							</div>
						</form>
					</div>
				</div>
				<div class="subscription-left forms-25-info col-lg-6 ">

				</div>
			</div>
		</div>
		</div>
</section>
<!-- //inscription-->

<!-- //jobs -->


<?php include('footer.php'); ?>