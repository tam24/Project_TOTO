
<?php
$sqlSelect = "SELECT stu_lastname, stu_firstname, stu_email, stu_birthdate, stu_friendliness, cit_name, ses_number
FROM student
INNER JOIN city ON city.cit_id = student.city_cit_id
INNER JOIN session ON session.ses_id = student.session_ses_id
WHERE stu_id = :id
";

$pdoStatement = $pdo->prepare($sqlSelect);
$pdoStatement ->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
$pdoStatement->execute();

if ($pdoStatement === false) {
		print_r($pdo->errorInfo());
		exit;
}

$rowRetrieved = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

?>

<ul class="list-group">
	<?php foreach ($rowRetrieved as $index=>$rowValues):?>
		<li class="list-group-item active">LastName: <?php echo $rowValues['stu_lastname']?></li>
		<li class="list-group-item">Name: <?php echo $rowValues['stu_firstname']?></li>
		<li class="list-group-item">Email: <?php echo $rowValues['stu_email']?></li>
		<li class="list-group-item">Birthdate: <?php echo $rowValues['stu_birthdate']?></li>
		<li class="list-group-item">Age: <?php echo $ageYrs ?> </li>
		<li class="list-group-item">City: <?php echo $rowValues['cit_name']?>City</li>
		<li class="list-group-item">Friendliness: <?php echo $rowValues['stu_friendliness']?></li>
		<li class="list-group-item">Session No.:<?php echo $rowValues['ses_number']?></li>
		<li class="list-group-item">Webforce3</li>
	<?php endforeach; ?>
