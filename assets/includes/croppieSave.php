<?php
// this save image into db and move it to folder after cropping it with croppie.html (in assets/includes)

$image = $_POST['image'];
//this code is created by Josué - jose.init.dev@gmail.com
list($type, $image) = explode(';',$image);
list(, $image) = explode(',',$image);

$image = base64_decode($image);
$image_name = time().'.png';
file_put_contents('../images/clients/'.$image_name, $image);

//save into data base
$clid = (int) $_COOKIE['cl_id'];
include('identifiants.php');
$query=$db->prepare('SELECT cl_photo FROM clients WHERE cl_id=:id');
$query->bindValue(':id', $clid, PDO::PARAM_INT);
$query->execute();
$p=$query->fetch();
if (strtolower($p['cl_photo']) != 'user-default.png'){
	unlink('../images/clients/'.$p['cl_photo']);
}

$query=$db->prepare('UPDATE clients SET cl_photo=:p WHERE cl_id=:id');
$query->bindValue(':p', $image_name, PDO::PARAM_STR);
$query->bindValue(':id', $clid, PDO::PARAM_INT);
$query->execute();
$query->closeCursor();
?>