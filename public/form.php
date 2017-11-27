<?php
// Include configuration and header added in all files /public
require_once __DIR__.'/../inc/config.php';

// Initialisations (pour éviter notices dans <inputs>)
$firstname = '';
$lastname = '';
$email = '';
$phone = '';
$displayForm = true;

// Si formulaire soumis
if (!empty($_POST)) {
	//print_r($_POST);

	// Je récupère les données
	$lastname = isset($_POST['lastnameToto']) ? $_POST['lastnameToto'] : '';
	$firstname = isset($_POST['firstnameToto']) ? $_POST['firstnameToto'] : '';
	$email = isset($_POST['emailToto']) ? $_POST['emailToto'] : '';
	$phone = isset($_POST['phoneToto']) ? $_POST['phoneToto'] : '';
	//équivalent à
	/*if (isset($_POST['phoneToto'])) {
		$phone = $_POST['phoneToto'];
	}
	else {
		$phone = '';
	}*/

	// Traiter les données
	$lastname = strtoupper(trim(strip_tags($lastname))); // retire les espaces au debut et à la fin
	$firstname = ucfirst(trim(strip_tags($firstname)));
	$email = trim(strip_tags($email));
	$phone = trim($phone);

	// Validation des données
	$formOk = true;
	if (empty($lastname)) {
		echo 'Nom vide<br>';
		$formOk = false;
	}
	else if (strlen($lastname) < 2) {
		echo 'Nom incorrect<br>';
		$formOk = false;
	}

	if (empty($firstname)) {
		echo 'Prénom vide<br>';
		$formOk = false;
	}
	else if (strlen($firstname) < 2) {
		echo 'Prénom incorrect<br>';
		$formOk = false;
	}

	if (empty($email)) {
		echo 'Email vide<br>';
		$formOk = false;
	}
	// Je valide l'email
	else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
		echo 'Email incorrect<br>';
		$formOk = false;
	}

	// Si aucune erreur
	if ($formOk) {
		echo '$lastname='.$lastname.'<br>';
		echo '$firstname='.$firstname.'<br>';
		echo '$email='.$email.'<br>';
		echo '$phone='.$phone.'<br>';
		// Je n'affiche pas le formulaire
		$displayForm = false;
    }


}

?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mon premier formulaire</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>

<body>
	<!-- JQuery full version -->
	 <script
		 src="https://code.jquery.com/jquery-3.2.1.js"
		 integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
		 crossorigin="anonymous"></script>

	<div class="container">
		<br>
		<?php if ($displayForm) : ?>
		<div class="panel panel-primary" style="max-width:400px;margin:auto;">
			<div class="panel-heading">
				<h3 class="panel-title">Form</h3>
			</div>
			<div class="panel-body">
				<!--
				action = fichier de destination du formulaire
				method = méthode de transmission des informations
				-->
				<form id="myform" action="" method="post">
					<fieldset>
						<strong>Nom</strong><br />
						<input type="text" name="lastnameToto" class="form-control" value="<?php echo $lastname; ?>" /><br />
						<strong>Pr&eacute;nom</strong><br />
						<input type="text" name="firstnameToto" class="form-control" value="<?php echo $firstname; ?>" /><br />
						<strong>Email</strong><br />
						<input type="email" name="emailToto" class="form-control" value="<?php echo $email; ?>" /><br />
						<strong>T&eacute;l&eacute;phone</strong><br />
						<input type="text" name="phoneToto" class="form-control" value="<?php echo $phone; ?>" /><br />
						<br>
						<!--<input type="submit" class="btn btn-success" value="Valider" /> change SUBMIT to BUTTON -->
            <button id="btn">SUBMIT</button>

						<script type="text/javascript">
              $('#btn').on('click', function(e) {
								e.preventDefault();
							});

							$.ajax({
                  url : 'country.php',
                  dataType : 'json',
                  method : 'POST',
                  data: $(#myform).serialize
              })

					</fieldset>
				</form>
			</div>
		</div>
		<?php endif; ?>
	</div>


	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
