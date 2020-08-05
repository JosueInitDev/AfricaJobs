<?php
if (session_status() != PHP_SESSION_ACTIVE) {
  session_start();
}

include('identifiants.php');
require_once('functions.php');
$clid=$_COOKIE['cl_id'];
//$clid=22;
$code=$_SESSION['chat_code'];

//$query=$db->prepare('SELECT * FROM chats');
$query=$db->prepare('SELECT * FROM chats WHERE ch_code=:co');
$query->bindValue(':co', $code, PDO::PARAM_INT);
$query->execute();

while ($data=$query->fetch()){
	//echo $clid;
	if ($data['cl_id']!=$clid){ //it's bot (put message left) ('cause human's one is your messages, what you write)
		?>
		<div id="botBlock" class="d-flex" style="margin:0px">
			<div class="p-1" id="botPhoto" style="padding:0px;">
				<img src="assets/images/clients/user-default.png" class="rounded-circle" style="width:30px">
			</div>
			<div class="p-2" id="botContent">
				<p style="background:rgba(173,98,0,0.3); padding:7px; margin:0px; border-radius:15px; width:auto; color:#404040; font-family: 'Roboto'; font-size:16px;">
				<?php echo $data['ch_message']; ?>
				</p>
				<i style="font-size:11px;"><?php echo duree($data['ch_date']) ?></i>
			</div>
			<div class="col-2">

			</div>
		</div>
		<?php
	}
	else{
		?>
		<div id="humanBlock" class="d-flex flex-row-reverse" style="margin:0px">
			<div class="p-1" id="humanPhoto" style="padding:0px">
				<img src="assets/images/clients/user-default.png" class="rounded-circle" style="width:30px">
			</div>
			<div class="p-2" id="humanContent">
				<p style="background:rgba(255,153,23,0.6); padding:7px; margin:0px; border-radius:15px; width:auto; color:#404040; font-family: 'Roboto'; font-size:16px;">
				<?php echo $data['ch_message']; ?>
				</p>
				<i style="float:right; font-size:11px;"><?php echo duree($data['ch_date']) ?></i>
			</div>
			<div class="col-2">
				<p></p>
			</div>
		</div>
		<?php
	}
}
//this code is created by Josué - jose.init.dev@gmail.com
$query->closeCursor();
?>