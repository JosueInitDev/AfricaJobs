			<?php
			include('assets/includes/constants.php');
			$titre_page='FAQ :: '.$nom_site;
			$title="F.A.Q";
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
							<li class="active">Une question ?</li>
						</ol>
					</nav>
				</div>
			</div>
		</div> <!-- don't delete this -->
	</div> <!-- don't delete this -->
</section> <!-- don't delete this -->


<!-- features-4 -->
<section class="features-4" style="background-image: url('assets/images/faq.jpg')">
	<div class="features4-block py-5" style="background: rgba(255,255,255,0.95)">
		<div class="container py-lg-5">
			<h6>Foir aux questions. Les questions fréquement posées.</h6>
			<h3 class="hny-title text-center">Une <span>question ?</span></h3>
			<!-- recherche-->
			<div class="col-12">
				<input type="text" class="faqSearch" id="myInput" onkeyup="myFaq()" placeholder="Ecrivez ce que vous cherchez ici ..." style="background:#000; border:5px solid silver; border-radius:25px; width:100%; text-transform:uppercase; color:#fff; height:55px; padding-left:35px; padding-right:35px;">
				
				<ol id="myUL" style="width:100%; background:silver; padding:20px; padding-left:35px; color:#fff; border-radius:25px 25px 0px 0px; display:none">
					<li><a onclick="displayC('c1')">Utilité Du Site</a></li>
					<li><a onclick="displayC('c2')">Importance</a></li>
					<li><a onclick="displayC('c3')">Récrutement</a></li>
					<li><a onclick="displayC('c4')">Mon Profile</a></li>
					<li><a onclick="displayC('c5')">Mode Premium</a></li>
					<li><a onclick="displayC('c6')">Paiement</a></li>
					<li><a onclick="displayC('c7')">Inscription</a></li>
					<li><a onclick="displayC('c8')">Connexion</a></li>
					<li><a onclick="displayC('c9')">Remboursement</a></li>
					<li><a onclick="displayC('c10')">Autre Question</a></li>
					<li><a onclick="displayC('c1')">Eradiquer le chômage</a></li>
					<li><a onclick="displayC('c2')">Ce que nous faisons</a></li>
					<li><a onclick="displayC('c3')">Comment être récruté, comment récruter</a></li>
					<li><a onclick="displayC('c4')">Comment avoir un bon profile</a></li>
					<li><a onclick="displayC('c5')">C'est quoi le mode premium</a></li>
					<li><a onclick="displayC('c6')">Les modes de paiement</a></li>
					<li><a onclick="displayC('c7')">Comment créer un compte</a></li>
					<li><a onclick="displayC('c8')">J'arrive pas à me connecter</a></li>
					<li><a onclick="displayC('c9')">Se faire rembourser</a></li>
					<li><a onclick="displayC('c10')">J'ai une autre question</a></li>
				</ol>
			</div>
			
			<script>
			function myFaq() {
				var input, filter, ul, li, a, i, txtValue;
				input = document.getElementById("myInput");
				filter = input.value.toUpperCase();
				ul = document.getElementById("myUL");
				if (input.value==''){
					ul.style.display="none";
				}else{
					ul.style.display="block";
				}
				li = ul.getElementsByTagName("li");
				for (i = 0; i < li.length; i++) {
					a = li[i].getElementsByTagName("a")[0];
					txtValue = a.textContent || a.innerText;
					if (txtValue.toUpperCase().indexOf(filter) > -1) {
						li[i].style.display = "";
					} else {
						li[i].style.display = "none";
					}
				}
			}
			</script>
			<!-- //recherche-->
			
			
			<div class="features4-grids text-center row mt-5">
				<div class="col-lg-3 col-6 features4-grid">
					<div class="features4-grid-inn" style="border:1px solid #FFE0B2" onclick="displayC('c1')">
						<span class="fa fa-bullhorn icon-fea4" aria-hidden="true"></span>
						<h5><a href="#URL">Utilité du site</a></h5>
						<p>Eradiquer le chômage</p>
					</div>
				</div>
				<div class="col-lg-3 col-6 features4-grid sec-features4-grid">
					<div class="features4-grid-inn" style="border:1px solid #FFE0B2" onclick="displayC('c2')">
						<span class="fa fa-truck icon-fea4" aria-hidden="true"></span>
						<h5><a href="#URL">Importance</a></h5>
						<p>Ce que nous faisons</p>
					</div>
				</div>
				<div class="col-lg-3 col-6 features4-grid">
					<div class="features4-grid-inn" style="border:1px solid #FFE0B2" onclick="displayC('c3')">
						<span class="fa fa-building icon-fea4" aria-hidden="true"></span>
						<h5><a href="#URL">Récrutement</a></h5>
						<p>Comment être récruté, comment récruter</p>
					</div>
				</div>
				<div class="col-lg-3 col-6 features4-grid">
					<div class="features4-grid-inn" style="border:1px solid #FFE0B2" onclick="displayC('c4')">
						<span class="fa fa-user icon-fea4" aria-hidden="true"></span>
						<h5><a href="#URL">Mon Profile</a></h5>
						<p>Comment avoir un bon profile</p>
					</div>
				</div>
				<div class="col-lg-3 col-6 features4-grid">
					<div class="features4-grid-inn" style="border:1px solid #FFE0B2" onclick="displayC('c5')">
						<span class="fa fa-star icon-fea4" aria-hidden="true"></span>
						<h5><a href="#URL">Mode Premium</a></h5>
						<p>C'est quoi le mode premium</p>
					</div>
				</div>
				<div class="col-lg-3 col-6 features4-grid">
					<div class="features4-grid-inn" style="border:1px solid #FFE0B2" onclick="displayC('c6')">
						<span class="fa fa-money icon-fea4" aria-hidden="true"></span>
						<h5><a href="#URL">Paiement</a></h5>
						<p>Les modes de paiement</p>
					</div>
				</div>
				<div class="col-lg-3 col-6 features4-grid">
					<div class="features4-grid-inn" style="border:1px solid #FFE0B2" onclick="displayC('c7')">
						<span class="fa fa-sign-in icon-fea4" aria-hidden="true"></span>
						<h5><a href="#URL">Inscription</a></h5>
						<p>Comment créer un compte</p>
					</div>
				</div>
				<div class="col-lg-3 col-6 features4-grid">
					<div class="features4-grid-inn" style="border:1px solid #FFE0B2" onclick="displayC('c8')">
						<span class="fa fa-sign-in icon-fea4" aria-hidden="true"></span>
						<h5><a href="#URL">Connexion</a></h5>
						<p>J'arrive pas à me connecter, mot de passe oublié</p>
					</div>
				</div>
				<div class="col-lg-3 col-6 features4-grid">
					<div class="features4-grid-inn" style="border:1px solid #FFE0B2" onclick="displayC('c9')">
						<span class="fa fa-money icon-fea4" aria-hidden="true"></span>
						<h5><a href="#URL">Remboursement</a></h5>
						<p>Se faire rembourser</p>
					</div>
				</div>
				<div class="col-lg-3 col-6 features4-grid">
					<div class="features4-grid-inn" style="border:1px solid #FFE0B2" onclick="displayC('c10')">
						<span class="fa fa-question icon-fea4" aria-hidden="true"></span>
						<h5><a href="#URL">Autre Question</a></h5>
						<p>J'ai une autre question</p>
					</div>
				</div>
			</div>
			
			<!----------content------------->
			<div class="row" style="padding:15px" id="contents">
				<!--content 1-->
				<div id="c1" style="display:none">
					<h3><span class="fa fa-hand-o-right"></span> <b>Utilité du site</b></h3>
					<p>Avec un taux de chômeurs très élévé en Afrique, notre objectif est de lutter contre ce phénomène, nous <?php echo $nom_site ?> créé le 30-07-2020. Pour opportuniser plus la jeunesse dans le domaines de l'emploie, <?php echo $nom_site ?> a pour but de minimiser le taux de chômeurs. Un fléau dont la recherche d'un mécanisme de combat a suscité notre inspiration, et elle se concrétise dans l'objectif de rapprocher les chômeurs aux employeurs. Convaincre, gagner la confiance, sécuriser les données et autres informations est primordial.<br>Nous vous offrons la meilleur des opportunités pour mieux vous rapprocher des employeurs, de faire des demandes d'emplois selon les exigences des employeurs auprès des entreprises partenaire et employeurs personnels.</p>
				</div>
				<!--content 2-->
				<!--this code is created by Josué - jose.init.dev@gmail.com-->
				<div id="c2" style="display:none">
					<h3><span class="fa fa-hand-o-right"></span> <b>Importance</b></h3>
					<p>Offrir la possibilité à tous ceux qui du travail d'en trouver facilement quelque soit leur niveau de formation, partant des illétrés jusqu'aux personnes les plus diplômées, est notre but premier. Nous offrons la possiblité aux entreprises ou aux particulier cherchant des personnes, les perles rares, à embaucher de les trouver facilement.<br>Si vous cherchez du travail, ou que vous voudrez trouver des talents à embaucher, n'hésitez plus et créez un compte maintenant. Un mode premium est aussi disponible si vous voulez être au dévant de tous.</p>
				</div>
				<!--content 3-->
				<div id="c3" style="display:none">
					<h3><span class="fa fa-hand-o-right"></span> <b>Récrutement</b></h3>
					<ol>
						<li>Comment trouver de travail ?<br>
							<p>Pour trouver du travail et vite, alors vous avez frappé à la bonne porte. Vous devez avant tout créer un compte en utilisant l'une des méthodes qui vous sont suggérées et vous aurez pour la première fois la chance de faire un choix de travailler gratuitement. pour avoir la possibilité d'avoir de multitude Choix, utilisez le mode premium. Cette technique va vous permettre d'atteindre le maximum de visibilité aux visiteurs en quête d'employé. Connectez-vous à vôtre compte de temps en temps pour vérifier si une personne vous a choisi comme son employé. Après avoir eu le travail, conservez bien vos identifiants de compte pour l'avenir.</p>
						</li>
						<li>Comment recruter ?<br>
							<p><b>Grande entreprise :</b> vous n'êtes pas encore notre partenaire ? Veuillez envoyer un rapport de partenariat sur l'adresse suivante <a href="mailto:<?php echo $mail_site ?>"><?php echo $mail_site ?></a> enfin d'acquérir un compte strictement personnel à l'entreprise selon vos exigences (<a href="go-premium.php">cliquez pour voir les avantages du premium</a>).<br><br>
							<b>PME-etreprise :</b> veillez choisir l'option entreprise et créez votre compte. Passez en mode premium pour être le premier dans le positionnement sur le site (<a href="go-premium.php">cliquez pour voir les avantages du premium</a>).<br><br>
							<b>Personnel :</b> veillez Choisir l'option personnel et créez un compte. Passez en mode premium si vous voulez plus de chance d'avoir le job de vos rêve (<a href="go-premium.php">cliquez pour voir les avantages du premium</a>)</p>
						</li>
					</ol>
				</div>
				<!--content 4-->
				<div id="c4" style="display:none">
					<h3><span class="fa fa-hand-o-right"></span> <b>Mon Profile</b></h3>
					<p>Le bon profil :</p>
					<ol>
						<li>Tout commence pas une bonne photo naturelle de vous pour le profil.<br>
						<b>NB :</b> pour les photos à caractère "sensible", elles séront supprimées systématique par notre système.</li>
						<li>Remplir correctement, cordialement avec précision le formulaire d'inscription.<br>
						<b>NB :</b> mauvaise information, suppression de compte</li>
						<li>Ajouter un texte original dans la bio</li>
						<li>Vérifiez votre compte gmail fréquemment pour ne pas rater nos offres spéciales</li>
						<li>Etre fréquemment sur votre compte pour vérifier si votre demande (être employé/employer une personne) à été validée par un de nos correspondants</li>
						<li>Participer aux promotions de tirage gagnant en signalant les personnes qui publient des contenu sensible</li>
						<li>Decouvrir les nombreux avantages du mode premium</li>
					</ol>
				</div>
				<!--content 5-->
				<div id="c5" style="display:none">
					<h3><span class="fa fa-hand-o-right"></span> <b>Mode Premium</b></h3>
					<p>Le mode premium étant une fonctionnalité principale de ce site qui a pour objectif de vous faire bénéficier de l'accès à toutes les fonctionnalités du site. Sa nécessité est le fait qu'un utilisateur, en principe étant en possession de chance limité pour acquérir la fiabilité et la satisfaction de nos services, ce mode s'infiltre alors pour donner aux clients une satisfaction évolutive suivant les différents modes premium sont offerts.<br>
					<b>Est il nécessaire ?</b><br>
					Notre système est doté d'une capacité à booster votre profile (vous faire apparaître fréquemment aux yeux des embaucheurs). Ce qui vous donne plus de chance d'être recruté. Il en est de même pour les propositions d'emploi. Ce mode regorge bien d'autres avantages qui vous sont offerts.<br>
					<a href="go-premium.php">En savoir plus <b style="color:darkorange">ici</b></a>.</p>
				</div>
				<!--content 6-->
				<div id="c6" style="display:none">
					<h3><span class="fa fa-hand-o-right"></span> <b>Paiement</b></h3>
					<p>Les systèmes de payement :</p>
					<div class="row">
						<div class="col-4">
							<ul>
								<li>MOOV MONNEY <br><img src="assets/images/icon-moov-money.jpg" style="width:70px" class="img-thumbnail"></li>
								<li>MTN MONNEY <br><img src="assets/images/icon-mtn-money.jpg" style="width:70px" class="img-thumbnail"></li>
								<li>ORANGE MONNEY <br><img src="assets/images/icon-orange-money.jpg" style="width:70px" class="img-thumbnail"></li>
							</ul>
						</div>
						<div class="col-4">
							<ul>
								<li>PAYPAL <br><img src="assets/images/icon-paypal.jpg" style="width:70px" class="img-thumbnail"></li>
								<li>PERFECT MONNEY <br><img src="assets/images/icon-perfect-money.png" style="width:70px" class="img-thumbnail"></li>
								<li>UMOB <br><img src="assets/images/icon-umob.png" style="width:70px" class="img-thumbnail"></li>
							</ul>
						</div>
						<div class="col-4">
							<ul>
								<li>PAYEER <br><img src="assets/images/icon-payeer.png" style="width:70px" class="img-thumbnail"></li>
								<li>SKRILL <br><img src="assets/images/icon-skrill.jpg" style="width:70px" class="img-thumbnail"></li>
								<li>MASTER CARD <br><img src="assets/images/icon-mastercard.jpg" style="width:70px" class="img-thumbnail"></li>
							</ul>
						</div>
					</div>
				</div>
				<!--content 7-->
				<div id="c7" style="display:none">
					<h3><span class="fa fa-hand-o-right"></span> <b>Inscription</b></h3>
					<p>Comment créer un compte ? Chaque personne a droit de créer un seul compte avec les mêmes coordonnées. Les deux types de comptes sont entreprise (grande, PME, socité personnelle, pétit business, recruteur personnel, ...) et personnel (démandeur d'emploi diplômé, démandeur d'emploi non diplômé, ...).<br>
					<b>NB :</b> pour que votre profil ou votre offre d'emploi soit en prémière place, vous dévez passez en mode premium (<a href="go-premium.php">cliquez pour voir les avantages du premium</a>). <a href="index.php"><b>Créer un compte maintenant</b></a></p>
				</div>
				<!--content 8-->
				<div id="c8" style="display:none">
					<h3><span class="fa fa-hand-o-right"></span> <b>Connexion</b></h3>
					<p>Pour vous connecter à votre compte et profiter de nos services, il vous suffis de renseigner vos coordonnées "<b>numérode téléphone ou adresse email</b>" et votre "<b>mot de passe</b>". En cas d'<strong>oubli du mot de passe</strong>, <a href="sign-up.php?type=recuperation">cliquez ici</a>. Pour d'autres types de préoccupation sur notre plateforme concernant la connexion, faites nous un rapport dans le quel vous exposez le problème. Nous vous remercions de votre amabilité.</p>
				</div>
				<!--content 9-->
				<div id="c9" style="display:none">
					<h3><span class="fa fa-hand-o-right"></span> <b>Remboursement</b></h3>
					<p>Nous vous remboursons si vous annulez un service. Nous vous remboursons aussi dans le cas où vous supprimé votre compte alors le mode premium acheté n'a pas encore été utilisé. Pour tout remboursement, veuillez nous adresser un mail à <?php echo $mail_site ?> ou via <a href="contact.php#form">ce lien</a>.</p>
				</div>
				<!--content 10-->
				<div id="c10" style="display:none">
					<h3><span class="fa fa-hand-o-right"></span> <b>Autre Question</b></h3>
					<p>Si vous avez une autre question, vous pouvez  nous écrire et nous nous ferons un plaisir de vous répondre dans les plus brefs délais.<br>Pour nous écrire veuillez <a href="contact.php#form"><b>cliquer ici</b></a>.</p>
				</div>
			</div>
			
			<script>
				function displayC(id){
					document.getElementById(id).style.display="block";
					document.getElementById(id).scrollIntoView();
					let ids=['c1', 'c2', 'c3', 'c4', 'c5', 'c6', 'c7', 'c8', 'c9', 'c10'];
					ids.forEach(function(elt){
						if (elt != id){
							//alert(elt);
							document.getElementById(elt).style.display="none";
						}
					});
				}
			</script>
			<!----------//content------------->
		</div>
	</div>
</section>
<!-- //features-4 -->

<?php include('footer.php'); ?>