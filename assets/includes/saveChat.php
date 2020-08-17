<?php
if (session_status() != PHP_SESSION_ACTIVE) {
  session_start();
}

$code=$_SESSION['chat_code'];
$code = (int) $code;
//save chat message dans la bdd (this is called with ajax)
include('identifiants.php');
$cl=$_POST['clid'];
$mess=$_POST['mess'];
//echo $cl.' '.$mess;
//this code is created by Josué - jose.init.dev@gmail.com
$query=$db->prepare('INSERT INTO chats(cl_id, ch_message, ch_code, ch_date) VALUES(:cl, :m, :co, :d)');
$query->bindValue(':cl', $cl, PDO::PARAM_INT);
$query->bindValue(':m', $mess, PDO::PARAM_STR);
$query->bindValue(':co', $code, PDO::PARAM_INT);
$query->bindValue(':d', date('Y').'-'.date('m').'-'.date('d'), PDO::PARAM_STR);
$query->execute();
$query->closeCursor();

//------mark all messages with cl_id as read//-------------
$query=$db->prepare('UPDATE chats SET ch_lu=1 WHERE cl_id=:cl AND ch_code=:co');
$query->bindValue(':cl', $cl, PDO::PARAM_INT);
$query->bindValue(':co', $code, PDO::PARAM_INT);
$query->execute();
$query->closeCursor();
?>