
<div class="card">
  <div class="card-header"> Student
    <div class="card-body">
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
      </ul>
    </div>
  </div>
</div>
