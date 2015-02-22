<!DOCTYPE HTML>

<html lang="fr">
  <head>
    <title>Merci</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.dropotron.min.js"></script>
    <script src="js/jquery.scrollgress.min.js"></script>
    <script src="js/jquery.scrolly.min.js"></script>
    <script src="js/jquery.slidertron.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script>
    <noscript>
      <link rel="stylesheet" href="css/skel.css" />
      <link rel="stylesheet" href="css/style.css" />
      <link rel="stylesheet" href="css/style-xlarge.css" />
    </noscript>
    <!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
  </head>
  <body class="landing">

    <!-- Header -->
    <header id="header" class="alt skel-layers-fixed">
      <h1><a href="index.php">Open de bloc 2015<span> Grenoble </span></a></h1>
      <nav id="nav">
	<ul>
	  <li><a href="#one">Présentation</a></li>
	  <li><a href="program.html">Programme et Règlement</a></li>
	  <li><a href="registration.php">Inscription</a></li>
	  <li><a href="results.html">Résultats</a></li>
	  <li><a href="benevoles.html">Bénévoles</a></li>
	  <li><a href="media.html">Media</a></li>
	  <li><a href="contact.html">Contact</a></li>
	</ul>
      </nav>
    </header>

    <section id="main" class="wrapper style1">


      <div class="container">

	<!-- Content -->
	<section id="content">

	  <p>
	    L'inscription du participant <b><?php echo $firstname ?> <?php echo $lastname ?></b>
	    a été réalisée avec succès.
	  </p>

	  <p>
	    Une confirmation du paiement vous a été envoyée par email à l'adresse <b><?php echo $mail ?></b>.
	  </p>

	  <p>
	    Nous vous donnons rendez-vous le <b>dimanche 7 juin</b> à <a href="access.html">Espace Vertical 3</a>.
	    N'oubliez pas de vous munir :
	    <ul>
	      <li>D'une pièce d'identité valide</li>
	      <li>De l'autorisation parentale écrite</li>
	      </ul>
	  </p>

	  <p>
	    <a href="index.php" class="button big">Retourner au site</a>
	  </p>

	</section>
      </div>
    </section>


  </body>
</html>
