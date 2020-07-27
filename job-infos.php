			<?php
			include('assets/includes/constants.php');
			include('assets/includes/identifiants.php');
			$jb=(isset($_GET['jb']))?(htmlspecialchars($_GET['jb'])):'Bienvenue';
			$jb=strip_tags($jb);
			$query=$db->prepare('SELECT * FROM jobs WHERE jb_id=:jb');
			$query->bindValue(':jb', $jb, PDO::PARAM_INT);
			$query->execute();
			$data=$query->fetch();

			$query3=$db->prepare('SELECT * FROM entreprises WHERE cl_id=:cl');
			$query3->bindValue(':cl', $data['cl_id'], PDO::PARAM_INT);
			$query3->execute();
			$data3=$query3->fetch();

			$titre_page=$data['jb_titre'].' :: '.$nom_site;
			$description_page=$data['jb_description'];
			$title="Retour vers Jobs";
			include('top.php');
			?>
			<div class="breadcrumb-contentnhy">
				<div class="container">
					<nav aria-label="breadcrumb">
						<h2 class="hny-title text-center">Jobs</h2>
						<ol class="breadcrumb mb-0">
							<li><a href="index.php">Accueil</a>
							<span class="fa fa-angle-double-right"></span></li>
							<li class="active"><a href="<?php echo $_SERVER['HTTP_REFERER'] ?>"><?php echo $title ?></a>
							<span class="fa fa-angle-double-right"></span></li>
							<li class="active"><?php echo $data['jb_titre'] ?></li>
						</ol>
					</nav>
				</div>
			</div>
		</div> <!-- don't delete this -->
	</div> <!-- don't delete this -->
</section> <!-- don't delete this -->

<div class="container" style="margin-top: 7vw; margin-bottom: 7vw;">
	<div class="row">
		<?php
		$type=(isset($_GET['type']))?(htmlspecialchars($_GET['type'])):'default';
		switch($type){
			case 'default':
				
				viewsNumber("offre d'emploi", $jb, $cl_nom); //enregistre les vus and who views
				
				?>
				<div class="col-md-8">
					<div class="row" style="padding:10px;">
						<div class="col-12" style="padding:10px;">
							<div style="border-left:3px double darkorange; border-bottom:3px double darkorange; padding-left:7px;">
								<h3><?php echo $data['jb_titre'] ?></h3>
							</div>
							<a href="#employeur" class="d-md-none"><button class="btn btn-sm" style="background:#000; border-radius:25px; color:#fff;">Voir infos employeur</button></a><br>
							<div class="row">
								<div class="col-3">
									<span class="fa fa-map-marker"></span> <?php echo $data['jb_pays'] ?> <span class="fa fa-arrow-right"></span> <?php echo $data['jb_ville'] ?>
								</div>
								<div class="col-3">
									<span class="fa fa-suitcase"></span> <?php echo $data['jb_duree'] ?>
								</div>
								<div class="col-3">
									<span class="fa fa-graduation-cap"></span> <?php echo $data['jb_niveau'] ?>
								</div>
								<div class="col-3">
									<span class="fa fa-clock"></span> <?php echo duree($data['jb_date']) ?>
								</div>
							</div>
							<br>
							<h6 style="color:darkorange"><b>Détails du poste</b></h6>
							<hr>
							<p style="text-align: justify"><?php echo $data['jb_description'] ?></p>

							<aside class="button-log usernhy">
							  <?php if ($cl_id<=0){ ?>
								<a class="btn-open" href="#" >
								  <span class="fa fa-hand-o-right bounce"></span><button class="btn btnBlack">Postuler Maintenant</button>
								</a>
							  <?php }else{ ?>
								<span class="fa fa-hand-o-right bounce"></span><a href="job-infos.php?type=postuler&jb=<?php echo $jb ?>"><button class="btn btnBlack">Postuler Maintenant</button></a>
							  <?php } ?>
							</aside>
						</div>
					</div>
				</div>
				<div class="col-md-4" id="employeur">
					<div class="row" style="border-radius:5px; border:1px solid #f4f4f4; background:#f4f4f4; padding:10px;">
						<div class="col-12" style="padding:10px;">
							<?php
							if (strlen($data3['en_photo'])>10){ //photo exists
								?>
								<center><img src="assets/images/clients/<?php echo $data3['en_photo'] ?>" style="max-height:70px" alt="Nom Entreprise" title="Description Entreprise"></center>
								<hr>
								<div class="row" style="font-size:12px">
									<aside class="col-6">
										<i style="color:darkorange"><b><?php echo $data3['en_nom'] ?></b></i>
									</aside>
									<aside class="col-6" style="text-align:right">
										<i>Récruteur dépuis <?php echo duree($data3['en_date']) ?></i>
									</aside>
								</div>
								<hr>
								<?php
							}else{
								?>
								<center><h4 style="color:darkorange"><b><?php echo $data3['en_nom'] ?></b></h4></center>
								<div class="row" style="font-size:12px">
									<aside class="col-4">
										<!--stars-->
										<i class="fa fa-star" style="color:orange"></i><i class="fa fa-star" style="color:orange"></i><i class="fa fa-star" style="color:orange"></i><i class="fa fa-star" style="color:orange"></i><i class="fa fa-star" style="color:silver"></i>
										<!--//stars-->
									</aside>
									<aside class="col-8" style="text-align:right">
										<i>Récruteur dépuis <?php echo duree($data3['en_date']) ?></i>
									</aside>
								</div>
								<hr>
								<?php
							}
							?>
							<p><span class="fa fa-info"></span> <?php echo $data3['en_description'] ?></p>
							<p><span class="fa fa-map-marker"></span> <?php echo $data3['en_pays'] ?> <span class="fa fa-arrow-right"></span> <?php echo $data3['en_ville'] ?></p>

							<aside class="button-log usernhy">
							  <?php if ($cl_id<=0){ ?>
								<a class="btn-open" href="#" >
								  <span class="fa fa-hand-o-right bounce"></span><button class="btn btnBlack">Postuler Maintenant</button>
								</a>
							  <?php }else{ ?>
								<span class="fa fa-hand-o-right bounce"></span><a href="job-infos.php?type=postuler&jb=<?php echo $jb ?>"><button class="btn btnBlack">Postuler Maintenant</button></a>
							  <?php } ?>
							</aside>
						</div>
					</div>
				</div>
				<?php
			break;
			case 'postuler':
				if ($cl_id<=0){
					?><script>window.location.href="job-infos.php?jb=<?php echo $jb ?>";</script><?php //kick user out
				}else{ //user connected and can be here
				?>
				<div class="col-md-8">
					<div class="row" style="padding:10px;">
						<div class="col-12" style="padding:10px;">
							<div style="border-left:3px double darkorange; border-bottom:3px double darkorange; padding-left:7px;">
								<h3><span style="color:orange">Postuler à</span> : <?php echo $data['jb_titre'] ?></h3>
							</div>
							<div class="row">
								<div class="col-3">
									<span class="fa fa-map-marker"></span> <?php echo $data['jb_pays'] ?> <span class="fa fa-arrow-right"></span> <?php echo $data['jb_ville'] ?>
								</div>
								<div class="col-3">
									<span class="fa fa-suitcase"></span> <?php echo $data['jb_duree'] ?>
								</div>
								<div class="col-3">
									<span class="fa fa-graduation-cap"></span> <?php echo $data['jb_niveau'] ?>
								</div>
								<div class="col-3">
									<span class="fa fa-clock"></span> <?php echo duree($data['jb_date']) ?>
								</div>
							</div>
							<br>
							<h6 style="color:darkorange"><b>Entrez vos informations</b></h6>
							<hr>
							<?php
							//user infos
							$query2=$db->prepare('SELECT * FROM clients WHERE cl_id=:cl');
							$query2->bindValue(':cl', $cl_id, PDO::PARAM_INT);
							$query2->execute();
							$data2=$query2->fetch();
							?>
							<form method="post" action="job-infos.php?type=form&jb=<?php echo $jb ?>" id="formPostuler" enctype="multipart/form-data">
								<div class="form-group row">
									<div class="col-6 col-sm-4">
										<label for="nom">Votre nom <i style="color:red">*</i></label>
										<input type="text" class="form-control" id="nom" name="nom" maxlength="20" value="<?php echo $data2['cl_nom'] ?>" required>
									</div>
									<div class="col-6 col-sm-4">
										<label for="tel">Votre téléphone <i style="color:red">*</i></label>
										<input type="number" class="form-control" min="1" name="tel" id="tel" value="<?php echo $data2['cl_telephone'] ?>" required>
									</div>
									<div class="col-12 col-sm-4">
										<label for="tel">Votre email</label>
										<input type="email" class="form-control" maxlength="60" name="mail" id="mail" value="<?php echo $data2['cl_mail'] ?>">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-6">
										<label for="diplome">Votre diplôme <i style="color:red">*</i></label>
										<select name="diplome" required id="diplome" class="form-control" onchange="diplomeOptions()">
											<option value="<?php echo $data2['cl_diplome'] ?>" selected><?php echo $data2['cl_diplome'] ?></option>
											<option value="sans_diplome">Sans Diplôme</option>
											<option value="avec_diplome">Avec Diplôme</option>
										</select>
									</div>
									<div class="col-6">
										<label for="niveau" id="talent"></label>
										<input type="text" class="form-control" id="niveau" name="niveau" maxlength="50" value="<?php echo $data2['cl_niveau'] ?>">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-6" style="display:none" id="cvDiv">
										<?php
										if (strlen($data2['cl_cv'])>10){ //there is un cv
											?>
											<label for="cv">Vous avez déjà un CV : <?php echo $data2['cl_cv'] ?></label><br>
											<label for="cv">Modifier le CV ?</label>
											<input type="file" class="form-control" name="cv" id="cv">
											<?php
										}else{ //no cv yet
											?>
											<label for="cv">Pas encore de CV</label><br>
											<label for="cv">Avez-vous un CV ?</label>
											<input type="file" class="form-control" name="cv" id="cv">
											<?php
										}
										?>
									</div>
									<div class="col-6">
										<label for="desc">Votre description</label> :: <label id="remain">255 caractères restants</label>
										<textarea class="form-control" id="desc" maxlength="245" name="desc" onkeyup="counter()"><?php echo $data2['cl_niveau'] ?></textarea>
									</div>
									<div class="col-12">
										<hr>
										<button type="submit" class="btn btnBlack btn-block btn-lg">Terminer et envoyer</button>
									</div>
								</div>
							</form>
							<script>
								let form=document.getElementById('formPostuler');
								if (form.diplome.value=="sans_diplome"){
									document.getElementById('talent').textContent="Un talent en particulier ? (ex: permis, femme de ménage, ...)";
								}
								else if (form.diplome.value=="avec_diplome"){
									document.getElementById('talent').innerHTML='<label for="niveau" id="talent">Quel diplôme avez-vous ? <i style="color:red">*</i></label>';
								}
								function diplomeOptions(){
									if (form.diplome.value=="sans_diplome"){
										document.getElementById('talent').textContent="Un talent en particulier ? (ex: permis, femme de ménage, ...)";
										document.getElementById('cvDiv').style.display="none"; //hode cv section
									}
									else if (form.diplome.value=="avec_diplome"){
										document.getElementById('talent').innerHTML='<label for="niveau" id="talent">Quel diplôme avez-vous ? <i style="color:red">*</i></label>';
										document.getElementById('cvDiv').style.display="block"; //show cv section
									}
								}
								//caractors remain counters
								function counter(){
									let caracts=form.desc.value.length;
									document.getElementById('remain').textContent=245-caracts+" caractères restants";
								}
							</script>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="row" style="border-radius:5px; border:1px solid #f4f4f4; background:#f4f4f4; padding:10px;">
						<div class="col-12" style="padding:10px;">
							<?php
							if (strlen($data3['en_photo'])>10){ //photo exists
								?>
								<center><img src="assets/images/clients/<?php echo $data3['en_photo'] ?>" style="max-height:70px" alt="Nom Entreprise" title="Description Entreprise"></center>
								<hr>
								<div class="row" style="font-size:12px">
									<aside class="col-6">
										<i style="color:darkorange"><b><?php echo $data3['en_nom'] ?></b></i>
									</aside>
									<aside class="col-6" style="text-align:right">
										<i>Récruteur dépuis <?php echo duree($data3['en_date']) ?></i>
									</aside>
								</div>
								<hr>
								<?php
							}else{
								?>
								<center><h4 style="color:darkorange"><b><?php echo $data3['en_nom'] ?></b></h4></center>
								<div class="row" style="font-size:12px">
									<aside class="col-4">
										<!--stars-->
										<i class="fa fa-star" style="color:orange"></i><i class="fa fa-star" style="color:orange"></i><i class="fa fa-star" style="color:orange"></i><i class="fa fa-star" style="color:orange"></i><i class="fa fa-star" style="color:silver"></i>
										<!--//stars-->
									</aside>
									<aside class="col-8" style="text-align:right">
										<i>Récruteur dépuis <?php echo duree($data3['en_date']) ?></i>
									</aside>
								</div>
								<hr>
								<?php
							}
							?>
							<p><span class="fa fa-info"></span> <?php echo $data3['en_description'] ?></p>
							<p><span class="fa fa-map-marker"></span> <?php echo $data3['en_pays'] ?> <span class="fa fa-arrow-right"></span> <?php echo $data3['en_ville'] ?></p>
						</div>
					</div>
				</div>
				<?php
				} //end else (of user connected and can be here)
			break;
			case 'form':
				if ($cl_id<=0){
					?><script>window.location.href="job-infos.php?jb=<?php echo $jb ?>";</script><?php //kick user out
				}else{ //user connected and can be here
				if (!isset($_GET['formok'])){
					$nom=(isset($_POST['nom']))?(htmlspecialchars($_POST['nom'])):'';
					$tel=(isset($_POST['tel']))?(htmlspecialchars($_POST['tel'])):'';
					$mail=(isset($_POST['mail']))?(htmlspecialchars($_POST['mail'])):null;
					$diplome=(isset($_POST['diplome']))?(htmlspecialchars($_POST['diplome'])):'';
					$niveau=(isset($_POST['niveau']))?(htmlspecialchars($_POST['niveau'])):'';
					$desc=(isset($_POST['desc']))?(htmlspecialchars($_POST['desc'])):'';
					$nom=strip_tags($nom);
					$tel=strip_tags($tel);
					$diplome=strip_tags($diplome);
					$niveau=strip_tags($niveau);
					$desc=strip_tags($desc);
					//echo $nom;
					$i=0;
					if (preg_match("#[1-9]#", $nom) or strlen($nom)<3){
						erreur("Le format du nom est incorrect. Veuillez saisir un vrai nom et prénom svp.<br><a href='".$_SERVER['HTTP_REFERER']."'><button class='btn btnOrange'>Réprendre</button></a>");
						$i++;
					}
					if (preg_match("#[a-zA-Z]#", $tel) or strlen($tel)<6){
						erreur("Le format du numéro de téléphone est incorrect. Veuillez saisir un vrai numéro svp.<br><a href='".$_SERVER['HTTP_REFERER']."'><button class='btn btnOrange'>Réprendre</button></a>");
						$i++;
					}
					if (strlen($mail)>0){
						if (!preg_match("#@#", $mail) or !preg_match("#.#", $mail)){
							erreur("Le format du mail est invalide. Veuillez saisir un vrai mail svp.<br><a href='".$_SERVER['HTTP_REFERER']."'><button class='btn btnOrange'>Réprendre</button></a>");
							$i++;
						}
					}
					if (strlen($diplome)<5){
						erreur("Erreur au niveau du diplôme.<br><a href='".$_SERVER['HTTP_REFERER']."'><button class='btn btnOrange'>Réprendre</button></a>");
						$i++;
					}
					if (strlen($desc)>255){
						erreur("Description trop longue, max : 255 caractères.<br><a href='".$_SERVER['HTTP_REFERER']."'><button class='btn btnOrange'>Réprendre</button></a>");
						$i++;
					}else{
						$desc=nl2br($desc);
						//echo $desc;
					}
					//----cv----
					$error='none';
					$cv='cv';
                    if ($_FILES['cv']['error'] != 0){
						$cv=null;
					}else{
                        if ($_FILES['cv']['size'] > 5242880) $error='Fichier trop lourd (max 5Mo)'; //La taille du fichier en octets (5Mo)
                        if ($_FILES['cv']['error'] > 0) $error='Impossible de charger le fichier';   //Le code d'erreur, qui permet de savoir si le fichier a bien été uploadé
                        $extensions_valides = array( 'pdf' , 'doc' , 'docx' );
                        $extension_upload = strtolower(  substr(  strrchr($_FILES['cv']['name'], '.')  ,1)  );
                        if (!in_array($extension_upload,$extensions_valides)) $error='Le fichier doit être soit en format pdf soit en format doc soit en format docx';
                    }
					if ($error != 'none'){ //erreur
						erreur($error."<br><a href='".$_SERVER['HTTP_REFERER']."'><button class='btn btnOrange'>Réprendre</button></a>");
						$i++;
					}
					if ($i==0){ //pas d'erreur
						if ($cv != null) $cv = move_cv($_FILES['cv']); //déplacer le cv dans un dossier et return the name
						$date=date('Y').'-'.date('m').'-'.date('d');
						
						$query=$db->prepare('INSERT INTO postuler(jb_id, cl_id, po_nom, po_telephone, po_mail, po_diplome, po_niveau, po_cv, po_description, po_date) VALUES(:jb, :cl, :nom, :tel, :mail, :dipl, :niv, :cv, :desc, :date)');
						$query->bindValue(':jb', $jb, PDO::PARAM_INT);
						$query->bindValue(':cl', $cl_id, PDO::PARAM_INT);
						$query->bindValue(':nom', $nom, PDO::PARAM_STR);
						$query->bindValue(':tel', $tel, PDO::PARAM_STR);
						$query->bindValue(':mail', $mail, PDO::PARAM_STR);
						$query->bindValue(':dipl', $diplome, PDO::PARAM_STR);
						$query->bindValue(':niv', $niveau, PDO::PARAM_STR);
						$query->bindValue(':cv', $cv, PDO::PARAM_STR);
						$query->bindValue(':desc', $desc, PDO::PARAM_STR);
						$query->bindValue(':date', $date, PDO::PARAM_STR);
						$query->execute();
						$query->closeCursor();
						
						$count = $query->rowCount();
						if ($count==0){ //datas not inserted
							erreur("Erreur inconnue, nous sommes navrés <span class='fa fa-frown'></span> Impossible d'enregistrer votre candidature.<br><a href='".$_SERVER['HTTP_REFERER']."'><button class='btn btnOrange'>Réprendre</button></a>");
						}
						else{ //success
							//echo $cv;
							//---------------send smtp mail au récruteur et à celui qui a postuler----------
							ini_set("include_path", '/home6/occazen/php:' . ini_get("include_path") );
							require_once "Mail.php";
							
							$subjectmail=$nom_site." : ".data['jb_titre'];
//------
$corpsmail= 'Nouvelle candidature pour le job sur '.$nom_site.'.

Infos du postulant :
Nom : '.$nom.'
Téléphone : '.$tel.'
Email : '.$mail.'
...

Pour plus de détails, veuillez vous rendre dans votre compte section candidatures ou en suivant ce lien '.$domaine.'/account?type=candidatures


A bientôt !
L\'équipe de '.$nom_site;
//------
							$from = $nom_site." <contact@jobs.occaze.net>";
							$to = "<".$mail.",".$mailRecru.">";
							$subject = $subjectmail;
							$body = $corpsmail;
							$host = "ssl://mail.occaze.net";
							$port = "465";
							$username = "contact@jobs.occaze.net";
							$password = "password here";
							$headers = array ('From' => $from,
							  'To' => $to, 
							  'Subject' => $subject);
							$smtp = Mail::factory('smtp',
							  array ('host' => $host,
							 'port' => $port,
							 'auth' => true,
							 'username' => $username,
							 'password' => $password));
							$mail = $smtp->send($to, $headers, $body);
							if (PEAR::isError($mail)) {
							  	$message = $mail->getMessage();
							 } else {
							  	$message = "Mail envoyé avec succèss !";
							 }
							//---------------//send smtp mail au récruteur et à celui qui a postuler----------
							?>
							<div class="alert alert-success">Candidature envoyée <span class="fas fa-grin-wink"></span>. Veuillez patientez un instant svp. <b id="tpsR"></b></div>
							<script>
								let tps=5;
								let x=setInterval(function(){
									document.getElementById('tpsR').textContent=tps+' s';
									if (tps<=0){
										clearInterval(x);
										window.location.href="job-infos.php?type=form&formok=true&jb=<?php echo $jb ?>";
									}
									tps--;
								}, 1000);
							</script>
							<?php
						}
					}
					/*else{
						erreur("Erreur inconnue, nous sommes navrés <span class='fa fa-frown'></span> Impossible d'enregistrer votre candidature.<br><a href='".$_SERVER['HTTP_REFERER']."'><button class='btn btnOrange'>Réprendre</button></a>");
					}*/
				}
				else if (isset($_GET['formok'])){ //candidature already sent
				?>
				<div class="col-md-8">
					<div class="row" style="padding:10px;">
						<div class="col-12" style="padding:10px;">
							<div style="border-left:3px double darkorange; border-bottom:3px double darkorange; padding-left:7px;">
								<h3><span style="color:green">Réussi <i class="fas fa-grin-hearts"></i></span> : <?php echo $data['jb_titre'] ?></h3>
							</div>
							<div class="row">
								<div class="col-3">
									<span class="fa fa-map-marker"></span> <?php echo $data['jb_pays'] ?> <span class="fa fa-arrow-right"></span> <?php echo $data['jb_ville'] ?>
								</div>
								<div class="col-3">
									<span class="fa fa-suitcase"></span> <?php echo $data['jb_duree'] ?>
								</div>
								<div class="col-3">
									<span class="fa fa-graduation-cap"></span> <?php echo $data['jb_niveau'] ?>
								</div>
								<div class="col-3">
									<span class="fa fa-clock"></span> <?php echo duree($data['jb_date']) ?>
								</div>
							</div>
							<br>
							<h6 style="color:darkorange"><b>Félécitation</b></h6>
							<hr>
							<p>Vous venez de postuler à l'offre d'emploi avec succès. Le récruteur va examiner votre candidature et vous récevrez une réponse.<br>Il est possible que le récruteur vous reponde par appel téléphonique, par email, ou directement dans votre compte sur ce site web. Alors gardez un oeil sur tous ces élements.</p>
							<a href="jobs.php"><button class="btn btnBlack">Postuler à un autre job</button></a>
							<a href="account.php?type=liste-candidatures"><button class="btn btnBlack">Voir mes candidatures</button></a>
						</div>
					</div>
				</div>
				<?php
				}
				?>
				<div class="col-md-4">
					<div class="row" style="border-radius:5px; border:1px solid #f4f4f4; background:#f4f4f4; padding:10px;">
						<div class="col-12" style="padding:10px;">
							<?php
							if (strlen($data3['en_photo'])>10){ //photo exists
								?>
								<center><img src="assets/images/clients/<?php echo $data3['en_photo'] ?>" style="max-height:70px" alt="Nom Entreprise" title="Description Entreprise"></center>
								<hr>
								<div class="row" style="font-size:12px">
									<aside class="col-6">
										<i style="color:darkorange"><b><?php echo $data3['en_nom'] ?></b></i>
									</aside>
									<aside class="col-6" style="text-align:right">
										<i>Récruteur dépuis <?php echo duree($data3['en_date']) ?></i>
									</aside>
								</div>
								<hr>
								<?php
							}else{
								?>
								<center><h4 style="color:darkorange"><b><?php echo $data3['en_nom'] ?></b></h4></center>
								<div class="row" style="font-size:12px">
									<aside class="col-4">
										<!--stars-->
										<i class="fa fa-star" style="color:orange"></i><i class="fa fa-star" style="color:orange"></i><i class="fa fa-star" style="color:orange"></i><i class="fa fa-star" style="color:orange"></i><i class="fa fa-star" style="color:silver"></i>
										<!--//stars-->
									</aside>
									<aside class="col-8" style="text-align:right">
										<i>Récruteur dépuis <?php echo duree($data3['en_date']) ?></i>
									</aside>
								</div>
								<hr>
								<?php
							}
							?>
							<p><span class="fa fa-info"></span> <?php echo $data3['en_description'] ?></p>
							<p><span class="fa fa-map-marker"></span> <?php echo $data3['en_pays'] ?> <span class="fa fa-arrow-right"></span> <?php echo $data3['en_ville'] ?></p>
						</div>
					</div>
				</div>
				<?php
				} //end else (of user connected and can be here)
			break;
			default:
				notFound('Poufff, quelle galère');
			break;
		}
		?>
	</div>
</div>

<?php include('footer.php'); ?>