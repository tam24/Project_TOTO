<div id="studentContent"></div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript">
					$.ajax({
				url : 'ajax/student.php',
				method : 'post',
				dataType : 'text',
				data : {
					lastName : $('#lname').val(),
					firstName : $('#fname').val(),
					email : $('#email').val(),

				}


		});
	</script>
