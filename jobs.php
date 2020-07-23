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
							<li class="active"><a href="<?php echo $_SERVER['REQUEST_URI'] ?>"><?php echo $title ?></a>
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
	case 'work':
		switch($categorie){
			case 'sans-diplome':
				jobSection("Jobs", "pas bésoin de diplôme", "sans_diplome", $categorie, $cat);
			break;
			case 'avec-diplome':
				?>
				<section class="w3l-grids-hny-2">
					<div class="grids-hny-2-mian py-5">
						<div class="container py-lg-5">
							<h3 class="hny-title mb-0 text-center"><span>Nos Jobs</span> :: <?php echo $type ?></h3>
							<hr>
							<div class="py-md-9">
								sfkjsfskg
							</div>
						</div>
					</div>
				</section>
				<?php
			break;
			default:
				notFound("Oups ! Requette introuvable <span class='fa fa-frown'></span>");
			break;
		}
	break;
	case 'hire':
		
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
						<h3 class="hny-title">Créer un compte et trouver le <span>job de son rêve !</span></h3>
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