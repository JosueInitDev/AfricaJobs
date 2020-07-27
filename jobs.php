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
				<div class="container py-lg-5" id="work">
					<!---------------boutons-------------------->
					<div style="position:sticky; top:0px; text-align:center; background-image: linear-gradient(silver 20%, rgba(255,255,255,0.1)); padding-left:7px; padding-right:7px; padding-bottom:35px; z-index:990;">
						<a href="jobs.php?type=work&categorie=sans-diplome"><button class="btn btn-default" onclick="openNav()" style="border-radius:15px; background:#000; color:#fff; margin-bottom:2px;"><span class="fa fa-car"></span> Jobs Sans Diplôme</button></a> :: 
						<a href="jobs.php?type=work&categorie=avec-diplome"><button class="btn btn-default" onclick="openNav()" style="border-radius:15px; background:#000; color:#fff; margin-bottom:2px;"><span class="fa fa-graduation-cap"></span> Jobs Avec Diplôme</button></a> :: 
						<a href="jobs.php?type=hire&categorie=sans-diplome"><button class="btn btn-default" onclick="openNav()" style="border-radius:15px; background:#000; color:#fff; margin-bottom:2px;"><span class="fa fa-home"></span> Récruter Sans Diplôme</button></a> :: 
						<a href="jobs.php?type=hire&categorie=avec-diplome"><button class="btn btn-default" style="border-radius:15px; background:#000; color:#fff; margin-bottom:2px;"><span class="fa fa-building"></span> Récruter Avec Diplôme</button></a>
					</div>
					<!---------------//boutons-------------------->
					<?php
					$query=$db->prepare('SELECT COUNT(*) FROM jobs WHERE jb_type="sans_diplome"');
					$query->execute();
					$nbr=$query->fetchcolumn();
					if ($nbr>0){
						?>
						<h3 class="hny-title mb-0 text-center" style="font-size:25px"><span>Travaillez</span> sans diplôme</h3>
						<p class="mb-4 text-center">Travaillez maintenant, plusieurs offres d'emploi de tout type sans bésoin de diplôme...</p>
						<div class="welcome-grids row mt-5" id="no-diplome-job-section">
							<?php include('assets/includes/noDiplomeJob.php'); ?>
						</div>
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
						<?php
					}
					else{
						erreur("<span class='fas fa-meh-rolling-eyes'></span> Pouf, contenu vide. Il semble qu'il n'y a encore aucun job sans diplôme ici.");
					} ?>
					<br><hr><br>
					<?php
					$query=$db->prepare('SELECT COUNT(*) FROM jobs WHERE jb_type="avec_diplome"');
					$query->execute();
					$nbr=$query->fetchcolumn();
					if ($nbr>0){
						?>
						<h3 class="hny-title mb-0 text-center" style="font-size:25px">Un diplôme ? <span>C'est par ici <span class="fas fa-running"></span></span></h3>
						<p class="mb-4 text-center">Travaillez maintenant, plusieurs offres d'emploi de tout type quelque soit votre diplôme...</p>
						<div class="welcome-grids row mt-5" id="diplome-job-section">
							<?php include('assets/includes/diplomeJob.php'); ?>
						</div>
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
						<?php
					}
					else{
						erreur("<span class='fas fa-meh-rolling-eyes'></span> Piorr, contenu vide. Il semble que les jobs avec diplôme ne sont pas encore disponibles.");
					} ?>
					<br><hr id="hire"><br>
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

<!--------- keep pour later--------------->
<div class="alert alert-dismissible" style="font-size:20px; position:fixed; top:20vh; left:-100px; display:none; background:#000; z-index:999;" id="keepLater"><p id="successText" style="color:#fff"></p></div>
<script>
	//--------------read clients compte ids gardés for later in cookies----------------
	let x=document.cookie;
	x=x.split("; ");
	let elt;
	let keepLaterIds=[];
	for (let i=0; i<x.length; i++){
		let elt=x[i].substring(x[i].length-1,x[i].length);
		//if (typeof parseInt(elt) === "number"){
		//	console.log(parseInt(elt));
		//	console.log(elt);
		//}
		if (!keepLaterIds.includes(parseInt(elt))){
			keepLaterIds.push(parseInt(elt));
		}
		//console.log(elt==NaN);
	}
	console.log(keepLaterIds);
//	console.log(x);
//	x.forEach(function(item, index){
//		console.log("Le voilà "+item+"->"+index);
//	});
	//--------------//read clients compte ids gardés for later in cookies----------------
	function keepForLater(clid){
		document.cookie = "keep"+clid.toString()+"="+clid;
		showSuccess("Ajouté à vos \"Garder pour plus tard\"");
	}
	function showSuccess(mess){
		document.getElementById('successText').textContent=mess;
		document.getElementById('keepLater').style.display="block";
		$(document).ready(function(){
			$("#keepLater").animate({left: '10px'});
		});
		let tps=3;
		let x=setInterval(function(){
			tps--;
			if (tps<=0){
				document.getElementById('keepLater').style.display="none";
				document.getElementById('keepLater').style.left="-100px";
				clearInterval(x);
			}
		}, 1000);
	}
</script>
<!--------- //keep pour later--------------->
<!-- //jobs -->


<?php include('footer.php'); ?>