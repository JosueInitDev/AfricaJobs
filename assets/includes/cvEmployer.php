<?php
include('identifiants.php');
$query=$db->prepare('SELECT COUNT(*) FROM clients WHERE cl_type="employer" AND cl_cherche_job=1');
$query->execute();
$max=$query->fetchcolumn();
$a=random_int(0,$max-5);
//echo $max;
//echo $a;
$query=$db->prepare('SELECT cl_id, cl_nom, cl_photo FROM clients WHERE cl_type="employer" AND cl_cherche_job=1 ORDER BY cl_id DESC LIMIT :min, 5');
$query->bindValue(':min', $a, PDO::PARAM_INT);
$query->execute();
while ($data=$query->fetch()){
	?>
	<div class="col-lg-2 col-md-4 col-4 welcome-image">
		<div class="boxhny13" style="background-image:url('assets/images/clients/<?php echo $data['cl_photo'] ?>'); height:160px; width:160px; border-radius:50%; background-position:center; background-size:cover;">
			<a href="user-infos.php?cl=<?php echo $data['cl_id'] ?>">
				<div class="boxhny-content">
					<h3 class="title"><span class="fa fa-eye"></span> Profile</h3>
				</div>
			</a>
		</div>
		<h4 class="title"><a href="user-infos.php?cl='.$data['cl_id'].'"><?php echo $data['cl_nom'] ?></a></h4>
	</div>
	<?php
}
$query->closeCursor();
?>
<div class="col-lg-2 col-md-4 col-4 welcome-image">
	<div>
		<a href="users.php">
			<img src="assets/images/button-cercle.jpg" class="img-fluid rounded-circle" alt="Jobs sans dilpôme" />
		</a>
	</div>
</div>