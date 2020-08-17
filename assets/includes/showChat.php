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
$humanPic=$db->prepare('SELECT cl_photo FROM clients WHERE cl_id=:id LIMIT 1');
$humanPic->bindValue(':id', $clid, PDO::PARAM_INT);
$humanPic->execute();
$humanPic=$humanPic->fetch();
$humanPic=$humanPic['cl_photo'];
$botPic=$db->prepare('SELECT cl_photo FROM clients INNER JOIN chats on clients.cl_id=chats.cl_id WHERE chats.cl_id != :id LIMIT 1');
$botPic->bindValue(':id', $clid, PDO::PARAM_INT);
$botPic->execute();
$botPic=$botPic->fetch();
$botPic=$botPic['cl_photo'];

while ($data=$query->fetch()){
	//echo $clid;
	if ($data['cl_id']!=$clid and $data['ch_message']!='is_taping'){ //it's bot (put message left) ('cause human's one is your messages, what you write)
		?>
		<div id="botBlock" class="d-flex" style="margin:0px"><!----------bot=>who i'm chating with---------------->
			<div class="p-1" id="botPhoto" style="padding:0px;">
				<img src="assets/images/clients/<?php echo $botPic ?>" class="rounded-circle" style="width:30px">
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
	else if($data['cl_id']==$clid and $data['ch_message']!='is_taping'){
		?>
		<div id="humanBlock" class="d-flex flex-row-reverse" style="margin:0px"><!-----------human=>me------------->
			<div class="p-1" id="humanPhoto" style="padding:0px">
				<img src="assets/images/clients/<?php echo $humanPic ?>" class="rounded-circle" style="width:30px">
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
	if ($data['ch_message']=='is_taping' and $data['cl_id']!=$clid){ //show chat dots (means the other person is wrinting something)
		?>
		<div class="d-flex" style="margin:0px">
			<div class="p-1 spinner" style="display:block" id="writing1">
				<div class="double-bounce1"></div>
				<div class="double-bounce2"></div>
			</div>
			<div class="p-1 spinner" style="display:block" id="writing2">
				<div class="double-bounce1"></div>
				<div class="double-bounce2"></div>
			</div>
			<div class="p-1 spinner" style="display:block" id="writing3">
				<div class="double-bounce1"></div>
				<div class="double-bounce2"></div>
			</div>
		</div>
		<?php
	}else{ //hide chat dots (means the other person stopped wrinting something)
		?>
		<div class="d-flex" style="margin:0px">
			<div class="p-1 spinner" style="display:none" id="writing1">
				<div class="double-bounce1"></div>
				<div class="double-bounce2"></div>
			</div>
			<div class="p-1 spinner" style="display:none" id="writing2">
				<div class="double-bounce1"></div>
				<div class="double-bounce2"></div>
			</div>
			<div class="p-1 spinner" style="display:none" id="writing3">
				<div class="double-bounce1"></div>
				<div class="double-bounce2"></div>
			</div>
		</div>
		<?php
	}
}
//this code is created by Josué - jose.init.dev@gmail.com
$query->closeCursor();
?>