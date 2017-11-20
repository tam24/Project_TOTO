
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
        <td><a href="student.php?id=<?php echo $rowValues['stu_id']?>" class="btn btn-success btnStudentDetails" data-id=<?=$rowValues['stu_id']?>> Details </a> </td>
        <td><form name="student_id" method="GET">
          <button type="submit" class="btn btn-danger" name="stu_id" data-id="<?= $stu_id=$rowValues['stu_id']?>">Delete </button>
        </form></td>

      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>

<script type="text/javascript">
 $('.btnStudentDetails').on('click',function(e){
   e.preventDefault();
   var studentId = $(this).data('id'); //this is the data attribute data-id="<?= $stu_id=$rowValues['stu_id']?>
   //call to ajax
	$.ajax({
   				url : 'ajax/student.php',
   				method : 'post',
   				dataType : 'text',
   				data : {'id' : studentId}//THIS 'id' comes from ajax/student.php $pdoStatement ->bindValue(':id', $_POST['id'], PDO::PARAM_INT); so it has to be the same name.
	}).done(function(response) {
		//if it works then
		alert('Great! It works!');
    $('#popupStudent').html(response);
    $('#popupStudent').show();
    
  }).fail(function() {
		//if it doesn't work then
		alert('bad news... ERROR !');
	}).always(function() {
	  //end of execution regardles of success
		alert('The request is complete!');
	});
   //fill in (#popupStudent)

   //then show <div> with student details</div>
 })
</script>

<div id="popupStudent" style="display:none;position:absolute;z-index:1000;left:50%;top:10%;margin-left:-200px;width:400px;border:1px solid black;padding:10px;background: white;">
</div>
