			<?php
			include('assets/includes/constants.php');
			$titre_page='A Propos :: '.$nom_site;
			$title="A Propos";
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
							<li class="active">Bienvenue</li>
						</ol>
					</nav>
				</div>
			</div>
		</div> <!-- don't delete this -->
	</div> <!-- don't delete this -->
</section> <!-- don't delete this -->

<!-- content-6-section -->
<section class="w3l-wecome-content-6">
	<div class="ab-content-6-mian py-5">
		<div class="container py-lg-5">
			<div class="welcome-grids row">
				<div class="col-lg-6 mb-lg-0 mb-5">
					<h3 class="hny-title"><?php echo substr($nom_site,0,3) ?><span><?php echo substr($nom_site,3,1) ?></span><?php echo substr($nom_site,4) ?></h3>
					<p class="my-4" style="text-align:justify">Offrir la possibilité à tous ceux qui du travail d'en trouver facilement quelque soit leur niveau de formation, partant des illétrés jusqu'aux personnes les plus diplômées, est notre but premier. Nous offrons la possiblité aux entreprises ou aux particulier cherchant des personnes, les perles rares, à embaucher de les trouver facilement.</p>
					<p class="mb-4" style="text-align:justify">Si vous cherchez du travail, ou que vous voudrez trouver des talents à embaucher, n'hésitez plus et créez un compte maintenant. Un mode premium est aussi disponible si vous voulez être au dévant de tous.</p>
					<div class="read">
						<a href="index.php" class="read-more btn">Inscription</a> <a href="go-premium.php" class="read-more btn">Premium</a> <a href="jobs.php" class="read-more btn">Jobs</a> <a href="faq.php" class="read-more btn">FAQ</a>
					</div>	
				</div>
				<div class="col-lg-6 welcome-image">
					<img src="assets/images/22.jpg" class="img-fluid" alt="" />
				</div>	
			</div>			 
		 </div>
	 </div>
</section>
<!-- //content-6-section -->

 <!-- /specification-6-->
<section class="w3l-specification-6">
  <div class="specification-6-mian py-5">
		 <div class="container py-lg-5">
				<div class="row story-6-grids text-left">
						<div class="col-lg-5 story-gd">
							<img src="assets/images/about.jpg" class="img-fluid" alt="/">
						</div>
						<div class="col-lg-7 story-gd pl-lg-4">
							<h3 class="hny-title">Eradiquer le <span>chômage</span></h3>
							<p style="text-align:justify">Avec un taux de chômeurs très élévé en Afrique, notre objectif est de lutter contre ce phénomène, nous <?php echo $nom_site ?> créé le 30-07-2020. Pour opportuniser plus la jeunesse dans le domaines de l'emploie, <?php echo $nom_site ?> a pour but de minimiser le taux de chômeurs. Un fléau dont la recherche d'un mécanisme de combat a suscité notre inspiration, et elle se concrétise dans l'objectif de rapprocher les chômeurs aux employeurs. Convaincre, gagner la confiance, sécuriser les données et autres informations est primordial.<br>
							Nous vous offrons la meilleur des opportunités pour mieux vous rapprocher des employeurs, de faire des demandes d'emplois selon les exigences des employeurs auprès des entreprises partenaire et employeurs personnels.</p>

							<div class="row story-info-content mt-md-5 mt-4">
								<div class="col-md-6 story-info">
									<h5> <a href="jobs.php?type=work&categorie=sans-diplome">01. Jobs sans diplôme</a></h5>
								</div>
								<div class="col-md-6 story-info">
									<h5> <a href="jobs.php?type=work&categorie=avec-diplome">02. Jobs avec diplôme</a></h5>
								</div>
								<div class="col-md-6 story-info">
									<h5> <a href="jobs.php?type=hire&categorie=sans-diplome">03. Embaucher non diplômés</a></h5>
								</div>
								<div class="col-md-6 story-info">
									<h5> <a href="jobs.php?type=hire&categorie=avec-diplome">04. Embaucher diplômés</a></h5>
								</div>
							</div>
						</div>
					</div>
			 </div>
		 </div>
 </section>
<!-- //specification-6-->

<!-- features-4 -->
<section class="features-4">
	<div class="features4-block py-5" style="background:#fff">
		<div class="container py-lg-5">
			<h6>Je travail maintenant</h6>
			<h3 class="hny-title text-center">Nous <span>services</span></h3>
			
			<div class="features4-grids text-center row mt-5">
				<div class="col-lg-3 col-md-6 features4-grid">
					<div class="features4-grid-inn">
						<span class="fa fa-bullhorn icon-fea4" aria-hidden="true"></span>
						<h5><a href="#URL">Promotion</a></h5>
						<p>Promouvoir votre entreprise ou votre CV et vous démarquer des autres.</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 features4-grid sec-features4-grid">
					<div class="features4-grid-inn">
						<span class="fa fa-truck icon-fea4" aria-hidden="true"></span>
						<h5><a href="#URL">Travail pour tous</a></h5>
						<p>Vous trouver du travail, que vous ayez 0 diplôme ou tous les diplômes du monde.</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 features4-grid">
					<div class="features4-grid-inn">
						<span class="fa fa-building icon-fea4" aria-hidden="true"></span>
						<h5><a href="#URL">Dénicher les perles</a></h5>
						<p>Dénicher pour votre entreprise les perles rares sur le marché du travail.</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 features4-grid">
					<div class="features4-grid-inn">
						<span class="fa fa-user icon-fea4" aria-hidden="true"></span>
						<h5><a href="#URL">C'est vous le boss</a></h5>
						<p>Mener vos projets de recrutement et de recherche d'emploi.</p>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- //features-4 -->

<!-- confidentialité -->
<section class="w3l-services-6">
	<div class="services-grids-6 py-5">
		<div class="container py-lg-5">
			<div class="row w3-icon-grid-gap1">
				
				<div class="col-md-6 w3-icon-grid1" id="termes-conditions">
					<div class="card" style="background:none">
						<div class="card-header">
							<a class="card-link" data-toggle="collapse" href="#collapse1">
								<span class="fa fa-codepen" aria-hidden="true"></span>
								<h3>Termres & conditions</h3><br><br>
								<p>Lire ...</p>
							</a>
						</div>
						<div id="collapse1" class="collapse hide" data-parent="#termes-conditions">
							<div class="card-body" style="text-align:justify">
								<p>Lorem sint occaecat non proident, sunt in culpa quis. Phasellus lacinia id erat eu ullamcorper. Nunc id ipsum fringilla, gravida felis vitae. Phasellus lacinia id, sunt in culpa quis. Phasellus lacinia.</p>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-6 w3-icon-grid1" id="confidentialite">
					<div class="card" style="background:none">
						<div class="card-header">
							<a class="card-link" data-toggle="collapse" href="#collapse2">
								<span class="fa fa-codepen" aria-hidden="true"></span>
								<h3>Confidentialité</h3><br><br>
								<p>Lire ...</p>
							</a>
						</div>
						<div id="collapse2" class="collapse hide" data-parent="#confidentialite">
							<div class="card-body" style="text-align:justify">
								<p>Lorem sint occaecat non proident, sunt in culpa quis. Phasellus lacinia id erat eu ullamcorper. Nunc id ipsum fringilla, gravida felis vitae. Phasellus lacinia id, sunt in culpa quis. Phasellus lacinia.</p>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-6 w3-icon-grid1" id="securite">
					<div class="card" style="background:none">
						<div class="card-header">
							<a class="card-link" data-toggle="collapse" href="#collapse3">
								<span class="fa fa-codepen" aria-hidden="true"></span>
								<h3>Sécurité</h3><br><br>
								<p>Lire ...</p>
							</a>
						</div>
						<div id="collapse3" class="collapse hide" data-parent="#securite">
							<div class="card-body" style="text-align:justify">
								<h5>Protection des données personnelles</h5>
								<p>Les informations vous concernant sont destinées à notre société <?php echo $nom_site ?>, responsable de traitement, afin d'exécuter vos commandes, de vous fournir les services auxquels vous souscrivez et de vous adresser des offres <?php echo $nom_site ?>. Si vous le souhaitez, vous pourrez également bénéficier des offres de nos partenaires par e-mail ou par SMS. Ces informations peuvent également être transmises à nos sous-traitants et prestataires.</p>
								<p>Conformément à la Règlementation applicable en matière de protection des données à caractère personnel, vous disposez de différents droits, dont un droit d'accès, de rectification, et d'opposition au traitement de vos données. Pour exercer vos droits, il vous suffit de nous écrire en nous indiquant vos nom, prénom, adresse, si possible numéro de client et en joignant un justificatif d'identité à : <?php echo $nom_site ?> - Service Clients, ou par e-mail à : <?php echo $mail_site ?>. Vous pouvez vous opposer à tout moment et sans motif à ce que vos données soient utilisées à des fins de vous adresser des offres <?php echo $nom_site ?> ou de nos partenaires. Pour en savoir plus sur notre politique de protection des données à caractère personnel et connaître l'intégralité de vos droits, consulter notre site : <?php echo $domaine ?>.</p>
								<!--this code is created by Josué - jose.init.dev@gmail.com-->
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-6 w3-icon-grid1" id="cookies">
					<div class="card" style="background:none">
						<div class="card-header">
							<a class="card-link" data-toggle="collapse" href="#collapse4">
								<span class="fa fa-codepen" aria-hidden="true"></span>
								<h3>Cookies</h3><br><br>
								<p>Lire ...</p>
							</a>
						</div>
						<div id="collapse4" class="collapse hide" data-parent="#cookies">
							<div class="card-body" style="text-align:justify">
								<p>Le respect de votre vie privée est notre priorité.</p>
								<h5>Définition</h5>
								<p>Le cookie est l'équivalent d'un fichier texte de petite taille, stocké sur le terminal de l'internaute. Existant depuis les années 1990, ils permettent aux développeurs de sites web de conserver des données utilisateur afin de faciliter la navigation et de permettre certaines fonctionnalités. Ce fichier est généré par le serveur du site que vous consultez et il est envoyé à votre navigateur Internet. C’est le navigateur qui va enregistrer le fichier sur votre disque dur. (car le serveur n’a pas accès directement à votre ordinateur).</p>
								<h5>Nécessité et simplicité</h5>
								<p>Nous utilisons des Cookies afin de proposer des contenus, des services et des publicités adaptés aux centres d’intérêts de l’utilisateur, lui proposer du contenus personnalisés et en adéquation avec ses préférences et optimiser les parcours de navigation. En reconnaissant pleinement que vos informations personnelles vous appartiennent, nous faisons de notre mieux pour stocker et traiter avec soin les informations que vous nous communiquez.</p>
								<h5>Confidentialité</h5>
								<p>Nous attachons la plus haute importance à la confiance que vous placez en nous. Nous ne recueillons donc qu'une quantité minimale d'informations avec votre permission et nous les utilisons uniquement aux fins prévues. Nous ne divulguons pas vos informations à des tiers sans votre consentement.</p>
								<h5>Utilisation</h5>
									<h6>Proposition de login et de mot de passe</h6>
									<p>Vous utilisez tous des sites sur lequel il faut vous identifier avec un login et un mot de passe. Il vous est parfois proposé d’enregistrer ces informations. Lorsque vous répondez oui, il y a 2 possibilités : c’est soit votre navigateur qui retient le mot de passe, ou alors un cookie est créé avec le mot de passe.</p>
									<h6>Différentes saisies réalisées sur le site</h6>
									<p>Comme par exemple, les recherches sur les moteurs de recherche. Les cookies vont pouvoir ainsi contenir, vos centres d’intérêts. Les publicités proposées vont pouvoir ainsi être ciblées.</p>
									<h6>Analyses des pages</h6>
									<p>Il est intéressant pour un éditeur de site internet de savoir quelle est l’audience de son site, ainsi que le comportement des utilisateurs. Il faut donc recueillir un maximum d’informations sur le comportement des utilisateurs sur un site : pages vues, temps passé sur la page, est-ce que l’utilisateur a déjà vu cette page, etc …;Si les utilisateurs ont passé beaucoup de temps sur une page, cela permettra de savoir par exemple : que la page a été entièrement lue et que le sujet leur convient. Si les utilisateurs ont passé beaucoup de temps sur une page, cela permettra de savoir par exemple : que la page a été entièrement lue et que le sujet leur convient.</p>
									<h6>Différentes informations des réseaux sociaux</h6>
									<p>Si vous voyez une page qui vous plait et que vous voulez la partager via Twitter. Il suffit de cliquer sur le lien. Vos informations d’identification Twitter seront lues à partir d’un cookie pour vous permettre d’envoyer rapidement votre Twit. (idem pour le like de Facbook et tous les autres réseaux sociaux).;Nous vous remercions de votre intérêt et de votre compréhension.</p>
									<p><br>Nous vous remercions de votre intérêt et de votre compréhension.</p>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</section>
<!-- //confidentialité -->


<?php include('footer.php'); ?>