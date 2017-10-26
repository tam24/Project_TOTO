
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
    <tr>
      <?php foreach ($rowRetrieved as $index=>$rowValues)?>
      <th scope="row"><?php echo $rowValues['stu_id']?></th>
      <td><?php echo $rowValues['stu_firstname']?></td>
      <td><?php echo $rowValues['stu_lastname']?></td>
      <td><?php echo $rowValues['stu_email']?></td>
      <td><?php echo $rowValues['stu_birthdate']?></td>
    </tr>

  </tbody>
</table>
