
<div class="card">
  <div class="card-body">
    <table>
      <?php foreach ($newArray as $index=>$content): ?>
        <?php foreach ($content as $index=>$contentToDisplay): ?>
          <thead>
            <tr>
              <th><?php echo $index ?></th>
            </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $contentToDisplay ?></td>
              </tr>

            </tbody>
          <?php endforeach; ?>
      <?php endforeach; ?>
    </table>

  </div>
</div>
