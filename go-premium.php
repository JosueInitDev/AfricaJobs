			<?php
			include('assets/includes/constants.php');
			$type=(isset($_GET['type']))?(htmlspecialchars($_GET['type'])):'Bienvenue';
			$titre_page='Mode premium :: '.$nom_site;
			$title="Mode Premium";
			include('top.php');
			?>
			<div class="breadcrumb-contentnhy">
				<div class="container">
					<nav aria-label="breadcrumb">
						<h2 class="hny-title text-center"><?php echo $title ?></h2>
						<ol class="breadcrumb mb-0">
							<li><a href="index.php">Accueil</a>
							<span class="fa fa-angle-double-right"></span></li>
							<li class="active"><a href="go-premium.php"><?php echo $title ?></a>
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
switch($type){
	case 'Bienvenue':
		?>
		<div class="pricing" style="margin-top:5vw; margin-bottom:5vw;">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<center>
							<h4><i class="fas fa-grin"></i> Bienvenue dans le mode premium <i class="fas fa-grin"></i></h4>
							<p>Pourquoi acheter un premium ? <span class="fa fa-hand-o-right"></span><b><a href="#pourquoi">Cliquez ici</a></b><span class="fa fa-hand-o-left"></span></p>
						</center>
						<hr>
					</div>
					<div class="col-md-3 col-6">
						<div class="pricingTable black">
							<div class="pricingTable-header">
								<div class="price-value">
									<span class="amount">475 fcfa</span>
									<span class="duration">/mois</span>
								</div>
								<h3 class="title">Standard</h3>
							</div>
							<ul class="content-list">
								<li>50GB Disk Space</li>
								<li>50 Email Accounts</li>
								<li>50GB Bandwidth</li>
								<li>Maintenance</li>
								<li>15 Subdomains</li>
							</ul>
							<div class="pricingTable-signup">
								<a href="go-premium.php?type=premium-standard">Choisir</a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-6">
						<div class="pricingTable blue">
							<div class="pricingTable-header">
								<div class="price-value">
									<span class="amount">975 fcfa</span>
									<span class="duration">/mois</span>
								</div>
								<h3 class="title">Business</h3>
							</div>
							<ul class="content-list">
								<li>50GB Disk Space</li>
								<li>50 Email Accounts</li>
								<li>50GB Bandwidth</li>
								<li>Maintenance</li>
								<li>15 Subdomains</li>
							</ul>
							<div class="pricingTable-signup">
								<a href="go-premium.php?type=premium-business">Choisir</a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-6">
						<div class="pricingTable">
							<div class="pricingTable-header">
								<div class="price-value">
									<span class="amount">2.900 fcfa</span>
									<span class="duration">/mois</span>
								</div>
								<h3 class="title">Boss Pro</h3>
							</div>
							<ul class="content-list">
								<li>50GB Disk Space</li>
								<li>50 Email Accounts</li>
								<li>50GB Bandwidth</li>
								<li>Maintenance</li>
								<li>15 Subdomains</li>
							</ul>
							<div class="pricingTable-signup">
								<a href="go-premium.php?type=premium-boss-pro">Choisir</a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-6">
						<div class="pricingTable gold">
							<div class="pricingTable-header">
								<div class="price-value">
									<span class="amount">4.900 fcfa</span>
									<span class="duration">/mois</span>
								</div>
								<h3 class="title">Luxe</h3>
							</div>
							<ul class="content-list">
								<li>50GB Disk Space</li>
								<li>50 Email Accounts</li>
								<li>50GB Bandwidth</li>
								<li>Maintenance</li>
								<li>15 Subdomains</li>
							</ul>
							<div class="pricingTable-signup">
								<a href="go-premium.php?type=premium-luxe">Choisir</a>
							</div>
						</div>
					</div>
					<div class="col-12" id="pourquoi">
						<hr>
						<h3><span class="fa fa-hand-o-right"></span> <b>Pourquoi acheter un premium ?</b></h3>
						<p>Le mode premium étant une fonctionnalité principale de ce site qui a pour objectif de vous faire bénéficier de l'accès à toutes les fonctionnalités du site. Sa nécessité est le fait qu'un utilisateur, en principe étant en possession de chance limité pour acquérir la fiabilité et la satisfaction de nos services, ce mode s'infiltre alors pour donner aux clients une satisfaction évolutive suivant les différents modes premium qui sont offerts.<br>
						<b>Est il nécessaire ?</b><br>
						Notre système est doté d'une capacité à booster votre profile (<strong>vous faire apparaître fréquemment aux yeux des embaucheurs</strong>). Ce qui vous donne plus de chance d'être recruté. Il en est de même pour les propositions d'emploi. Ce mode regorge bien d'autres avantages qui vous sont offerts.</p>
						<p><b>Quelques avantages</b>
						<ul>
							<li><p>Mettre mon profile au dessus de tout le monde</p></li>
							<li><p>Mettre mon offre d'emploi au dessus de tout le monde</p></li>
							<li><p>Avoir plus de chance d'être embaucher que les autres</p></li>
							<li><p>Avoir les meilleurs CV directement dans ma boite mail</p></li>
							<li><p>Être averti lorsqu'une offre d'emploi correspon à mon profile</p></li>
							<li><p>Mettre mon profile ou mon offre d'emploi sur la page d'accueil</p></li>
							<li><p>Et plein d'autres avantages ...</p></li>
						</ul>
						<p>Alors, qu'attendez-vous ?</p>
						<hr>
						<div class="row">
							<div class="col-12">
								<h6>Les méthodes de paiement</h6>
							</div>
							<div class="col-2 col-md-1">
								<a class="pay-method" href="go-premium.php"><img src="assets/images/icon-visa.jpg" class="card-icon img-fluid"></a>
							</div>
							<div class="col-2 col-md-1">
								<a class="pay-method" href="go-premium.php"><img src="assets/images/icon-mastercard.jpg" class="card-icon img-fluid"></a>
							</div>
							<div class="col-2 col-md-1">
								<a class="pay-method" href="go-premium.php"><img src="assets/images/icon-paypal.jpg" class="card-icon img-fluid"></a>
							</div>
							<div class="col-2 col-md-1">
								<a class="pay-method" href="go-premium.php"><img src="assets/images/icon-orange-money.jpg" class="card-icon img-fluid"></a>
							</div>
							<div class="col-2 col-md-1">
								<a class="pay-method" href="go-premium.php"><img src="assets/images/icon-mtn-money.jpg" class="card-icon img-fluid"></a>
							</div>
							<div class="col-2 col-md-1">
								<a class="pay-method" href="go-premium.php"><img src="assets/images/icon-moov-money.jpg" class="card-icon img-fluid"></a>
							</div>
							<div class="col-2 col-md-1"><a class="pay-method" href="go-premium.php"><img src="assets/images/icon-payeer.png" class="card-icon img-fluid"></a>
							</div>
							<div class="col-2 col-md-1">
								<a class="pay-method" href="go-premium.php"><img src="assets/images/icon-perfect-money.png" class="card-icon img-fluid"></a>
							</div>
							<div class="col-2 col-md-1">
								<a class="pay-method" href="go-premium.php"><img src="assets/images/icon-skrill.jpg" class="card-icon img-fluid"></a>
							</div>
							<div class="col-2 col-md-1">
								<a class="pay-method" href="go-premium.php"><img src="assets/images/icon-umob.png" class="card-icon img-fluid"></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	//this code is created by Josué - jose.init.dev@gmail.com
	break;
		
	case 'premium-standard':
		?>
		<div class="pricing" style="margin-top:5vw; margin-bottom:5vw;">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="pricingTable black">
							<div class="pricingTable-header">
								<div class="price-value">
									<!--span class="amount">475 fcfa</span-->
									<span class="duration">475fcfa / mois</span>
								</div>
								<h3 class="title">Acheter <i class="fa fa-hand-o-right"></i> Standard</h3>
							</div>
							<div>
								<p>djfdfhj</p>
								<p>djfdfhj</p>
								<p>djfdfhj</p>
								<p>djfdfhj</p>
								<p>djfdfhj</p>
							</div>
							<div class="pricingTable-signup">
								<!--a href="#">Choisir</a-->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	break;
		
	case 'premium-business':
		?>
		<div class="pricing" style="margin-top:5vw; margin-bottom:5vw;">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="pricingTable blue">
							<div class="pricingTable-header">
								<div class="price-value">
									<!--span class="amount">975 fcfa</span-->
									<span class="duration">975fcfa / mois</span>
								</div>
								<h3 class="title">Acheter <i class="fa fa-hand-o-right"></i> Business</h3>
							</div>
							<div>
								<p>djfdfhj</p>
								<p>djfdfhj</p>
								<p>djfdfhj</p>
								<p>djfdfhj</p>
								<p>djfdfhj</p>
							</div>
							<div class="pricingTable-signup">
								<!--a href="#">Choisir</a-->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	break;
		
	case 'premium-boss-pro':
		?>
		<div class="pricing" style="margin-top:5vw; margin-bottom:5vw;">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="pricingTable orange">
							<div class="pricingTable-header">
								<div class="price-value">
									<!--span class="amount">2.900 fcfa</span-->
									<span class="duration">2.900fcfa / mois</span>
								</div>
								<h3 class="title">Acheter <i class="fa fa-hand-o-right"></i> Boss Pro</h3>
							</div>
							<div>
								<p>djfdfhj</p>
								<p>djfdfhj</p>
								<p>djfdfhj</p>
								<p>djfdfhj</p>
								<p>djfdfhj</p>
							</div>
							<div class="pricingTable-signup">
								<!--a href="#">Choisir</a-->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	break;
		
	case 'premium-luxe':
		?>
		<div class="pricing" style="margin-top:5vw; margin-bottom:5vw;">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="pricingTable gold">
							<div class="pricingTable-header">
								<div class="price-value">
									<!--span class="amount">4.900 fcfa</span-->
									<span class="duration">4.900fcfa / mois</span>
								</div>
								<h3 class="title">Acheter <i class="fa fa-hand-o-right"></i> Luxe</h3>
							</div>
							<div>
								<p>djfdfhj</p>
								<p>djfdfhj</p>
								<p>djfdfhj</p>
								<p>djfdfhj</p>
								<p>djfdfhj</p>
							</div>
							<div class="pricingTable-signup">
								<!--a href="#">Choisir</a-->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	break;
		
	default:
		notFound("Poufff, quelle galère...");
	break;
}
?>

<style>
	/*-----go-premium-------*/
	.pricingTable{
		font-family: 'Lato', sans-serif;
		text-align: center;
		margin: 0 10px;
		border-radius: 40px 40px 170px 170px / 40px 40px 70px 70px;
		overflow: hidden;
		transition: all 0.3s ease 0s;
	}
	.pricingTable:hover{ box-shadow: 0 0 20px -5px rgba(0,0,0, 0.9); }
	.pricingTable .pricingTable-header{
		background: #e7e8ea;
		padding: 25px 0 0;
	}
	.pricingTable .price-value{
		color: #86878B;
		font-weight: 900;
		margin: 0 0 15px;
	}
	.pricingTable .price-value .amount{
		font-size: 35px;
		line-height: 40px;
		display: block;
	}
	.pricingTable .price-value .duration{
		font-size: 16px;
		font-weight: 600;
		text-transform: uppercase;
		display: block;
	}
	.pricingTable .title{
		color: #fff;
		background: #f76b0e;
		font-size: 25px;
		font-weight: 600;
		letter-spacing: 1px;
		text-transform: uppercase;
		padding: 18px 10px 15px;
		margin: 0 -8px;
		border: 8px solid #fff;
		border-bottom: none;
		border-radius: 170px 170px 0 0 / 70px 70px 0 0;
	}
	.pricingTable .content-list{
		background: #E7E8EA;
		padding: 0;
		margin: 0;
		list-style: none;
	}
	.pricingTable .content-list li{
		color: #86878B;
		font-size: 16px;
		font-weight: 600;
		text-transform: uppercase;
		padding: 12px 5px;
	}
	.pricingTable .content-list li:nth-child(even){ background: #D1D2D4; }
	.pricingTable .content-list li:last-child{ margin-bottom: 0; }
	.pricingTable .pricingTable-signup{
		background: #f76b0e;
		padding: 17px 20px 23px;
	}
	.pricingTable .pricingTable-signup a{
		color: #fff;
		font-size: 20px;
		font-weight: 700;
		letter-spacing: 1px;
		text-transform: uppercase;
		transition: all 0.3s ease 0s;
	}
	.pricingTable .pricingTable-signup a:hover{
		font-weight: 900;
		letter-spacing: 2px;
		text-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
	}
	.pricingTable.blue .title,
	.pricingTable.blue .pricingTable-signup{
		background: #3867d6;
	}
	.pricingTable.black .title,
	.pricingTable.black .pricingTable-signup{
		background: #000000;
	}
	.pricingTable.gold .title,
	.pricingTable.gold .pricingTable-signup{
		background: goldenrod;
	}
	@media only screen and (max-width: 990px){
		.pricingTable{ margin-bottom: 30px; }
	}
	/*-----//go-premium-------*/
</style>

<?php include('footer.php'); ?>