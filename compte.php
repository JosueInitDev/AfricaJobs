			<?php
			session_start();

			include('assets/includes/constants.php');
			$type=(isset($_GET['type']))?(htmlspecialchars($_GET['type'])):'Bienvenue';
			$titre_page='Mon compte :: '.$nom_site;
			$title="Mon Compte";
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
$query=$db->prepare('SELECT * FROM clients WHERE cl_id=:cl');
$query->bindValue(':cl', $cl_id, PDO::PARAM_INT);
//$query->bindValue(':cl', 17, PDO::PARAM_INT);
$query->execute();
$data=$query->fetch();

if ($cl_id<=0){ //not connected
	?><script>window.location.href="index.php";</script><?php
}else{
$option=(isset($_GET['option']))?(htmlspecialchars($_GET['option'])):'none';
switch($type){
	case 'Bienvenue':
		?>
		<div style="background-image: url('assets/images/chatBack.jpg')">
			<div style="background: rgba(255,255,255,0.9)">
				<div class="container">
					<div class="row profile-header">
						<div class="col-12 profile-info">
							<div class="row">
								<div class="col-md-3 profile-img">
									<div class="row">
										<div class="col-4 col-md-12">
											<img src="assets/images/clients/<?php echo $data['cl_photo'] ?>" class="img-fluid">
											<a href="compte.php?type=edit-photo" style="position:absolute; left:10px; top:50%; opacity:0.7; z-index:1"><button class="btn btnBlack btn-sm">éditer +</button></a>
										</div>
										<div class="col-8 col-md-12">
											<p class="profile-username"><?php echo $data['cl_nom'] ?></p>
											<i>Dernière connection : <?php echo duree($data['cl_derniere_co']) ?></i>
											
											<a href='compte.php?type=deco'><button class="btn btnOrange btn-sm"><i class="fa fa-sign-in"></i> déconnexion</button></a>
										</div>
									</div>
								</div>
								<div class="col-md-9" style="padding:15px">
									<div style="border-left:7px solid #000">
									<!--------buttons----------->
									<ul class="block-menu">
										<li><a href="#" class="three-d" onclick="account('infos')">
											Infos
											<span aria-hidden="true" class="three-d-box">
												<span class="front">Infos</span>
												<span class="back">Infos</span>
											</span>
										</a></li>
										<li><a href="#" class="three-d" onclick="account('profile')">
											Profile
											<span aria-hidden="true" class="three-d-box">
												<span class="front">Profile</span>
												<span class="back">Profile</span>
											</span>
										</a></li>
										<li><a href="#" class="three-d" onclick="account('entreprise')">
											Entreprise
											<span aria-hidden="true" class="three-d-box">
												<span class="front">Entreprise</span>
												<span class="back">Entreprise</span>
											</span>
										</a></li>
										<li><a href="#" class="three-d" onclick="account('candidatures')">
											Candidatures
											<span aria-hidden="true" class="three-d-box">
												<span class="front">Candidatures</span>
												<span class="back">Candidatures</span>
											</span>
										</a></li>
										<li><a href="#" class="three-d" onclick="account('chats')">
											Chats
											<span aria-hidden="true" class="three-d-box">
												<span class="front">Chats</span>
												<span class="back">Chats</span>
											</span>
										</a></li>
										<li><a href="#" class="three-d" onclick="account('accueil')">
												<span class="fas fa-angle-double-left"></span>
										</a></li>
										<li style="float:right; color:#fff">
											<a href="compte.php?type=edit-basic-infos"><i class="fa fa-gear fa-spin" style="font-size:30px"></i></a>
										</li>
										<!-- more items here -->
									</ul>
									<!--------//buttons----------->
									</div>
									<div style="border-left:7px solid #000; padding:15px;">
										<!------this is default content------------>
										<div id="accueil">
											<div class="progress">
												<?php
												$i=2;
												$j=3;
												$k=0;
												if (strlen($data['cl_telephone'])>5) $i++;
												if (strlen($data['cl_mail'])>6) $i++;
												if (strlen($data['cl_niveau'])>2) $j++;
												if (strlen($data['cl_experience'])>5) $j++;
												if (strlen($data['cl_description'])>5) $j++;
												if ($data['cl_photo'] != 'user-default.png') $k++;
												if (strlen($data['cl_cv'])>10) $j++;
												$infos=substr(($i/5)*100,0,3);
												$profile=substr(($j/7)*100,0,3);
												if ($k==1){ //100% completed
													?>
													  <div class="progress-bar bg-success" style="width:33.333%">
														<span class="fa fa-check-circle"> Photo</span>
													  </div>
													<?php
												}else{
													?>
													  <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width:33.333%">
														Photo (0%)
													  </div>
													<?php
												}
												if ($i==5){ //100% completed
													?>
													<div class="progress-bar bg-primary" role="progressbar" style="width:33.333%">
														<span class="fa fa-check-circle"> Infos</span>
													</div>
													<?php
												}else{
													?>
													<div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width:33.333%">
														Infos (<?php echo $infos.'%' ?>)
													</div>
													<?php
												}
												if ($j==7){ //100% completed
													?>
													  <div class="progress-bar bg-danger" style="width:33.333%">
														<span class="fa fa-check-circle"> Profile</span>
													  </div>
													<?php
												}else{
													?>
													  <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="width:33.333%">
														Profile (<?php echo $profile.'%' ?>)
													  </div>
													<?php
												}
												?>
											</div>

											<hr>
											<?php if ($data['cl_type']=='demandeur'){ ?>
												<p><span class="fa fa-user"></span> <b>Type compte :</b> personnel</p>
											<?php }else{ ?>
												<p><span class="fa fa-user"></span> <b>Type compte :</b> entreprise</p>
											<?php } ?>
											<hr>
											<?php if ($data['cl_diplome']=='sans_diplome'){ ?>
												<p><span class="fa fa-graduation-cap"></span> <b>Diplôme :</b> pas de diplôme</p>
											<?php }else{ ?>
												<p><span class="fa fa-graduation-cap"></span> <b>Diplôme :</b> vous avez un diplôme</p>
											<?php } ?>
											<hr>
											<p><span class="fas fa-pen"></span> <b>Expériences :</b> <?php echo $data['cl_experience'] ?></p>
											<hr>
											<p><span class="fas fa-book-open"></span> <b>Description :</b> <?php echo $data['cl_description'] ?></p>
											<hr>
											<?php
											if (strlen($data['cl_cv'])>8){ //cv exists
											?><p><span class="fa fa-file-text"></span> <b>CV</b> : <a href="assets/images/cv/<?php echo $data['cl_cv'] ?>" title="Afficher le CV (dans un autre onglet)" target="_blank"><button class="btn btnOrange"><?php echo 'cv-'.$data['cl_nom'].'.pdf' ?></button></a> :: <a href="compte.php?type=edit-cv"><button class="btn btnBlack btn-sm">modifier cv</button></a></p><?php
											}
											else{
												?><p><span class="fa fa-file-text"></span> <b>CV</b> : aucun cv :: <a href="compte.php?type=edit-cv"><button class="btn btnBlack btn-sm">ajouter cv</button></a></p><?php
											} ?>
										</div>
										<!------//this is default content------------>
										<!------this is infos content---------->
										<div id="infos" style="display:none">
											<h3>Mes informations <a href="compte.php?type=edit-basic-infos"><button class="btn btnBlack btn-sm">modifier</button></a></h3>
											<hr>
											<p><span class="fa fa-user"></span> <b>Nom :</b> <?php echo $data['cl_nom'] ?></p>
											<hr>
											<p><span class="fa fa-phone"></span> <b>Téléphone :</b> <?php echo $data['cl_telephone'] ?></p>
											<hr>
											<p><span class="fa fa-envelope"></span> <b>Email :</b> <?php echo $data['cl_mail'] ?></p>
											<hr>
											<p><span class="fa fa-key"></span> <b>Mot de passe :</b> <a href="compte.php?type=edit-mdp"><button class="btn btnBlack btn-sm">modifier</button></a></p>
											<hr>
											<p><span class="fa fa-sign-in"></span> <b>Dernière connection :</b> <?php echo duree($data['cl_derniere_co']) ?></p>
											<hr>
											<p><span class="fa fa-sign-in"></span> <b>Inscription :</b> <?php echo duree($data['cl_date']) ?></p>
										</div>
										<!------//this is infos content---------->
										<!------this is profile content---------->
										<div id="profile" style="display:none">
											<h3>Mon profile <a href="compte.php?type=edit-profile"><button class="btn btnBlack btn-sm">modifier</button></a></h3>
											<hr>
											<?php if ($data['cl_type']=='demandeur'){ ?>
												<p><span class="fa fa-user"></span> <b>Type compte :</b> personnel</p>
											<?php }else{ ?>
												<p><span class="fa fa-user"></span> <b>Type compte :</b> entreprise</p>
											<?php } ?>
											<hr>
											<?php if ($data['cl_cherche_job']){ ?>
												<p><span class="fa fa-phone"></span> <b>Recherche un job :</b> OUI</p>
											<?php }else{ ?>
												<p><span class="fa fa-phone"></span> <b>Recherche un job :</b> NON</p>
											<?php } ?>
											<hr>
											<?php if ($data['cl_diplome']=='sans_diplome'){ ?>
												<p><span class="fa fa-graduation-cap"></span> <b>Diplôme :</b> pas de diplôme</p>
											<?php }else{ ?>
												<p><span class="fa fa-graduation-cap"></span> <b>Diplôme :</b> vous avez un diplôme</p>
												<hr>
												<p><span class="fas fa-chalkboard-teacher"></span> <b>Type diplôme :</b> <?php echo $data['cl_niveau'] ?></p>
											<?php } ?>
											<hr>
											<p><span class="fas fa-pen"></span> <b>Expériences :</b> <?php echo $data['cl_experience'] ?></p>
											<hr>
											<p><span class="fas fa-book-open"></span> <b>Description :</b> <?php echo $data['cl_description'] ?></p>
											<hr>
											<?php
											if (strlen($data['cl_cv'])>8){ //cv exists
											?><p><span class="fa fa-file-text"></span> <b>CV</b> : <a href="assets/images/cv/<?php echo $data['cl_cv'] ?>" title="Afficher le CV (dans un autre onglet)" target="_blank"><button class="btn btnOrange"><?php echo 'cv-'.$data['cl_nom'].'.pdf' ?></button></a> :: <a href="compte.php?type=edit-cv"><button class="btn btnBlack btn-sm">modifier cv</button></a></p><?php
											}
											else{
												?><p><span class="fa fa-file-text"></span> <b>CV</b> : aucun cv :: <a href="compte.php?type=edit-cv"><button class="btn btnBlack btn-sm">ajouter cv</button></a></p><?php
											} ?>
										</div>
										<!------//this is profile content---------->
										<!------this is entreprise content---------->
										<div id="entreprise" style="display:none">
											<?php
											if (isset($_GET['entreprise-ok'])){
												?><div class="alert alert-warning"><i>Entreprise éditée. Votre compte a été marqué comme ne cherchant pas de job. Mais vous pouvez modifier cela dans la section profile.</i></div><?php
											}
											//echo $cl_id;
											if ($data['cl_type']=='demandeur'){
												?>
												<h3>Entreprise <a href="compte.php?type=add-entreprise"><button class="btn btnBlack btn-sm">créer une</button></a></h3>
												<hr>
												<p>Pas d'entreprise (le type de votre compte est "personnel").</p>
												<p><b>NB :</b> le type "entreprise" vous permet de poster des jobs afin de rechercher des gens à embaucher. <a href="compte.php?type=add-entreprise"><button class="btn btnBlack btn-sm">créer une entreprise</button></a></p>
												<?php
											}else{
												?>
												<h3>Entreprise <a href="compte.php?type=add-entreprise"><button class="btn btnBlack btn-sm">modifier entreprise</button></a></h3>
											
												<?php
												$ent=$db->prepare('SELECT * FROM entreprises WHERE cl_id=:cl');
												$ent->bindValue(':cl', $cl_id, PDO::PARAM_INT);
												//$ent->bindValue(':cl', 17, PDO::PARAM_INT);
												$ent->execute();
												$ent=$ent->fetch();
												if (strlen($ent['en_photo'])>8){ ?>
													<p><img src="assets/images/clients/<?php echo $ent['en_photo'] ?>" class="img-thumbnail" style="width:150px"> <a href="compte.php?type=edit-ent-photo"><button class="btn btnBlack btn-sm">modifier</button></a></p>
												<?php }else{ ?>
													<p>Photo : aucune <a href="compte.php?type=edit-ent-photo"><button class="btn btnBlack btn-sm">+ ajouter</button></a></p>
												<?php } ?>
												<p><span class="fa fa-building"></span> <b>Nom entreprise :</b> <?php echo $ent['en_nom'] ?></p>
												<p><span class="fa fa-map"></span> <b>Pays :</b> <?php echo $ent['en_pays'] ?></p>
												<p><span class="fa fa-map-marker"></span> <b>Ville :</b> <?php echo $ent['en_ville'] ?></p>
												<p><span class="fas fa-book-open"></span> <b>Description :</b> <?php echo $ent['en_description'] ?></p>
												<p><span class="fa fa-sign-in"></span> <b>Date création :</b> <?php echo duree($ent['en_date']) ?></p>
												<?php
											} ?>
										</div>
										<!------//this is entreprise content---------->
										<!------this is candidatures content---------->
										<div id="candidatures" style="display:none">
											<!-------views//------------------>
											<div style="max-height:200px; overflow:auto;">
												<h5><b>Vues profile/offres d'emploi</b></h5>
												<div class="row">
													<div class="col-6">
														<?php
														$query5=$db->prepare('SELECT * FROM views WHERE vw_elt_id=:cl AND vw_element="profile (cv)" ORDER BY vw_id DESC');
														$query5->bindValue(':cl', $cl_id, PDO::PARAM_INT);
														$query5->execute();
														?><b>Profile</b><?php
														$i=0;
														while ($views=$query5->fetch()){
															$qu=$db->prepare('UPDATE views SET vw_active=0 WHERE vw_id=:id');
															$qu->bindValue(':id', $views['vw_id'], PDO::PARAM_INT);
															$qu->execute();
															$i++;
															if ($views['vw_viewer_name']==$nom_site){ ?>
																<p><?php echo '<b>'.$i.'</b>: '.$views['vw_element'] ?> consulté par inconnu ::: <?php echo duree($views['vw_date']) ?></p><?php
															}else{ ?>
																<p><?php echo '<b>'.$i.'</b>: '.$views['vw_element'] ?> consulté par <?php echo $views['vw_viewer_name'] ?> ::: <?php echo duree($views['vw_date']) ?></p>
																<?php
															}
														}
														?>
													</div>
													<div class="col-6">
														<?php
														$query5=$db->prepare('SELECT vw_id, vw_element, vw_viewer_name, vw_date FROM views INNER JOIN jobs ON jobs.jb_id=views.vw_elt_id WHERE jobs.cl_id=:cl AND views.vw_element=:elt ORDER BY views.vw_id DESC');
														$query5->bindValue(':cl', $cl_id, PDO::PARAM_INT);
														$query5->bindValue(':elt', "offre d'emploi", PDO::PARAM_STR);
														$query5->execute();
														?><b>Offres d'emploi</b><?php
														$i=0;
														while ($views=$query5->fetch()){
															$qu=$db->prepare('UPDATE views SET vw_active=0 WHERE vw_id=:id');
															$qu->bindValue(':id', $views['vw_id'], PDO::PARAM_INT);
															$qu->execute();
															$i++;
															if ($views['vw_viewer_name']==$nom_site){ ?>
																<p><?php echo '<b>'.$i.'</b>: '.$views['vw_element'] ?> consultée par inconnu ::: <?php echo duree($views['vw_date']) ?></p><?php
															}else{ ?>
																<p><?php echo '<b>'.$i.'</b>: '.$views['vw_element'] ?> consultée par <?php echo $views['vw_viewer_name'] ?> ::: <?php echo duree($views['vw_date']) ?></p>
																<?php
															}
														}
														//this code is created by Josué - jose.init.dev@gmail.com
														?>
													</div>
												</div>
											</div>
											<hr>
											<!-------postulées//------------------>
											<div style="max-height:350px; overflow:auto;">
												<h5><b>Mes recherches d'emploi</b></h5>
												<div id="accordion1">
												<?php
												$query5=$db->prepare('SELECT * FROM postuler WHERE cl_id=:cl ORDER BY po_id DESC');
												$query5->bindValue(':cl', $cl_id, PDO::PARAM_INT);
												$query5->execute();
												$j=0;
												while ($postuler=$query5->fetch()){
													$j++;
													?>
													<div class="card">
														<div class="card-header">
															<a class="card-link" data-toggle="collapse" href="<?php echo '#postuler'.$j ?>">
															<?php echo '<b>'.$j.'</b>: '.$postuler['po_nom'] ?> ::: <?php echo duree($postuler['po_date']) ?>
															</a>
														</div>
														<div id="<?php echo 'postuler'.$j ?>" class="collapse" data-parent="#accordion1">
															<div class="card-body">
																<p><b>Diplôme : </b><?php echo $postuler['po_diplome'] ?></p>
																<p><b>Type diplôme : </b><?php echo $postuler['po_niveau'] ?></p>
																<p><b>Description : </b><?php echo $postuler['po_description'] ?></p>
																<p><b>Expérience : </b><?php echo $postuler['po_experience'] ?></p>
																<?php
																if (strlen($postuler['po_cv'])>8){ //cv exists
																?><p><span class="fa fa-file-text"></span> <b>CV</b> : <a href="assets/images/cv/<?php echo $postuler['po_cv'] ?>" title="Afficher le CV (dans un autre onglet)" target="_blank"><button class="btn btnOrange"><?php echo 'cv-'.$postuler['po_nom'].'.pdf' ?></button></a></p><?php
																}
																else{
																	?><p><span class="fa fa-file-text"></span> <b>CV</b> : aucun cv</p><?php
																} ?>
															</div>
														</div>
													</div>
													<?php
												}
												?>
												</div>	
											</div>
											<hr>
											<!-------reçues//------------------>
											<div>
												<h5><b>Mes offres d'emploi</b></h5>
												<div style="max-height:350px; overflow:auto;">
													<h6><b><i class="fa fa-hand-o-right"></i> Candidatures reçues</b></h6>
													<div id="accordion2">
													<?php
													$query5=$db->prepare('SELECT jb_titre, postuler.cl_id, po_nom, po_telephone, po_mail, po_diplome, po_niveau, po_cv, po_experience, po_description, po_date FROM postuler INNER JOIN jobs ON jobs.jb_id=postuler.jb_id WHERE jobs.cl_id=:cl ORDER BY postuler.po_id DESC');
													//$query5->bindValue(':cl', 1, PDO::PARAM_INT); //just for test
													$query5->bindValue(':cl', $cl_id, PDO::PARAM_INT);
													$query5->execute();
													$k=0;
													while ($recu=$query5->fetch()){
														$k++;
														?>
														<div class="card">
															<div class="card-header">
																<a class="card-link" data-toggle="collapse" href="<?php echo '#recu'.$k ?>">
																<?php echo '<b>'.$k.'</b>: '.$recu['jb_titre'] ?> ::: <?php echo duree($recu['po_date']) ?>
																</a>
															</div>
															<div id="<?php echo 'recu'.$k ?>" class="collapse" data-parent="#accordion2">
																<div class="card-body">
																	<p><b>Nom : </b><?php echo $recu['po_nom'] ?></p>
																	<p><b>Téléphone : </b><a href="callto:<?php echo $recu['po_telephone'] ?>"><button class="btn btnBlack btn-sm">Appeler</button></a></p>
																	<p><b>Email : </b><a href="mailto:<?php echo $recu['po_mail'] ?>"><button class="btn btnBlack btn-sm">Envoyer mail</button></a></p>
																	<p><b>Messagerie du site : </b><a href="chat.php?new-chat=true&with=<?php echo $recu['cl_id'] ?>"><button class="btn btnBlack btn-sm"><i class="fa fa-comment"></i> Chater</button></a></p>
																	<p><b>Diplôme : </b><?php echo $recu['po_diplome'] ?></p>
																	<p><b>Type diplôme : </b><?php echo $recu['po_niveau'] ?></p>
																	<p><b>Expérience : </b><?php echo $recu['po_experience'] ?></p>
																	<p><b>Description : </b><?php echo $recu['po_description'] ?></p>
																	<?php
																	if (strlen($recu['po_cv'])>8){ //cv exists
																	?><p><span class="fa fa-file-text"></span> <b>CV</b> : <a href="assets/images/cv/<?php echo $recu['po_cv'] ?>" title="Afficher le CV (dans un autre onglet)" target="_blank"><button class="btn btnOrange">afficher</button></a></p><?php
																	}
																	else{
																		?><p><span class="fa fa-file-text"></span> <b>CV</b> : aucun cv</p><?php
																	} ?>
																</div>
															</div>
														</div>
														<?php
													}
													?>
													</div>
												</div>
												<div style="max-height:350px; overflow:auto;">
													<h6><b><i class="fa fa-hand-o-right"></i> Liste des offres</b></h6>
													<div id="accordion3">
													<?php
													$query5=$db->prepare('SELECT * FROM jobs WHERE cl_id=:cl ORDER BY jb_id DESC');
													//$query5->bindValue(':cl', 1, PDO::PARAM_INT); //just for test
													$query5->bindValue(':cl', $cl_id, PDO::PARAM_INT);
													$query5->execute();
													$k=0;
													while ($jobs=$query5->fetch()){
														$k++;
														?>
														<div class="card">
															<div class="card-header">
																<a class="card-link" data-toggle="collapse" href="<?php echo '#job'.$k ?>">
																<?php echo '<b>'.$k.'</b>: '.$jobs['jb_titre'] ?> ::: <?php echo duree($jobs['jb_date']) ?> ::: <a href="compte.php?type=edit-job"><button class="btn btnOrange btn-sm">modifier ce job</button></a> ::: <a href="compte.php?type=edit-job&supp=<?php echo $jobs['jb_id'] ?>"><button class="btn btnBlack btn-sm">supprimer ce job</button></a>
																</a>
															</div>
															<div id="<?php echo 'job'.$k ?>" class="collapse" data-parent="#accordion3">
																<div class="card-body">
																	<p><img src="assets/images/jobs/<?php echo $jobs['jb_photo'] ?>" class="rounded-circle" style="width:100px">
																	
																	<a href="compte.php?type=edit-job-photo&elt=<?php echo $jobs['jb_id'] ?>"><button class="btn btnOrange btn-sm"><i class="fa fa-hand-o-left"></i> modifier la photo</button></a></p>
																	<p><b>Titre : </b><?php echo $jobs['jb_titre'] ?></p>
																	<p><b>Pays : </b><?php echo $jobs['jb_pays'] ?></p>
																	<p><b>Ville : </b><?php echo $jobs['jb_ville'] ?></p>
																	<p><b>Catégorie : </b><?php echo $jobs['jb_type'] ?></p>
																	<p><b>Durée : </b><?php echo $jobs['jb_duree'] ?></p>
																	<p><b>Profil recherché : </b><?php echo $jobs['jb_niveau'] ?></p>
																	<p><b>Description du job : </b><?php echo $jobs['jb_description'] ?></p>
																</div>
															</div>
														</div>
														<?php
													}
													?>
													</div>
												</div>
											</div>
											<hr>
										</div>
										<!------//this is candidatures content---------->
										<!------this is chats content---------->
										<div id="chats" style="display:none">
											<h3>Mes chats</h3>
											
											<!------chats non lu//------------>
											<div style="max-height:300px; overflow:auto">
												<?php
												$query3=$db->prepare('SELECT DISTINCT ch_code FROM chats WHERE cl_id=:id AND ch_lu=0 ORDER BY ch_id DESC');
												$query3->bindValue(':id', $cl_id, PDO::PARAM_INT);
												$query3->execute();
												while ($codes=$query3->fetch()){
													$query4=$db->prepare('SELECT ch_message, ch_code, ch_date FROM chats WHERE ch_code=:co AND ch_lu=0 ORDER BY ch_id DESC LIMIT 1');
													$query4->bindValue(':co', $codes['ch_code'], PDO::PARAM_INT);
													$query4->execute();
													$chat=$query4->fetch();
													?>
													<p><img src="assets/images/chat.png" style="width:20px"> <a href="chat.php?code=<?php echo $chat['ch_code'] ?>&start-chat=true"><b><?php echo substr($chat['ch_message'],0,50).' ...'; ?></b></a><br>
													<i style="font-size:11px;"><?php echo duree($chat['ch_date']) ?></i></p>
													<hr>
													<?php
												}
												?>
											</div>
											<!------chats lu//------------>
											<div style="max-height:300px; overflow:auto">
												<?php
												$query3=$db->prepare('SELECT DISTINCT ch_code FROM chats WHERE cl_id=:id AND ch_lu=1 ORDER BY ch_id DESC');
												$query3->bindValue(':id', $cl_id, PDO::PARAM_INT);
												$query3->execute();
												while ($codes=$query3->fetch()){
													$query4=$db->prepare('SELECT ch_message, ch_code, ch_date FROM chats WHERE ch_code=:co AND ch_lu=1 ORDER BY ch_id DESC LIMIT 1');
													$query4->bindValue(':co', $codes['ch_code'], PDO::PARAM_INT);
													$query4->execute();
													$chat=$query4->fetch();
													?>
													<p><img src="assets/images/chat.png" style="width:20px"> <a href="chat.php?code=<?php echo $chat['ch_code'] ?>&start-chat=true"><i><?php echo substr($chat['ch_message'],0,50).' ...'; ?></i></a><br>
													<i style="font-size:11px;"><?php echo duree($chat['ch_date']) ?></i></p>
													<hr>
													<?php
												}
												?>
											</div>
										</div>
										<!------//this is chats content---------->
										
										<div class="loader" id="compteSpinner"></div>
									</div>
									
									<script>
										let elts=['accueil', 'infos', 'profile', 'entreprise', 'candidatures', 'chats'];
										function account(elt){
											document.getElementById('compteSpinner').style.display='block';
											
											elts.forEach(function (item){
												if (item != elt){
													document.getElementById(item).style.display='none';
												}
											});
											
											setTimeout(function() { //-------wait 1sec so we can voir spinner effect//-----------
												document.getElementById(elt).style.display='block';
												document.getElementById('compteSpinner').style.display='none';
											}, 1000);
										}
										let opt=<?php echo json_encode($option) ?>; //says if we should display a specific section of user account
										if (opt != 'none'){
											account(opt);
										}
									</script>
								</div>
							</div>
						</div>
					</div>
					<div class="profile-content">
						
					</div>
				</div>
			</div>
		</div>
		<?php
	break;
		
	case 'edit-cv': //add or edit cv
		if (!isset($_GET['form'])){
			?>
			<div class="container">
				<div class="row" style="margin-top:5vw; margin-bottom:5vw;">
					<div class="col-12" style="border-style:outset; border-radius:25px 0px 25px 0px; padding:25px;">
						<center><h1>Editer <span style="color:darkorange">mon CV</span></h1></center>
						<hr>
						<h4><b>NB :</b> Votre ancien CV, si vous en disposé, sera remplaçé par le nouveau.</h4>
						<form action="compte.php?type=edit-cv&form=true" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for="cv"><b>Choisissez le CV</b></label>
								<input type="file" class="form-control" id="cv" name="cv" required="">
							</div>
							
							<button type="submit" class="btn btnBlack">Terminer <i class="fa fa-arrow-right"></i></button>
							<a href="compte.php"><button type="button" class="btn btnOrange">Annuler <i class="fas fa-running"></i></button></a>
						</form>
					</div>
				</div>
			</div>
			<?php
		}else{
			$check = checkFile('cv');
			if (!$check){
				erreur("Oups <i class='fas fa-frown'></i>, erreur détectée dans le chargement de votre CV. Soyez sûre qu'il s'agit bien d'un fichier PDF ou WORD, et qu'il ne dépasse pas 5MO. <a href='compte.php?type=edit-cv'><button class='btn btnOrange'>Réprendre</button></a>");
			}else{
				if (strlen($data['cl_cv'])>8){ //old cv exists, so delete it before all
					$cv=$db->prepare('SELECT cl_cv FROM clients WHERE cl_id=:id');
					$cv->bindValue(':id', $cl_id, PDO::PARAM_INT);
					$cv->execute();
					$cv=$cv->fetch();
					unlink('assets/images/cv/'.$cv['cl_cv']);
				}
				//save new cv
				$elt=move_cv($_FILES['cv']);
				$cv=$db->prepare('UPDATE clients SET cl_cv=:cv WHERE cl_id=:id');
				$cv->bindValue(':id', $cl_id, PDO::PARAM_INT);
				$cv->bindValue(':cv', $elt, PDO::PARAM_STR);
				$cv->execute();
				//-----verify if data truly saved into db//---------
				$count = $cv->rowCount();
				if ($count==0){ //datas not inserted
					erreur("Erreur inconnue, nous sommes navrés <span class='fa fa-frown'></span> Impossible d'enregistrer votre CV.<br><a href='compte.php?type=edit-cv'><button class='btn btnOrange'>Réprendre</button></a>");
				}else{
					?><script>window.location.href="compte.php?cv-ok=true";</script><?php
				}
			}
		}
	break;
		
	case 'edit-photo': //add or edit cv
		?>
		<div class="container">
			<div class="row" style="margin-top:5vw; margin-bottom:5vw;">
				<div class="col-12" style="border-style:outset; border-radius:25px 0px 25px 0px; padding:25px;">
					<center><h1>Editer ma <span style="color:darkorange">photo de profile</span></h1></center>
					<hr>
					<?php include('assets/includes/croppie.html'); ?>
				</div>
			</div>
		</div>
		<?php
	break;
		
	case 'edit-basic-infos': //edit infos
		if (!isset($_GET['form'])){
			?>
			<div class="container">
				<div class="row" style="margin-top:5vw; margin-bottom:5vw;">
					<div class="col-12" style="border-style:outset; border-radius:25px 0px 25px 0px; padding:25px;">
						<center><h1>Editer mes <span style="color:darkorange">informations de base</span></h1></center>
						<hr>
						<form action="compte.php?type=edit-basic-infos&form=true" method="post">
							<div class="form-group">
								<label for="nom"><b>Nom</b></label>
								<input type="text" class="form-control" id="nom" name="nom" value="<?php echo $data['cl_nom'] ?>" required="" minlength="3" maxlength="20">
							</div>
							<div class="form-group">
								<label for="tel"><b>Téléphone</b></label>
								<input type="number" class="form-control" id="tel" name="tel" value="<?php echo $data['cl_telephone'] ?>" required="">
							</div>
							<div class="form-group">
								<label for="mail"><b>Email</b></label>
								<input type="email" class="form-control" id="mail" name="mail" value="<?php echo $data['cl_mail'] ?>" required="" maxlength="60">
							</div>
							
							<button type="submit" class="btn btnBlack">Terminer <i class="fa fa-arrow-right"></i></button>
							<a href="compte.php"><button type="button" class="btn btnOrange">Annuler <i class="fas fa-running"></i></button></a>
						</form>
					</div>
				</div>
			</div>
			<?php
		}else{
			$nom=(isset($_POST['nom']))?(htmlspecialchars($_POST['nom'])):'';
			$tel=(isset($_POST['tel']))?(htmlspecialchars($_POST['tel'])):'';
			$mail=(isset($_POST['mail']))?(htmlspecialchars($_POST['mail'])):'';
			if (strlen($nom)<3 or strlen($tel)<6){
				erreur("Oups <i class='fas fa-frown'></i>, erreur détectée dans le chargement de vos infos. <a href='compte.php?type=edit-basic-infos'><button class='btn btnOrange'>Réprendre</button></a>");
			}else{
				//save infos
				$qu=$db->prepare('UPDATE clients SET cl_nom=:n, cl_telephone=:t, cl_mail=:m WHERE cl_id=:id');
				$qu->bindValue(':id', $cl_id, PDO::PARAM_INT);
				$qu->bindValue(':n', $nom, PDO::PARAM_STR);
				$qu->bindValue(':t', $tel, PDO::PARAM_INT);
				$qu->bindValue(':m', $mail, PDO::PARAM_STR);
				$qu->execute();
				//-----verify if data truly saved into db//---------
				$count = $qu->rowCount();
				if ($count==0){ //datas not inserted
					erreur("Erreur inconnue, nous sommes navrés <span class='fa fa-frown'></span> Impossible d'enregistrer vos infos.<br><a href='compte.php?type=edit-basic-infos'><button class='btn btnOrange'>Réprendre</button></a>");
				}else{
					?><script>window.location.href="compte.php?option=infos&basic-infos-ok=true";</script><?php
				}
			}
		}
	break;
		
	case 'edit-mdp': //edit password
		if (!isset($_GET['form'])){
			?>
			<div class="container">
				<div class="row" style="margin-top:5vw; margin-bottom:5vw;">
					<div class="col-12" style="border-style:outset; border-radius:25px 0px 25px 0px; padding:25px;">
						<center><h1>Editer mon <span style="color:darkorange">mot de passe</span></h1></center>
						<hr>
						<form action="compte.php?type=edit-mdp&form=true" method="post">
							<div class="form-group">
								<label for="mdp1"><b>Ancien mot de passe</b></label>
								<input type="password" class="form-control" id="mdp1" name="mdp1" required="">
							</div>
							<div class="form-group">
								<label for="mdp2">Nouveau mot de passe</label><br>
								<label>Utiliser <i class="fa fa-hand-o-right"></i> <span id="autoMdp" style="background:lime; padding:2px; border-radius:5px;"><?php echo passwordGenerator(8); ?></span> <button type="button" onclick="useAutoPassword()" class="btnOrange btn btn-sm">oui</button> <button type="button" onclick="newAutoPassword()" class="btnOrange btn btn-sm">nouveau</button> | <button type="button" class="btnBlack" onclick="showMdp()" id="eyeContent"><span id="mdpEye" class="fa fa-eye"></span></button></label>
								<input type="password" class="form-control" id="mdp2" name="mdp2" required="" minlength="6">
							</div>
							
							<button type="submit" class="btn btnBlack">Terminer <i class="fa fa-arrow-right"></i></button>
							<a href="compte.php"><button type="button" class="btn btnOrange">Annuler <i class="fas fa-running"></i></button></a>
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
					let mdp='<?php echo passwordGenerator(8); ?>';
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
		}else{
			$mdp1=(isset($_POST['mdp1']))?(htmlspecialchars($_POST['mdp1'])):'';
			$mdp2=(isset($_POST['mdp2']))?(htmlspecialchars($_POST['mdp2'])):'';
			if (strlen($mdp2)<6){
				erreur("Oups <i class='fas fa-frown'></i>, mot de passe trop court, doit atteindre 6 caractères minimum. <a href='compte.php?type=edit-mdp'><button class='btn btnOrange'>Réprendre</button></a>");
			}else{
				//$mdp1=password_hash($mdp1, PASSWORD_DEFAULT);
				$mdp2=password_hash($mdp2, PASSWORD_DEFAULT);
				$qu=$db->prepare('SELECT cl_mdp FROM clients WHERE cl_id=:id');
				$qu->bindValue(':id', $cl_id, PDO::PARAM_INT);
				$qu->execute();
				$qu=$qu->fetch();
				if (!password_verify($mdp1, $qu['cl_mdp'])){
					erreur("Ancien mot de passe invalide. Veuillez réprendre avec le bon mot de passe svp. <a href='compte.php?type=edit-mdp'><button class='btn btnOrange'>Réprendre</button></a> <a href='sign-in.php?type=recuperation'><button class='btn btnBlack'>Je l'ai oublié</button></a>");
				}else{
					//save infos
					$qu=$db->prepare('UPDATE clients SET cl_mdp=:mdp WHERE cl_id=:id');
					$qu->bindValue(':id', $cl_id, PDO::PARAM_INT);
					$qu->bindValue(':mdp', $mdp2, PDO::PARAM_STR);
					$qu->execute();
					//-----verify if data truly saved into db//---------
					$count = $qu->rowCount();
					if ($count==0){ //datas not inserted
						erreur("Erreur inconnue, nous sommes navrés <span class='fa fa-frown'></span> Impossible d'enregistrer vos infos.<br><a href='compte.php?type=edit-mdp'><button class='btn btnOrange'>Réprendre</button></a>");
					}else{
						?><script>window.location.href="compte.php?option=infos&mdp-ok=true";</script><?php
					}
				}
			}
		}
	break;
		
	case 'edit-profile': //edit profile
		if (!isset($_GET['form'])){
			?>
			<div class="container">
				<div class="row" style="margin-top:5vw; margin-bottom:5vw;">
					<div class="col-12" style="border-style:outset; border-radius:25px 0px 25px 0px; padding:25px;">
						<center><h1>Editer mon <span style="color:darkorange">profile</span></h1></center>
						<hr>
						<form action="compte.php?type=edit-profile&form=true" method="post">
							<div class="form-group">
								<label><b>Type compte :</b> vous devez créer/supprimer votre entreprise afin de modifier ce paramètre.</label>
							</div>
							<div class="form-group">
								<label for="cJob"><b>Recherche un job</b></label>
								<select id="cJob" name="cJob" required="" class="form-control">
									<?php if ($data['cl_cherche_job']){ ?><option value="1" selected>OUI</option>
									<?php }else{ ?><option value="0" selected>NON</option><?php } ?>
									<option value="1">OUI</option>
									<option value="0">NON</option>
								</select>
							</div>
							<div class="form-group">
								<label for="dipl"><b>Diplôme</b></label>
								<select id="dipl" name="dipl" required="" class="form-control">
									<?php if ($data['cl_diplome']=="sans_diplome"){ ?><option value="sans_diplome" selected>Pas de diplôme</option>
									<?php }else{ ?><option value="avec_diplome" selected>Avec un diplôme</option><?php } ?>
									<option value="sans_diplome">Je n'ai pas de diplôme</option>
									<option value="avec_diplome">J'ai un diplôme</option>
								</select>
							</div>
							<?php if ($data['cl_diplome']=="avec_diplome"){ ?>
							<div class="form-group">
								<label for="niv"><b></b></label>
								<input type="text" class="form-control" id="niv" name="niv" value="<?php echo $data['cl_niveau'] ?>" required="" maxlength="50">
							</div>
							<?php }else{ ?>
							<input type="hidden" name="niv" value="none">
							<?php } ?>
							<div class="form-group">
								<label for="expe"><b>Expériences (qu'avez vous déjà fait ?)</b></label>
								<textarea id="expe" name="expe" class="form-control" maxlength="245"><?php echo $data['cl_experience'] ?></textarea>
							</div>
							<div class="form-group">
								<label for="desc"><b>Ma description (flattez les recruteurs)</b></label>
								<textarea id="desc" name="desc" class="form-control" maxlength="245"><?php echo $data['cl_description'] ?></textarea>
							</div>
							
							<button type="submit" class="btn btnBlack">Terminer <i class="fa fa-arrow-right"></i></button>
							<a href="compte.php?option=profile"><button type="button" class="btn btnOrange">Annuler <i class="fas fa-running"></i></button></a>
						</form>
					</div>
				</div>
			</div>
			<?php
		}else{
			$cJob=(isset($_POST['cJob']))?(htmlspecialchars($_POST['cJob'])):1;
			$dipl=(isset($_POST['dipl']))?(htmlspecialchars($_POST['dipl'])):0;
			$niv=(isset($_POST['niv']))?(htmlspecialchars($_POST['niv'])):'';
			$expe=(isset($_POST['expe']))?(htmlspecialchars($_POST['expe'])):'';
			$desc=(isset($_POST['desc']))?(htmlspecialchars($_POST['desc'])):'';
			$expe=nl2br($expe);
			$desc=nl2br($desc);
			if ($niv=='none'){
				$niv=null;
			}
			//save data
			$qu=$db->prepare('UPDATE clients SET cl_cherche_job=:cj, cl_diplome=:di, cl_niveau=:ni, cl_experience=:ex, cl_description=:de WHERE cl_id=:id');
			$qu->bindValue(':id', $cl_id, PDO::PARAM_INT);
			$qu->bindValue(':cj', $cJob, PDO::PARAM_STR);
			$qu->bindValue(':di', $dipl, PDO::PARAM_INT);
			$qu->bindValue(':ni', $niv, PDO::PARAM_STR);
			$qu->bindValue(':ex', $expe, PDO::PARAM_STR);
			$qu->bindValue(':de', $desc, PDO::PARAM_STR);
			$qu->execute();
			//-----verify if data truly saved into db//---------
			$count = $qu->rowCount();
			if ($count==0){ //datas not inserted
				erreur("Erreur inconnue, nous sommes navrés <span class='fa fa-frown'></span> Impossible d'enregistrer votre profile.<br><a href='compte.php?type=edit-profile'><button class='btn btnOrange'>Réprendre</button></a>");
			}else{
				?><script>window.location.href="compte.php?option=profile&profile-ok=true";</script><?php
			}
		}
	break;
		
	case 'add-entreprise': //edit profile
		if (!isset($_GET['form'])){
			$ent=$db->prepare('SELECT COUNT(*) FROM entreprises WHERE cl_id=:cl');
			$ent->bindValue(':cl', $cl_id, PDO::PARAM_INT);
			$ent->execute();
			$nbr=$ent->fetchcolumn();
			$ent=$db->prepare('SELECT * FROM entreprises WHERE cl_id=:cl');
			$ent->bindValue(':cl', $cl_id, PDO::PARAM_INT);
			$ent->execute();
			$ent=$ent->fetch();
			?>
			<div class="container">
				<div class="row" style="margin-top:5vw; margin-bottom:5vw;">
					<div class="col-12" style="border-style:outset; border-radius:25px 0px 25px 0px; padding:25px;">
						<center>
							<h1>Editer mon <span style="color:darkorange">entreprise</span></h1>
							<p>En ayant une entreprise, vous pourrez publier des offres d'emploi afin d'embaucher des gens. La photo de l'entreprise est modifiable dans votre compte, section entreprise.</p>
						</center>
						<hr>
						<form action="compte.php?type=add-entreprise&form=true" method="post">
							<div class="form-group">
								<label for="nom"><b>Nom entreprise</b></label>
								<input type="text" class="form-control" id="nom" name="nom" value="<?php echo $ent['en_nom'] ?>" required="" minlength="3" maxlength="30">
							</div>
							<div class="form-group">
								<label for="pays"><b>Pays entreprise</b></label>
								<input type="text" class="form-control" id="pays" name="pays" value="<?php echo $ent['en_pays'] ?>" required="" minlength="3" maxlength="30">
							</div>
							<div class="form-group">
								<label for="ville"><b>Ville entreprise</b></label>
								<input type="text" class="form-control" id="ville" name="ville" value="<?php echo $ent['en_ville'] ?>" required="" minlength="3" maxlength="30">
							</div>
							<div class="form-group">
								<label for="desc"><b>Description entreprise</b></label>
								<textarea id="desc" name="desc" class="form-control" maxlength="245" required=""><?php echo $ent['en_description'] ?></textarea>
							</div>
							<?php if ($nbr==0){ ?><input type="hidden" name="oldOne" value="no">
							<?php }else{ ?><input type="hidden" name="oldOne" value="yes"><?php } ?>
							
							<button type="submit" class="btn btnBlack">Terminer <i class="fa fa-arrow-right"></i></button>
							<a href="compte.php?option=entreprise"><button type="button" class="btn btnOrange">Annuler <i class="fas fa-running"></i></button></a>
						</form>
					</div>
				</div>
			</div>
			<?php
		}else{
			$nom=(isset($_POST['nom']))?(htmlspecialchars($_POST['nom'])):'';
			$pays=(isset($_POST['pays']))?(htmlspecialchars($_POST['pays'])):'';
			$ville=(isset($_POST['ville']))?(htmlspecialchars($_POST['ville'])):'';
			$desc=(isset($_POST['desc']))?(htmlspecialchars($_POST['desc'])):'';
			$oldOne=(isset($_POST['oldOne']))?(htmlspecialchars($_POST['oldOne'])):''; //let us know if the was a company or not
			$desc=nl2br($desc);
			
			//save data
			$dataOk=false;
			if ($oldOne=='yes'){
				$qu=$db->prepare('UPDATE entreprises SET en_nom=:n, en_pays=:p, en_ville=:v, en_description=:d WHERE cl_id=:id');
				$qu->bindValue(':id', $cl_id, PDO::PARAM_INT);
				$qu->bindValue(':n', $nom, PDO::PARAM_STR);
				$qu->bindValue(':p', $pays, PDO::PARAM_INT);
				$qu->bindValue(':v', $ville, PDO::PARAM_STR);
				$qu->bindValue(':d', $desc, PDO::PARAM_STR);
				$qu->execute();
				//-----verify if data truly saved into db//---------
				$count = $qu->rowCount();
				if ($count != 0){
					//change user compte status (from demandeur to recruteur)
					$qu=$db->prepare('UPDATE clients SET cl_type="recruteur", cl_cherche_job=0 WHERE cl_id=:id');
					$qu->bindValue(':id', $cl_id, PDO::PARAM_INT);
					$qu->execute();
					$dataOk=true; //data insertion ok
				}
			}else{
				$qu=$db->prepare('INSERT INTO entreprises(cl_id, en_nom, en_pays, en_ville, en_description, en_date) VALUES(:c, :n, :p, :v, :d, :a)');
				$qu->bindValue(':c', $cl_id, PDO::PARAM_INT);
				$qu->bindValue(':n', $nom, PDO::PARAM_STR);
				$qu->bindValue(':p', $pays, PDO::PARAM_INT);
				$qu->bindValue(':v', $ville, PDO::PARAM_STR);
				$qu->bindValue(':d', $desc, PDO::PARAM_STR);
				$qu->bindValue(':a', date('Y').'-'.date('m').'-'.date('d'), PDO::PARAM_STR);
				$qu->execute();
				//-----verify if data truly saved into db//---------
				$count = $qu->rowCount();
				if ($count != 0){
					//change user compte status (from demandeur to recruteur)
					$qu=$db->prepare('UPDATE clients SET cl_type="recruteur", cl_cherche_job=0 WHERE cl_id=:id');
					$qu->bindValue(':id', $cl_id, PDO::PARAM_INT);
					$qu->execute();
					$dataOk=true; //data insertion ok
				}
			}
			if (!$dataOk){ //datas not inserted
				erreur("Erreur inconnue, nous sommes navrés <span class='fa fa-frown'></span> Impossible d'enregistrer votre entreprise.<br><a href='compte.php?type=add-entreprise'><button class='btn btnOrange'>Réprendre</button></a>");
			}else{
				?><script>window.location.href="compte.php?option=entreprise&entreprise-ok=true";</script><?php
			}
		}
	break;
		
	case 'edit-ent-photo': //add or edit entreprise photo
		?>
		<div class="container">
			<div class="row" style="margin-top:5vw; margin-bottom:5vw;">
				<div class="col-12" style="border-style:outset; border-radius:25px 0px 25px 0px; padding:25px;">
					<center><h1>Editer <span style="color:darkorange">photo entreprise</span></h1></center>
					<hr>
					<?php include('assets/includes/croppie-entreprise.html'); ?>
				</div>
			</div>
		</div>
		<?php
	break;
		
	case 'edit-job': //edit job publié
		if (!isset($_GET['form']) and !isset($_GET['supp'])){
			$jbs=$db->prepare('SELECT * FROM jobs WHERE cl_id=:cl');
			$jbs->bindValue(':cl', $cl_id, PDO::PARAM_INT);
			$jbs->execute();
			$jbs=$jbs->fetch();
			//this code is created by Josué - jose.init.dev@gmail.com
			?>
			<div class="container">
				<div class="row" style="margin-top:5vw; margin-bottom:5vw;">
					<div class="col-12" style="border-style:outset; border-radius:25px 0px 25px 0px; padding:25px;">
						<center><h1>Editer ce <span style="color:darkorange">job</span></h1></center>
						<hr>
						<form action="compte.php?type=edit-job&form=true" method="post">
							<div class="form-group">
								<label for="nom"><b>Titre job</b></label>
								<input type="text" class="form-control" id="nom" name="nom" value="<?php echo $jbs['jb_titre'] ?>" required="" minlength="3" maxlength="50">
							</div>
							<div class="form-group">
								<label for="pays"><b>Pays</b></label>
								<input type="text" class="form-control" id="pays" name="pays" value="<?php echo $jbs['jb_pays'] ?>" required="" minlength="3" maxlength="30">
							</div>
							<div class="form-group">
								<label for="ville"><b>Ville</b></label>
								<input type="text" class="form-control" id="ville" name="ville" value="<?php echo $jbs['jb_ville'] ?>" required="" minlength="3" maxlength="30">
							</div>
							<div class="form-group">
								<label for="tps"><b>Durée</b></label>
								<input type="text" class="form-control" id="tps" name="tps" value="<?php echo $jbs['jb_duree'] ?>" required="" minlength="3" maxlength="10">
							</div>
							<div class="form-group">
								<label for="niv"><b>Niveau de formation</b></label>
								<input type="text" class="form-control" id="niv" name="niv" value="<?php echo $jbs['jb_niveau'] ?>" required="" minlength="3" maxlength="30">
							</div>
							<div class="form-group">
								<label for="type"><b>Diplôme</b></label>
								<select class="form-control" id="type" name="type" required="">
									<option value="<?php echo $jbs['jb_type'] ?>" selected><?php echo $jbs['jb_type'] ?></option>
									<option value="sans_diplome">Sans diplôme</option>
									<option value="avec_diplome">Avec diplôme</option>
								</select>
							</div>
							<div class="form-group">
								<label for="cat"><b>Catégorie du job</b></label>
								<select class="form-control" id="cat" name="cat" required="">
									<option value="<?php echo $jbs['jb_categorie'] ?>" selected><?php echo $jbs['jb_categorie'] ?></option>
									<option value="Taxi">Taxi</option>
									<option value="Menage">Ménage</option>
									<option value="...">...</option>
								</select>
							</div>
							<div class="form-group">
								<label for="desc"><b>Description</b></label>
								<textarea id="desc" name="desc" class="form-control" rows="5" required=""><?php echo $jbs['jb_description'] ?></textarea>
							</div>
							<input type="hidden" name="jbid" value="<?php echo $jbs['jb_id'] ?>">
							
							<button type="submit" class="btn btnBlack">Terminer <i class="fa fa-arrow-right"></i></button>
							<a href="compte.php?option=candidatures"><button type="button" class="btn btnOrange">Annuler <i class="fas fa-running"></i></button></a>
						</form>
					</div>
				</div>
			</div>
			<?php
		}else if (isset($_GET['form'])){
			$nom=(isset($_POST['nom']))?(htmlspecialchars($_POST['nom'])):'';
			$pays=(isset($_POST['pays']))?(htmlspecialchars($_POST['pays'])):'';
			$ville=(isset($_POST['ville']))?(htmlspecialchars($_POST['ville'])):'';
			$tps=(isset($_POST['tps']))?(htmlspecialchars($_POST['tps'])):'';
			$niv=(isset($_POST['niv']))?(htmlspecialchars($_POST['niv'])):'';
			$type=(isset($_POST['type']))?(htmlspecialchars($_POST['type'])):'';
			$cat=(isset($_POST['cat']))?(htmlspecialchars($_POST['cat'])):'';
			$desc=(isset($_POST['desc']))?(htmlspecialchars($_POST['desc'])):'';
			$jbid= (int) (isset($_POST['jbid']))?(htmlspecialchars($_POST['jbid'])):0;
			$desc=nl2br($desc);
			
			//save data
			$qu=$db->prepare('UPDATE jobs SET jb_titre=:nom, jb_pays=:pys, jb_ville=:vil, jb_duree=:tps, jb_niveau=:niv, jb_type=:typ, jb_categorie=:cat, jb_description=:desc WHERE jb_id=:jb');
			$qu->bindValue(':jb', $jbid, PDO::PARAM_INT);
			$qu->bindValue(':nom', $nom, PDO::PARAM_STR);
			$qu->bindValue(':pys', $pays, PDO::PARAM_INT);
			$qu->bindValue(':vil', $ville, PDO::PARAM_STR);
			$qu->bindValue(':tps', $tps, PDO::PARAM_STR);
			$qu->bindValue(':niv', $niv, PDO::PARAM_STR);
			$qu->bindValue(':typ', $type, PDO::PARAM_STR);
			$qu->bindValue(':cat', $cat, PDO::PARAM_STR);
			$qu->bindValue(':desc', $desc, PDO::PARAM_STR);
			$qu->execute();
			//-----verify if data truly saved into db//---------
			$count = $qu->rowCount();
			if ($count == 0){ //datas not inserted
				erreur("Erreur inconnue, nous sommes navrés <span class='fa fa-frown'></span> Impossible d'enregistrer les infos du job.<br><a href='compte.php?type=edit-job'><button class='btn btnOrange'>Réprendre</button></a>");
			}else{
				?><script>window.location.href="compte.php?option=candidatures&job-ok=true";</script><?php
			}
		}else if (isset($_GET['supp'])){ //delete job
			$jbid = (int) (isset($_GET['supp']))?(htmlspecialchars($_GET['supp'])):0;
			?>
			<div class="container">
				<div class="row" style="margin-top:5vw; margin-bottom:5vw;">
					<div class="col-12" style="border-style:outset; border-radius:25px 0px 25px 0px; padding:25px;">
						<center><h1><span style="color:darkorange">Supprimer</span> ce job !</h1></center>
						<hr>
						<form action="compte.php?type=edit-job&supp=true&confirm=true" method="post">
							<div class="form-group">
								<label for="nom"><b>Êtes-vous sûre de bien vouloir supprimer ce job ? <span style='color:red'>L'action est irreversible !</span></b></label>
								<input type="hidden" name="jbid" value="<?php echo $jbid ?>">
							</div>
							
							<button type="submit" class="btn btnBlack">Oui <i class="fa fa-arrow-right"></i></button>
							<a href="compte.php?option=candidatures"><button type="button" class="btn btnOrange">Annuler <i class="fas fa-running"></i></button></a>
						</form>
					</div>
				</div>
			</div>
			<?php
			if (isset($_GET['confirm'])){
				$jbid= (int) (isset($_POST['jbid']))?(htmlspecialchars($_POST['jbid'])):0;
				//delete job
				$qu=$db->prepare('DELETE FROM jobs WHERE jb_id=:jb');
				$qu->bindValue(':jb', $jbid, PDO::PARAM_INT);
				$qu->execute();
				//-----verify if data truly deleted from db//---------
				$count = $qu->rowCount();
				if ($count == 0){ //datas not inserted
					erreur("Erreur inconnue, nous sommes navrés <span class='fa fa-frown'></span> Impossible de supprimer le job.<br><a href='compte.php?type=edit-job&supp=".$jbid."'><button class='btn btnOrange'>Réprendre</button></a>");
				}else{
					?><script>window.location.href="compte.php?option=candidatures&job-del-ok=true";</script><?php
				}
			}
		}
	break;
		
	case 'edit-job-photo': //add or edit job photo
		$jbid= (int) (isset($_GET['elt']))?(htmlspecialchars($_GET['elt'])):0;
		$_SESSION['jbid'] = $jbid;
		//echo $jbid;
		?>
		<div class="container">
			<div class="row" style="margin-top:5vw; margin-bottom:5vw;">
				<div class="col-12" style="border-style:outset; border-radius:25px 0px 25px 0px; padding:25px;">
					<center><h1>Editer la <span style="color:darkorange">photo du job</span></h1></center>
					<hr>
					<?php include('assets/includes/croppie-job.html'); ?>
				</div>
			</div>
		</div>
		<?php
	break;
		
	case 'deco': //cas de deconnexion 1/2 (2/2 in footer)
		$_SESSION['cl_nom']=$nom_site;
		$_SESSION['cl_id']=0;
		?>
		<script type="text/javascript">location.href = 'index.php?deco-ok=1';</script>
		<?php
	break;
		
	default:
		notFound('Aïh aïh Aïh ! Où allez-vous au fait ?');
	break;
} //end switch($type)
} //end else connected
							
//-------------alerts------------------
if (isset($_GET['cv-ok'])){
	showSuccess('Votre CV a été modifié avec succès <i class="fas fa-grin"></i>');
}
if (isset($_GET['photo-ok'])){
	showSuccess('Votre photo de profile a été modifiée avec succès <i class="fas fa-grin"></i>');
}
if (isset($_GET['basic-infos-ok'])){
	showSuccess('Vos infos ont été modifiées avec succès <i class="fas fa-grin"></i>');
}
if (isset($_GET['mdp-ok'])){
	showSuccess('Votre mot de passe a été modifié avec succès <i class="fas fa-grin"></i>');
}
if (isset($_GET['profile-ok'])){
	showSuccess('Votre profile a été modifié avec succès <i class="fas fa-grin"></i>');
}
if (isset($_GET['entreprise-ok'])){
	showSuccess('Votre entreprise a été éditée avec succès <i class="fas fa-grin"></i>');
}
if (isset($_GET['ent-photo-ok'])){
	showSuccess('Logo entreprise éditée avec succès <i class="fas fa-grin"></i>');
}
if (isset($_GET['job-ok'])){
	showSuccess('Infos du job modifiées avec succès <i class="fas fa-grin"></i>');
}
if (isset($_GET['job-del-ok'])){
	showSuccess('Job supprimé avec succès <i class="fas fa-grin"></i>');
}
if (isset($_GET['job-photo-ok'])){
	showSuccess('Photo du job éditée avec succès <i class="fas fa-grin"></i>');
}
//-------------//alerts------------------
?>

<style>
	/*----spinner----*/
	.loader {
		display: none;
		position: absolute;
		top: 40%;
		left: 30%;
		border: 16px solid #f3f3f3;
		border-radius: 50%;
		border-top: 16px solid darkorange;
		border-bottom: 16px solid darkorange;
		width: 120px;
		height: 120px;
		-webkit-animation: spin 2s linear infinite;
		animation: spin 2s linear infinite;
	}

	@-webkit-keyframes spin {
	  0% { -webkit-transform: rotate(0deg); }
	  100% { -webkit-transform: rotate(360deg); }
	}

	@keyframes spin {
	  0% { transform: rotate(0deg); }
	  100% { transform: rotate(360deg); }
	}
	/*----//spinner----*/
	
	.profile-header {
		background: #FF4E50; 
		background: -webkit-linear-gradient(to right, #F9D423, #FF4E50); 
		background: linear-gradient(to right, #F9D423, #FF4E50);
		display: flex;
		flex: 1;
		padding: 30px;
		flex-direction: column;
		border: 100px solid #333;
		border-left: 0;
		border-top:0;
		border-right: 0;
		border-radius: 0 0 30%;
		box-shadow: 3px 5px 7px 3px #777;
	}
	.profile-info {
		display: flex;
		flex: 1;
		justify-content: space-around;
		align-self: space-around;
		flex-direction: column;
	}
	.profile-img {
		justify-content: center;
		align-self: center;
	}
	.profile-img img {
		border: 3px solid #fff;
		box-shadow: 0px 4px 4px 5px #888;
		border-radius: 50%;
	}
	.profile-username {
		justify-content: center;
		align-self: center;
		font-size: 25px;
		letter-spacing: 3px;
		color: white;
	}
	.profile-content {
		padding: 5px;
		border-left: 2px solid #eee;
	}
	
	/*-------------buttons-----------*/
	.block-menu {
		display: block;
		background: #000;
		border-radius: 7px 7px 7px 0px;
	}
	.block-menu li {
		display: inline-block;
	}
	.block-menu li a {
		color: #fff;
		display: block;
		text-decoration: none;
		font-family: 'Passion One', Arial, sans-serif;
		font-smoothing: antialiased;
		text-transform: uppercase;
		overflow: visible;
		line-height: 20px;
		font-size: 15px;
		padding: 15px 10px;
	}
	/* animation domination */
	.three-d {
		perspective: 200px;
		transition: all .07s linear;
		position: relative;
		cursor: pointer;
	}
	/* complete the animation! */
	.three-d:hover .three-d-box, 
	.three-d:focus .three-d-box {
		transform: translateZ(-25px) rotateX(90deg);
	}
	.three-d-box {
		transition: all .3s ease-out;
		transform: translatez(-25px);
		transform-style: preserve-3d;
		pointer-events: none;
		position: absolute;
		top: 0;
		left: 0;
		display: block;
		width: 100%;
		height: 100%;
	} 
	/*	put the "front" and "back" elements into place with CSS transforms, specifically translation and translatez */
	.front {
		transform: rotatex(0deg) translatez(25px);
	}
	.back {
		transform: rotatex(-90deg) translatez(25px);
		color: #ffe7c4;
	}
	.front, .back {
		display: block;
		width: 100%;
		height: 100%;
		position: absolute;
		top: 0;
		left: 0;
		background: black;
		padding: 15px 10px;
		color: white;
		pointer-events: none;
		box-sizing: border-box;
	}
	/*-------------//buttons-----------*/
</style>

<?php include('footer.php'); ?>