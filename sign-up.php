			<?php
			session_start();

			include('assets/includes/constants.php');
			$type=(isset($_GET['type']))?(htmlspecialchars($_GET['type'])):'nouveau';
			$titre_page='Jobs :: '.$nom_site;
			$description_page='Créez un compte sur '.$nom_site.' et trouvez le job de vos rêves. Nos jobs sont pour tout le monde, que vous ayez un diplôme ou non. Jobs sans diplôme (femme de ménage, garagistre, chauffeur, coiffeur, ménuisier (...) ; Jobs avec diplôme (technicien, ingénieur, comptable, architecte (...)).';
			$title="Nouveau Compte";
			include('top.php');
			?>
			<div class="breadcrumb-contentnhy">
				<div class="container">
					<nav aria-label="breadcrumb">
						<h2 class="hny-title text-center"><?php echo $title ?></h2>
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
$option=(isset($_GET['option']))?(htmlspecialchars($_GET['option'])):'nouveau';
if ($cl_id>0 and !isset($_SESSION['enCours'])){ //user connected & no création de compte en cours
	?><script>window.location.href="compte.php";</script><?php
}else{ //start else
	if (isset($_GET['pr'])){
		$pr=htmlspecialchars($_GET['pr']);
		$_SESSION['parrCode'] = $pr;
	}
switch($type){
	case 'nouveau': //new account
		switch($option){
			case 'nouveau':
				//------keep d'où we come link. We will get back there après création du compte--------
				if (isset($_SERVER['HTTP_REFERER'])){ //on come frome une autre page du site
					$a=$_SERVER['HTTP_REFERER'];
					if (strpos($a, '?')){
						$_SESSION['signupBackLink'] = $a.'&newAccount=true';
					}else{
						$_SESSION['signupBackLink'] = $a.'?newAccount=true';
					}
				}else{
					$_SESSION['signupBackLink'] = "index.php";
				}
				//------//keep d'où we come link. We will get back there après création du compte--------

				//echo $_SESSION['signupBackLink'];
				?>
				<div class="container" style="margin-top:6vw; margin-bottom:6vw;">
					<div class="row">
						<div class="col-12">
							
							<div class="progress">
							  <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width:33.333%; font-size:15px;">
								Informations
							  </div>
							  <div class="progress-bar bg-success" role="progressbar" style="width:33.333%; font-size:15px;">
								<span id="formatEntrep">Formations</span>
							  </div>
							  <div class="progress-bar bg-danger" role="progressbar" style="width:33.333%; font-size:15px;">
								Photos
							  </div>
							</div>
							
							<?php
							$numMail=(isset($_POST['numMail']))?(htmlspecialchars($_POST['numMail'])):'';
							$role=(isset($_POST['role']))?(htmlspecialchars($_POST['role'])):'aucun';
							$isNum=true; //detects if $numMail is et number or un email
							if (preg_match("#@.#", $numMail)){
								$isNum=false; //not un numéro but a mail
								//echo $numMail;
							}
							if ($role!='aucun' and $role=='demandeur'){ //demander de job
								?>
								<?php
							}else if ($role!='aucun' and $role=='recruteur'){ //recruteur (entreprise)

							}else{ //$role n'a pas été reçu

							}
							?>
							<form class="row" method="post" action="sign-up.php?type=nouveau&option=etape-2" id="formInfos">
								<div class="form-group col-6 col-md-4">
									<label for="nom">Nom Prénom (<b style="color:red">*</b>)</label>
									<input type="text" class="form-control" id="nom" name="nom" maxlength="20" required="">
								</div>
								<div class="form-group col-6 col-md-4">
									<label for="tel">Téléphone (<b style="color:red">*</b>)</label> <label style="color:red" id="telExi"></label>
									<?php if ($isNum){ ?>
									<input type="number" class="form-control" id="tel" name="tel" min="0" required="" value="<?php echo $numMail ?>" oninput="telExists()">
									<?php } else{ ?>
									<input type="number" class="form-control" id="tel" name="tel" min="0" required="" placeholder="Ex: 05475865" oninput="telExists()">
									<?php } ?>
								</div>
								<div class="form-group col-6 col-md-4">
									<label for="mail">Email</label> <label style="color:red" id="mailExi"></label>
									<?php if (!$isNum){ ?>
									<input type="email" class="form-control" id="mail" name="mail" maxlength="60" required="" value="<?php echo $numMail ?>" oninput="mailExists()">
									<?php } else{ ?>
									<input type="email" class="form-control" id="mail" name="mail" maxlength="60" required="" placeholder="Ex: exemple@gmail.com" oninput="mailExists()">
									<?php } ?>
								</div>
								<div class="form-group col-6 col-md-4">
									<label for="role">Type de compte (<b style="color:red">*</b>)</label>
									<select class="form-control" id="role" name="role" required="" onchange="roleChange()">
										<?php if ($role!='aucun'){ ?>
										<option value="<?php echo $role ?>" selected><?php echo $role ?></option>
										<?php } ?>
										<option value="demandeur">Demandeur d'emploi (cherche travail)</option>
										<option value="recruteur">Recruteur (cherche employé)</option>
									</select>
								</div>
								<div class="form-group col-12 col-md-4">
									<label for="mdp">Mot de passe (<b style="color:red">*</b>)</label><br>
									<label>Utiliser <i class="fa fa-hand-o-right"></i> <span id="autoMdp" style="background:lime; padding:2px; border-radius:5px;"><?php echo passwordGenerator(8); ?></span> <button type="button" onclick="useAutoPassword()" class="btnOrange btn btn-sm">oui</button> <button type="button" onclick="newAutoPassword()" class="btnOrange btn btn-sm">nouveau</button> | <button type="button" class="btnBlack" onclick="showMdp()" id="eyeContent"><span id="mdpEye" class="fa fa-eye"></span></button></label>
									<input type="password" class="form-control" id="mdp" name="mdp" required="" minlength="6">
								</div>
								<div class="form-group col-6 col-md-4" id="rechercheJob">
									<label for="chercheJob">A la recherche d'un job ? (<b style="color:red">*</b>)</label>
									<select class="form-control" id="chercheJob" name="chercheJob" required="">
										<option value="oui" selected>Oui</option>
										<option value="non">Non</option>
									</select>
								</div>
								<div class="from-group col-12">
									<input type="hidden" name="next" value="true">
									<button type="submit" class="btn btnBlack btn-lg">Suivant >></button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<?php
				//--------mail/tel exists already----------
				$mails=$db->prepare('SELECT cl_mail FROM clients');
				$mails->execute();
				$mails=$mails->fetchall();
				$allMails=array();
				for ($i=0; $i<sizeof($mails); $i++){
					//echo $mails[$i]['cl_mail'];
					array_push($allMails, $mails[$i]['cl_mail']);
				}
				//print_r($allMails);
				$tels=$db->prepare('SELECT cl_telephone FROM clients');
				$tels->execute();
				$tels=$tels->fetchall();
				$allTels=array();
				for ($i=0; $i<sizeof($tels); $i++){
					array_push($allTels, $tels[$i]['cl_telephone']);
				}
				//--------//mail/tel exists already----------
				?>
				<script>
					let form=document.getElementById('formInfos');
					
					//--------mail/tel exists already----------
					let allMails = <?php echo json_encode($allMails); ?>; //all mails exit into data base
					function mailExists(){
						if (allMails.includes(form.mail.value)){
							document.getElementById('mailExi').textContent="Cet email existe déjà";
						}
						else{
							document.getElementById('mailExi').textContent="";
						}
					}
					let allTels = <?php echo json_encode($allTels); ?>; //all phones exit into data base
					function telExists(){
						if (allTels.includes(form.tel.value)){
							document.getElementById('telExi').textContent="Ce téléphone existe déjà";
						}else{
							document.getElementById('telExi').textContent="";
						}
					}
					//--------//mail/tel exists already----------
					//------role---------
					function roleChange(){
						let elt=form.role.value;
						if (elt=="recruteur"){
							document.getElementById('rechercheJob').style.display="none";
							form.chercheJob.value="non";
							document.getElementById('formatEntrep').textContent="Entreprise";
						}else{
							document.getElementById('rechercheJob').style.display="block";
							form.chercheJob.value="oui";
							document.getElementById('formatEntrep').textContent="Formations";
						}
					}
					//------//role---------
					//------mdp generation-----
					function useAutoPassword(){
						document.getElementById('mdp').value=document.getElementById('autoMdp').textContent;
					}
					//------//mdp generation-----
					//------use mdp generator-----
					function newAutoPassword(){
						let mdp='<?php echo passwordGenerator(8); ?>';
						document.getElementById('autoMdp').textContent=mdp;
						document.getElementById('mdp').value=mdp;
					}
					//------//use mdp generator-----
					//----show/hide mdp-----
					function showMdp(){
						let eye=document.getElementById('eyeContent');
						let mdp=document.getElementById('mdp');
						if (mdp.type=='password'){
							mdp.type='text';
							eye.innerHTML='<span id="mdpEye" class="fa fa-eye-slash"></span>';
						}else{
							mdp.type='password';
							eye.innerHTML='<span id="mdpEye" class="fa fa-eye"></span>';
						}
					}
					//----//show/hide mdp-----
					//--------submit--------
					form.addEventListener('submit', function(e){
						let erreur=false;
						let regexNom=/[0-9]/;
						let regexTel=/[a-zA-Z]/;
						let regexEmail=/@.+\./;
						//----nom//---------
						if (regexNom.test(form.nom.value) || form.nom.value.length<3){
							erreur=true;
							showError('Format nom ivalide. Ne doit pas contenir de chiffre');
						}
						//----numéro//-------
						else if (regexTel.test(form.tel.value)){
							erreur=true;
							showError('Format téléphone invalide. Ne doit pas contenir de lettre');
						}
						else if (allTels.includes(form.tel.value)){
							erreur=true;
							showError('Ce téléphone existe déjà');
						}
						//----email//---------
						else if (form.mail.value.length>0){ //because email not obligatoire
							if (!regexEmail.test(form.mail.value)){
								erreur=true;
								showError('Format email invalide. Doit contenir @ et .');
							}
							else if (allMails.includes(form.mail.value)){
								erreur=true;
								showError('Cet email existe déjà');
							}
						}
						else{
							erreur=true;
						}
						if (erreur){
							e.preventDefault();
						}
					});
					//--------//submit--------
				</script>
				<?php
			break;
			case 'etape-2':
				//echo $_SESSION['signupBackLink'];
				if (isset($_POST['next'])){ //make sure previous step is completed
					
					//---keep step 1 infos dans sessions-------
					$nom=(isset($_POST['nom']))?(htmlspecialchars($_POST['nom'])):null;
					$tel=(isset($_POST['tel']))?(htmlspecialchars($_POST['tel'])):null;
					$mail=(isset($_POST['mail']))?(htmlspecialchars($_POST['mail'])):null;
					$role=(isset($_POST['role']))?(htmlspecialchars($_POST['role'])):null;
					$mdp=(isset($_POST['mdp']))?(htmlspecialchars($_POST['mdp'])):null;
					$chercheJob=(isset($_POST['chercheJob']))?(htmlspecialchars($_POST['chercheJob'])):'oui';
					$_SESSION['userNom'] = $nom;
					$_SESSION['userTel'] = $tel;
					$_SESSION['userMail'] = $mail;
					$_SESSION['userRole'] = $role;
					$_SESSION['userMdp'] = $mdp;
					$_SESSION['userChercheJob'] = $chercheJob;
					//echo $nom.' '.$tel.' '.$mail.' '.$role.' '.$mdp.' '.$chercheJob;
					//---//keep step 1 infos dans sessions-------
				?>
				<div class="container" style="margin-top:6vw; margin-bottom:6vw;">
					<div class="row">
						<div class="col-12">
							
							<div class="progress">
							  <div class="progress-bar bg-primary" role="progressbar" style="width:33.333%; font-size:15px;">
								<span class="fa fa-check-circle"> Informations</span>
							  </div>
							  <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width:33.333%; font-size:15px;; font-size:15px;">
								<span id="formatEntrep">Formations</span>
							  </div>
							  <div class="progress-bar bg-danger" role="progressbar" style="width:33.333%; font-size:15px;">
								Photos
							  </div>
							</div>
							
							<form class="row" method="post" action="sign-up.php?type=nouveau&option=etape-3" id="formFormations">
								<!--------user part//----------->
								<div class="form-group col-6" id="dipl">
									<label for="diplome">Avez-vous un diplôme ? (<b style="color:red">*</b>)</label>
									<select class="form-control" id="diplome" name="diplome" required="">
										<option value="avec_diplome">Oui</option>
										<option value="sans_diplome" selected>Non</option>
									</select>
								</div>
								<div class="form-group col-6" id="niv">
									<label for="niveau" id="niveau1" style="display:none">Niveau de formation (ou titre diplôme) (<b style="color:red">*</b>)</label>
									<label for="niveau" id="talent1">Que savez-vous faire ? (<b style="color:red">*</b>)</label>
									<input type="text" class="form-control" id="niveau" name="niveau" maxlength="50" required="" placeholder="Ex: permis de conduire, menuiserie, ménage ...">
								</div>
								<div class="form-group col-12" id="exp">
									<label for="experience">Vos expériences</label>
									<input type="text" class="form-control" id="experience" name="experience" maxlength="100" placeholder="Ex: Ancien couturier pendant 3 ans ...">
								</div>
								<div class="form-group col-12" id="descript">
									<label for="desc">Description (<b style="color:red">*</b>)(que diriez-vous à votre employeur ?)</label> :: <label id="remain">245 caractères restants</label>
									<textarea class="form-control" id="desc" maxlength="245" name="desc" required="" onkeyup="counter()" rows="5"></textarea>
								</div>
								<!--------company part//----------->
								<div class="form-group col-12" id="enN">
									<label for="enNom">Nom entreprise (<b style="color:red">*</b>)</label>
									<input type="text" class="form-control" id="enNom" name="enNom" minlength="2" maxlength="30" placeholder="Nom de votre entreprise/société">
								</div>
								<div class="form-group col-6" id="enP">
									<label for="enPays">Pays entreprise (<b style="color:red">*</b>)</label>
									<input type="text" class="form-control" id="enPays" name="enPays" minlength="3" maxlength="30" placeholder="Pays de votre entreprise/société">
								</div>
								<div class="form-group col-6" id="enV">
									<label for="enVille">Ville entreprise (<b style="color:red">*</b>)</label>
									<input type="text" class="form-control" id="enVille" name="enVille" minlength="3" maxlength="30" placeholder="Ville de votre entreprise/société">
								</div>
								<div class="form-group col-12" id="enD">
									<label for="enDesc">Description entreprise (<b style="color:red">*</b>)</label> :: <label id="remain2">245 caractères restants</label>
									<textarea class="form-control" id="enDesc" minlength="10" maxlength="245" name="enDesc" onkeyup="counter2()" rows="5"></textarea>
								</div>
								
								<div class="from-group col-12">
									<input type="hidden" name="next" value="true">
									<input type="hidden" name="typeCompte" value="">
									<button type="submit" class="btn btnBlack btn-lg">Suivant >></button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<script>
					//-----caractors remain counters----
					function counter(){ //for user desc
						let caracts=document.getElementById('desc').value.length;
						document.getElementById('remain').textContent=245-caracts+" caractères restants";
					}
					function counter2(){ //for company desc
						let caracts=document.getElementById('enDesc').value.length;
						document.getElementById('remain2').textContent=245-caracts+" caractères restants";
					}
					//-----//caractors remain counters----
					let form=document.getElementById('formFormations');
					form.diplome.addEventListener('change', function(){
						if (form.diplome.value=="avec_diplome"){
							document.getElementById('niveau1').style.display='block';
							document.getElementById('talent1').style.display='none';
							form.niveau.placeholder="Ex: BTS, Licence 1, Technicien en réseaux informatique ...";
							form.experience.placeholder="Ex: 3 ans d'expérience en ingénierie informatique ...";
						}else{
							document.getElementById('niveau1').style.display='none';
							document.getElementById('talent1').style.display='block';
							form.niveau.placeholder="Ex: permis de conduire, menuiserie, ménage ...";
							form.experience.placeholder="Ex: Ancien couturier pendant 3 ans ...";
						}
					});
					//-------if c'est un account recruteur ou pas----------
					let typeCompte='<?php echo $_SESSION['userRole']; ?>';
					//alert(typeCompte);
					if (typeCompte=='recruteur'){
						document.getElementById('formatEntrep').textContent="Entreprise";
						form.typeCompte.value="recruteur";
						//----------cacher user part//----------
						document.getElementById('dipl').style.display="none";
						form.diplome.value='avec_diplome';
						document.getElementById('niv').style.display="none";
						form.niveau.value='Compte entreprise';
						document.getElementById('exp').style.display="none";
						form.experience.value=null;
						document.getElementById('descript').style.display="none";
						form.desc.value='Compte entreprise';
						//----------afficher company part//----------
						document.getElementById('enN').style.display="block";
						document.getElementById('enP').style.display="block";
						document.getElementById('enV').style.display="block";
						document.getElementById('enD').style.display="block";
					}
					else if (typeCompte=='demandeur'){
						//document.getElementById('formatEntrep').textContent="Formations"; //already set to "Formations"
						form.typeCompte.value="demandeur";
						//----------afficher user part//----------
						//already displayed (pre-done)
						//----------cacher company part//----------
						document.getElementById('enN').style.display="none";
						form.enNom.value=null;
						document.getElementById('enP').style.display="none";
						form.enPays.value=null;
						document.getElementById('enV').style.display="none";
						form.enVille.value=null;
						document.getElementById('enD').style.display="none";
						form.enDesc.value=null;
					}
					//-------//if c'est un account recruteur ou pas----------
					//--------submit-----------
					form.addEventListener('submit', function(e){
						let erreur=false;
						if (form.diplome.value!="avec_diplome" && form.diplome.value!="sans_diplome"){
							erreur=true;
							showError('Avez-vous un diplôme oui ou non ?');
						}
						else if (form.niveau.value.length<5){
							erreur=true;
							showError('Que savez-vous faire ? Veuillez saisir quelque chose svp');
						}
						else if (form.desc.value.length<10){
							erreur=true;
							showError('Ecrivez votre description svp, c\'est très important pour vous');
						}
						if (erreur){
							e.preventDefault();
						}
					});
					//alert(form.desc.value.length);
					//--------//submit-----------
				</script>
				<?php
				}else{
					erreurWithImage('Mince, l\'étape précedente n\'a pas été terminée. Bgrrrr');
				}
			break;
			case 'etape-3':
				if (isset($_POST['next'])){ //make sure previous step is completed
					
					//-----on créé le compte car tout est ok-----------
					if ($_POST['typeCompte']=='demandeur'){
						$diplomeNom=(isset($_POST['diplome']))?(htmlspecialchars($_POST['diplome'])):'sans_diplome';
						$niveauPays=(isset($_POST['niveau']))?(htmlspecialchars($_POST['niveau'])):null;
						$expeVille=(isset($_POST['experience']))?(htmlspecialchars($_POST['experience'])):null;
						$descEn=(isset($_POST['desc']))?(htmlspecialchars($_POST['desc'])):'Aucune description';
						$descEn=nl2br($descEn);
					}else{ //recruteur
						$diplomeNom=(isset($_POST['enNom']))?(htmlspecialchars($_POST['enNom'])):'Entreprise';
						$niveauPays=(isset($_POST['enPays']))?(htmlspecialchars($_POST['enPays'])):null;
						$expeVille=(isset($_POST['enVille']))?(htmlspecialchars($_POST['enVille'])):null;
						$descEn=(isset($_POST['enDesc']))?(htmlspecialchars($_POST['enDesc'])):'Aucune description entreprise';
						$descEn=nl2br($descEn);
					}
					//echo $diplomeNom.' '.$niveauPays.' '.$expeVille.' '.$descEn;
					//echo $_SESSION['userRole'];
					$codeParrainage=time();
					$dataOk=false; //will let us savoir si le compte is created or not
					if ($_SESSION['userRole']=="demandeur"){
						//user account
						$mdp = password_hash($_SESSION['userMdp'], PASSWORD_DEFAULT);
						if ($_SESSION['userChercheJob']=='oui'){ //c'est a boolean
							$cJob=1;
						}else{
							$cJob=0;
						}
						
						$query=$db->prepare('INSERT INTO clients(cl_nom, cl_telephone, cl_mail, cl_mdp, cl_type, cl_cherche_job, cl_diplome, cl_niveau, cl_experience, cl_description, cl_parrain_code, cl_derniere_co, cl_date) VALUES(:nom, :tel, :mail, :mdp, :type, :cJob, :dipl, :niv, :expe, :desc, :parr, :derCo, :date)');
						$query->bindValue(':nom', $_SESSION['userNom'], PDO::PARAM_STR);
						$query->bindValue(':tel', $_SESSION['userTel'], PDO::PARAM_INT);
						$query->bindValue(':mail', $_SESSION['userMail'], PDO::PARAM_STR);
						$query->bindValue(':mdp', $mdp, PDO::PARAM_STR);
						$query->bindValue(':type', $_SESSION['userRole'], PDO::PARAM_STR);
						$query->bindValue(':cJob', $cJob, PDO::PARAM_INT);
						$query->bindValue(':dipl', $diplomeNom, PDO::PARAM_STR);
						$query->bindValue(':niv', $niveauPays, PDO::PARAM_STR);
						$query->bindValue(':expe', $expeVille, PDO::PARAM_STR);
						$query->bindValue(':desc', $descEn, PDO::PARAM_STR);
						$query->bindValue(':parr', $codeParrainage, PDO::PARAM_INT);
						$query->bindValue(':derCo', date('Y').'-'.date('m').'-'.date('d'), PDO::PARAM_STR);
						$query->bindValue(':date', date('Y').'-'.date('m').'-'.date('d'), PDO::PARAM_STR);
						$query->execute();
						//-----verify if data truly saved into db//---------
						$count = $query->rowCount();
						if ($count==0){ //datas not inserted
							erreur("Erreur inconnue, nous sommes navrés <span class='fa fa-frown'></span> Impossible d'enregistrer vos informations de compte.<br><a href='sign-up.php'><button class='btn btnOrange'>Réprendre</button></a>");
						}else{
  							$cl_id = $db->lastInsertId();
							//echo $cl_id;
							$_SESSION['cl_id']=$cl_id;
							$_SESSION['cl_nom']=$_SESSION['userNom'];
							$_SESSION['enCours']='oui';
							$dataOk=true;
						}
					}else{
						//company account
						$mdp = password_hash($_SESSION['userMdp'], PASSWORD_DEFAULT);
						//------stockage infos client//---------
						$query=$db->prepare('INSERT INTO clients(cl_nom, cl_telephone, cl_mail, cl_mdp, cl_type, cl_cherche_job, cl_diplome, cl_parrain_code, cl_derniere_co, cl_date) VALUES(:nom, :tel, :mail, :mdp, :type, :cJob, :dipl, :parr, :derCo, :date)');
						$query->bindValue(':nom', $_SESSION['userNom'], PDO::PARAM_STR);
						$query->bindValue(':tel', $_SESSION['userTel'], PDO::PARAM_INT);
						$query->bindValue(':mail', $_SESSION['userMail'], PDO::PARAM_STR);
						$query->bindValue(':mdp', $mdp, PDO::PARAM_STR);
						$query->bindValue(':type', $_SESSION['userRole'], PDO::PARAM_STR);
						$query->bindValue(':cJob', 0, PDO::PARAM_INT);
						$query->bindValue(':dipl', 'sans_diplome', PDO::PARAM_STR);
						$query->bindValue(':parr', $codeParrainage, PDO::PARAM_INT);
						$query->bindValue(':derCo', date('Y').'-'.date('m').'-'.date('d'), PDO::PARAM_STR);
						$query->bindValue(':date', date('Y').'-'.date('m').'-'.date('d'), PDO::PARAM_STR);
						$query->execute();
						
						//-----verify(1/2) if data truly saved into db//---------
						$count = $query->rowCount();
						if ($count==0){ //datas not inserted
							erreur("Erreur inconnue, nous sommes navrés <span class='fa fa-frown'></span> Impossible d'enregistrer vos informations de compte.<br><a href='sign-up.php'><button class='btn btnOrange'>Réprendre</button></a>");
						}else{
  							$cl_id = $db->lastInsertId();
							//echo $cl_id;
							$_SESSION['cl_id']=$cl_id;
							$_SESSION['cl_nom']=$_SESSION['userNom'];
							$_SESSION['enCours']='oui';
							
							//---------stockage infos entreprise//-----------
							$query2=$db->prepare('INSERT INTO entreprises(cl_id, en_nom, en_description, en_pays, en_ville, en_date) VALUES(:cl, :nom, :desc, :pys, :vil, :date)');
							$query2->bindValue(':cl', $cl_id, PDO::PARAM_INT);
							$query2->bindValue(':nom', $diplomeNom, PDO::PARAM_STR);
							$query2->bindValue(':desc', $descEn, PDO::PARAM_STR);
							$query2->bindValue(':pys', $niveauPays, PDO::PARAM_STR);
							$query2->bindValue(':vil', $expeVille, PDO::PARAM_STR);
							$query2->bindValue(':date', date('Y').'-'.date('m').'-'.date('d'), PDO::PARAM_STR);
							$query2->execute();
							
							//-----verify(2/2) if data truly saved into db//---------
							$count = $query2->rowCount();
							if ($count==0){ //datas not inserted
								erreur("Erreur inconnue, nous sommes navrés <span class='fa fa-frown'></span> Impossible d'enregistrer vos informations de compte.<br><a href='sign-up.php'><button class='btn btnOrange'>Réprendre</button></a>");
							}else{
								$dataOk=true;
							}
						}
					}
					//-----//on créé le compte car tout est ok-----------
				?>
				<div class="container" style="margin-top:6vw; margin-bottom:6vw;">
					<div class="row">
						<div class="col-12">
							
							<div class="progress">
							  <div class="progress-bar bg-primary" role="progressbar" style="width:33.333%; font-size:15px;">
								<span class="fa fa-check-circle"> Informations</span>
							  </div>
							  <div class="progress-bar bg-success" role="progressbar" style="width:33.333%; font-size:15px;; font-size:15px;">
								<?php if ($_SESSION['userRole']=='demandeur'){ ?><span class="fa fa-check-circle"> Formations</span>
								<?php } else{ ?><span class="fa fa-check-circle"> Entreprise</span><?php } ?>
							  </div>
							  <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="width:33.333%; font-size:15px;">
								Photos
							  </div>
							</div>
							<?php
							if ($dataOk){ //compte créé avec succès
								?><div class="alert alert-success">Compte créé avec succès ! <span class="fas fa-grin-wink"></span> Et si on personnalisait tout ça ensemble ?</div><?php
								?>
								<form method="post" action="sign-up.php?type=nouveau&option=fin">
									<input type="hidden" name="next" value="true">
									<button type="submit" class="btn btnOrange">Ignorer cette étape</button>
								</form>
								<hr>

								<div class="col-12">
									<label for="photo"><span class="fa fa-user"></span> Photo de profile</label>
									<?php include('assets/includes/croppie.html'); ?>
									<hr>
								</div>
								<div class="col-12">
									<?php if ($_SESSION['userRole']=="recruteur"){
										?>
										<label for="entP"><span class="fa fa-file"></span> Photo entreprise</label><br>
										<a href="compte.php?type=edit-ent-photo"><button class="btn btnBlack">Ajouter</button></a><br>
										<hr>
										<?php
									} ?>
								</div>
								<div class="col-12">
									<label for="cv"><span class="fa fa-file"></span> Ajouter un CV</label><br>
									<a href="compte.php?type=edit-cv"><button class="btn btnBlack">Ajouter</button></a><br>
									<hr>
								</div>
								<?php
							}
							else{
								erreurWithImage("Une erreur est subvenue, nous en sommes navrés. <a href='sign-up.php'><button class='btn btnOrange btn-sm'>Réprendre</button>");
							}
							?>
						</div>
					</div>
				</div>
				<?php
				}else{
					erreurWithImage('Mince, l\'étape précedente n\'a pas été terminée. Bgrrrr');
				}
			break;
			case 'fin':
				if (isset($_POST['next'])){ //make sure previous step is completed
//				$_SESSION['newAccount']='true'; //permet d'afficher alert "compte créé"
				//-------si le new client vient grâce a un code de parrainage---------
				if (isset($_SESSION['parrCode'])){
					$parrain=$db->prepare('UPDATE clients SET cl_parrain_points=cl_parrain_points+1 WHERE cl_parrain_code=:parr');
					$parrain->bindValue(':parr', $_SESSION['parrCode'], PDO::PARAM_INT);
					$parrain->execute();
					$parrain->closeCursor();
					showSuccess('Celui qui vous a invité vient de gagner un point premium');
				}
				//-------//si le new client vient grâce a un code de parrainage---------
				?>
				<div class="container" style="margin-top:6vw; margin-bottom:6vw;">
					<div class="row">
						<div class="col-12">
							
							<div class="progress">
							  <div class="progress-bar bg-primary" role="progressbar" style="width:33.333%; font-size:15px;">
								<span class="fa fa-check-circle"> Informations</span>
							  </div>
							  <div class="progress-bar bg-success" role="progressbar" style="width:33.333%; font-size:15px;; font-size:15px;">
								<?php if ($_SESSION['userRole']=='demandeur'){ ?><span class="fa fa-check-circle"> Formations</span>
								<?php } else{ ?><span class="fa fa-check-circle"> Entreprise</span><?php } ?>
							  </div>
							  <div class="progress-bar bg-danger" role="progressbar" style="width:33.333%; font-size:15px;">
								<span class="fa fa-check-circle"> Photos</span>
							  </div>
							</div>
							
							<div class="alert alert-success">
								<center>
								<h3>Yehhh <span class="fas fa-grin-alt"></span></h3>
								<p>Compte créé avec succès, merci de patenter <b id="sec"></b> sec svp.</p>
								</center>
							</div>
							<script>
								let tps=5;
								let x=setInterval(function(){
									document.getElementById('sec').textContent=tps;
									if (tps<=0){
										let link="<?php echo $_SESSION['signupBackLink'] ?>";
										//alert(link);
										window.location.href=link;
										clearInterval(x);
									}
									tps--;
								}, 1000);
							</script>
						</div>
					</div>
				</div>
				<?php
				}else{
					erreurWithImage('Mince, l\'étape précedente n\'a pas été terminée. Bgrrrr');
				}
			break;
			default:
				notFound("Aiiiih, où est-elle ???");
			break;
		}
	break;
	case 'connexion': //connexion
		//session_destroy();
		if (!isset($_GET['connecting'])){
			$_SESSION['enCours']='true';
			//------keep d'où we come link. We will get back there après création du compte--------
			if (isset($_SERVER['HTTP_REFERER'])){ //on come frome une autre page du site
				$_SESSION['connectBackLink'] = $_SERVER['HTTP_REFERER'];
			}else{
				$_SESSION['connectBackLink'] = "index.php";
			}
			//------//keep d'où we come link. We will get back there après création du compte--------

			if ($cl_id>0){
				$a=$_SESSION['connectBackLink'];
				if (strpos($a, '?')){
					$a = $a.'&isConnected=true';
				}else{
					$a = $a.'?isConnected=true';
				}
				?><script>window.location.href="<?php echo $a ?>";</script><?php
			}else{
				$numMail=(isset($_POST['numMail']))?(htmlspecialchars($_POST['numMail'])):'';
				$mdp=(isset($_POST['mdp']))?(htmlspecialchars($_POST['mdp'])):'';
				$numMail=strip_tags($numMail);
				$mdp=strip_tags($mdp);
				$connect=$db->prepare('SELECT COUNT(*) FROM clients WHERE cl_mail=:m OR cl_telephone=:t');
				$connect->bindValue(':m', $numMail, PDO::PARAM_STR);
				$connect->bindValue(':t', $numMail, PDO::PARAM_INT);
				$connect->execute();
				$connect=$connect->fetchcolumn();
				if ($connect<=0){ //mail/tel no
					$a=$_SESSION['connectBackLink'];
					if (strpos($a, '?')){
						$a = $a.'&connectNotTM=true';
					}else{
						$a = $a.'?connectNotTM=true';
					}
					?><script>window.location.href="<?php echo $a ?>";</script><?php
				}else{ //mail ok
					$connect=$db->prepare('SELECT cl_id, cl_nom, cl_mdp FROM clients WHERE cl_mail=:m OR cl_telephone=:t');
					$connect->bindValue(':m', $numMail, PDO::PARAM_STR);
					$connect->bindValue(':t', $numMail, PDO::PARAM_INT);
					$connect->execute();
					$connect=$connect->fetch();
					if (!password_verify($mdp, $connect['cl_mdp'])){ //mail/tel ok but password no
						$a=$_SESSION['connectBackLink'];
						if (strpos($a, '?')){
							$a = $a.'&mdpError=true';
						}else{
							$a = $a.'?mdpError=true';
						}
						?><script>window.location.href="<?php echo $a ?>";</script><?php
					}else{ //all ok
						$_SESSION['cl_nom']=$connect['cl_nom'];
						$_SESSION['cl_id']=$connect['cl_id'];
						
						$newConnect=$db->prepare('UPDATE clients SET cl_derniere_co=:d WHERE cl_id=:cl');
						$newConnect->bindValue(':cl', $connect['cl_id'], PDO::PARAM_INT);
						$newConnect->bindValue(':d', date('Y').'-'.date('m').'-'.date('d'), PDO::PARAM_INT);
						$newConnect->execute();
						$newConnect->closeCursor();
							
						//echo $_SESSION['connectBackLink'];
						//this code is created by Josué - jose.init.dev@gmail.com
						?><script>window.location.href="sign-up.php?type=connexion&connecting=true";</script><?php
					}
				}
			}
		}else{ //saving and reading cookies to detect user connexion
			//echo $_SESSION['connectBackLink'];
			$a=$_SESSION['connectBackLink'];
			if (strpos($a, '?')){
				$a = $a.'&connected=true';
			}else{
				$a = $a.'?connected=true';
			}
			?><script>window.location.href="<?php echo $a ?>";</script><?php
		}
	break;
	case 'recuperation': //mdp oublé
		?>
		<div class="container" style="margin-top:6vw; margin-bottom:6vw;">
			<div class="row">
				<div class="col-12">
					<center><h1>Récuperer mon <span style="color:darkorange">mot de passe</span></h1></center>
					<hr>
				</div>
				<?php
				if (isset($_GET['form'])){
					if (!isset($_GET['mailLink'])){
						//mailLink : pour recuperer son mot de passe, un lien est envoyé par mail, quand le client clique dessus, un nouveau mot de passe est fournie et l'ancien remplacé.
						?>
						<div class="col-12">
							<?php
							$numMail=(isset($_POST['numMail']))?(htmlspecialchars($_POST['numMail'])):'';
							$numMail=strip_tags($numMail);
							$query=$db->prepare('SELECT COUNT(*) FROM clients WHERE cl_mail=:m');
							$query->bindValue(':m', $numMail, PDO::PARAM_STR);
							$query->execute();
							$nbr=$query->fetchcolumn();
							if ($nbr<=0){
								erreurWithImage('Désolé, cette adresse mail ou téléphone n\'existe pas.');
							}else{
								$query=$db->prepare('SELECT cl_id FROM clients WHERE cl_mail=:m');
								$query->bindValue(':m', $numMail, PDO::PARAM_STR);
								$query->execute();
								$clid=$query->fetch();
								
								$sujet="Récuperer mot de passe :: ".$nom_site;
								$to=$numMail;
								$corp="Bonjour cher client(e),

Vous avez fait une dédmande de récuperation de votre mot de passe. Si cette demande ne vient pas de vous, veuillez ignorer ce mail.

Pour récuperer votre mot de passe, veuillez cliquer sur le lien suivant : https://".$domaine."?sign-up.php?type=recuperation&form=true&mailLink=true&none=".$clid['cl_id']."&value=fjd45

Cordialement,
A bientôt sur ".$nom_site."
Equipe support client";
								$to=$numMail;
								//echo $corp;
								//--envoie du mail//--
								$mess = sendSupportMail($sujet, $corp, $to);
								?>
								<div class="alert alert-success">
									<center><p>Oppération réussie, un email vous a été envoyé. Veuillez le consulter, puis cliquez sur le lien pour récuperer votre mot de passe.</p><a href="jobs.php">Terminer</a></center>
								</div>
								<?php
							}
							?>
						</div>
						<?php
					}
					else{ //mailLink exists
						$clid = (int) (isset($_GET['none']))?(htmlspecialchars($_GET['none'])):'';
						$newPwd=substr($nom_site, 0, 3).substr(strtolower(time()), 7, 4);
						$newPwdHashed = password_hash($newPwd, PASSWORD_DEFAULT);
						//echo $newPwd;
						$query=$db->prepare('UPDATE clients SET cl_mdp=:mdp WHERE cl_id=:id');
						$query->bindValue(':id', $clid, PDO::PARAM_INT);
						$query->bindValue(':mdp', $newPwdHashed, PDO::PARAM_STR);
						$query->execute();
						
						$count = $query->rowCount();
						if ($count==0){ //data not inserted
							erreur("Erreur inconnue, nous sommes navrés <span class='fa fa-frown'></span> Impossible de modifier votre mot de passe.<br><a href='sign-up.php?type=recuperation'><button class='btn btnOrange'>Réprendre</button></a>");
						}else{
							?>
							<div class="alert alert-success">
								<center>
									<p>Oppération réussie, Votre mot de passe a été modifiée avec succès !</p>
									<hr>
									<p><b>Nouveau mot de passe</b> : <em><?php echo $newPwd ?></em></p>
								</center>
							</div>
							<?php
						}
					}
				}
				else{ ?>
					<div class="col-1 col-md-3">
						<p></p>
					</div>
					<div class="col-10 col-md-6" style="padding: 25px;">
						<div style="border: 1px solid rgba(0,0,0,0.08); border-radius: 25px; padding: 25px; text-align: center;">
							<form method="post" action="sign-up.php?type=recuperation&form=true">
								<div class="form-group">
									<label for="mail">Entrez votre adresse mail</label>
									<input type="email" class="form-control" id="mail" name="numMail" placeholder="Email ici" required="">
								</div>
								<div class="form-group">
									<button type="submit" class="btn btnBlack btn-block">Récuperer</button>
								</div>
							</form>
						</div>
					</div>
					<div class="col-1 col-md-3">
						<p></p>
					</div>
					<?php
				} ?>
			</div>
		</div>
		<?php
	break;
	default:
		notFound("Pouffff, quelle galère ......");
	break;
}
} //end else
?>

<?php include('footer.php'); ?>