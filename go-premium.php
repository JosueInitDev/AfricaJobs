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
switch($type){
	case 'Bienvenue':
		?>
		<div class="pricing" style="margin-top:5vw; margin-bottom:5vw;">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-6">
						<div class="pricingTable black">
							<div class="pricingTable-header">
								<div class="price-value">
									<span class="amount">2.000 fcfa</span>
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
								<a href="#">Choisir</a>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="pricingTable blue">
							<div class="pricingTable-header">
								<div class="price-value">
									<span class="amount">5.000 fcfa</span>
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
								<a href="#">Choisir</a>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="pricingTable">
							<div class="pricingTable-header">
								<div class="price-value">
									<span class="amount">10.000 fcfa</span>
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
								<a href="#">Choisir</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	//this code is created by Josué - jose.init.dev@gmail.com
	break;
	default:
		notFound("Poufff, quelle galère...");
	break;
}
?>

<?php include('footer.php'); ?>