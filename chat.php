			<?php
			session_start();

			include('assets/includes/constants.php');
			$type=(isset($_GET['type']))?(htmlspecialchars($_GET['type'])):'Bienvenue';
			$titre_page='Chat en directe :: '.$nom_site;
			$title="Chat en directe";
			include('top.php');
			?>
			<div class="breadcrumb-contentnhy">
				<div class="container">
					<nav aria-label="breadcrumb">
						<h2 class="hny-title text-center"><img src="assets/images/chat.png" style="width:70px"> <?php echo $title ?></h2>
						<ol class="breadcrumb mb-0">
							<li><a href="index.php">Accueil</a>
							<span class="fa fa-angle-double-right"></span></li>
							<li class="active"><a href="<?php echo $_SERVER['REQUEST_URI'] ?>"><?php echo $title ?></a>
							<span class="fa fa-angle-double-right"></span></li>
							<li class="active"><?php echo $type ?></li>
						</ol>
					</nav>
				</div>
			</div>
		</div> <!-- don't delete this -->
	</div> <!-- don't delete this -->
</section> <!-- don't delete this -->

<?php
if ($cl_id<=0){ //not connected
	?><script>window.location.href="sign-up.php";</script><?php
}else{
//----------edit data base abd table (once) to accept emoji------------
//$query=$db->prepare('ALTER TABLE chats CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci');
//$query->execute();
//$query->closeCursor();
//$query=$db->prepare('ALTER TABLE chats modify name text charset utf8mb4');
//$query->execute();
//$query->closeCursor();
//----------//edit data base abd table (once) to accept emoji------------
							
$code=(isset($_GET['code']))?(htmlspecialchars($_GET['code'])):''; //code du chat
$code = (int) $code;

if (isset($_GET['start-chat'])){
	$_SESSION['chat_code']=$code;
	//------mark all messages with cl_id as read//-------------
	$query=$db->prepare('UPDATE chats SET ch_lu=1 WHERE cl_id=:cl AND ch_code=:co');
	$query->bindValue(':cl', $cl_id, PDO::PARAM_INT);
	$query->bindValue(':co', $code, PDO::PARAM_INT);
	$query->execute();
	$query->closeCursor();
}
if (isset($_GET['new-chat'])){
	$code=time()+$cl_id;
	$_SESSION['chat_code']=$code;
	//echo $code;
	$with=(isset($_GET['with']))?(htmlspecialchars($_GET['with'])):''; //who user is chating with
	//------save the new chat for both users//----------
	$query=$db->prepare('INSERT INTO chats(cl_id, ch_message, ch_code, ch_date) VALUES(:cl, :mess, :co, :date)');
	$query->bindValue(':cl', $with, PDO::PARAM_INT);
	$query->bindValue(':mess', 'Début nouveau chat', PDO::PARAM_STR);
	$query->bindValue(':co', $code, PDO::PARAM_INT);
	$query->bindValue(':date', date('Y').'-'.date('m').'-'.date('d'), PDO::PARAM_STR);
	$query->execute();
	$query->closeCursor();
	
	$query=$db->prepare('INSERT INTO chats(cl_id, ch_message, ch_code, ch_date) VALUES(:cl, :mess, :co, :date)');
	$query->bindValue(':cl', $cl_id, PDO::PARAM_INT);
	$query->bindValue(':mess', 'Début nouveau chat', PDO::PARAM_STR);
	$query->bindValue(':co', $code, PDO::PARAM_INT);
	$query->bindValue(':date', date('Y').'-'.date('m').'-'.date('d'), PDO::PARAM_STR);
	$query->execute();
	$query->closeCursor();
}
//echo $code;
?>

<div style="background-image: url('assets/images/chatBack.jpg');">
	<div style="background:rgba(255,255,255,0.92)">
		<div style="position: sticky; left:2px; top:2px; opacity:0.7; z-index:999;"><img src="assets/images/chat.png" style="width:50px"> <i><?php echo $nom_site ?> chat en directe</i></div>
		<div class="container mt-3">
			<div class="row">
				<div class="col-md-2 d-none d-md-block">
					<p></p>
				</div>
				<div class="col-md-8" style="margin-top:5vw; margin-bottom:5vw; border-style:inset; border-radius:15px; padding:15px; background:rgba(255,255,255,0.2);">
					<?php
					$nom=$db->prepare('SELECT cl_nom FROM clients INNER JOIN chats ON clients.cl_id=chats.cl_id WHERE chats.cl_id!=:cl AND chats.ch_code=:code LIMIT 1');
					$nom->bindValue(':cl', $cl_id, PDO::PARAM_INT);
					$nom->bindValue(':code', $code, PDO::PARAM_INT);
					$nom->execute();
					$nom=$nom->fetch();
					$nom=$nom['cl_nom'];
					//this code is created by Josué - jose.init.dev@gmail.com
					?>
					<center><h2 style="font-family: 'Roboto'; "><b>Vous chatez avec <span style="color:orange"><?php echo $nom ?></span></b></h2></center>
					<hr>
					<div style="max-height:700px; overflow:auto;"><!-----chat section//----->
						<!--------display messs--------------->
						<div id="chatSection">
							<?php include('assets/includes/showChat.php'); ?>
						</div>
						<!------------->
						<hr>
						<!--------input mess----------->
						<div class="row" style="margin:0px">
							<div class="d-none d-sm-block col-sm-1 col-md-3">
								<p></p>
							</div>
							<form method="post" class="col-10 col-sm-9 col-md-8">
								<input type="text" id="tapMess" name="mess" maxlength="255" autofocus required="" placeholder="Message + entrer pour envoyer" oninput="isTaping()" onblur="stopTaping()" style="width:100%; float:right; border:0px; border-bottom:7px solid rgba(255,153,23,0.5); background:rgba(255,153,23,0.2); padding:8px; text-align:right; font-family: 'Roboto'; font-size:16px; padding-right:9px; border-radius:15px;">
								<input type="hidden" name="clid" value="<?php echo $cl_id ?>">
								<button type="submit" id="myBtn" style="display:none">Go</button>
							</form>
							<div class="dropdown col-1">
							  <h2 class="far fa-grin" style="color:orange"></h2>
							  <div class="dropdown-content">
								  <button onclick="emoji('&#128512;')">&#128512;</button>
								  <button onclick="emoji('&#128513;')">&#128513;</button>
								  <button onclick="emoji('&#128514;')">&#128514;</button>
								  <button onclick="emoji('&#128515;')">&#128515;</button>
								  <button onclick="emoji('&#128516;')">&#128516;</button>
								  <button onclick="emoji('&#128517;')">&#128517;</button>
								  <button onclick="emoji('&#128518;')">&#128518;</button>
								  <button onclick="emoji('&#128519;')">&#128519;</button>
								  <button onclick="emoji('&#128521;')">&#128521;</button>
								  <button onclick="emoji('&#128522;')">&#128522;</button>
								  <button onclick="emoji('&#128523;')">&#128523;</button>
								  <button onclick="emoji('&#128524;')">&#128524;</button>
								  <button onclick="emoji('&#128525;')">&#128525;</button>
								  <button onclick="emoji('&#128526;')">&#128526;</button>
								  <button onclick="emoji('&#128527;')">&#128527;</button>
								  <button onclick="emoji('&#128528;')">&#128528;</button>
								  <button onclick="emoji('&#128529;')">&#128529;</button>
								  <button onclick="emoji('&#128530;')">&#128530;</button>
								  <button onclick="emoji('&#128531;')">&#128531;</button>
								  <button onclick="emoji('&#128532;')">&#128532;</button>
								  <button onclick="emoji('&#128533;')">&#128533;</button>
								  <button onclick="emoji('&#128534;')">&#128534;</button>
								  <button onclick="emoji('&#128535;')">&#128535;</button>
								  <button onclick="emoji('&#128536;')">&#128536;</button>
								  <button onclick="emoji('&#128537;')">&#128537;</button>
								  <button onclick="emoji('&#128538;')">&#128538;</button>
								  <button onclick="emoji('&#128539;')">&#128539;</button>
								  <button onclick="emoji('&#128540;')">&#128540;</button>
								  <button onclick="emoji('&#128541;')">&#128541;</button>
								  <button onclick="emoji('&#128542;')">&#128542;</button>
								  <button onclick="emoji('&#128543;')">&#128543;</button>
								  <button onclick="emoji('&#128544;')">&#128544;</button>
								  <button onclick="emoji('&#128546;')">&#128546;</button>
								  <button onclick="emoji('&#128547;')">&#128547;</button>
								  <button onclick="emoji('&#128548;')">&#128548;</button>
								  <button onclick="emoji('&#128549;')">&#128549;</button>
								  <button onclick="emoji('&#128550;')">&#128550;</button>
								  <button onclick="emoji('&#128551;')">&#128551;</button>
								  <button onclick="emoji('&#128552;')">&#128552;</button>
								  <button onclick="emoji('&#128553;')">&#128553;</button>
								  <button onclick="emoji('&#128554;')">&#128554;</button>
								  <button onclick="emoji('&#128555;')">&#128555;</button>
								  <button onclick="emoji('&#128556;')">&#128556;</button>
								  <button onclick="emoji('&#128557;')">&#128557;</button>
								  <button onclick="emoji('&#128558;')">&#128558;</button>
								  <button onclick="emoji('&#128559;')">&#128559;</button>
								  <button onclick="emoji('&#128560;')">&#128560;</button>
								  <button onclick="emoji('&#128561;')">&#128561;</button>
								  <button onclick="emoji('&#128562;')">&#128562;</button>
								  <button onclick="emoji('&#128563;')">&#128563;</button>
								  <button onclick="emoji('&#128564;')">&#128564;</button>
								  <button onclick="emoji('&#128565;')">&#128565;</button>
								  <button onclick="emoji('&#128566;')">&#128566;</button>
								  <button onclick="emoji('&#128567;')">&#128567;</button>
								  <button onclick="emoji('&#128577;')">&#128577;</button>
								  <button onclick="emoji('&#128578;')">&#128578;</button>
								  <button onclick="emoji('&#128579;')">&#128579;</button>
								  <button onclick="emoji('&#128580;')">&#128580;</button>
								  <button onclick="emoji('&#129296;')">&#129296;</button>
								  <button onclick="emoji('&#129297;')">&#129297;</button>
								  <button onclick="emoji('&#129298;')">&#129298;</button>
								  <button onclick="emoji('&#129299;')">&#129299;</button>
								  <button onclick="emoji('&#129300;')">&#129300;</button>
								  <button onclick="emoji('&#129301;')">&#129301;</button>
								  <button onclick="emoji('&#129312;')">&#129312;</button>
								  <button onclick="emoji('&#129313;')">&#129313;</button>
								  <button onclick="emoji('&#129315;')">&#129315;</button>
								  <button onclick="emoji('&#129316;')">&#129316;</button>
								  <button onclick="emoji('&#129317;')">&#129317;</button>
								  <button onclick="emoji('&#129318;')">&#129318;</button>
								  <button onclick="emoji('&#129319;')">&#129319;</button>
								  <button onclick="emoji('&#129320;')">&#129320;</button>
								  <button onclick="emoji('&#129321;')">&#129321;</button>
								  <button onclick="emoji('&#129322;')">&#129322;</button>
								  <button onclick="emoji('&#129323;')">&#129323;</button>
								  <button onclick="emoji('&#129325;')">&#129325;</button>
								  <button onclick="emoji('&#129326;')">&#129326;</button>
								  <button onclick="emoji('&#129327;')">&#129327;</button>
								  <button onclick="emoji('&#129488;')">&#129488;</button>
								  <button onclick="emoji('&#128568;')">&#128568;</button>
								  <button onclick="emoji('&#128569;')">&#128569;</button>
								  <button onclick="emoji('&#128570;')">&#128570;</button>
								  <button onclick="emoji('&#128571;')">&#128571;</button>
								  <button onclick="emoji('&#128572;')">&#128572;</button>
								  <button onclick="emoji('&#128573;')">&#128573;</button>
								  <button onclick="emoji('&#128574;')">&#128574;</button>
								  <button onclick="emoji('&#128575;')">&#128575;</button>
								  <button onclick="emoji('&#128576;')">&#128576;</button>
								  <button onclick="emoji('&#128520;')">&#128520;</button>
								  <button onclick="emoji('&#128545;')">&#128545;</button>
							  </div>
							</div>
						</div>
						<!--------//input mess----------->
					</div>
				</div>
				<div class="col-md-2 d-none d-md-block">
					<p></p>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } //end of else connected ?>

<script>
	function isTaping(){ //insert is_taping into data base when user starts taping a message
		$.ajax({
			url: 'assets/includes/chatTaping.php',
			type: 'post',
			data: {funct: "isTaping"},
			success: function(response) { console.log(response); }
		});
	}
	function stopTaping(){ //delete is_taping from data base when user stop taping message
		$.ajax({
			url: 'assets/includes/chatTaping.php',
			type: 'post',
			data: {funct: "stopTaping"},
			success: function(response) { console.log(response); }
		});
	}
	//-------on enter key press----------
	let input = document.getElementById("tapMess");
						   
	input.addEventListener("keyup", function(event){
		if (event.keyCode === 13){
			event.preventDefault();
			//alert('enter clicked');
			//effacer message car already saved into bdd
			input.value='';
			stopTaping();
		}
	});
	//-------//on enter key press----------
	
	//--------this ajax save message dans la bdd and prevent reloading page----------------
	$(document).ready(function() {
		// process the form
		$('form').submit(function(event) {
			// get the form data
			var formData = {
				'clid' : $('input[name=clid]').val(),
				'mess' : $('input[name=mess]').val()
			};
			// process the form
			$.ajax({
				type : 'POST', // define the type of HTTP verb we want to use (POST for our form)
				url : 'assets/includes/saveChat.php', // the url where we want to POST
				data : formData, // our data object
				dataType : 'json', // what type of data do we expect back from the server
				encode : true
			})
				// using le done promise callback
				.done(function(data) {
					// log data to the console so we can see
					//console.log(data); 
					// here we will handle les erreurs and validation messages
				});
			// empêcher the form from submitting the normal way and refreshing the page
			event.preventDefault();
		});
	});
	//--------//this ajax save message dans la bdd and prevent reloading page----------------
	//this code is created by Josué - jose.init.dev@gmail.com
	//-------------reload messages display (car il y a peut être new messages)-----------
	window.setInterval(function(){
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		  document.getElementById("chatSection").innerHTML =
		  this.responseText;
		}
		};
		xhttp.open("GET", "assets/includes/showChat.php", true);
		xhttp.send();
	}, 1000);
	//-------------//reload messages display (car il y a peut être new messages)-----------
	
	//---------emoji--------->
	function emoji(code){
		let mess=document.getElementById('tapMess');
		mess.value += code+" ";
		input.focus(); //focus the cursor (without ce code, the cursor sort du champ de saisi)
	}
	//---------//emoji--------->
</script>

<style>
/*----emojis-------*/
.dropdown {
  position: relative;
  display: inline-block;
}
.dropdown-content {
  display: none;
  position: absolute;
  right: 10px;
  bottom: 10px;
  border-radius: 10px;
  background-color: #f9f9f9;
  min-width: 300px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 0px;
  max-height: 300px;
  overflow: auto;
  z-index: 1;
}
.dropdown:hover .dropdown-content {
  display: block;
}
.dropdown-content button {
	border: 0px;
	font-size: 20px;
	background: none;
}
/*----//emojis-------*/	

input:focus {
   	outline: none !important;
}	
button:focus {
   	outline: none !important;
}
/*   spinner taping   */
.spinner {
  width: 15px;
  height: 15px;
  position: relative;
}

.double-bounce1, .double-bounce2 {
  width: 100%;
  height: 100%;
  border-radius: 50%;
  background-color: darkorange;
  opacity: 0.6;
  position: absolute;
  top: 0;
  left: 0;
  
  -webkit-animation: sk-bounce 2.0s infinite ease-in-out;
  animation: sk-bounce 2.0s infinite ease-in-out;
}

.double-bounce2 {
  -webkit-animation-delay: -1.0s;
  animation-delay: -1.0s;
}

@-webkit-keyframes sk-bounce {
  0%, 100% { -webkit-transform: scale(0.0) }
  50% { -webkit-transform: scale(1.0) }
}

@keyframes sk-bounce {
  0%, 100% { 
    transform: scale(0.0);
    -webkit-transform: scale(0.0);
  } 50% { 
    transform: scale(1.0);
    -webkit-transform: scale(1.0);
  }
}
/*   //spinner taping   */
</style>
<?php include('footer.php'); ?>