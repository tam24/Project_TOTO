
<?php
require_once __DIR__.'/../../inc/config.php';
require_once __DIR__.'/../../inc/functions.php';


$sqlSelect = "SELECT stu_lastname, stu_firstname, stu_email, stu_birthdate, stu_friendliness, cit_name, ses_number
FROM student
INNER JOIN city ON city.cit_id = student.city_cit_id
INNER JOIN session ON session.ses_id = student.session_ses_id
WHERE stu_id = :id
";

$pdoStatement = $pdo->prepare($sqlSelect);
$pdoStatement ->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
$pdoStatement->execute();

if ($pdoStatement === false) {
		print_r($pdo->errorInfo());
		exit;
}

$rowRetrieved = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

?>
<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>

<ul class="list-group">
	<?php foreach ($rowRetrieved as $index=>$rowValues):?>
		<li class="list-group-item active">LastName: <?php echo $rowValues['stu_lastname']?></li>
		<li class="list-group-item">Name: <?php echo $rowValues['stu_firstname']?></li>
		<li class="list-group-item">Email: <?php echo $rowValues['stu_email']?></li>
		<li class="list-group-item">Birthdate: <?php echo $rowValues['stu_birthdate']?></li>
		<li class="list-group-item">City: <?php echo $rowValues['cit_name']?>City</li>
		<li class="list-group-item">Friendliness: <?php echo $rowValues['stu_friendliness']?></li>
		<li class="list-group-item">Session No.:<?php echo $rowValues['ses_number']?></li>
		<li class="list-group-item">Webforce3</li>
		<br> </br>
		<?php endforeach; ?>
</ul>
<button type="button" class="btn btn-dark" id="close">CLOSE</button>

<script type="text/javascript">
 $('#close').on('click',function(e){
   e.preventDefault();
	 $('#popupStudent').hide();
 })
</script>
