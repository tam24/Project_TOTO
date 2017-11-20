<?php
require_once __DIR__.'/../../inc/config.php';
require_once __DIR__.'/../../inc/functions.php';

//Variable initialization
$lastName = '';
$firstName = '';
$email = '';
$dOb = '';
$friendlinessSelect = '';
$sessionSelect = '';
$citySelect = '';
$formControlFile = false;
$displayForm = true;

//data retrieval from the POST method
if (!empty($_POST)){
  $lastName = isset($_POST['InputLastName']) ? $_POST['InputLastName'] : '';
	$firstName = isset($_POST['InputFirstName']) ? $_POST['InputFirstName'] : '';
  $email = isset($_POST['InputEmail']) ? $_POST['InputEmail'] : '';
  $dOb = isset($_POST['DoB']) ? $_POST['DoB'] : '';
  $friendlinessSelect = isset($_POST['FriendlinessSelect']) ? $_POST['FriendlinessSelect'] : '';
  $sessionSelect = isset($_POST['SessionSelect']) ? $_POST['SessionSelect'] : '';
  $citySelect = isset($_POST['CitySelect']) ? $_POST['CitySelect'] : '';
  $formControlFile = isset($_POST['FormControlFile']) ? $_POST['FormControlFile'] : '';

//Data cleaning before submitting.
  $lastName = strtoupper(trim(strip_tags($lastName)));
  $firstName = ucfirst(trim(strip_tags($firstName)));
  $email = trim(strip_tags($email));
  $dOb = trim(strip_tags($dOb));

//Data validation before submitting
  $formOk = true;
  if (empty($lastName)) {
  	echo 'Please enter a Last Name';
  	$formOk = false;
  }
  else if (strlen($lastName) < 2) {
		echo 'Incorrect Last Name<br>';
		$formOk = false;
	}
  if (empty($firstName)) {
    echo 'Please enter a name';
    $formOk = false;
  }
  else if (strlen($firstName) < 2) {
    echo 'Incorrect Name<br>';
    $formOk = false;
  }
  if (empty($email)) {
		echo 'Please enter an email<br>';
		$formOk = false;
	}
	//email validation by php
	else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
		echo 'Email incorrect<br>';
		$formOk = false;
	}
  if (empty($dOb)) {
		echo 'Please enter a date <br>';
		$formOk = false;
	}
  else if  (strlen($dOb) < 10) {
    echo 'Incorrect date <br>';
    $formOk = false;
  }
  //Once everything is OK then the data can be transfered
  if ($formOk) {
		//the form is not displayed
    echo 'Everything oK';
    //if everything is OK then verify that the student doesn't exist
    if (!empty($lastName) && !empty($firstName)){

      $sqlSelect = "SELECT stu_lastname, stu_firstname FROM student WHERE stu_lastname = :lastName AND stu_firstname = :firstName";

      $pdoStatement = $pdo->prepare($sqlSelect);
      $pdoStatement ->bindValue (':lastName', $lastName, PDO::PARAM_STR);
      $pdoStatement ->bindValue (':firstName', $firstName, PDO::PARAM_STR);
      $pdoStatement->execute();


      $rowRetrieved = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

      print_r($rowRetrieved);

      //if there is content in the array then the student exists
      if (!empty($rowRetrieved)){
        echo 'Student already exists';
        exit;
      }//if there is an empty array then add the student
      else {
        $sqlInsert = "INSERT INTO student (stu_lastname, stu_firstname, stu_email, stu_birthdate, stu_friendliness, city_cit_id, session_ses_id) VALUES  (:lastName, :firstName, :email, :birthdate, :friendliness, :cityName, :sesNb)";

        $pdoStatement = $pdo->prepare($sqlInsert);
        $pdoStatement ->bindValue (':lastName', $lastName, PDO::PARAM_STR);
        $pdoStatement ->bindValue (':firstName', $firstName, PDO::PARAM_STR);
        $pdoStatement ->bindValue (':email', $email, PDO::PARAM_STR);
        $pdoStatement ->bindValue (':birthdate', $dOb, PDO::PARAM_STR);
        $pdoStatement ->bindValue (':friendliness', $friendlinessSelect, PDO::PARAM_STR);
        $pdoStatement ->bindValue (':cityName', $citySelect, PDO::PARAM_STR);
        $pdoStatement ->bindValue (':sesNb', $sessionSelect, PDO::PARAM_STR);
        $pdoStatement->execute();

        //get id
        $lastId = $pdo->lastInsertId();
        echo '1';


      }//closes else for the INSERT

    };//closes if for !empty(first&last name)


	};//closes if for "everything OK"

};// closes If for data retrieval method POST

?>
