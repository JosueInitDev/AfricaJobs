<section class="w3l-ecommerce-main">
	<!-- /products-->
	<div class="ecom-contenthny py-5">
		<div class="container-fluid py-lg-5">
			<div class="row">
				<div class="col-md-6">
					<div style="border-style:outset; border-radius:7px; background:#f7f7f7;">
						<div style="background:#f1f1f1">
							<h3 class="hny-title mb-0 text-center" style="font-size:25px">Profiles <span>non diplômés</span></h3>
							<p class="mb-4 text-center">Trouvez la personne à embaucher sans vous prendre la tête...</p>
							<hr>
						</div>
						<div class="ecom-products-grids row mt-lg-5 mt-3" style="padding:7px;">
							<?php
							include('identifiants.php');
							$query=$db->prepare('SELECT COUNT(*) FROM clients WHERE cl_cherche_job=1 AND cl_diplome="sans_diplome"');
							$query->execute();
							$max=$query->fetchcolumn();
							if ($max>5) $a=random_int(0,$max-5);
							else $a=0;
							//echo $max;
							//echo $a;
							$query=$db->prepare('SELECT * FROM clients WHERE cl_cherche_job=1 AND cl_diplome="sans_diplome" ORDER BY cl_id DESC LIMIT :min, 5');
							$query->bindValue(':min', $a, PDO::PARAM_INT);
							$query->execute();
							while ($data=$query->fetch()){
								?>
								<div class="col-xl-2 col-lg-3 col-sm-4 col-6 product-incfhny mt-4">
									<div class="product-grid2 transmitv">
										<div class="product-image2" style="border:1px solid #e3e3e3; border-radius:7px; height:150px;">
											<a>
												<img class="pic-1 img-fluid" src="assets/images/clients/<?php echo $data['cl_photo'] ?>">
												<img class="pic-2 img-fluid" src="assets/images/clients/<?php echo $data['cl_photo'] ?>" style="width:150%" title="<?php echo $data['cl_description'] ?>">
											</a>
											<ul class="social">
													<li><a href="user-infos.php?cl=<?php echo $data['cl_id'] ?>" data-tip="Quick View" title="Voir les détails du profile"><span class="fa fa-eye"></span></a></li>

													<li><a onclick="keepForLater(<?php echo $data['cl_id'] ?>)" data-tip="Add to Cart" title="Garder pour plus tard"><span class="fa fa-plus"></span></a>
													</li>
											</ul>
										</div>
										<div class="product-content" style="border:1px solid #e3e3e3; border-radius:0px 0px 7px 7px; border-top:0px;">
											<?php if (strlen($data['cl_nom'])<=18) echo '<h3 class="title"><a href="user-infos.php?cl='.$data['cl_id'].'">'.$data['cl_nom'].'</a></h3>';
											else echo '<h3 class="title"><a href="user-infos.php?cl='.$data['cl_id'].'">'.substr($data['cl_nom'],0,18).'...</a></h3>'; ?>

											<?php if ($data['cl_diplome']=='sans_diplome') echo '<i class="price" style="font-size:12px"><span class="fa fa-graduation-cap"></span> Sans Diplôme</i>';
											else echo '<i class="price" style="font-size:12px"><span class="fa fa-graduation-cap"></span> '.substr($data['cl_niveau'],0,15).'</i>'; ?>
										</div>
									</div>
								</div>
								<?php
							}
							//this code is created by Josué - jose.init.dev@gmail.com
							$query->closeCursor();
							?>
							<div class="col-xl-2 col-lg-3 col-sm-4 col-6 product-incfhny mt-4">
								<center>
								<div style="width:100px">
									<a href="jobs.php?type=hire&categorie=sans-diplome">
										<img src="assets/images/button-cercle.jpg" class="img-fluid rounded-circle" alt="Jobs sans dilpôme" />
									</a>
								</div>
								</center>
							</div>
						</div>
					</div>
				</div>
			
				
				<div class="col-md-6">
					<div style="border-style:outset; border-radius:7px; background:#f7f7f7;">
						<div style="background:#f1f1f1">
							<h3 class="hny-title mb-0 text-center" style="font-size:25px">Profiles <span>diplômés</span></h3>
							<p class="mb-4 text-center">Trouvez la personne à embaucher sans vous prendre la tête...</p>
							<hr>
						</div>
						<div class="ecom-products-grids row mt-lg-5 mt-3" style="padding:7px">
							<?php
							include('identifiants.php');
							$query=$db->prepare('SELECT COUNT(*) FROM clients WHERE cl_cherche_job=1 AND cl_diplome="avec_diplome"');
							$query->execute();
							$max=$query->fetchcolumn();
							if ($max>5) $a=random_int(0,$max-5);
							else $a=0;
							//echo $max;
							//echo $a;
							$query=$db->prepare('SELECT * FROM clients WHERE cl_cherche_job=1 AND cl_diplome="avec_diplome" ORDER BY cl_id DESC LIMIT :min, 5');
							$query->bindValue(':min', $a, PDO::PARAM_INT);
							$query->execute();
							while ($data=$query->fetch()){
								?>
								<div class="col-xl-2 col-lg-3 col-sm-4 col-6 product-incfhny mt-4">
									<div class="product-grid2 transmitv">
										<div class="product-image2" style="border:1px solid #e3e3e3; border-radius:7px; height:150px;">
											<a>
												<img class="pic-1 img-fluid" src="assets/images/clients/<?php echo $data['cl_photo'] ?>">
												<img class="pic-2 img-fluid" src="assets/images/clients/<?php echo $data['cl_photo'] ?>" style="width:150%" title="<?php echo $data['cl_description'] ?>">
											</a>
											<ul class="social">
													<li><a href="user-infos.php?cl=<?php echo $data['cl_id'] ?>" data-tip="Quick View" title="Voir les détails du profile"><span class="fa fa-eye"></span></a></li>

													<li><a onclick="keepForLater(<?php echo $data['cl_id'] ?>)" data-tip="Add to Cart" title="Garder pour plus tard"><span class="fa fa-plus"></span></a>
													</li>
											</ul>
										</div>
										<div class="product-content" style="border:1px solid #e3e3e3; border-radius:0px 0px 7px 7px; border-top:0px;">
											<?php if (strlen($data['cl_nom'])<=18) echo '<h3 class="title"><a href="user-infos.php?cl='.$data['cl_id'].'">'.$data['cl_nom'].'</a></h3>';
											else echo '<h3 class="title"><a href="user-infos.php?cl='.$data['cl_id'].'">'.substr($data['cl_nom'],0,18).'...</a></h3>'; ?>

											<?php if ($data['cl_diplome']=='sans_diplome') echo '<i class="price" style="font-size:12px"><span class="fa fa-graduation-cap"></span> Sans Diplôme</i>';
											else echo '<i class="price" style="font-size:12px"><span class="fa fa-graduation-cap"></span> '.substr($data['cl_niveau'],0,15).'</i>'; ?>
										</div>
									</div>
								</div>
								<?php
							}
							$query->closeCursor();
							?>
							<div class="col-xl-2 col-lg-3 col-sm-4 col-6 product-incfhny mt-4">
								<center>
								<div style="width:100px">
									<a href="jobs.php?type=hire&categorie=avec-diplome">
										<img src="assets/images/button-cercle.jpg" class="img-fluid rounded-circle" alt="Jobs sans dilpôme" />
									</a>
								</div>
								</center>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>