<?php
include('identifiants.php');
$query=$db->prepare('SELECT COUNT(*) FROM jobs WHERE jb_type="avec_diplome"');
$query->execute();
$max=$query->fetchcolumn();
if ($max>5) $a=random_int(0,$max-5);
else $a=0;
//echo $max;
//echo $a;
$query=$db->prepare('SELECT jb_id, jb_photo, jb_titre FROM jobs WHERE jb_type="avec_diplome" ORDER BY jb_id DESC LIMIT :min, 5');
$query->bindValue(':min', $a, PDO::PARAM_INT);
$query->execute();
while ($data=$query->fetch()){
	?>
	<div class="col-lg-2 col-md-4 col-4 welcome-image">
		<div class="boxhny13" style="background-image:url('assets/images/jobs/<?php echo $data['jb_photo'] ?>'); height:160px; width:160px; border-radius:50%; background-position:center; background-size:cover;">
			<a href="job-infos.php?jb=<?php echo $data['jb_id'] ?>">
				<div class="boxhny-content">
					<h3 class="title"><span class="fa fa-eye"></span> Détails</h3>
				</div>
			</a>
		</div>
		<?php if (strlen($data['jb_titre'])<=30) echo '<h4 class="title"><a href="job-infos.php?jb='.$data['jb_id'].'">'.$data['jb_titre'].'</a></h4>';
		else echo '<h4 class="title"><a href="job-infos.php?jb='.$data['jb_id'].'">'.substr($data['jb_titre'],0,28).'...</a></h4>'; ?>
	</div>
	<?php
}
$query->closeCursor();
?>
<div class="col-lg-2 col-md-4 col-4 welcome-image">
	<div style="width:160px">
		<a href="jobs.php?type=work&categorie=avec-diplome">
			<img src="assets/images/button-cercle.jpg" class="img-fluid rounded-circle" alt="Jobs sans dilpôme" />
		</a>
	</div>
</div>