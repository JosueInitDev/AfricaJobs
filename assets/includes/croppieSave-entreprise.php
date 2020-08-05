<?php
// this save image into db and move it to folder after cropping it with croppie-entreprise.html (in assets/includes)

$image = $_POST['image'];

list($type, $image) = explode(';',$image);
list(, $image) = explode(',',$image);

$image = base64_decode($image);
$image_name = time().'.png';
file_put_contents('../images/clients/'.$image_name, $image);

//save into data base
$clid = (int) $_COOKIE['cl_id'];
include('identifiants.php');
$query=$db->prepare('SELECT en_photo FROM entreprises WHERE cl_id=:id');
$query->bindValue(':id', $clid, PDO::PARAM_INT);
$query->execute();
$p=$query->fetch();
if (strlen($p['en_photo']) > 8){
	unlink('../images/clients/'.$p['en_photo']);
}

$query=$db->prepare('UPDATE entreprises SET en_photo=:p WHERE cl_id=:id');
$query->bindValue(':p', $image_name, PDO::PARAM_STR);
$query->bindValue(':id', $clid, PDO::PARAM_INT);
$query->execute();
$query->closeCursor();
//this code is created by Josué - jose.init.dev@gmail.com
?>