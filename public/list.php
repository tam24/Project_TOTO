<?php
  // Include configuration and header
  require_once __DIR__.'/../inc/config.php';
  //page dislpayed in url
  $page = isset($_GET['page']) ? intval($_GET['page']) : 1 ;

  /* page =>OFFSET
  2 => 3
  3 => 6
  4   9
  5 12
 */

  $offset = ($page-1) *3;
  if ($offset <= 0){
    $offset = 0;
  }

  $sqlSelect = "SELECT * FROM student  LIMIT 3 OFFSET :offset";

  $pdoStatement = $pdo->prepare($sqlSelect);
  $pdoStatement ->bindValue (':offset', $offset, PDO::PARAM_INT);
  $pdoStatement->execute();

  if ($pdoStatement === false) {
    print_r($pdo->errorInfo());
    exit;
  }
  else {
    $rowRetrieved = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    //print_r($rowRetrieved);

  }




  // At the end, display all views
  require_once __DIR__.'/../view/header.php';
  require_once __DIR__.'/../view/list.php';
  require_once __DIR__.'/../view/footer.php';

  ?>
