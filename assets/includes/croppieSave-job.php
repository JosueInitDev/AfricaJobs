<?php
// this save image into db and move it to folder after cropping it with croppie-job.html (in assets/includes)
if (session_status() != PHP_SESSION_ACTIVE) {
  session_start();
}

$image = $_POST['image'];

list($type, $image) = explode(';',$image);
list(, $image) = explode(',',$image);

$image = base64_decode($image);
$image_name = time().'.png';
file_put_contents('../images/jobs/'.$image_name, $image);

//save into data base
$jbid = (int) $_SESSION['jbid'];
include('identifiants.php');
$query=$db->prepare('SELECT jb_photo FROM jobs WHERE jb_id=:id');
$query->bindValue(':id', $jbid, PDO::PARAM_INT);
$query->execute();
$p=$query->fetch();
if (strlen($p['jb_photo']) > 8){
	unlink('../images/jobs/'.$p['jb_photo']);
}

$query=$db->prepare('UPDATE jobs SET jb_photo=:p WHERE jb_id=:id');
$query->bindValue(':p', $image_name, PDO::PARAM_STR);
$query->bindValue(':id', $jbid, PDO::PARAM_INT);
$query->execute();
$query->closeCursor();
//this code is created by Josué - jose.init.dev@gmail.com
session_destroy();
?>