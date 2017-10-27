<?php
// Include configuration and header
require_once __DIR__.'/../inc/config.php';

if (empty($_GET['id'])){
  echo 'Student not found';
}

else {
  $sqlSelect = "SELECT stu_lastname, stu_firstname, stu_email, stu_birthdate, stu_friendliness, cit_name, ses_number
FROM student
INNER JOIN city ON city.cit_id = student.city_cit_id
INNER JOIN session ON session.ses_id = student.session_ses_id
WHERE stu_id = :id
";

  $pdoStatement = $pdo->prepare($sqlSelect);
  $pdoStatement ->bindValue (':id', $_GET['id'], PDO::PARAM_INT);
  $pdoStatement->execute();

  if ($pdoStatement === false) {
	print_r($pdo->errorInfo());
	exit;
  }

  $rowRetrieved = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

  $dateBirth = strtotime ($rowRetrieved [0] ['stu_birthdate']);
  $dateTodayNb = time();
  $ageResult = $dateTodayNb - $dateBirth;
  $ageMin = $ageResult / 60;
  $ageHrs = $ageMin / 60;
  $ageDays = $ageHrs / 24;
  $ageYrs =  intdiv($ageDays, 365 );

  echo '<br>'.$dateBirth.' '.$dateTodayNb.' '.$ageResult.' '.$ageYrs;



  /*echo '<br>'.$rowRetrieved['stu_id'].'<br>';
  echo $rowRetrieved ['stu_lastname'].'<br>';
  echo $rowRetrieved ['stu_firstname'].'<br>';
  echo $rowRetrieved ['stu_email'].'<br>';
  echo $rowRetrieved ['stu_birthdate'].'<br>';
  echo $rowRetrieved ['stu_friendliness'].'<br>';
  echo $rowRetrieved ['cit_name'].'<br>';
  echo $rowRetrieved ['ses_number'].'<br>';
*/
}







// At the end, display all views
require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/student.php';
require_once __DIR__.'/../view/footer.php';

?>
