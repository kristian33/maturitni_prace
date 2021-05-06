<?php

use Klimo\TaskModel;

require_once __DIR__ . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR . 'header.php';
?>
	<!-- Bootstrap CSS -->
<div class="content-wrapper" style="min-height: 855px;">
  <!-- Content Header (Page header) -->

  <h1>Výpis</h1>
  <?php
    $id_tasklist = filter_input(INPUT_GET, 'id_tasklist');
    $submit = filter_input(INPUT_POST, 'submit');
    if (in_array($roleName, ['ADMINISTRÁTOR', 'ZADAVATEL'])) {
        ?>
        <?php
        $tasks = TaskModel::getTasksByTasklist($id_tasklist);
        ?>
            <table class="table">
        <tbody>
        <?php
        foreach ($tasks as $task) {
            ?>
       <tr>
          <td> <a href="task_detail.php?id_task=<?php echo "$task->id_task";?>"><?php echo $task->title; ?> </a></td>
          <td><?php echo $task->description; ?> </td>
          <td> <?php echo $task->datetime_from; ?> </td>
          <td><?php echo $task->datetime_to; ?></td>
        </tr>
            <?php
        }
        ?>
                </tbody>
        </table>
        <?php
    }
    ?>      
            <form action="addTask.php">
    				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button type="submit" id="submit" name="submit" class="contact100-form-btn">
							Přidat
							</button>
					</div>
				</div>
        </form>
<?php
  require_once 'inc/footer.php';
?>