			<?php
			include('assets/includes/constants.php');
			if (isset($_POST['search'])){
				$search = (isset($_POST['search']))?(htmlspecialchars($_POST['search'])):'';
			}else{
				$search = (isset($_GET['search']))?(htmlspecialchars($_GET['search'])):'';
			}
			$titre_page='Recherche '.$search.' :: '.$nom_site;
			$title="Recherche";
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
							<li class="active"><?php echo $search ?></li>
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
			<div class="row">
				<div class="col">
					<center><h6>Vous recherchez <?php echo $search ?></h6></center>
				</div>
			</div>
			<!-- recherche-->
			<div class="row">
				<div class="col-1">
					<p></p>
				</div>
				<div class="col-10">
					<form class="row" action="search.php" method="post">
						<div class="col-10" style="padding:0px">
							<input type="text" name="search" class="faqSearch" id="myInput" onkeyup="mySearch()" placeholder="Ecrivez + entrer pour chercher" style="background:#000; border:5px solid silver; border-radius:25px 0px 0px 25px; width:100%; text-transform:uppercase; 	color:#fff; height:55px;">
						</div>
						<div class="col-2" style="padding:0px">
							<center><button type="submit" class="btn btn-lg" style="width:100%; background:#000; color:#fff; border-radius:0px 25px 25px 0px; border:5px solid silver;"><span class="fa fa-search"></span></button></center>
						</div>
					</form>

					<ol id="myUL" style="width:100%; background:silver; padding:20px; padding-left:35px; color:#fff; border-radius:25px 25px 0px 0px; display:none">
						<?php
						$query=$db->prepare('SELECT jb_titre FROM jobs');
						$query->execute();
						while ($data=$query->fetch()){
							?>
							<li><a onclick="displayJ('<?php echo $data['jb_titre'] ?>')" style="cursor: pointer"><?php echo $data['jb_titre'] ?></a></li>
						<?php } ?>
						<li><a>Aucune suggestion? Tapez entrer pour rechercher</a></li>
					</ol>
				</div>
				<div class="col-1">
					<p></p>
				</div>
			</div>
			
			<script>
			function mySearch() {
				//this code is created by Josué - jose.init.dev@gmail.com
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
			function displayJ(elt){
				window.location.href="search.php?search="+elt;
			}
			</script>
			<!-- //recherche-->
		
			<!----------content------------->
			<section class="w3l-grids-hny-2">
				<div class="welcome-grids row mt-5" id="main">
					<?php
					$query2=$db->prepare('SELECT COUNT(*) FROM jobs WHERE jb_titre LIKE :s OR jb_description LIKE :s');
					$query2->bindValue(':s', '%'.$search.'%', PDO::PARAM_STR);
					$query2->execute();
					$nbr=$query2->fetchcolumn();
					$query2->closeCursor();
					//echo $search;
					if ($nbr==0){
						erreurWithImage("Nous n'avons pas trouvé ce que vous recherchez. Essayez d'affiner votre recherche.");
					}else{
						$query2=$db->prepare('SELECT * FROM jobs WHERE jb_titre LIKE :s OR jb_description LIKE :s ORDER BY jb_id DESC LIMIT 100');
						$query2->bindValue(':s', '%'.$search.'%', PDO::PARAM_STR);
						$query2->execute();
						//echo $nbr;
						//this code is created by Josué - jose.init.dev@gmail.com
						while ($data2=$query2->fetch()){
							?>
							<div class="col-lg-2 col-md-4 col-4 welcome-image">
								<center>
								<div class="d-none d-md-block boxhny13" style="background-image:url('assets/images/jobs/<?php echo $data2['jb_photo'] ?>'); height:160px; width:160px; border-radius:50%; background-position:center; background-size:cover;">
									<a href="job-infos.php?jb=<?php echo $data2['jb_id'] ?>">
										<div class="boxhny-content">
											<h3 class="title"><span class="fa fa-eye"></span> Détails</h3>
										</div>
									</a>
								</div>
								<div class="d-md-none boxhny13" style="background-image:url('assets/images/jobs/<?php echo $data2['jb_photo'] ?>'); height:100px; width:100px; border-radius:50%; background-position:center; background-size:cover;">
									<a href="job-infos.php?jb=<?php echo $data2['jb_id'] ?>">
										<div class="boxhny-content">
											<h3 class="title"><span class="fa fa-eye"></span> Détails</h3>
										</div>
									</a>
								</div>
								<?php if (strlen($data2['jb_titre'])<=30) echo '<h4 class="title"><a href="job-infos.php?jb='.$data2['jb_id'].'">'.$data2['jb_titre'].'</a></h4>';
								else echo '<h4 class="title"><a href="job-infos.php?jb='.$data2['jb_id'].'">'.substr($data2['jb_titre'],0,28).'...</a></h4>'; ?>
								</center>
							</div>
							<?php
						}
					}
					?>
				</div>
			</section>
			<!----------//content------------->
			<!--this code is created by Josué - jose.init.dev@gmail.com-->
		</div>
	</div>
</section>

<?php include('footer.php'); ?>