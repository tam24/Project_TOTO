<ul class="list-group">
  <?php foreach ($rowRetrieved as $index=>$rowValues):?>
    <li class="list-group-item active"><?php echo $rowValues['stu_lastname']?></li>
    <li class="list-group-item">Name: <?php echo $rowValues['stu_firstname']?></li>
    <li class="list-group-item">Email: <?php echo $rowValues['stu_email']?></li>
    <li class="list-group-item">Birthdate: <?php echo $rowValues['stu_birthdate']?></li>
    <li class="list-group-item">Age</li>
    <li class="list-group-item">City: <?php echo $rowValues['cit_name']?>City</li>
    <li class="list-group-item">Friendliness: <?php echo $rowValues['stu_friendliness']?></li>
    <li class="list-group-item">Session No.:<?php echo $rowValues['ses_number']?></li>
    <li class="list-group-item">Webforce3</li>
  <?php endforeach; ?>
</ul>
