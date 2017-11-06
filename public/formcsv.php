<pre>
	<?php
	// Include configuration and header added in all files /public
  require_once __DIR__.'/../inc/config.php';
		//if the form is submitted
		if (!empty($_POST)) {
			//to see if the file got loaded.
			//print_r($_POST);
			//to see the files ($_FILES)
			//print_r($_FILES);
			//if the files have been sent
			if (!empty($_FILES)){
				//take details of the files sent
				$fileForm= isset($_FILES['fileForm']) ? $_FILES['fileForm'] : array();
				//File validation
				$formOK = true;
				$allowedExtensions = array('csv');
				//MIME list with authorized types
				if (($fileForm['type'] != 'application/octet-stream') AND  ($fileForm['type'] != 'text/csv')){
					echo "Incorrect file<br>";
					$formOK = false;
				}
				//Validation by checking extension
				//retrieve the position of the . in the string of characters of the filename
				$dotPosition = strrpos($fileForm['name'], '.');
				//recovers the chain of characters from the . onwards
				$extension = substr($fileForm['name'], $dotPosition+1);
				//verify that the extension exists in the array of $allowedExtensions
				if (!in_array ($extension, $allowedExtensions)){
					echo "Not a valid extension<br>";
					$formOK = false;
				}


				//if the file is valid ($formOK = true)
				if ($formOK){
					//moves the file form a temp location to a not so temp location ''/uploaded' changing the name of the file for added SECURITY
					//$newFileName generates a random name md5 adds data security plus a random or given chain of characters to increase the dificulty of retrieving the name of a file
					$newFileName = md5(uniqid().'-addextrachain#').'.'.$extension;
					if (move_uploaded_file($fileForm['tmp_name'], __DIR__.'/csv/'.$newFileName)) {
						echo "File is valid, and was successfully uploaded.\n";
					}//closes if move_uploaded_file
					else {
						echo "No file to load";
					}
				}//closes if $formOK

			}//closes if !empty($_FILES)
		}//closes if !empty($POST)

		//Open uploaded file
		$fileOpen = fopen(__DIR__.'/csv/'.$newFileName, "r");

		if ($fileOpen) {
		    while (($buffer = fgets($fileOpen)) !== false) {
		        echo $buffer;
				  	//$headers = "lastName name email friendliness dOb";
						$studentValues = explode(";", $buffer);
						var_dump ($studentValues);
							$sqlInsert = "INSERT INTO student (stu_lastname, stu_firstname, stu_email, stu_friendliness, stu_birthdate, session_ses_id, city_cit_id) VALUES (:lastName, :firstName, :email, :friendliness, :birthdate, :sessionid, :city)";

							$pdoStatement = $pdo->prepare($sqlInsert);
							$pdoStatement ->bindValue (':lastName', $studentValues[0], PDO::PARAM_STR);
							$pdoStatement ->bindValue (':firstName', $studentValues[1], PDO::PARAM_STR);
							$pdoStatement ->bindValue (':email', $studentValues[2], PDO::PARAM_STR);
							$pdoStatement ->bindValue (':friendliness', $studentValues[3], PDO::PARAM_STR);
							$pdoStatement ->bindValue (':birthdate', $studentValues[4], PDO::PARAM_STR);
							$pdoStatement ->bindValue (':sessionid', 1, PDO::PARAM_INT);
							$pdoStatement ->bindValue (':city', 4, PDO::PARAM_INT);
							$pdoStatement->execute();


				}//closes while
		    if (!feof($fileOpen)) {
		        echo "Error: unexpected fgets() fail\n";
		    }
		    fclose($fileOpen);
		}//closes fileopen fgets

		//for creating a csv file 'createFile' comes from name in the input of html, always use it like this
		else if (isset($_POST['createFile'])){
			$sqlSelect = "SELECT stu_lastname, stu_firstname, stu_email, stu_friendliness, stu_birthdate FROM student";

			$pdoStatement= $pdo->query($sqlSelect);

			if ($pdoStatement && $pdoStatement->rowCount()>0){
				$fileCreate = fopen(__DIR__.'/csv/export-'.date('Ymd').'csv', "w");
				if ($fileCreate){
					while (($row = $pdoStatement->fetch(PDO::FETCH_ASSOC)) !== false){
						//to check the content of the rows print_pre($row);
						//create a csv line
						$line = implode(';', $row);
						$fwrite($fileCreate, $line, PHP_EOL);
					}//closes while
					fclose($fileCreate);
				}//closes if ($fileCreate)

			}//closes if rowCount
		}//closes else if $_POST['createFile']








		// At the end, display the "views"
		require_once __DIR__.'/../view/header.php';
		require_once __DIR__.'/../view/formcsv.php';
		require_once __DIR__.'/../view/footer.php';

	?>
</pre>
