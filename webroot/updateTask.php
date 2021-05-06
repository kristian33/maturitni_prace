<?php
use core\plugininfo\filter;
use Klimo\TaskModel;

require_once __DIR__ . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR . 'header.php';
?>
<div class="content-wrapper" style="min-height: 855px;">
  <!-- Content Header (Page header) -->

  <?php

    if (in_array($roleName, ['ADMINISTRÁTOR', 'ZADAVATEL'])) {
      $submit = filter_input(INPUT_POST, 'submit');
      $idTask = filter_input(INPUT_GET, 'id_task');  
      if(isset($idTask)) { 
        ?>
        <?php
        if(isset($submit)) {
          $title = filter_input(INPUT_POST, 'title');
          $description = filter_input(INPUT_POST, 'description');
          $datetime_from = filter_input(INPUT_POST, 'datetime_from');
          $datetime_to = filter_input(INPUT_POST, 'datetime_to');
        $updated = Klimo\TaskModel::updateTask($title, $description, $datetime_from, $datetime_to, $idTask);
      }
      $task = TaskModel::getTask($idTask);
        ?>
        	<div class="container-contact100">
		  <div class="wrap-contact100">
        <form action="" method="post">
        <span class="contact100-form-title">
					Úprava úkolu
				</span>
        <span class="label-input100">Název úkolu</span>
        <input type="text" id="title" name="title" class="input100" value="<?php echo "$task->title";?>">
        <span class="label-input100">Popis úkolu</span>
        <input type="text" id="description" name="description" class="input100" value="<?php echo "$task->description";?>">
        <span class="label-input100">Od kdy</span>
        <input type="datetime-local" id="datetime_from" name="datetime_from" class="input100" value="<?php echo "$task->datetime_from";?>">
        <span class="label-input100">Do kdy</span>
        <input type="datetime-local" id="datetime_to" name="datetime_to" class="input100" value="<?php echo "$task->datetime_to";?>">
    
        <div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button type="submit" id="submit" name="submit" class="contact100-form-btn">
							Upravit
							</button>
              </div>
              </div>
              </div>
              </div>
            </form>
        <?php
    }
      else { 
        echo "Není úkol k vypsání.";
      }
    }
    ?>
</div>
<footer>
<?php
  require_once 'inc/footer.php';
?>
</footer>
