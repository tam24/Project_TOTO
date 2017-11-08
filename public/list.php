<?php
  // Include configuration and header
  require_once __DIR__.'/../inc/config.php';

  // For doing the open search of a student if there is a search then it will not do the pagination
  $search = isset($_GET['search']) ? trim($_GET['search']) : '';

  if (!empty($search)) {
      $sql = ' SELECT * FROM student WHERE stu_lastname LIKE :search OR stu_firstname LIKE :search OR stu_email LIKE :search ';
      $pdoStatement = $pdo->prepare($sql);
      $pdoStatement->bindValue(':search', '%'.$search.'%');
      $pdoStatement->execute();
      if ($pdoStatement === false) {
          print_r($pdo->errorInfo());
          exit;
      } else {
          $rowRetrieved = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
      }
  } //if it is not a search then it will use pagination to display students
  else {
      //page dislpayed in url
      $page = isset($_GET['page']) ? intval($_GET['page']) : 1 ;
      /* page =>OFFSET
      2 => 3
      3 => 6
      4 => 9
       */

      $offset = ($page-1) * 5;
      if ($offset <= 0) {
          $offset = 0;
      }

      $sqlSelect = "SELECT * FROM student  LIMIT 5 OFFSET :offset";

      $pdoStatement = $pdo->prepare($sqlSelect);
      $pdoStatement ->bindValue(':offset', $offset, PDO::PARAM_INT);
      $pdoStatement->execute();

      if ($pdoStatement === false) {
          print_r($pdo->errorInfo());
          exit;
      } else {
          $rowRetrieved = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
      }
  }//closes else for pagination

  //for student deletion GET id and delete from DB

  $studentId = isset($_GET['stu_id']) ? trim($_GET['stu_id']) : '';

  if (!empty($studentId)) {
      //to check if there is a correct retrieval of id var_dump($studentId);
      //exit;
      $sqlDelete = "DELETE FROM student WHERE stu_id = :student_id";

      $pdoStatement = $pdo->prepare($sqlDelete);
      $pdoStatement ->bindValue(':student_id', $studentId, PDO::PARAM_INT);

      if ($pdoStatement->execute() === false) {
          print_r($pdoStatement->errorInfo());
          exit;
      }
  }//closes if for studentId deletion


  // At the end, display all views
  require_once __DIR__.'/../view/header.php';
  require_once __DIR__.'/../view/list.php';
  require_once __DIR__.'/../view/footer.php';
