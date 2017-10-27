
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Birthdate</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($rowRetrieved as $index=>$rowValues):?>
    <tr>
      <th scope="row"><?php echo $rowValues['stu_id']?></th>
      <td><?php echo $rowValues['stu_firstname']?></td>
      <td><?php echo $rowValues['stu_lastname']?></td>
      <td><?php echo $rowValues['stu_email']?></td>
      <td><?php echo $rowValues['stu_birthdate']?></td>
      <td><a href="student.php?id=<?php echo $rowValues['stu_id']?>" class="btn btn-success">Details </a> </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
