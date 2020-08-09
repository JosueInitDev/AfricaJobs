			<?php
			include('assets/includes/constants.php');
			include('assets/includes/identifiants.php');
			$cl=(isset($_GET['cl']))?(htmlspecialchars($_GET['cl'])):0;
			$cl=strip_tags($cl);
			$query=$db->prepare('SELECT * FROM clients WHERE cl_id=:id');
			$query->bindValue(':id', $cl, PDO::PARAM_INT);
			$query->execute();
			$data=$query->fetch();

			$titre_page='CV '.$data['cl_nom'].' :: '.$nom_site;
			$description_page=$data['cl_description'];
			$title="Retour vers profiles";
			include('top.php');
			?>
			<div class="breadcrumb-contentnhy">
				<div class="container">
					<nav aria-label="breadcrumb">
						<h2 class="hny-title text-center"><?php echo $data['cl_nom'] ?></h2>
						<ol class="breadcrumb mb-0">
							<li><a href="index.php">Accueil</a>
							<span class="fa fa-angle-double-right"></span></li>
							<li class="active"><a href="<?php echo $_SERVER['HTTP_REFERER'] ?>"><?php echo $title ?></a>
							<span class="fa fa-angle-double-right"></span></li>
							<li class="active">CV</li>
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
				
				viewsNumber("profile (cv)", $cl, $cl_nom); //enregistre les vus and who views
				
				?>
				<div class="col-md-12">
					<div class="row" style="padding:10px;">
						<div class="col-12" style="padding:10px;">
							<div class="row" style="padding:10px; background:#000; border-radius:5px;">
								<div class="col-3">
									<div class="d-none d-md-block" style="background-image: url('assets/images/clients/<?php echo $data['cl_photo'] ?>'); background-position:top; background-size:cover; width:150px; height:150px; border-radius:50%; border:5px solid rgba(0,0,0,0.1);" title="<?php echo $data['cl_nom'] ?>">
										<!-- pofile image for md screen & plus// -->
									</div>
									<div class="d-md-none" style="background-image: url('assets/images/clients/<?php echo $data['cl_photo'] ?>'); background-position:top; background-size:cover; width:70px; height:70px; border-radius:50%; border:5px solid rgba(0,0,0,0.1);" title="<?php echo $data['cl_nom'] ?>">
										<!-- pofile image for xs & sm screens// -->
									</div>
								</div>
								<div class="col-9">
									<div style="text-align:right; color:#fff; padding-top:2vw; text-transform:uppercase;">
										<h1 class="d-none d-md-block"><?php echo $data['cl_nom'] ?></h1>
										<h3 class="d-md-none"><?php echo $data['cl_nom'] ?></h3>
										<h6><?php echo $data['cl_niveau'] ?></h6>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-4 col-md-3">
									<div class="row">
										<div class="col-12" style="padding:10px; background:#f4f4f4; border-right:10px solid #000;">
											
										  <?php if ($cl_id<=0){ ?>
										  <aside class="button-log usernhy">
											<a class="btn-open" href="#" >
											  <span class="fa fa-hand-o-right bounce"></span><button class="btn btnBlack" title="Prénez les contacts de la personne">Embaucher</button>
											</a>
										  </aside>
										  <?php }else{ ?>
										  <aside>
											<span class="fa fa-hand-o-right bounce"></span><a href="user-infos.php?type=hire&cl=<?php echo $cl ?>"><button class="btn btnBlack" title="Prénez les contacts de la personne">Embaucher</button></a>
										  </aside>
										  <?php } ?>
											
											<hr>
											<?php if ($data['cl_diplome']=='sans_diplome') echo '<p><span class="fas fa-user-graduate"></span> <b>Diplôme</b>: Non Diplômé</p>';
											else echo '<p><span class="fas fa-user-graduate"></span> <b>Diplôme</b> : Diplômé</p>'; ?>
											<hr>
										</div>
										<div class="col-12" style="padding:10px; background:#FDF3E3; border-right:10px solid #000;">
											<hr>
											<p><span class="fas fa-chalkboard-teacher"></span> <b>Formation</b>: <?php echo $data['cl_niveau'] ?></p>
											<hr>
										</div>
										<div class="col-12" style="padding:10px; background:#f4f4f4; border-right:10px solid #000;">
											<hr>
											<p><span class="fas fa-pen"></span> <b>Expériences</b>: <?php echo $data['cl_experience'] ?></p>
											<hr>
										</div>
									</div>
								</div>
								
								<div class="col-8 col-md-9" style="padding:10px">
									<hr>
									<p><b><span class="fas fa-book-open"></span> Description :</b></p>
									<p><?php echo $data['cl_description'] ?></p>
									<hr>
									<?php
									if (strlen($data['cl_cv'])>8 and $cl_id<=0){ //cv exists
										?><aside class="button-log usernhy"><span class="fa fa-file-text"></span> <b>CV</b> : 
										<a class="btn-open" href="#" >
										  <button class="btn btnOrange"><?php echo 'cv-'.$data['cl_nom'].'.pdf' ?></button>
										</a></aside><?php
									}
									else if (strlen($data['cl_cv'])>8 and $cl_id>0){ //cv exists
									?><p><span class="fa fa-file-text"></span> <b>CV</b> : <a href="assets/images/cv/<?php echo $data['cl_cv'] ?>" title="Afficher le CV (dans un autre onglet)" target="_blank"><button class="btn btnOrange"><?php echo 'cv-'.$data['cl_nom'].'.pdf' ?></button></a></p><?php
									}
									else{
										?><p><span class="fa fa-file-text"></span> <b>CV</b> : aucun cv</p><?php
									} ?>
									<hr>
									<hr>
									
								  <?php if ($cl_id<=0){ ?>
								  <aside class="button-log usernhy">
									<a class="btn-open" href="#" >
									  <span class="fa fa-hand-o-right bounce"></span><button class="btn btnBlack" title="Prénez les contacts de la personne">Embaucher</button>
									</a>
								  </aside>
								  <?php }else{ ?>
								  <aside>
									<span class="fa fa-hand-o-right bounce"></span><a href="user-infos.php?type=hire&cl=<?php echo $cl ?>"><button class="btn btnBlack" title="Prénez les contacts de la personne">Embaucher</button></a>
								  </aside>
								  <?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
			break;
			case 'hire':
				if ($cl_id<=0){
					?><script>window.location.href="user-infos.php?cl=<?php echo $cl ?>";</script><?php //kick user out
				}else{ //user connected and can be here
				?>
				<div class="col-md-12">
					<div class="row" style="padding:10px;">
						<div class="col-12" style="padding:10px;">
							<div class="row" style="padding:10px; background:#000; border-radius:5px;">
								<div class="col-3">
									<div class="d-none d-md-block" style="background-image: url('assets/images/clients/<?php echo $data['cl_photo'] ?>'); background-position:top; background-size:cover; width:150px; height:150px; border-radius:50%; border:5px solid rgba(0,0,0,0.1);" title="<?php echo $data['cl_nom'] ?>">
										<!-- pofile image for md screen & plus// -->
									</div>
									<div class="d-md-none" style="background-image: url('assets/images/clients/<?php echo $data['cl_photo'] ?>'); background-position:top; background-size:cover; width:70px; height:70px; border-radius:50%; border:5px solid rgba(0,0,0,0.1);" title="<?php echo $data['cl_nom'] ?>">
										<!-- pofile image for xs & sm screens// -->
									</div>
								</div>
								<div class="col-9">
									<div style="text-align:right; color:#fff; padding-top:2vw; text-transform:uppercase;">
										<h1 class="d-none d-md-block"><?php echo $data['cl_nom'] ?></h1>
										<h3 class="d-md-none"><?php echo $data['cl_nom'] ?></h3>
										<h6><?php echo $data['cl_niveau'] ?></h6>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-4 col-md-3">
									<div class="row">
										<div class="col-12" style="padding:10px; background:#f4f4f4; border-right:10px solid #000;">
											<hr>
											<?php if ($data['cl_diplome']=='sans_diplome') echo '<p><span class="fas fa-user-graduate"></span> <b>Diplôme</b> : Non Diplômé</p>';
											else echo '<p><span class="fas fa-user-graduate"></span> <b>Diplôme</b>: Diplômé</p>'; ?>
											<hr>
										</div>
										<div class="col-12" style="padding:10px; background:#FDF3E3; border-right:10px solid #000;">
											<hr>
											<p><span class="fas fa-chalkboard-teacher"></span> <b>Formation</b>: <?php echo $data['cl_niveau'] ?></p>
											<hr>
										</div>
										<div class="col-12" style="padding:10px; background:#f4f4f4; border-right:10px solid #000;">
											<hr>
											<p><span class="fas fa-pen"></span> <b>Expériences</b>: <?php echo $data['cl_experience'] ?></p>
											<hr>
										</div>
										<div class="col-12" style="padding:10px; background:#FDF3E3; border-right:10px solid #000;">
											<hr>
											<?php
											if (strlen($data['cl_cv'])>10 and $cl_id<=0){ //cv exists
												?><aside class="button-log usernhy"><span class="fa fa-file-text"></span> <b>CV</b> : 
												<a class="btn-open" href="#" >
												  <button class="btn btnOrange"><?php echo 'cv-'.$data['cl_nom'].'.pdf' ?></button>
												</a></aside><?php
											}
											else if (strlen($data['cl_cv'])>10 and $cl_id>0){ //cv exists
											?><p><span class="fa fa-file-text"></span> <b>CV</b> : <a href="assets/images/cv/<?php echo $data['cl_cv'] ?>" title="Afficher le CV (dans un autre onglet)" target="_blank"><button class="btn btnOrange"><?php echo 'cv-'.$data['cl_nom'].'.pdf' ?></button></a></p><?php
											}
											else{
												?><p><span class="fa fa-file-text"></span> <b>CV</b> : aucun cv</p><?php
											} ?>
											<hr>
										</div>
									</div>
								</div>
								
								<div class="col-8 col-md-9" style="padding:10px" id="embaucher">
									<hr>
									<h2><span style="color:darkorange">EMBAU</span>CHER </h2>
									<p>Vous pouvez contacter direntement la personne vias ce site, par appel téléphonique ou par email.</p>
									<hr>
									<h4><span class="fa fa-comments"></span> Messagerie du site : <a href="chat.php?new-chat=true&with=<?php echo $data['cl_id'] ?>"><button class="btn btnBlack btn-sm">Chater</button></a></h4>
									<hr>
									<h4><span class="fa fa-phone"></span> Appel téléphonique : <a href="callto:<?php echo $data['cl_telephone'] ?>"><button class="btn btnBlack btn-sm">Appeler</button></a></h4>
									<hr>
									<?php
									if (strlen($data['cl_mail'])>5){ //mail exists
										?><h4><span class="fa fa-envelope"></span> Contacter par email : <a href="mailto:<?php echo $data['cl_mail'] ?>"><button class="btn btnBlack btn-sm">Envoyer email</button></a></h4><?php
									}
									else{
										?><h4><span class="fa fa-envelope"></span> Contacter par email : <button type="button" class="btn disabled btnOrange btn-sm">Ne possède pas d'email</button></h4><?php
									} ?>
									<hr>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
					//this code is created by Josué - jose.init.dev@gmail.com
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