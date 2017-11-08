<?php
	// Include configuration and header added in all files /public
  require_once __DIR__.'/../inc/config.php';

  $email = '';
  $password ='';
  $passwordC ='';
  $formOk = true;

  //data retrieval from the POST method
  if (!empty($_POST)){
    print_r ($_POST);
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $passwordC = isset($_POST['passwordC']) ? $_POST['passwordC'] : '';

    //Data cleaning before submitting.
    $email = trim(strip_tags($email));
    $password = trim(strip_tags($password));
    $passwordC = trim(strip_tags($passwordC));

    //Data validation before submitting
    if (empty($email)) {
    	echo 'Please enter an email<br>';
    	$formOk = false;
    }
    //email validation by php
    else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    	echo 'Email incorrect<br>';
    	$formOk = false;
    }
    if (strlen($password) < 6 ) {
    	echo 'Invalid password<br>';
    	$formOk = false;
    }
    if (empty($password) != empty($passwordC) ) {
    	echo 'Please enter a valid password<br>';
    	$formOk = false;
    }

    //Once everything is OK then the data can be transfered
    if ($formOk) {
    //if everything is OK then verify that the user exist
    echo '<br>Everything oK';

    $sqlSelect = "SELECT usr_role FROM users WHERE usr_email = :email";

    $pdoStatement = $pdo->prepare($sqlSelect);
    $pdoStatement->bindValue (':email', $email, PDO::PARAM_STR);
    $pdoStatement->execute();

    $nbRows = $pdoStatement->rowCount ();

    print_r($nbRows);

    //if the user doesn't exist push data into db
      if (empty($nbRows)){
        echo '<br>good all done';
        //encript password
        $encriptPswd =password_hash($password,PASSWORD_BCRYPT);

        $sqlInsert = "INSERT INTO users (usr_email, usr_password, usr_role) VALUES (:email, :password, :role)";

        $pdoStatement = $pdo->prepare($sqlInsert);
        $pdoStatement ->bindValue (':email', $email, PDO::PARAM_STR);
        $pdoStatement ->bindValue (':password', $encriptPswd, PDO::PARAM_STR);
        $pdoStatement ->bindValue (':role', 'user', PDO::PARAM_STR);
        $pdoStatement->execute();

        echo '<br>perfect user added!';
      }//closes if (empty($nbRows))

    }//if ($formOk)


  }//closes if !empty($_POST)




  // At the end, display the "views"
  require_once __DIR__.'/../view/header.php';
  require_once __DIR__.'/../view/signup.php';
  require_once __DIR__.'/../view/footer.php';

?>
