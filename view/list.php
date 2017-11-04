
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
        <td><a href="student.php?id=<?php echo $rowValues['stu_id']?>" class="btn btn-success"> Details </a> </td>
        <td><a href=" " class="btn btn-danger"> Delete </td>

      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<nav aria-label="Page navigation student list">
  <ul class="pagination justify-content-center">
    <li class="page-item"><a class="page-link" href="list.php?page=<?php echo $page-1?>">Previous</a></li>
    <!--<li class="page-item"><a class="page-link" href="href="list.php?page=<?php echo 1?>">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>-->
    <li class="page-item"><a class="page-link" href="list.php?page=<?php echo $page+1?>">Next</a></li>
  </ul>
</nav>
