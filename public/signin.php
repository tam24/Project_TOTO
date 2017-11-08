<?php
	// Include configuration and header added in all files /public
  require_once __DIR__.'/../inc/config.php';
  //set up variables
  $email = '';
  $password ='';
  $formOk = true;

  //data retrieval from the POST method
  if (!empty($_POST)){
    //print_r ($_POST);
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    //Data cleaning before submitting.
    $email = trim(strip_tags($email));
    $password = trim(strip_tags($password));

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
    if (empty($password)) {
    	echo 'Please enter a valid password<br>';
    	$formOk = false;
    }
    //Once everything is OK then the data can be transfered
    if ($formOk) {
    //if everything is OK then verify that the user exist
    echo '<br>Everything oK<br>';

    $sqlSelect = "SELECT usr_role, usr_password, usr_id FROM users WHERE usr_email = :email";

    $pdoStatement = $pdo->prepare($sqlSelect);
    $pdoStatement->bindValue (':email', $email, PDO::PARAM_STR);
    $pdoStatement->execute();

    $rowRetrieved = $pdoStatement->fetch(PDO::FETCH_ASSOC);
    //print_r($rowRetrieved);

      if (!empty($rowRetrieved)){
        $pswdDb = $rowRetrieved['usr_password'];
        $idDb = $rowRetrieved['usr_id'];
        $useRole = $rowRetrieved['usr_role'];
        //print_r($pswdDb).'<br>';

        //retrieve user type admin or user
        $_SESSION['Role'] = $useRole;

        $checkPswd = password_verify($password, $pswdDb);
        //var_dump($checkPswd);
        //display id and ip address
        echo '<br>HI! '.$idDb.' PSWD OK<br>';

        /*whether ip is from share internet
        $ip_address = $_SERVER['HTTP_CLIENT_IP'];
        echo $ip_address;
        //whether ip is from proxy
        $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
        echo $ip_address; */
        //whether ip is from remote address
        $ip_address = $_SERVER['REMOTE_ADDR'];
        //var_dump ($ip_address);
        echo '<br>IP is '.$ip_address;

        $displaySession = $_SESSION['User ID'] = $idDb;
        //print_r ($_SESSION);
        echo '<br>Session ID '.$displaySession;



      }//closes if (!empty($rowRetrieved))
      else{
        echo '<br>USER NOT FOUND';
      }

    }// closes if ($formOk)


  }//closes if (!empty($_POST))




  // At the end, display the "views"
  require_once __DIR__.'/../view/header.php';
  require_once __DIR__.'/../view/signin.php';
  require_once __DIR__.'/../view/footer.php';

  ?>
