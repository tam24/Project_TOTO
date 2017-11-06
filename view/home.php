
<div class="card">
  <div class="card-body">
    <table>
      <?php foreach ($newArray as $index=>$content): ?>
        <?php foreach ($content as $index2=>$contentToDisplay): ?>
          <thead>
            <tr>
              <th>Table header<?php echo $index2 ?></th>
            </tr>
            </thead>
            <tbody>
              <tr>
                <td>interior <?php echo $contentToDisplay ?></td>
              </tr>

            </tbody>
          <?php endforeach; ?>
      <?php endforeach; ?>
    </table>

  </div>
</div>
