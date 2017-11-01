
<div class="card">
  <div class="card-body">
    <h1> SESSIONS </h1>
    <br>
    <?php foreach ($rowRetrieved as $index=>$rowValues):?>
      <ul class="list-group"><h2> <?php echo $rowValues['tra_name']?> </h2>
        <li class="list-group-item">Session <?php echo $rowValues['ses_number'].'  '.$rowValues['ses_start_date'].'  '.$rowValues['ses_end_date']?></li>

      </ul>
    <?php endforeach; ?>

  </div>
</div>
