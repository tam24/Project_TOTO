<?php

// Iclude configuration
require_once __DIR__.'/../inc/config.php';

//joins to retrieve the session

$sqlSelect = "SELECT tra_name, ses_id, ses_number, ses_start_date, ses_end_date
FROM session
INNER JOIN location ON session.location_loc_id = location.loc_id
INNER JOIN training ON training.tra_id = session.training_tra_id
";

$pdoStatement = $pdo->query($sqlSelect);

if ($pdoStatement === false) {
    print_r($pdo->errorInfo());
    exit;
}

$rowRetrieved = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
//print_r($rowRetrieved);

foreach ($rowRetrieved as $index=>$value) {
    $sessionName = $value['tra_name'];
    $newArray[$sessionName][]=$value;

}// closes foreach
//echo 'new Array';
//print_r($newArray);



// At the end, display the "views"
require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/home.php';
require_once __DIR__.'/../view/footer.php';

?>
