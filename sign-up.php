			<?php
			session_start();

			include('assets/includes/constants.php');
			$type=(isset($_GET['type']))?(htmlspecialchars($_GET['type'])):'nouveau';
			$titre_page='Jobs :: '.$nom_site;
			$description_page='Créez un compte sur '.$nom_site.' et trouvez le job de vos rêves. Nos jobs sont pour tout le monde, que vous ayez un diplôme ou non. Jobs sans diplôme (femme de ménage, garagistre, chauffeur, coiffeur, ménuisier (...) ; Jobs avec diplôme (technicien, ingénieur, comptable, architecte (...)).';
			$title="Nouveau Compte";
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


<?php
//------keep d'où we come link. We will get back there après création du compte--------
if (!isset($_SESSION['signupBackLink'])){
	if (isset($_SERVER['HTTP_REFERER'])){ //on come frome une autre page du site
		$_SESSION['signupBackLink'] = $_SERVER['HTTP_REFERER'];
	}else{
		$_SESSION['signupBackLink'] = "index.php";
	}
}
//------//keep d'où we come link. We will get back there après création du compte--------

$option=(isset($_GET['option']))?(htmlspecialchars($_GET['option'])):'nouveau';
if ($cl_id>0){
	?><script>window.location.href="compte.php";</script><?php
}else{ //start else
switch($type){
	case 'nouveau': //new account
		switch($option){
			case 'nouveau':
				?>
				<div class="container" style="margin-top:6vw; margin-bottom:6vw;">
					<div class="row">
						<div class="col-12">
							
							<div class="progress">
							  <div class="progress-bar progress-bar-primary progress-bar-striped active" role="progressbar" style="width:33.333%; font-size:15px;">
								Informations
							  </div>
							  <div class="progress-bar progress-bar-warning" role="progressbar" style="width:33.333%; font-size:15px;">
								Formations
							  </div>
							  <div class="progress-bar progress-bar-danger" role="progressbar" style="width:33.333%; font-size:15px;">
								Photos
							  </div>
							</div>
							
							<?php
							$numMail=(isset($_POST['numMail']))?(htmlspecialchars($_POST['numMail'])):'';
							$role=(isset($_POST['role']))?(htmlspecialchars($_POST['role'])):'aucun';
							$isNum=true; //detects if $numMail is et number or un email
							if (preg_match("#@.#", $numMail)){
								$isNum=false; //not un numéro but a mail
							}
							if ($role!='aucun' and $role=='demandeur'){ //demander de job
								?>
								<?php
							}else if ($role!='aucun' and $role=='recruteur'){ //recruteur (entreprise)

							}else{ //$role n'a pas été reçu

							}
							?>
							<form class="row" method="post" action="sign-up.php?type=nouveau&option=etape-2">
								<div class="form-group col-6 col-md-4">
									<label for="nom">Nom Prénom (<b style="color:red">*</b>)</label>
									<input type="text" class="form-control" id="nom" name="nom" maxlength="20" required="">
								</div>
								<div class="form-group col-6 col-md-4">
									<label for="tel">Téléphone (<b style="color:red">*</b>)</label>
									<?php if ($isNum){ ?>
									<input type="number" class="form-control" id="tel" name="tel" min="0" required="" value="<?php echo $numMail ?>">
									<?php } else{ ?>
									<input type="number" class="form-control" id="tel" name="tel" min="0" required="">
									<?php } ?>
								</div>
								<div class="form-group col-6 col-md-4">
									<label for="mail">Email</label>
									<input type="email" class="form-control" id="mail" name="mail" maxlength="60">
								</div>
								<div class="form-group col-6 col-md-4">
									<label for="role">Type de compte (<b style="color:red">*</b>)</label>
									<select class="form-control" id="role" name="role" required="">
										<?php if ($role!='aucun'){ ?>
										<option value="<?php echo $role ?>" selected><?php echo $role ?></option>
										<?php } ?>
										<option value="demandeur">Demandeur d'emploi (cherche travail)</option>
										<option value="recruteur">Recruteur (cherche employé)</option>
									</select>
								</div>
								<div class="form-group col-12 col-md-4">
									<label for="mdp">Mot de passe (<b style="color:red">*</b>)</label><br>
									<label>Utiliser <i class="fa fa-hand-o-right"></i> <span id="autoMdp" style="background:lime; padding:2px; border-radius:5px;"><?php echo passwordGenerator(8); ?></span> <button onclick="useAutoPassword()" class="btnOrange btn btn-sm">oui</button> <button onclick="newAutoPassword()" class="btnOrange btn btn-sm">nouveau</button> | <button class="btnBlack" onclick="showMdp()" id="eyeContent"><span id="mdpEye" class="fa fa-eye"></span></button></label>
									<input type="password" class="form-control" id="mdp" name="mdp" required="">
								</div>
								<div class="form-group col-6 col-md-4">
									<label for="chercheJob">A la recherche d'un job ? (<b style="color:red">*</b>)</label>
									<select class="form-control" id="chercheJob" name="chercheJob" required="">
										<option value="oui" selected>Oui</option>
										<option value="non">Non</option>
									</select>
								</div>
								<div class="from-group col-12">
									<input type="hidden" name="next" value="true">
									<button type="submit" class="btn btnBlack btn-lg">Suivant >></button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<script>
					//------mdp generation-----
					function useAutoPassword(){
						document.getElementById('mdp').value=document.getElementById('autoMdp').textContent;
					}
					//------//mdp generation-----
					//------use mdp generator-----
					function newAutoPassword(){
						let mdp.write('<?php echo passwordGenerator(8); ?>');
						document.getElementById('autoMdp').textContent=mdp;
						document.getElementById('mdp').value=mdp;
					}
					//------//use mdp generator-----
					//----show/hide mdp-----
					function showMdp(){
						let eye=document.getElementById('eyeContent');
						let mdp=document.getElementById('mdp');
						if (mdp.type=='password'){
							mdp.type='text';
							eye.innerHTML='<span id="mdpEye" class="fa fa-eye-slash"></span>';
						}else{
							mdp.type='password';
							eye.innerHTML='<span id="mdpEye" class="fa fa-eye"></span>';
						}
					}
					//----//show/hide mdp-----
				</script>
				<?php
			break;
			case 'etape-2':
				if (isset($_POST['next'])){ //make sure previous step is completed
				?>
				<div class="container" style="margin-top:6vw; margin-bottom:6vw;">
					<div class="row">
						<div class="col-12">
							
							<div class="progress">
							  <div class="progress-bar progress-bar-primary" role="progressbar" style="width:33.333%; font-size:15px;">
								<span class="fa fa-check-circle"> Informations</span>
							  </div>
							  <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" style="width:33.333%; font-size:15px;; font-size:15px;">
								Formations
							  </div>
							  <div class="progress-bar progress-bar-danger" role="progressbar" style="width:33.333%; font-size:15px;">
								Photos
							  </div>
							</div>
							
							<form class="row" method="post" action="sign-up.php?type=nouveau&option=etape-3" id="formFormations">
								<div class="form-group col-6">
									<label for="diplome">Avez-vous un diplôme ? (<b style="color:red">*</b>)</label>
									<select class="form-control" id="diplome" name="diplome" required="">
										<option value="oui">Oui</option>
										<option value="non" selected>Non</option>
									</select>
								</div>
								<div class="form-group col-6">
									<label for="niveau" id="niveau1" style="display:none">Niveau de formation (ou titre diplôme) (<b style="color:red">*</b>)</label>
									<label for="niveau" id="talent1">Que savez-vous faire ? (<b style="color:red">*</b>)</label>
									<input type="text" class="form-control" id="niveau" name="niveau" maxlength="50" required="" placeholder="Ex: permis de conduire, menuiserie, ménage ...">
								</div>
								<div class="form-group col-12">
									<label for="experience">Vos expériences (<b style="color:red">*</b>)</label>
									<input type="text" class="form-control" id="experience" name="experience" maxlength="100" placeholder="Ex: Ancien couturier pendant 3 ans ...">
								</div>
								<div class="form-group col-12">
									<label for="desc">Description (<b style="color:red">*</b>)(que diriez-vous à votre employeur ?)</label> :: <label id="remain">245 caractères restants</label>
									<textarea class="form-control" id="desc" maxlength="245" name="desc" required="" onkeyup="counter()" rows="5"></textarea>
								</div>
								<div class="from-group col-12">
									<input type="hidden" name="next" value="true">
									<button type="submit" class="btn btnBlack btn-lg">Suivant >></button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<script>
					//-----caractors remain counters----
					function counter(){
						let caracts=document.getElementById('desc').value.length;
						document.getElementById('remain').textContent=245-caracts+" caractères restants";
					}
					//-----//caractors remain counters----
					let form=document.getElementById('formFormations');
					form.diplome.addEventListener('change', function(){
						if (form.diplome.value=="oui"){
							document.getElementById('niveau1').style.display='block';
							document.getElementById('talent1').style.display='none';
							form.niveau.placeholder="Ex: BTS, Licence 1, Technicien en réseaux informatique ...";
							form.experience.placeholder="Ex: 3 ans d'expérience en ingénierie informatique ...";
						}else{
							document.getElementById('niveau1').style.display='none';
							document.getElementById('talent1').style.display='block';
							form.niveau.placeholder="Ex: permis de conduire, menuiserie, ménage ...";
							form.experience.placeholder="Ex: Ancien couturier pendant 3 ans ...";
						}
					});
				</script>
				<?php
				}else{
					erreurImage('Mince, l\'étape précedente n\'a pas été terminée. Bgrrrr');
				}
			break;
			case 'etape-3':
				if (isset($_POST['next'])){ //make sure previous step is completed
				?>
				<div class="container" style="margin-top:6vw; margin-bottom:6vw;">
					<div class="row">
						<div class="col-12">
							
							<div class="progress">
							  <div class="progress-bar progress-bar-primary" role="progressbar" style="width:33.333%; font-size:15px;">
								<span class="fa fa-check-circle"> Informations</span>
							  </div>
							  <div class="progress-bar progress-bar-warning" role="progressbar" style="width:33.333%; font-size:15px;; font-size:15px;">
								<span class="fa fa-check-circle"> Formations</span>
							  </div>
							  <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" style="width:33.333%; font-size:15px;">
								Photos
							  </div>
							</div>
							
							<form method="post" action="sign-up.php?type=nouveau&option=fin">
								<input type="hidden" name="next" value="true">
								<button type="submit" class="btn btnOrange">Ignorer cette étape</button>
							</form>
							<hr>
							
							<form class="row" method="post" action="sign-up.php?type=nouveau&option=fin" enctype="multipart/form-data">
								<div class="form-group col-12">
									<label for="photo"><span class="fa fa-user"></span> Photo de profile</label>
									<?php include('assets/includes/croppie.html'); ?>
<!--									<iframe src="assets/includes/croppie.html" style="border:none; height:100%;"></iframe>-->
<!--									<input type="file" class="form-control" id="photo" name="photo" >-->
								</div>
								<div class="form-group col-12">
									<label for="photoEntreprise"><span class="fa fa-building"></span> Photo de votre entreprise/société</label>
									<?php include('assets/includes/croppie.html'); ?>
<!--									<input type="file" class="form-control" id="photoEntreprise" name="photoEntreprise" >-->
								</div>
								<div class="form-group col-6">
									<label for="cv"><span class="fa fa-file"></span> Votre CV</label>
									<input type="file" class="form-control" id="cv" name="cv" >
								</div>
								<div class="from-group col-12">
									<input type="hidden" name="next" value="true">
									<button type="submit" class="btn btnBlack btn-lg">Terminer <span class="fa fa-check-circle"></span></button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<?php
				}else{
					erreurImage('Mince, l\'étape précedente n\'a pas été terminée. Bgrrrr');
				}
			break;
			case 'fin':
				if (isset($_POST['next'])){ //make sure previous step is completed
				?>
				<div class="container" style="margin-top:6vw; margin-bottom:6vw;">
					<div class="row">
						<div class="col-12">
							
							<div class="progress">
							  <div class="progress-bar progress-bar-primary" role="progressbar" style="width:33.333%; font-size:15px;">
								<span class="fa fa-check-circle"> Informations</span>
							  </div>
							  <div class="progress-bar progress-bar-warning" role="progressbar" style="width:33.333%; font-size:15px;; font-size:15px;">
								<span class="fa fa-check-circle"> Formations</span>
							  </div>
							  <div class="progress-bar progress-bar-danger" role="progressbar" style="width:33.333%; font-size:15px;">
								<span class="fa fa-check-circle"> Photos</span>
							  </div>
							</div>
							
							<div class="alert alert-success">
								<center>
								<h3>Yehhh <span class="fas fa-grin-alt"></span></h3>
								<p>Compte créé avec succès, merci de patenter <b id="sec"></b> sec svp.</p>
								</center>
							</div>
							<script>
								let tps=7;
								let x=setInterval(function(){
									document.getElementById('sec').textContent=tps;
									if (tps<=0){
										let link="<?php echo $_SESSION['signupBackLink'] ?>";
										<?php
										$_SESSION['signupBackLink']='new-account';
										?>
										window.location.href=link;
										clearInterval(x);
									}
									tps--;
								}, 1000);
							</script>
						</div>
					</div>
				</div>
				<?php
				}else{
					erreurImage('Mince, l\'étape précedente n\'a pas été terminée. Bgrrrr');
				}
			break;
			default:
				notFound("Aiiiih, où est-elle ???");
			break;
		}
	break;
	case 'recuperation': //mdp oublé
		
	break;
	default:
		notFound("Pouffff, quelle galère ......");
	break;
}
} //end else
?>

<?php include('footer.php'); ?>