			<?php
			include('assets/includes/constants.php');
			$titre_page='Contact :: '.$nom_site;
			$description_page='Contactez-nous, et nous répondrons à tous vos messages dans les plus brefs délais. '.$nom_site.' est là pour vous.';
			$title='Contact';
			$type=(isset($_GET['type']))?(htmlspecialchars($_GET['type'])):'Bienvenue';
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
if (isset($_GET['return'])){
	if ($_GET['return']=='false'){
		?>
		<div class="alert alert-danger alert-dismissible container">
			<button type="button" class="close" data-dismiss="alert">&and;</button>
			<h5><span class="fa fa-frown" style="font-size:35px"></span> Erreur inconnue, message non parti. Nous en somme navrés.</h5>
		</div>
		<?php
	}
	else if ($_GET['return']=='true'){
		?>
		<div class="alert alert-success alert-dismissible container">
			<button type="button" class="close" data-dismiss="alert">&and;</button>
			<h5><span class='fa fa-smile' style="font-size:35px"></span> Génial! <span class='fa fa-thumbs-up' style="font-size:35px"></span> Nous avons reçu votre message, nous le traiterons et reviendrons vers vous si nécessaire.</h5>
		</div>
		<?php
	}
}
?>
<!-- contacts -->
<section class="w3l-contacts-8">
	<div class="contacts-9 section-gap py-5">
	  <div class="container py-lg-5">
		<div class="row top-map">
		  <div class="col-lg-6 partners">
			<div class="cont-details">
			  <h3 class="hny-title mb-0">Entrer en <span>contact</span></h3>
			  <p class="mb-5">Nous vous donnons votre job ou employé de rêve.</p>
			  <p class="margin-top"><span class="texthny">Appelez-nous : </span> <a href="tel:<?php echo $tel_site ?>"><?php echo $tel_site ?></a></p>
			  <p> <span class="texthny">Email : </span> <a href="mailto:<?php echo $mail_site ?>"><?php echo $mail_site ?></a></p>
			  <ul class="list-group list-group-horizontal list-group-flush">
				  <li class="list-group-item"><a class="facebook" href="<?php echo $facebook_site ?>" target="_blank"><span class="fa fa-facebook" aria-hidden="true"></span></a>
				  </li>
				  <li class="list-group-item"><a class="twitter" href="<?php echo $twitter_site ?>" target="_blank"><span class="fa fa-twitter" aria-hidden="true"></span></a>
				  </li>
				  <li class="list-group-item"><a class="google" href="mailto:<?php echo $mail_site ?>" target="_blank"><span class="fa fa-google-plus" aria-hidden="true"></span></a>
				  </li>
				  <li class="list-group-item"><a class="instagram" href="<?php echo $instagram_site ?>" target="_blank"><span class="fa fa-instagram" aria-hidden="true"></span></a>
				  </li>
			  </ul>
			  <p class="margin-top"> Mettre votre enreprise ou votre CV au devant de tous ? Passez premium sans plus tarder ! <a href="go-premium.php"><button type="button" class="btn btn-warning" style="border-radius:15px"><span class="fa fa-star" style="color:#000"></span> <span class="fas fa-running" style="color:#000"></span>Go Premium <span class="fa fa-star" style="color:#000"></span></button></a></p>
			</div>
			<div class="hours">
			  <h3 class="hny-title">Bésoin <span>d'aide ?</span></h3>
			  <h6 style="text-decoration:underline">F.A.Q</h6>
			  <p>Consultez notre Foir Aux Questions pour avoir des réponses à vos questions. Tout ce que vous voudrez savoir ...</p>
			  <h6 class="margin-top" style="text-decoration:underline">Ce qu'ils disent à notre sujet</h6>
			  <a href="index.php#customers"><span class="fa fa-hand-o-right hand-icon"></span> Consultez les avis des clients ici</a>
			</div>
		  </div>
		  <div class="col-lg-6 map">
			<iframe
			  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127118.2878324484!2d-4.049705099431728!3d5.348617046408707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfc1ea5311959121%3A0x3fe70ddce19221a6!2sAbidjan%2C%20C%C3%B4te%20d&#39;Ivoire!5e0!3m2!1sfr!2sus!4v1595440319291!5m2!1sfr!2sus"
			  frameborder="0" style="border:0" allowfullscreen=""></iframe>
		  </div>
		</div>
	  </div>
	</div>
	<div class="map-content-9 form-bg-img" id="form">
	  <div class="layer section-gap py-5">
		<div class="container py-lg-5">
		  <div class="form">
			<p class="text-center" style="color:#fff; font-size:20px">Voulez-vous une aide personnalisée ?</p>
			<h3 class="hny-title two text-center">Qui a t-il ? Dites-nous</h3>
			<div class="alert alert-danger alert-dismissible" style="font-size:20px; position:fixed; top:20vh; left:-100px; display:none; z-index:999;" id="formError"><!--button type="button" class="close" data-dismiss="alert">&and;</button--><p id="errorText" style="color:red"></p></div>
			<form action="contact.php?type=form" class="mt-md-5 mt-4" method="post" id="formSubmit">
			  <div class="input-grids">
				<input type="text" name="nom" id="w3lName" placeholder="Nom">
				<input type="text" name="mail" id="w3lSender" placeholder="Téléphone ou Email" required="" />
				<input type="subject" name="sujet" id="w3lSubject" placeholder="Titre du message" required="">
			  </div>
			  <div class="input-textarea">
				<textarea name="message" id="w3lMessage" placeholder="Votre message ici" required=""></textarea>
			  </div>
			  <button type="submit" class="btn">Envoyer</button>
			</form>
		  </div>
		</div>
	  </div>
	</div>
</section>
<!-- //contacts -->
<script>
	let form=document.getElementById('formSubmit');
	let tps=5;
	form.addEventListener('submit', function(e){
		if (form.mail.value.length<=6){
			e.preventDefault();
			showAlert("Entrez un numéro ou un email valide svp");
		}else if (form.sujet.value.length<=10 || form.sujet.value.length>60){
			e.preventDefault();
			showAlert("Titre du message invalide, trop court ou trop long peut être");
		}else if (form.message.value.length<=20){
			e.preventDefault();
			showAlert("Le contenu de votre message est invalide, trop court peut être");
		}
	});
	function showAlert(mess){
		document.getElementById('errorText').textContent=mess;
		document.getElementById('formError').style.display="block";
		$(document).ready(function(){
			$("#formError").animate({left: '10px'});
		});
		let x=setInterval(function(){
			tps--;
			if (tps<=0){
				document.getElementById('formError').style.display="none";
				document.getElementById('formError').style.left="-100px";
				clearInterval(x);
				tps=5;
			}
		}, 1000);
	}
</script>

<?php
if (isset($_GET['type'])){ //traiter the message et keep dans la bdd
	if ($_GET['type']=='form'){
		$nom=(isset($_POST['nom']))?(htmlspecialchars($_POST['nom'])):'';
		$numMail=(isset($_POST['mail']))?(htmlspecialchars($_POST['mail'])):'';
		$sujet=(isset($_POST['sujet']))?(htmlspecialchars($_POST['sujet'])):'';
		$message=(isset($_POST['message']))?(htmlspecialchars($_POST['message'])):'';
		$nom=strip_tags($nom);
		$numMail=strip_tags($numMail);
		$sujet=strip_tags($sujet);
		$message=strip_tags($message);
		$message=nl2br($message);
		if (strlen($numMail)<=10){
			?><script>window.location.href="contact.php?return=false";</script><?php
		}
		else if (strlen($sujet)<=10){
			?><script>window.location.href="contact.php?return=false";</script><?php
		}
		else if (strlen($message)<=20){
			?><script>window.location.href="contact.php?return=false";</script><?php
		}else{
			$query=$db->prepare('INSERT INTO messages(ms_sujet, ms_message, ms_auteur_mail, ms_auteur_ip, ms_date) VALUES(:s, :mess, :m, :i, :d)');
			$query->bindValue(':s', $sujet, PDO::PARAM_STR);
			$query->bindValue(':mess', $message, PDO::PARAM_STR);
			$query->bindValue(':m', $numMail, PDO::PARAM_STR);
			$query->bindValue(':i', $_SERVER['REMOTE_ADDR'], PDO::PARAM_STR);
			$query->bindValue(':d', date('Y').'-'.date('m').'-'.date('d'), PDO::PARAM_STR);
			$query->execute();
			$query->closeCursor();
			?><script>window.location.href="contact.php?return=true";</script><?php
		}
	}
}
?>


<?php include('footer.php'); ?>