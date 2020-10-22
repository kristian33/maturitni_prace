
<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR . 'header.php';
?>
<div class="content-wrapper" style="min-height: 855px;">
    <!-- Content Header (Page header) -->
 
    <h1>Výpis</h1>
    <?php
    $tasks = TaskModel::getTask();
    foreach ($tasks as $task) {
    ?>
    <table class="table">
    <thead>
    <tbody>
    <tr>
    <td><?php echo $task->title;?> </td>
    <td><?php echo $task->description;?> </td>
    <td> <?php echo $task->datetime_from; ?> </td>
    <td><?php echo $task->datetime_to; ?></td>
  </tr>
  </tbody>
  <?php
}
?>
  
  </thead>
  </table>
  
  </div>
  
  <?php
  require_once 'inc/footer.php';
  ?>
  </body>
</html>