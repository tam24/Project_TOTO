
<div class="card">
  <div class="card-body">
    <table>
      <?php foreach ($newArray as $index=>$content): ?>
        <thead>
          <tr>
            <th>Table header <?php echo $index ?></th>
          </tr>
        </thead>

        <?php foreach ($content as $index2=>$value): ?>
        <tbody>
          <tr>
            <td> <?php echo 'Session '.$value['ses_number'].' '.$value['ses_start_date'].' '.$value['ses_end_date']?></td>

          </tr>
        </tbody>
        <?php endforeach; ?>
      <?php endforeach; ?>
    </table>

  </div>
</div>
