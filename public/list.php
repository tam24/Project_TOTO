<pre>
  <?php
  // Include configuration and header
  require_once __DIR__.'/../inc/config.php';

  $sqlSelect = "SELECT * FROM student ORDER BY stu_lastname LIMIT 3";

  $pdoStatement = $pdo->prepare($sqlSelect);
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
  require_once __DIR__.'/../view/footer.php';
  require_once __DIR__.'/../view/list.php';
  ?>
</pre>
