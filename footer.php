<?php
$query=(isset($_GET['query']))?(htmlspecialchars($_GET['query'])):'';
switch($query){
	case 'connexion':
		
	break;
	case 'inscription':
		
	break;
}
?>

<!-- connexion -->
<?php

?>
<!-- //connexion -->

<!-- inscription -->
<?php

?>
<!-- //inscription -->

<!-- mdp oublié -->
<?php

?>
<!-- //mdp oublié -->


  <section class="w3l-footer-22">
      <!-- footer-22 -->
      <div class="footer-hny py-5">
          <div class="container py-lg-5">
              <div class="text-txt row">
                  <div class="left-side col-lg-4">
                      <h3><a class="logo-footer" href="index.php"><?php echo substr($nom_site,0,3) ?><span class="lohny"><?php echo substr($nom_site,3,1) ?></span><?php echo substr($nom_site,4) ?></a></h3>
                      <!-- if logo is image enable this   
                                    <a class="navbar-brand" href="#index.html">
                                        <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
                                    </a> -->
                      <p style="text-align:justify">Permettre à tout le monde d'avoir du travail ou de trouver un employé facilement, nous offrons un panel d'offre d'emplois et d'employés. En partant par les jobs ne nécessitant aucun diplôme jusqu'à ceux qui en nécessitent.</p>
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
                      <h4 style="font-size:25px">JE TRAVAIL MAINTENANT OU J'EMBAUCHE</h4>
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
                              <p class="mb-5">Mettre votre enreprise ou votre CV au devant de tous ? Passez premium sans plus tarder !
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
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="below-section row">
                  <div class="columns col-lg-6">
                      <ul class="jst-link">
                          <li><a href="about.php">Confidentialité</a></li>
                          <li><a href="about.php">Termes du contrat</a></li>
                          <li><a href="contact.php">Support</a></li>
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
	  <script>
		  function pageLoading(){
			  document.getElementById('loadingPage').style.display="none";
		  }
	  </script>
	  
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
</style>
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