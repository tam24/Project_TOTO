<?php
print_r($_POST);

if (!empty($_POST)) {
    $sqlSelect = "SELECT stu_lastname, stu_firstname, stu_email, stu_birthdate, stu_friendliness     
    WHERE stu_email = :email";

    $pdoStatement = $pdo->prepare($sqlSelect);
    $pdoStatement ->bindValue('email', $email, PDO::PARAM_STR);
    $pdoStatement->execute();

    $rowRetrieved = $pdoStatement->fetch(PDO::FETCH_ASSOC);

    if (!empty($rowRetrieved)){
        $idDb = $rowRetrieved['usr_id'];
        echo '<br> User ID: '.$idDb; 
    }else {
        echo '<br> student not found '; 
        die('0');
    }

}// closes if (!empty($_POST)
?>
