<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require './PHPMailer/src/Exception.php';
    require './PHPMailer/src/PHPMailer.php';
    require './PHPMailer/src/SMTP.php';

    
      if(isset($_POST['envoyer'])){
           if(isset($_POST['name']) and isset($_POST['email']) and isset($_POST['subject']) and isset($_POST['comments'])) {
               if (!empty($_POST['name']) and !empty($_POST['email']) and !empty($_POST['subject']) and !empty($_POST['comments'])) {
                    $name = htmlspecialchars($_POST['name']); 
                   $email = htmlspecialchars($_POST['email']); 
                    $subject = htmlspecialchars($_POST['subject']); 
                    $comments = htmlspecialchars($_POST['comments']); 

                     $body = ""; 

                    $body .= " De :".$name."\n\n"; 
                   $body .= " Email :" .$email."\n\n"; 
                    $body .= " Sujet :" .$subject."\n\n"; 
                   $body .= " Message :" .$comments."\n\n"; 
                    $body .= "Bon à Savoir : Le temps de traitement de la requete est de 48H"; 
                    
                    $servername = "localhost"; 
                    $database = "u941694762_nehemie_db"; 
                   $username = "u941694762_nehemie_user"; 
                    $password = "P@stopasto2023"; 

                    $conn = mysqli_connect($servername, $username, $password, $database); 
                   $sql = "INSERT INTO `papi` (`name`,`email`,`subject`,`comments`) VALUES ('$name','$email','$subject','$comments')"; 

                     $mail = new PHPMailer(true);
                      $mail->isSMTP();
                     $mail->Host = 'smtp.gmail.com';
                      $mail->SMTPAuth = true; 
                     $mail->Username = 'contact@associationsurvivors.org';
                     $mail->Password = "whqhgrpnlbnzlzed"; 
                    $mail->Port = 465; 
                   $mail->SMTPSecure = 'ssl';
                     $mail->isHTML(true);
                    $mail->setFrom($email, $name);
                      $mail->addAddress('contact@associationsurvivors.org');
                      $mail->addCC('contact@associationsurvivors.org');
                      $mail->addCC('pasto@associationsurvivors.org');
                      $mail->Subject = ("$email($subject)");
                      $mail->Body = $body;
                     if (!$mail->send()) {
                      $msg = 'Désolé, quelque chose a mal tourné. Veuillez réessayer plus tard.';
                   } else {
                     $msg = 'Message envoyé ! Prière de patienter 48H.';
               }
             


                //   insert into database 
                    if (mysqli_query($conn, $sql)) {
                         echo "New record created successfully";
                    } else {
                         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }

                header("Location: ./response.php");
                    
            mysqli_close($conn);
                  exit();

            //   ================ Storing data inside a database

              }
           }
}

?>


<!DOCTYPE html>
<html lang="en">
	
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Survivors Network</title>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.css">
		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&amp;subset=devanagari,latin-ext" rel="stylesheet">
		<link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="fonts/IcoMoon/icomoon.css">
		<link rel="stylesheet" href="fonts/linearicon/style.css">
		<!-- Mobile Menu -->
		<link type="text/css" rel="stylesheet" href="css/jquery.mmenu.all.css" />
		<!-- OWL CAROUSEL
			================================================== --> 
		<link rel="stylesheet" href="css/owl.carousel.css">
		<!-- SELECTBOX
			================================================== -->
		<link rel="stylesheet" type="text/css" href="css/fancySelect.css" media="screen" />
		<!-- Main Style -->
		<link rel="stylesheet" href="style.css">
		<!-- color scheme -->
	  	<link rel="stylesheet" href="switcher/demo.css" type="text/css">
	  	<link rel="stylesheet" href="switcher/colors/index.html" type="text/css" id="colors">
		
		<!-- Favicons
			================================================== -->
	</head>
	<body class="royal_loader">
		<!-- royal_loader -->
		<div id="page">
			<!-- Mobile Menu -->
			<nav id="menu">
				<ul>
					<li class="active">
						<a href="index.html">Accueil</a>
					</li>
					<li><a href="company_history.html">Association</a>
							<ul class="navi-level-2">

								<li>
									<a href="company_history.html" ><span>Contexte</span></a>
								</li>
								<li>
									<a href="about.html" ><span>Qui sommes-nous ?</span></a>
								</li>
								<li>
									<a href="company_history.html" ><span>Vision</span></a>
								</li>
								<li>
									<a href="company_history.html" ><span>Objectifs</span></a>
								</li>
							</ul>
					</li>
					<li>
						<a href="Incubateurs.html">Incubateurs </a>
					</li>
					<li>
						<a href="cases.html">Gallerie</a>
						 
					</li>
					<li>
						<a href="news.html">Blogs</a>
						
					</li>
					<li>
						<a href="#">Pages</a>
						<ul class="navi-level-2">
						    <li ><a  href="team.html">Notre Equipe</a></li>
							<li ><a  href="testimonials.html">Temoignage</a></li>
						    <li ><a  href="partners.html">Partenaires</a></li>
						</ul>
					</li>
					<li><a href="contact.php">Contact</a></li>
				</ul>
			</nav>
			<!-- /Mobile Menu -->
				<header class="header-h2">
				<div class="topbar tb-dark tb-md">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="topbar-home2">
								<div class="tb-contact tb-iconbox">
									<ul>
										<li><a href="contact.php"><i class="fa fa-map-marker" aria-hidden="true"></i> YAOUNDE, REGION DU CENTRE, CMR</a></li>
										<li><a href="mailto:contact@associationr"><i class="fa fa-envelope" aria-hidden="true"></i> contact@associationsurvivors.org</a></li>
										<li><a href="tel:00237691386635"><i class="fa fa-phone" aria-hidden="true"></i> 00237 691386635 / 677136479</a></li>
									</ul>
								</div>
								<div class="tb-social-lan language">
									<select class="lang">
										<option data-class="usa">Anglais</option>
										<option data-class="italy">Italien</option>
										<option data-class="fr">Francais</option>
										<option data-class="gm">Allemand</option>
									</select>
									<ul>
										<li><a href="#" data-toggle="tooltip" data-placement="bottom" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
										<li><a href="#" data-toggle="tooltip" data-placement="bottom" title="whatsapp"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
										
									</ul>
								</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /topbar -->
				<div class="nav-warp nav-warp-h2">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="navi-warp-home-2">
								<nav>
									<ul class="navi-level-1 active-subcolor">
										<li class="active">
											<a href="index.html">Accueil</a>
										</li>
										<li><a href="company_history.html">Association</a>
											<ul class="navi-level-2">

												<li><a href="company_history.html" ><span>contexte</span></a>
													 
												</li>
												<li><a href="about.html" ><span>Qui sommes-nous ?</span></a>
												</li>
											</ul>
										</li>
										<li>
											<a href="Incubateurs.html">Incubateurs </a>
										</li>
										<li>
											<a href="cases.html">Gallerie</a>
										</li>
										<li>
											<a href="news.html">Blog</a>
										</li>
										
										<li><a href="contact.php">Contact</a></li>
									</ul>
								</nav>
								
								<a href="#menu" class="btn-menu-mobile"><i class="fa fa-bars" aria-hidden="true"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>
			<!-- /End Header 1 Warp -->
			
			<section class="no-padding sh-contact">
				<div class="sub-header ">
					<span>NOUS REJOINDRE</span>
					<h3>REMPLIR LE FORMULAIRE</h3>
				     <?php
                    //    echo '<script type="text/javascript">
                     //          window.onload = function () { alert("Welcome"); } 
                     //   </script>'; 
                   ?> 
					<ol class="breadcrumb">
 						<li>
 							<a href="#"><i class="fa fa-home"></i> ACCUEIL </a>
 						</li>
 						
 						<li class="active">CONTACTEZ NOUS</li>
 					</ol>
				</div>
			</section>
			<!-- /subheader -->
			
			<section>
				<div class="container">
					<div class="row">
						<div class="col-md-4">
							<div class="iconbox-inline">
								<span class="icon icon-location2"></span>
								<h4>Siège Social</h4>
								<p>
									YAOUNDE, REGION DU CENTRE, CMR
								</p>
							</div>
						</div>
						<div class="col-md-4">
							<div class="iconbox-inline">
								<span class="icon icon-phone"></span>
								<h4>Numéro de Téléphone</h4>
								<p>00237 691-386-635</p>
								<p>00237 677-136-479</p>
							</div>
						</div>
						<div class="col-md-4">
							<div class="iconbox-inline">
								<span class="icon icon-envelop"></span>
								<h4>Adresse Email</h4>
								<p>contact@associationsurvivors.org</p>
							</div>
						</div>
					</div>
				</div>
			</section>
			
			<section>
				<div class="container">	
					<div class="row">
						<div class="col-md-12">
							<div class="title-block title-contact">
								<h3>Envoyez un message</h3>
								<span class="bottom-title"></span>
							</div>
						</div>
						<div class="form-contact-warp">
							<form method="post">
								<div class="col-md-4">
									<input type="text" class="form-control" id="name" name="name" placeholder="Nom Complet : Mbende albert" required autocomplete="off">
								</div>
								<div class="col-md-4">
									<input type="email" class="form-control" id="email" name="email" placeholder="Mail : mail@exemple.com" required autocomplete="off">
								</div>
<!--								<div class="col-md-4">-->
<!--									<input type="number" class="form-control" id="phone" name="phone" placeholder="Tél:00237 694 291 173" required autocomplete="off">-->
<!--								</div>-->

								<div class="col-md-4">
									<input type="text" class="form-control" id="subject" name="subject" placeholder="Sujet : Demande inscription" required autocomplete="off">
								</div>
								<div class="col-md-12">
									<label><input type="checkbox" required> Lu et accepté les conditions d'utilisations <a href="#" title="Contrat d'adhésion">Cliquez pour lire <strong>le contrat</strong></a></label>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<textarea name="comments" id="comments" class="form-control" rows="5" placeholder="Commentaire" required autocomplete="off"></textarea>
									</div>
								</div>
								<div class="col-md-12">
									<button type="submit" class="btn-main-color" name="envoyer"><i class="fa fa-paper-plane" aria-hidden="true"></i>  Envoyez </button>
								</div>
								
							</form>
						</div>
					</div>
				</div>
			</section>
			<!-- /Form Contact -->

			<section class="bg-subcr-1">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="subcribe-warp">
								<p class="sub-text-subcri">Contactez-nous</p>
								<form class="form-inline form-subcri">
								  <div class="form-group">
								    <label for="exampleInputName2"><small>Nos <span> informations</span> utiles</small></label>
								    <input type="text" class="form-control" id="exampleInputName2" placeholder="L'AVENTURE COMMENCE ICI">
								  </div>
								  <button type="submit" class="btn-subcrib"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- /Subcribe -->

			<!-- Footer -->
			<footer class="f-bg-dark">
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-sm-6">
							<div class="widget widget-footer widget-footer-text">
								<div class="title-block title-on-dark title-xs">
									<h4>Au Sujet de Survivors</h4>
									<span class="bottom-title"></span>
								</div>
								<p>
									Nous vivons dans un environnement où de plus
									en plus de jeunes sont sans issues par rapport à leurs avenir.
								</p>
								<ul class="widget widget-footer widget-footer-social-1">
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
								
								</ul>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="widget widget-footer widget-footer-icon-link">
								<div class="title-block title-on-dark title-xs">
									<h4>Siège Social</h4>
									<span class="bottom-title"></span>
								</div>

								<ul class="icon-link-list-icon">
									<li><i class="fa fa-map-marker" aria-hidden="true"></i>YAOUNDE, REGION DU CENTRE, CMR</li>
									<li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:contact@associationsurvivors.org">contact@associationsurvivors.org</a></li>
									<li><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:00237691386635"> 00237- 691386635 </a></li>
									<li><i class="fa fa-mobile" aria-hidden="true"></i><a href="tel:00237677136479">00237- 677136479 </a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="widget widget-footer widget-footer-list-link">
								<div class="title-block title-on-dark title-xs">
									<h4>Liens utiles de l'association</h4>
									<span class="bottom-title"></span>
								</div>
								<ul>
									<li><a href="company_history.html">Notre Histoire</a></li>
									<li><a href="partners.html">Partenaires</a></li>
									<li><a href="team.html">Notre Equipe</a></li>
									<li><a href="testimonials.html">Temoignages</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="widget widget-footer widget-footer-img">
								<div class="title-block title-on-dark title-xs">
									<h4>Nos Branches</h4>
									<span class="bottom-title"></span>
								</div>
								<img src="images/Footer/footer-map.png" class="img-responsive" alt="Image">
							</div>
						</div>
					</div>
				</div>
			</footer>	
			<!-- /Footer -->

			<section class="no-padding cr-h1">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="copyright-warp cr-1">
								<div class="copyright-list-link">
									<ul>
										<li><a href="index.html">Accueil</a></li>
										<li><a href="about.html">Qui sommes-nous ?</a></li>
										<li><a href="Incubateurs.html">Nos Incubateurs </a></li>
										<li><a href="team.html">Nos Conseillers</a></li>
										<li><a href="contact.php">Contact</a></li>
									</ul>
								</div>
								<div class="copyright-text">
									<p>© 2023 Survivors Network - Design par <span>ATN</span></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- /copyright -->
		</div>
		<!-- /page -->
		<a id="to-the-top" class="fixbtt bg-hover-theme"><i class="fa fa-chevron-up"></i></a> 
		<!-- Back To Top -->
		<!-- SCRIPT -->
		<script src="js/vendor/jquery.min.js"></script>
		<script src="js/vendor/bootstrap.js"></script>
		
		<!-- Mobile Menu
			================================================== -->
		<script type="text/javascript" src="js/plugins/jquery.mmenu.all.min.js"></script>
		<script type="text/javascript" src="js/plugins/mobilemenu.js"></script>
		
		<!-- Initializing Owl Carousel
			================================================== -->
		<script src="js/plugins/owl.carousel.js"></script>
		<script src="js/plugins/owl.js"></script>
		<!-- PreLoad
			================================================== --> 
		<script type="text/javascript" src="js/plugins/royal_preloader.js"></script>
		<!-- Parallax -->
		<script src="js/plugins/jquery.parallax-1.1.3.js"></script>
		<!-- <script src="js/plugins/parallax.js"></script> -->
		<!-- Fancy Select -->
		<script src="js/plugins/fancySelect.js"></script>
		<script src="js/plugins/lang-select.js"></script>
		<!-- Initializing Counter Up
			================================================== -->
		<script src="js/plugins/jquery.counterup.min.js"></script>
		<script src="js/plugins/counterup.js"></script>
	  	<script src='../../maps.googleapis.com/maps/api/js555e?key=&amp;sensor=false&amp;extension=.js'></script>  
	    <script src="js/plugins/contact.js"></script> 
		<!-- Global Js
			================================================== --> 
		<script src="js/plugins/template.js"></script>	
		<!-- Demo Switcher
	    ================================================== -->
	    <script src="switcher/demo.js"></script>
		
	</body>

</html>

