<!-------------direct chat------------->
<div class="dropdownChat">
	<img class="iconChat" src="assets/images/chat.png">
	<?php
	$query=$db->prepare('SELECT COUNT(DISTINCT ch_code) FROM chats WHERE cl_id=:id AND ch_lu=0');
	$query->bindValue(':id', $cl_id, PDO::PARAM_INT);
	$query->execute();
	$nbr=$query->fetchcolumn();
	?>
	<i style="background:#000; padding:5px; border-radius:20px; color:#fff; position:fixed; left:10px; bottom:40px; text-align:center; font-size:11px; z-index:2;"><?php echo $nbr ?></i>
	<div class="dropdown-content-chat">
		<p style="background:#7C7A77; padding:2px; border-radius:20px; text-align:center;"><a href="compte.php?option=chats" style="color:white">Tous mes chats</a></p>
		<?php
		//------chats non lu//------------
		$query3=$db->prepare('SELECT DISTINCT ch_code FROM chats WHERE cl_id=:id AND ch_lu=0 ORDER BY ch_id DESC LIMIT 7');
		$query3->bindValue(':id', $cl_id, PDO::PARAM_INT);
		$query3->execute();
		while ($codes=$query3->fetch()){
			$query4=$db->prepare('SELECT ch_message, ch_code, ch_date FROM chats WHERE ch_code=:co AND ch_lu=0 ORDER BY ch_id DESC LIMIT 1');
			$query4->bindValue(':co', $codes['ch_code'], PDO::PARAM_INT);
			$query4->execute();
			$chat=$query4->fetch();
			?>
			<img src="assets/images/chat.png" style="width:20px"> <a href="chat.php?code=<?php echo $chat['ch_code'] ?>&start-chat=true"><b><?php echo substr($chat['ch_message'],0,50).' ...'; ?></b></a><br>
			<i style="font-size:11px;"><?php echo duree($chat['ch_date']) ?></i>
			<hr>
			<?php
		}
		//------chats lu//------------
		$query3=$db->prepare('SELECT DISTINCT ch_code FROM chats WHERE cl_id=:id AND ch_lu=1 ORDER BY ch_id DESC LIMIT 5');
		$query3->bindValue(':id', $cl_id, PDO::PARAM_INT);
		$query3->execute();
		while ($codes=$query3->fetch()){
			$query4=$db->prepare('SELECT ch_message, ch_code, ch_date FROM chats WHERE ch_code=:co AND ch_lu=1 ORDER BY ch_id DESC LIMIT 1');
			$query4->bindValue(':co', $codes['ch_code'], PDO::PARAM_INT);
			$query4->execute();
			$chat=$query4->fetch();
			?>
			<img src="assets/images/chat.png" style="width:20px"> <a href="chat.php?code=<?php echo $chat['ch_code'] ?>&start-chat=true"><i><?php echo substr($chat['ch_message'],0,50).' ...'; ?></i></a><br>
			<i style="font-size:11px;"><?php echo duree($chat['ch_date']) ?></i>
			<hr>
			<?php
		}
		?>
		<a href="compte.php?option=chats">Tous mes chats</a>
	</div>
</div>
<style>
	.dropdownChat {
	  position: relative;
	  display: inline-block;
	}
	.dropdown-content-chat {
	  display: none;
	  position: fixed;
	  left: 2px;
	  bottom: 50px;
	  border-radius: 10px;
	  background-color: #f9f9f9;
	  min-width: 300px;
	  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	  padding: 12px;
	  max-height: 300px;
	  overflow: auto;
	  z-index: 1;
	}
	.dropdownChat:hover .dropdown-content-chat {
	  display: block;
	}
	.dropdownChat .iconChat {
		opacity: 0.8;
		width: 65px;
		position: fixed;
		left: 2px;
		bottom: 2px;
		z-index: 1;
	}
</style>
<!-------------//direct chat------------->

<!--------- keep pour later--------------->
<div class="alert alert-dismissible" style="font-size:20px; position:fixed; top:20vh; left:-100px; display:none; background:#000; z-index:999;" id="keepLater"><p id="successText" style="color:#fff"></p></div>
<script>
	//--------------read clients compte ids gardés for later in cookies----------------
	let x=document.cookie;
	x=x.split("; ");
	let elt;
	let keepLaterIds=[];
	for (let i=0; i<x.length; i++){
		let elt=x[i].substring(x[i].length-1,x[i].length);
		//if (typeof parseInt(elt) === "number"){
		//	console.log(parseInt(elt));
		//	console.log(elt);
		//}
		if (!keepLaterIds.includes(parseInt(elt))){
			keepLaterIds.push(parseInt(elt));
		}
		//console.log(elt==NaN);
	}
	//console.log(keepLaterIds);
//	console.log(x);
//	x.forEach(function(item, index){
//		console.log("Le voilà "+item+"->"+index);
//	});
	//--------------//read clients compte ids gardés for later in cookies----------------
	function keepForLater(clid){
		document.cookie = "keep"+clid.toString()+"="+clid;
		showSuccess("Ajouté à vos \"Garder pour plus tard\"");
	}
	function showSuccess(mess){
		document.getElementById('successText').textContent=mess;
		document.getElementById('keepLater').style.display="block";
		$(document).ready(function(){
			$("#keepLater").animate({left: '10px'});
		});
		let tps=3;
		let x=setInterval(function(){
			tps--;
			if (tps<=0){
				document.getElementById('keepLater').style.display="none";
				document.getElementById('keepLater').style.left="-100px";
				clearInterval(x);
			}
		}, 1000);
	}
</script>
<!--------- //keep pour later--------------->
<!--------- error alert --------------->
<div class="alert alert-danger" style="font-size:20px; position:fixed; top:20vh; left:-100px; display:none; z-index:999;" id="errorAlert"><p id="errorText" style="color:#000"></p></div>
<script>
	function showError(mess){
		document.getElementById('errorText').textContent=mess;
		document.getElementById('errorAlert').style.display="block";
		$(document).ready(function(){
			$("#errorAlert").animate({left: '10px'});
		});
		let tps=3;
		let x=setInterval(function(){
			tps--;
			if (tps<=0){
				document.getElementById('errorAlert').style.display="none";
				document.getElementById('errorAlert').style.left="-100px";
				clearInterval(x);
			}
		}, 1000);
	}
</script>
<!--------- //error alert --------------->

<!---------new account created//----------->
<?php
//if (true){
if (isset($_GET['newAccount'])){
	session_destroy();
	showSuccess("Compte créé avec succès, bienvenue <b>".$cl_nom."</b> <i class='far fa-grin'></i>");
}
if (isset($_GET['deco'])){
	showSuccess("Déconnexion avec succès, à bientôt. Vous nous quittez déjà <i class='far fa-frown'></i>");
}
if (isset($_GET['isConnected'])){
	session_destroy();
	showError2('Vous êtes déjà connecté.');
}
if (isset($_GET['connectNotTM'])){
	session_destroy();
	showError2('Téléphone/Email invalide.');
}
if (isset($_GET['mdpError'])){
	session_destroy();
	showError2('Mot de passe invalide. L\'avez-vous oublié ?');
}
if (isset($_GET['connected'])){
	session_destroy();
	showSuccess("Connection avec succès. Heureux de vous revoir <b>".$cl_nom."</b> <i class='far fa-grin'></i>");
}
?>


  <section class="w3l-footer-22">
      <!-- footer-22 -->
      <div class="footer-hny py-5">
          <div class="container py-lg-5">
              <div class="text-txt row">
                  <div class="left-side col-lg-4">
                      <h3><a class="logo-footer" href="index.php" style="border:1px solid #fff; padding:5px; border-radius:5px"><?php echo substr($nom_site,0,3) ?><span class="lohny"><?php echo substr($nom_site,3,1) ?></span><?php echo substr($nom_site,4) ?></a></h3>
                      <!-- if logo is image enable this   
                                    <a class="navbar-brand" href="#index.html">
                                        <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
                                    </a> -->
                      <p style="text-align:justify">Permettre à tout le monde d'avoir du travail ou de trouver un employé facilement, nous offrons un panel d'offre d'emplois et d'employés. En partant des jobs ne nécessitant aucun diplôme jusqu'à ceux qui nécessitent le plus gros diplôme.</p>
                      <ul class="social-footerhny mt-lg-5 mt-4">

                          <li><a class="facebook" href="<?php echo $facebook_site ?>" target="_blank"><span class="fa fa-facebook" aria-hidden="true"></span></a>
                          </li>
                          <li><a class="twitter" href="<?php echo $twitter_site ?>" target="_blank"><span class="fa fa-twitter" aria-hidden="true"></span></a>
                          </li>
                          <li><a class="google" href="mailto:<?php echo $mail_site ?>" target="_blank"><span class="fa fa-google-plus" aria-hidden="true"></span></a>
                          </li>
                          <li><a class="instagram" href="<?php echo $instagram_site ?>" target="_blank"><span class="fa fa-instagram" aria-hidden="true"></span></a>
                          </li>
                      </ul>
                  </div>

                  <div class="right-side col-lg-8 pl-lg-5">
                      <h4 class="d-none d-md-block" style="font-size:25px">JE TRAVAIL MAINTENANT OU J'EMBAUCHE <span class="fas fa-grin-hearts"></span></h4>
                      <h4 class="d-md-none" style="font-size:15px">JE TRAVAIL MAINTENANT OU J'EMBAUCHE <span class="fas fa-grin-hearts"></span></h4>
                      <div class="sub-columns">
                          <div class="sub-one-left">
                              <h6>Liens Rapides</h6>
                              <div class="footer-hny-ul">
                                  <ul>
                                      <li><a href="index.php">Accueil</a></li>
                                      <li><a href="faq.php">F.A.Q</a></li>
                                      <li><a href="contact.php">Contact</a></li>
                                      <li><a href="about.php">A Propos</a></li>
                                  </ul>
                                  <ul>
                                      <li><a href="jobs.php">Jobs</a></li>
                                      <li><a href="jobs.php?type=work">Travailler</a></li>
                                      <li><a href="jobs.php?type=hire">Embaucher</a></li>
                                      <li><a href="about.php#termes-conditions">Termes & Conditions</a></li>
                                  </ul>
                              </div>

                          </div>
                          <div class="sub-two-right">
                              <h6>Premium</h6>
                              <p class="mb-5">Mettre votre enreprise ou votre CV au devant de tous ? Passez premium sans plus tarder ! Moins cher mais éfficace ! <span class="fa fa-thumbs-up"></span>
								  <a href="go-premium.php"><button type="button" class="btn btn-warning" style="border-radius:15px"><span class="fa fa-star"></span> <span class="fas fa-running"></span>Go Premium <span class="fa fa-star"></span></button></a></p>
                              <h6>Nous acceptons :</h6>
                              <ul>
                                  <li><a class="pay-method" href="go-premium.php"><img src="assets/images/icon-visa.jpg" class="card-icon img-fluid" style="height:25px; filter:grayscale(100%)"></a>
                                  </li>
                                  <li><a class="pay-method" href="go-premium.php"><img src="assets/images/icon-mastercard.jpg" class="card-icon img-fluid" style="height:25px; filter:grayscale(100%)"></a>
                                  </li>
                                  <li><a class="pay-method" href="go-premium.php"><img src="assets/images/icon-paypal.jpg" class="card-icon img-fluid" style="height:25px; filter:grayscale(100%)"></a>
                                  </li>
                                  <li><a class="pay-method" href="go-premium.php"><img src="assets/images/icon-orange-money.jpg" class="card-icon img-fluid" style="height:25px; filter:grayscale(100%)"></a>
                                  </li>
                                  <li><a class="pay-method" href="go-premium.php"><img src="assets/images/icon-mtn-money.jpg" class="card-icon img-fluid" style="height:25px; filter:grayscale(100%)"></a>
                                  </li>
                                  <li><a class="pay-method" href="go-premium.php"><img src="assets/images/icon-moov-money.jpg" class="card-icon img-fluid" style="height:25px; filter:grayscale(100%)"></a>
                                  </li>
                                  <li><a class="pay-method" href="go-premium.php"><img src="assets/images/icon-payeer.png" class="card-icon img-fluid" style="height:25px; filter:grayscale(100%)"></a>
                                  </li>
                                  <li><a class="pay-method" href="go-premium.php"><img src="assets/images/icon-perfect-money.png" class="card-icon img-fluid" style="height:25px; filter:grayscale(100%)"></a>
                                  </li>
                                  <li><a class="pay-method" href="go-premium.php"><img src="assets/images/icon-skrill.jpg" class="card-icon img-fluid" style="height:25px; filter:grayscale(100%)"></a>
                                  </li>
                                  <li><a class="pay-method" href="go-premium.php"><img src="assets/images/icon-umob.png" class="card-icon img-fluid" style="height:25px; filter:grayscale(100%)"></a>
                                  </li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="below-section row">
                  <div class="columns col-lg-6">
                      <ul class="jst-link">
                          <li><a href="about.php#confidentialite">Confidentialité</a></li>
                          <li><a href="about.php#termes-conditions">Termes du contrat</a></li>
                          <li><a href="faq.php">Support</a></li>
                      </ul>
                  </div>
                  <div class="columns col-lg-6 text-lg-right">
                      <p>© 2020 <?php echo $nom_site ?> ::: Tous droits réservés ::: Powered by <a href="mailto:jose.init.dev@gmail.com" target="_blank">Josué</a>
                      </p>
                  </div>
                  <button onclick="topFunction()" id="movetop" title="Aller en haut de page">
                      <span class="fa fa-angle-double-up"></span>
                  </button>
              </div>
          </div>
      </div>
      <!-- //titels-5 -->
	  <div class="spinner-grow" id="loadingPage" style="position:fixed; top:15px; right:15px; width:60px; height:60px; color:orange; z-index:999;"></div>
	  <!------ show until page finish loading ----------->
	  <!--this code is created by Josué - jose.init.dev@gmail.com-->
	  <script>
		  document.onreadystatechange = function() { 
				if (document.readyState !== "complete") { 
					//document.querySelector("body").style.visibility = "hidden"; 
					document.getElementById('loadingPage').style.display = "block"; 
				} else { 
					document.getElementById('loadingPage').style.display = "none"; 
					//document.querySelector("body").style.visibility = "visible"; 
				} 
			};
		  /*function pageLoading(){
			  //document.getElementById('loadingPage').style.display="none";
		  }*/
	  </script>
	  <!------ //show until page finish loading ----------->
      <!-- move top -->
      <script>
          // When the user scrolls down 20px from the top of the document, show the button
          window.onscroll = function () {
              scrollFunction()
          };

          function scrollFunction() {
              if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                  document.getElementById("movetop").style.display = "block";
              } else {
                  document.getElementById("movetop").style.display = "none";
              }
          }

          // When the user clicks on the button, scroll to the top of the document
          function topFunction() {
              document.body.scrollTop = 0;
              document.documentElement.scrollTop = 0;
          }
      </script>
      <!-- /move top -->
  </section>


<!-------side nav------>	  
<style>		 
	.sidenav {
	  height: 100%; /* 100% Full-height */
	  width: 0; /* 0 width - change this with JavaScript */
	  position: fixed; /* Stay in place */
	  z-index: 999; /* Stay on top */
	  top: 0; /* Stay at the top */
	  left: 0;
	  background-image: linear-gradient(to right, rgba(0,0,0,1) 20%, rgba(0,0,0,0.3));
	  overflow-x: hidden; /* Disable horizontal scroll */
	  padding-top: 60px; /* Place content 60px from the top */
	  transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
	}
	.sidenav a {
	  padding: 8px 8px 8px 32px;
	  text-decoration: none;
	  font-size: 16px;
	  font-family: 'Roboto';
	  color: #fff;
	  display: block;
	  transition: 0.3s;
	}
	.sidenav a:hover {
	  color: orange;
	}
	.sidenav i {
		color: darkorange;
		padding: 15px;
	}
	.sidenav p {
		color: orange;
		padding: 15px;
	}
	.sidenav .closebtn {
	  position: absolute;
	  top: 0;
	  right: 25px;
	  font-size: 36px;
	  margin-left: 50px;
	}
	#main {
	  transition: margin-left .5s;
	  padding: 20px;
	}
	@media screen and (max-height: 450px) {
	  .sidenav {padding-top: 15px;}
	  .sidenav a {font-size: 18px;}
}
.btnBlack{
	background: #000;
	border-radius: 25px;
	color: #fff;
	font-family: 'Roboto';
	transition: transform .2s;
}
.btnBlack:hover{
	background: darkorange;
	color: #000;
	transform: skewY(2deg);
}
.btnOrange{
	background: darkorange;
	border-radius: 25px;
	color: #000;
	font-family: 'Roboto';
	transition: transform .2s;
}
.btnOrange:hover{
	background: #000;
	color: #fff;
	transform: skewY(2deg);
}
.bounce {
    -webkit-animation: bounce 2s infinite;
    animation: bounce 2s infinite;
}
@-webkit-keyframes bounce {
  0%, 20%, 50%, 80%, 100% {
    -webkit-transform: translateX(0); }
  40% {
    -webkit-transform: translateX(-30px); }
  60% {
    -webkit-transform: translateX(-15px); }
}
@-moz-keyframes bounce {
  0%, 20%, 50%, 80%, 100% {
    -moz-transform: translateX(0); }
  40% {
    -moz-transform: translateX(-30px); }
  60% {
    -moz-transform: translateX(-15px); }
}
@keyframes bounce {
  0%, 20%, 50%, 80%, 100% {
    -webkit-transform: translateX(0);
    -moz-transform: translateX(0);
    -ms-transform: translateX(0);
    -o-transform: translateX(0);
    transform: translateX(0); }
  40% {
    -webkit-transform: translateX(-30px);
    -moz-transform: translateX(-30px);
    -ms-transform: translateX(-30px);
    -o-transform: translateX(-30px);
    transform: translateX(-30px); }
  60% {
    -webkit-transform: translateX(-15px);
    -moz-transform: translateX(-15px);
    -ms-transform: translateX(-15px);
    -o-transform: translateX(-15px);
    transform: translateX(-15px); }
}
/*----belt dropdown notification----*/
.menu-btn {
	color: white;
	font-size: 20px;
	background: none;
	border: none;
}
.dropdown-menu2 {
	position: relative;
	display: inline-block;
}
.menu-content {
	display: none;
	position: absolute;
	background-color: #fff;
	min-width: 150px;
	border-radius: 4px;
	font-size: 13px;
	padding: 7px;
	color: #000;
	z-index: 1;
}
.dropdown-menu2:hover .menu-btn {
	color: orange;
}
/*----//belt dropdown notification-----*/
	
/*-----princing-------*/
.pricingTable{
    font-family: 'Lato', sans-serif;
    text-align: center;
    margin: 0 10px;
    border-radius: 40px 40px 170px 170px / 40px 40px 70px 70px;
    overflow: hidden;
    transition: all 0.3s ease 0s;
}
.pricingTable:hover{ box-shadow: 0 0 20px -5px rgba(0,0,0, 0.9); }
.pricingTable .pricingTable-header{
    background: #e7e8ea;
    padding: 25px 0 0;
}
.pricingTable .price-value{
    color: #86878B;
    font-weight: 900;
    margin: 0 0 15px;
}
.pricingTable .price-value .amount{
    font-size: 45px;
    line-height: 40px;
    display: block;
}
.pricingTable .price-value .duration{
    font-size: 16px;
    font-weight: 600;
    text-transform: uppercase;
    display: block;
}
.pricingTable .title{
    color: #fff;
    background: #f76b0e;
    font-size: 33px;
    font-weight: 600;
    letter-spacing: 1px;
    text-transform: uppercase;
    padding: 18px 10px 15px;
    margin: 0 -8px;
    border: 8px solid #fff;
    border-bottom: none;
    border-radius: 170px 170px 0 0 / 70px 70px 0 0;
}
.pricingTable .content-list{
    background: #E7E8EA;
    padding: 0;
    margin: 0;
    list-style: none;
}
.pricingTable .content-list li{
    color: #86878B;
    font-size: 16px;
    font-weight: 600;
    text-transform: uppercase;
    padding: 12px 5px;
}
.pricingTable .content-list li:nth-child(even){ background: #D1D2D4; }
.pricingTable .content-list li:last-child{ margin-bottom: 0; }
.pricingTable .pricingTable-signup{
    background: #f76b0e;
    padding: 17px 20px 23px;
}
.pricingTable .pricingTable-signup a{
    color: #fff;
    font-size: 27px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    transition: all 0.3s ease 0s;
}
.pricingTable .pricingTable-signup a:hover{
    font-weight: 900;
    letter-spacing: 2px;
    text-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
}
.pricingTable.blue .title,
.pricingTable.blue .pricingTable-signup{
    background: #3867d6;
}
.pricingTable.black .title,
.pricingTable.black .pricingTable-signup{
    background: #000000;
}
.pricingTable.green .title,
.pricingTable.green .pricingTable-signup{
    background: #0fb9b1;
}
@media only screen and (max-width: 990px){
    .pricingTable{ margin-bottom: 30px; }
}
/*-----//princing-------*/
/*-this code is created by Josué - jose.init.dev@gmail.com-*/
/*---------- scrollbar ------------*/
::-webkit-scrollbar {
  width: 10px;
}
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey; 
  border-radius: 20px;
}
::-webkit-scrollbar-thumb {
  background: darkorange; 
  border-radius: 20px;
}
::-webkit-scrollbar-thumb:hover {
  background: orange; 
}
/*---------- //scrollbar ------------*/
	
@keyframes successEx {
  0%   {left:-300px; top:20vh;}
  100%  {left:50px; top:20vh;}
}
</style>

<!----belt dropdown notification----->
<script>
let dropdownBtn = document.querySelector('.menu-btn');
let menuContent = document.querySelector('.menu-content');
dropdownBtn.addEventListener('click',()=>{
   if(menuContent.style.display===""){
      menuContent.style.display="block";
   } else {
      menuContent.style.display="";
   }
})
</script>
<!----//belt dropdown notification----->

<script>
	function openNav() {
		document.getElementById("mySidenav").style.width = "250px";
		document.getElementById("main").style.marginLeft = "250px";
	}
	function closeNav() {
		document.getElementById("mySidenav").style.width = "0";
		document.getElementById("main").style.marginLeft = "0";
	}
</script>
<!-----------side nav----------------->
<!--
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
-->


	<script>
	function openNav() {
	  document.getElementById("mySidenav").style.width = "250px";
	}

	function closeNav() {
	  document.getElementById("mySidenav").style.width = "0";
	}
	</script>
  </body>
</html>

<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/jquery-2.1.4.min.js"></script>
<!--/login-->
<script>
		$(document).ready(function () {
			$(".button-log a").click(function () {
				$(".overlay-login").fadeToggle(200);
				$(this).toggleClass('btn-open').toggleClass('btn-close');
			});
		});
		$('.overlay-close1').on('click', function () {
			$(".overlay-login").fadeToggle(200);
			$(".button-log a").toggleClass('btn-open').toggleClass('btn-close');
			open = false;
		});
  </script>
<!--//login-->

<!-- disable body scroll which navbar is in active -->

<script>
  $(function () {
    $('.navbar-toggler').click(function () {
      $('body').toggleClass('noscroll');
    })
  });
</script>
<!-- disable body scroll which navbar is in active -->
<script src="assets/js/bootstrap.min.js"></script>