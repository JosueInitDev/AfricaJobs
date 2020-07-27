<?php include('top.php'); ?>
<div class="bannerhny-content">
	<!--/banner-slider-->
	<div class="content-baner-inf">
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<div class="container">
						<div class="carousel-caption">
							<h3 class="d-none d-md-block">Aucun diplôme ?<br>aucun problème</h3>
							<h3 class="d-md-none" style="font-size:20px">Aucun diplôme ?<br>aucun problème</h3>
							<a href="jobs.php?type=work&categorie=sans-diplome" class="shop-button btn">
								Trouver un job sans diplôme <span class="fa fa-car"></span><span class="fas fa-running"></span>
							</a>
						</div>
					</div>
				</div>
				<div class="carousel-item item2">
					<div class="container">
						<div class="carousel-caption">
							<h3 class="d-none d-md-block">Avez-vous un diplôme ?<br>c'est par ici</h3>
							<h3 class="d-md-none" style="font-size:20px">Avez-vous un diplôme ?<br>c'est par ici</h3>
							<a href="jobs.php?type=work&categorie=avec-diplome" class="shop-button btn">
								Jobs avec diplôme <span class="fa fa-graduation-cap"></span><span class="fas fa-running"></span>
							</a>
						</div>
					</div>
				</div>
				<div class="carousel-item item3">
					<div class="container">
						<div class="carousel-caption">
							<h3 class="d-none d-md-block">Plus tôt employeur ?<br>Embauchez quelqu'un</h3>
							<h3 class="d-md-none" style="font-size:20px">Plus tôt employeur ?<br>Embauchez quelqu'un</h3>
							<a href="jobs.php?type=hire" class="shop-button btn">
								Embaucher maintenant <span class="fas fa-running"></span>
							</a>
						</div>
					</div>
				</div>
				<div class="carousel-item item4">
					<div class="container">
						<div class="carousel-caption">
							<h3 class="d-none d-md-block">Voir jobs disponilbes<br>Ou les occasions d'embauche</h3>
							<h3 class="d-md-none" style="font-size:20px">Voir jobs disponilbes<br>Ou les occasions d'embauche</h3>
							<a href="#" class="shop-button btn">
								Voir maintenant <span class="fas fa-running"></span>
							</a>
						</div>
					</div>
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
	<!--//banner-slider-->
	<!--//banner-slider-->
	<div class="right-banner">
		<div class="right-1">
			<div class="container">
				<div class="row">
					<div class="col-12">
					  <div class="wrap" style="opacity:0.8">
						  <h5 style="color:#fff; font-size:30px">Trouvez un job maintenant</h5>
						  <h5 style="color:#fff; font-size:20px">En créant un compte</h5>
						<div class="login-bghny p-md-5 p-4 mx-auto mw-100">
						  <form action="#" method="post">
							<div class="form-group">
							  <p class="login-texthny mb-2">Numéro de téléphone ou email</p>
							  <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
								placeholder="Ex: 05181818" required="">
							</div>
							<div class="form-group">
							  <p class="login-texthny mb-2">Je suis</p>
							  <select class="form-control" id="exampleInputPassword1" name="role" required="">
								  <option value="demandeur">Demandeur d'emploi (cherche travail)</option>
								  <option value="recruteur">Recruteur (cherche employé)</option>
							  </select>
							</div>
							<button type="submit" class="submit-login btn mb-4">Créer mon compte</button>
						  </form>
						</div>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
</div> <!-- don't delete this -->
</div> <!-- don't delete this -->
</section> <!-- don't delete this -->

<!-- offre emplois -->
<?php
$query=$db->prepare('SELECT COUNT(*) FROM jobs WHERE jb_type="sans_diplome"');
$query->execute();
$nbr=$query->fetchcolumn();
if ($nbr>0){
?>
<section class="w3l-grids-hny-2">
	<div class="grids-hny-2-mian py-5">
		<div class="container py-lg-5">
			<h3 class="hny-title mb-0 text-center"><span>Pas bésoin de diplôme</span> pour ces jobs</h3>
			<p class="mb-4 text-center">Travaillez maintenant, plusieurs offres d'emploi de tout type...</p>
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
			<br><hr><br>
			<?php }

			$query=$db->prepare('SELECT COUNT(*) FROM jobs WHERE jb_type="avec_diplome"');
			$query->execute();
			$nbr=$query->fetchcolumn();
			if ($nbr>0){
			?>
			<h3 class="hny-title mb-0 text-center">Jobs <span>nécessitant un diplôme</span></h3>
			<p class="mb-4 text-center">Travaillez maintenant, plusieurs offres d'emploi de tout type...</p>
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
		</div>
	</div>
</section>
<?php } ?>
<!-- //offre emplois -->

<!-- section -->
<section class="w3l-content-w-photo-6">
  <div class="content-photo-6-mian py-5">
		 <div class="container py-lg-5">
				<div class="align-photo-6-inf-cols row">

					<div class="photo-6-inf-right col-lg-6">
							<h3 class="hny-title text-left">Je travail maintenant <span>ou j'embauche</span></h3>
							<p>Retrouvez tous les types de jobs ou des personnes à embaucher.</p>
							<a href="#" class="read-more btn">Les Jobs</a>
							<a href="#" class="read-more btn">Les emplyés</a>
					</div>
					<div class="photo-6-inf-left col-lg-6">
							<img src="assets/images/1.jpg" class="img-fluid" alt="">
					</div>
				</div>
			 </div>
		 </div>
 </section>
<!-- //section -->

<!-- embaucher -->
<?php
$query=$db->prepare('SELECT COUNT(*) FROM clients WHERE cl_type="employer" AND cl_cherche_job=1');
$query->execute();
$nbr=$query->fetchcolumn();
if ($nbr>0){
?>
<section class="w3l-grids-hny-2">
	<div class="grids-hny-2-mian py-5">
		<div class="container py-lg-5">
			<h3 class="hny-title mb-0 text-center">Je veux plus tôt <span>embaucher</span></h3>
			<p class="mb-4 text-center">Trouvez la personne à embaucher sans vous prendre la tête...</p>
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
		</div>
	</div>
</section>
<?php } ?>
<!-- //embaucher -->

<!-- inscription-->
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

<!-- customers -->
<section class="w3l-customers-sec-6" id="customers">
	<div class="customers-sec-6-cintent py-5" style="background:#fff">
		<!-- /customers-->
		<div class="container py-lg-5">
				<h3 class="hny-title text-center mb-0 ">Ils nous <span>aiment</span></h3>
				<p class="mb-5 text-center">Ce qu'ils disent de nous</p>
			<div class="row customerhny my-lg-5 my-4">
				<div class="col-md-12">
					<div id="customerhnyCarousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#customerhnyCarousel" data-slide-to="0" class="active"></li>
							<li data-target="#customerhnyCarousel" data-slide-to="1"></li>
						</ol>
						<!-- Carousel items -->
						<div class="carousel-inner">
							<?php
							$query=$db->prepare('SELECT * FROM review_comments WHERE rc_status=1 ORDER BY rc_id DESC LIMIT 8');
							$query->execute();
							$data=$query->fetchall();
							$nbr=sizeof($data);
							//echo $nbr;
							?>
							<div class="carousel-item active">
								<div class="row">
									<?php for ($i=0; $i<4; $i++){ ?>
									<div class="col-6 col-md-3">
										<div class="customer-info text-center">
											<div class="feedback-hny" style="height:300px">
												<span class="fa fa-quote-left"></span>
												<p class="feedback-para"><?php echo $data[$i]['rc_comment'] ?></p>
											</div>
											<div class="feedback-review mt-4">
												<?php
												if ($data[$i]['cl_id']!=0){
													$clphoto=$db->prepare('SELECT cl_photo FROM clients WHERE cl_id=:id');
													$clphoto->bindValue(':id', $data[$i]['cl_id'], PDO::PARAM_INT);
													$clphoto->execute();
													$clphoto=$clphoto->fetch();
													$clphoto=$clphoto['cl_photo'];
													echo '<img src="assets/images/clients/'.$clphoto.'" class="img-fluid" alt="'.$nom_site.'">';
												}else{
													echo '<img src="assets/images/clients/user-default.png" class="img-fluid" alt="'.$nom_site.'">';
												}
												?>
												<h5><?php echo $data[$i]['rc_name'] ?></h5>
											</div>
										</div>
									</div>
									<?php } ?>
								</div>
								<!--.row-->
							</div>
							<!--.item-->

							<div class="carousel-item">
								<div class="row">
									<?php for ($i=4; $i<$nbr; $i++){ ?>
									<div class="col-6 col-md-3">
										<div class="customer-info text-center">
											<div class="feedback-hny" style="height:300px">
												<span class="fa fa-quote-left"></span>
												<p class="feedback-para"><?php echo $data[$i]['rc_comment'] ?></p>
											</div>
											<div class="feedback-review mt-4">
												<?php
												if ($data[$i]['cl_id']!=0){
													$clphoto=$db->prepare('SELECT cl_photo FROM clients WHERE cl_id=:id');
													$clphoto->bindValue(':id', $data[$i]['cl_id'], PDO::PARAM_INT);
													$clphoto->execute();
													$clphoto=$clphoto->fetch();
													$clphoto=$clphoto['cl_photo'];
													echo '<img src="assets/images/clients/'.$clphoto.'" class="img-fluid" alt="'.$nom_site.'">';
												}else{
													echo '<img src="assets/images/clients/user-default.png" class="img-fluid" alt="'.$nom_site.'">';
												}
												?>
												<h5><?php echo $data[$i]['rc_name'] ?></h5>
											</div>
										</div>
									</div>
									<?php } ?>
								</div>
								<!--.row-->
							</div>
							<!--.item-->

						</div>
						<!--.carousel-inner-->
					</div>
					<!--.Carousel-->

				</div>
			</div>
		</div>
	</div>
</section>
<!-- //customers-->

<?php include('footer.php'); ?>