<?php

require 'globals.php';
require 'paypal.php';
require 'error.php';

// Set error handler
set_error_handler("handleError");

// Ensures anything dumped out will be caught
ob_start(); 

$product = array("name" => "Frais d'inscription",
		 "price"=> $GLOBALS['registration-fee'],
		 "count"=> 1);

$port = 0;
$totalttc = $product['price'];

$paypal = new Paypal();
$response = $paypal->request('GetExpressCheckoutDetails', 
			     array('TOKEN' => $_GET['token']));

if ($response)
  {
    if($response['CHECKOUTSTATUS'] == 'PaymentActionCompleted')
      {
	trigger_error("Ce paiement a déjà été validé. Vous n'avez pas été débité à nouveau.");
      }
  }
else
  {
    trigger_error("Erreur Paypal:" . $paypal->errors);
  }

$params = array('TOKEN' => $_GET['token'],
		'PAYERID'=> $_GET['PayerID'],
		'PAYMENTACTION' => 'Sale',

		'PAYMENTREQUEST_0_AMT' => $totalttc + $port,
		'PAYMENTREQUEST_0_CURRENCYCODE' => 'EUR',
		'PAYMENTREQUEST_0_SHIPPINGAMT' => $port,
		'PAYMENTREQUEST_0_ITEMAMT' => $totalttc);

$params["L_PAYMENTREQUEST_0_NAME0"] = $product['name'];
$params["L_PAYMENTREQUEST_0_DESC0"] = 'Open de Bloc Grenoble 2015';
$params["L_PAYMENTREQUEST_0_AMT0"] = $product['price'];
$params["L_PAYMENTREQUEST_0_QTY0"] = $product['count'];

$response = $paypal->request('DoExpressCheckoutPayment',$params);

if ($response)
  {
    $response['PAYMENTINFO_0_TRANSACTIONID'];

    try
      {
	$bdd = new PDO('mysql:host=mysql.server;dbname=name;charset=utf8', 'login', 'password');
	$bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }
    catch (Exception $e)
      {
	trigger_error('Erreur de connexion à la base de données: ' . $e->getMessage());
      }

    try
      {
	$lastname = "Hello";
	$firstname = "world";
	$sex = "M";
	$birthday = "2000";
	$category ='cadet';
	$licenceType   = "FFME";
	$licenceNumber = "1234AB12";
	$club          = "CAF";
	$experience    = "5a";
	$comment       = "no comment";
	$mail          = "hellow.world@gmail.com";
	$tel           = "0699999999";
	$conditions = 1;

	$req = $bdd->prepare('INSERT INTO bloc_participants(nom, prenom, sexe, naissance, categorie, licence_type, licence_number, club, experience, comment, mail, tel, conditions) VALUES(:nom, :prenom, :sexe, :naissance, :categorie, :licence_type, :licence_number, :club, :experience, :comment, :mail, :tel, :conditions)');

	$req->execute(array('nom' => $lastname,
			    'prenom' => $firstname,
			    'sexe' => $sex,
			    'naissance' => $birthday,
			    'categorie' => $category,
			    'licence_type' => $licenceType,
			    'licence_number' => $licenceNumber,
			    'club' => $club,
			    'experience' => $experience,
			    'comment' => $comment,
			    'mail' => $mail,
			    'tel' => $tel,
			    'conditions' => $conditions));
      }
    catch (Exception $e)
      {
	trigger_error('Erreur pendant l\'enregistrement des informations du formulaire: ' . $e->getMessage());
      }

    $url = 'success.php';
  }
else
  {
    $url = 'cancel.php';
  }

// clear out the output buffer
while (ob_get_status()) 
  {
    ob_end_clean();
  }

// no redirect
header( "Location: $url" );

?>
