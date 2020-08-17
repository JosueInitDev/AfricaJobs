<?php
if (session_status() != PHP_SESSION_ACTIVE) {
  session_start();
}

function isTaping(){ //insert is_taping into data base when user starts taping a message
	include('identifiants.php');
	$cod=$_SESSION['chat_code'];
	$cod = (int) $cod;
	$cl=$_COOKIE['cl_id'];
	$query=$db->prepare('SELECT COUNT(*) FROM chats WHERE cl_id=:cl AND ch_message="is_taping" AND ch_code=:co');
	$query->bindValue(':cl', $cl, PDO::PARAM_INT);
	$query->bindValue(':co', $cod, PDO::PARAM_INT);
	$query->execute();
	$nbr=$query->fetchcolumn();
	if ($nbr==0){ //don't save is_chating twice into data base
		$query=$db->prepare('INSERT INTO chats(cl_id, ch_message, ch_code, ch_date) VALUES(:cl, :m, :co, :d)');
		$query->bindValue(':cl', $cl, PDO::PARAM_INT);
		$query->bindValue(':m', "is_taping", PDO::PARAM_STR);
		$query->bindValue(':co', $cod, PDO::PARAM_INT);
		$query->bindValue(':d', date('Y').'-'.date('m').'-'.date('d'), PDO::PARAM_STR);
		$query->execute();
		$query->closeCursor();
		return 'taping';
	}
}
function stopTaping(){ //delete is_taping from data base when user stop taping message
	include('identifiants.php');
	$cod=$_SESSION['chat_code'];
	$cod = (int) $cod;
	$cl=$_COOKIE['cl_id'];
	$query=$db->prepare('DELETE FROM chats WHERE cl_id=:cl AND ch_message=:m AND ch_code=:co');
	$query->bindValue(':cl', $cl, PDO::PARAM_INT);
	$query->bindValue(':m', "is_taping", PDO::PARAM_STR);
	$query->bindValue(':co', $cod, PDO::PARAM_INT);
	$query->execute();
	$query->closeCursor();
	return 'stoped';
}

if (isset($_POST['funct'])){
	if ($_POST['funct'] == 'isTaping'){
		$a=isTaping();
		//echo $a;
	}elseif ($_POST['funct'] == 'stopTaping'){
		$a=stopTaping();
	}
}
?>