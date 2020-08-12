			<?php
			session_start();

			include('assets/includes/constants.php');
			$titre_page='Ajouter un job :: '.$nom_site;
			$description_page="Cherchez-vous un employé ? Quelque soit le domaine d'activité, que ce soit un employé diplômé ou non diplômé, ".$nom_site." est le meilleur pour poster votre offre d'emploi. Nous mettons à votre disposition les perles tous les types d'employés. Postez votre offre d'emploi maintenant.";
			$title="Nouveau Job";
			include('top.php');
			$type=(isset($_GET['type']))?(htmlspecialchars($_GET['type'])):'Infos';
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

<!-----add job------->
<?php
if ($cl_id<=0){
	?><script>window.location.href="sign-up.php";</script><?php
}else{
	?>
	<section style="background-image: url('assets/images/job.jpg')">
		<div class="features4-block py-5" style="background: rgba(255,255,255,0.95)">
			<div class="container" style="margin-top:5vw; margin-bottom:5vw; border-style: inset; border-radius: 15px 0px 15px 0px; padding:15px;">
				<div class="row">
					<div class="col-12">
						<center><h1><b>Ajouter un <span style="color:darkorange">nouveau job</span></b></h1></center>
					</div>
					<?php
					switch($type){
						case 'Infos':
							?>
							<div class="col-12">
								<div class="progress">
								  <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width:50%; font-size:15px;">
									Infos (1/2)
								  </div>
								  <div class="progress-bar bg-success" role="progressbar" style="width:50%; font-size:15px;">
									Photo (2/2)
								  </div>
								</div>
								<hr>
							</div>
							<div class="col-12">
								<form class="row" action="add-job.php?type=add-job" method="post" enctype="multipart/form-data">
									<div class="form-group col-6">
										<label for="titre">Titre du job <b style="color:red">*</b></label>
										<input type="text" class="form-control" name="titre" id="titre" required="" placeholder="Ex: Chauffeur de taxi" maxlength="50" minlength="3">
									</div>
									<div class="form-group col-6">
										<label for="tps">Durée du job <b style="color:red">*</b></label>
										<input type="text" class="form-control" name="tps" id="tps" required="" placeholder="Ex: CDD de 3mois" maxlength="20" minlength="3">
									</div>
									<div class="form-group col-6">
										<label for="pys">Pays <b style="color:red">*</b></label>
										<input type="text" class="form-control" name="pys" id="pys" required="" placeholder="Ex: Côte d'ivoire" maxlength="30" minlength="3">
										<!--this code is created by Josué - jose.init.dev@gmail.com-->
									</div>
									<div class="form-group col-6">
										<label for="vil">Ville <b style="color:red">*</b></label>
										<input type="text" class="form-control" name="vil" id="vil" required="" placeholder="Ex: Abidjan" maxlength="30" minlength="3">
									</div>
									<div class="form-group col-6">
										<label for="niv">Type de diplôme</label>
										<input type="text" class="form-control" name="niv" id="niv" placeholder="Non obligatoire" maxlength="50" minlength="">
									</div>
									<div class="form-group col-6">
										<label for="type">Type de job <b style="color:red">*</b></label>
										<select name="type" class="form-control" id="type" required="">
											<option value="sans_diplome" selected>Sans diplôme</option>
											<option value="avec_diplome">Avec diplôme</option>
										</select>
									</div>
									<div class="form-group col-12 col-sm-6">
										<label for="cat">Catégorie <b style="color:red">*</b></label>
										<select name="cat" class="form-control" id="cat" required="">
											<optgroup label="sans diplôme">
												<option value="autre" selected>Autre</option>
												<option value="chauffeur">Chauffeur</option>
												<option value="commercant">Commerce</option>
												<option value="couturier">Couture</option>
												<option value="cybercafe">CyberCafé</option>
												<option value="garagistre">Garagiste</option>
												<option value="macon">Maçonnerie</option>
												<option value="menagere">Ménage</option>
												<option value="menuisier">Ménuiserie</option>
											</optgroup>
											<optgroup label="avec diplôme">
												<option value="autre">Autre</option>
												<option value="bac">BAC</option>
												<option value="bts">BTS</option>
												<option value="doctorat">Doctorat</option>
												<option value="ingenieur">Ingénieur</option>
												<option value="license">License</option>
												<option value="master">Master</option>
												<option value="technicien">Technicien</option>
											</optgroup>
										</select>
									</div>
									<div class="form-group col-12 col-sm-6">
										<label for="desc">Description <b style="color:red">*</b></label>
										<textarea class="form-control" name="desc" id="desc" required="" placeholder="Donnez les détails de votre offre d'emploi" minlength="30" rows="3"></textarea>
									</div>
									<div class="form-group col-12">
										<button type="submit" class="btn btnBlack btn-block">AJOUTER MON JOB</button>
									</div>
								</form>
							</div>
							<?php
						break;

						case 'add-job':
							$titre=(isset($_POST['titre']))?(htmlspecialchars($_POST['titre'])):'';
							$desc=(isset($_POST['desc']))?(htmlspecialchars($_POST['desc'])):'';
							$pys=(isset($_POST['pys']))?(htmlspecialchars($_POST['pys'])):'';
							$vil=(isset($_POST['vil']))?(htmlspecialchars($_POST['vil'])):'';
							$type=(isset($_POST['type']))?(htmlspecialchars($_POST['type'])):'';
							$cat=(isset($_POST['cat']))?(htmlspecialchars($_POST['cat'])):'';
							$tps=(isset($_POST['tps']))?(htmlspecialchars($_POST['tps'])):'';
							$niv=(isset($_POST['niv']))?(htmlspecialchars($_POST['niv'])):'';
							
							if (strlen($titre)<3){
								erreur('Titre du job invalide. <a href="add-job.php">Réprendre</a>');
							}else if (strlen($desc)<30){
								erreur('Description du job invalide. <a href="add-job.php">Réprendre</a>');
							}else if (strlen($pys)<3){
								erreur('Pays du job invalide. <a href="add-job.php">Réprendre</a>');
							}else if (strlen($vil)<3){
								erreur('Ville du job invalide. <a href="add-job.php">Réprendre</a>');
							}else if (strlen($tps)<3){
								erreur('Durée du job invalide. <a href="add-job.php">Réprendre</a>');
							}else{
								$desc=nl2br($desc);
								
								$query=$db->prepare('INSERT INTO jobs(cl_id, jb_titre, jb_description, jb_pays, jb_ville, jb_type, jb_categorie, jb_duree, jb_niveau, jb_date) VALUES(:cl, :tit, :desc, :pys, :vil, :typ, :cat, :dur, :niv, :dat)');
								$query->bindValue(':cl', $cl_id, PDO::PARAM_INT);
								$query->bindValue(':tit', $titre, PDO::PARAM_STR);
								$query->bindValue(':desc', $desc, PDO::PARAM_STR);
								$query->bindValue(':pys', $pys, PDO::PARAM_STR);
								$query->bindValue(':vil', $vil, PDO::PARAM_STR);
								$query->bindValue(':typ', $type, PDO::PARAM_STR);
								$query->bindValue(':cat', $cat, PDO::PARAM_STR);
								$query->bindValue(':dur', $tps, PDO::PARAM_STR);
								$query->bindValue(':niv', $niv, PDO::PARAM_STR);
								$query->bindValue(':dat', date('Y').'-'.date('m').'-'.date('d'), PDO::PARAM_STR);
								$query->execute();
								//-----verify if data truly saved into db//---------
								$count = $query->rowCount();
								if ($count==0){ //datas not inserted
									erreur("Erreur inconnue, nous sommes navrés <span class='fa fa-frown'></span> Impossible d'enregistrer vos informations de job.<br><a href='add-job.php'><button class='btn btnOrange'>Réprendre</button></a>");
								}else{
									$jbid = $db->lastInsertId();
									$_SESSION['jbid'] = $jbid;
									//echo $jbid;
									?>
									<script>
										let jb=<?php echo json_encode($jbid) ?>;
										window.location.href="add-job.php?type=Photo&jb="+jb;
									</script>
									<?php
								}
							}
						break;

						case 'Photo':
							//$jbid = (int) (isset($_GET['jb']))?(htmlspecialchars($_GET['jb'])):'';
							//echo $jbid;
							?>
							<div class="alert alert-success col-12">
								<center><p>Votre job a été ajouté avec succès ! Et si on y ajoutait une photo ?</p></center>
							</div>
							
							<div class="col-12">
								<div class="progress">
								  <div class="progress-bar bg-primary" role="progressbar" style="width:50%; font-size:15px;">
									  <span class="fa fa-check-circle">Infos (1/2)</span>
								  </div>
								  <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width:50%; font-size:15px;">
									Photo (2/2)
								  </div>
								</div>
								<hr>
							</div>
							<div class="col-12">
								<center><h3>Editer la <span style="color:darkorange">photo du job</span></h3></center>
								<hr>
								<?php include('assets/includes/croppie-add-job.html'); ?>
							</div>
							<?php
						break;

						case 'Finaliser':
							?>
							<div class="col-12">
								<div class="progress">
								  <div class="progress-bar bg-primary" role="progressbar" style="width:50%; font-size:15px;">
									  <span class="fa fa-check-circle">Infos (1/2)</span>
								  </div>
								  <div class="progress-bar bg-success" role="progressbar" style="width:50%; font-size:15px;">
									  <span class="fa fa-check-circle">Photo (2/2)</span>
								  </div>
								</div>
								<hr>
							</div>
							
							<div class="alert alert-success col-12">
								<center>
									<h3>Yehhh terminé <span class="fas fa-grin-alt"></span></h3>
									<p>Votre job a été ajouté avec succès ! Voulez-vous mettre votre job au devant de tous ? Passez en <a href="go-premium.php">mode premium maintenant</a>, simple, rapide et éfficace.</p>
									<hr>
									<a href="add-job.php"><button class="btn btnBlack">Ajouter un autre job</button></a> :: <a href="go-premium.php"><button class="btn btnOrange"><i class="fa fa-star"></i>Mode Premium</button></a> :: <a href="compte.php?option=candidatures"><button class="btn btnBlack">Voir tous mes jobs</button></a>
									
									<?php
									$query=$db->prepare('SELECT jb_id FROM jobs WHERE cl_id=:id ORDER BY jb_id DESC LIMIT 1');
									$query->bindValue(':id', $cl_id, PDO::PARAM_INT);
									$query->execute();
									$jbid=$query->fetch();
									$jbid=$jbid['jb_id'];
							
									$query=$db->prepare('SELECT jb_photo, jb_id, jb_photo, jb_titre FROM jobs WHERE jb_id=:id');
									$query->bindValue(':id', $jbid, PDO::PARAM_INT);
									$query->execute();
									$data=$query->fetch();
									?>
									<section class="w3l-grids-hny-2">
										<div class="welcome-grids row mt-5" id="main">
											<div class="col-12 welcome-image">
												<center>
												<div class="d-none d-md-block boxhny13" style="background-image:url('assets/images/jobs/<?php echo $data['jb_photo'] ?>'); height:160px; width:160px; border-radius:50%; background-position:center; background-size:cover;">
													<a href="job-infos.php?jb=<?php echo $data['jb_id'] ?>">
														<div class="boxhny-content">
															<h3 class="title"><span class="fa fa-eye"></span> Détails</h3>
														</div>
													</a>
												</div>
												<div class="d-md-none boxhny13" style="background-image:url('assets/images/jobs/<?php echo $data['jb_photo'] ?>'); height:100px; width:100px; border-radius:50%; background-position:center; background-size:cover;">
													<a href="job-infos.php?jb=<?php echo $data['jb_id'] ?>">
														<div class="boxhny-content">
															<h3 class="title"><span class="fa fa-eye"></span> Détails</h3>
														</div>
													</a>
												</div>
												<?php if (strlen($data['jb_titre'])<=30) echo '<h4 class="title"><a href="job-infos.php?jb='.$data['jb_id'].'">'.$data['jb_titre'].'</a></h4>';
												else echo '<h4 class="title"><a href="job-infos.php?jb='.$data['jb_id'].'">'.substr($data['jb_titre'],0,28).'...</a></h4>'; ?>
												</center>
											</div>
										</div>
									</section>
									
								</center>
							</div>
							<?php
							session_destroy();
						break;

						default:
							notFound('Aihhh yaï yaï yaï !!! Pouffff');
						break;
					} //end switch
					//this code is created by Josué - jose.init.dev@gmail.com
					?>
				</div>
			</div>
		</div>
	</section>
	<?php
} //end else (connected)
?>
<!-----//add job------->

<?php include('footer.php'); ?>