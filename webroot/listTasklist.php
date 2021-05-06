<?php

use Klimo\TaskModel;

require_once __DIR__ . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR . 'header.php';
?>
<div class="content-wrapper" style="min-height: 855px;">
  <!-- Content Header (Page header) -->

  <h1>Seznamy úkolů</h1>
  <?php
    $submit = filter_input(INPUT_POST, 'submit');
    if (in_array($roleName, ['ADMINISTRÁTOR', 'ZADAVATEL', 'REALIZÁTOR'])) {
        ?>
        <?php
        $tasklists = TaskModel::getTasklists();
        ?>
            <table class="table">
        <tbody>
        <?php
        foreach ($tasklists as $tasklist) {
            ?>
        <tr>
          <td> <a href="listTasks.php?id_tasklist=<?php echo "$tasklist->id_tasklist";?>"> <?php echo $tasklist->name; ?> </a></td>
          <td><?php echo $tasklist->description; ?> </td>
          <td> <?php echo $tasklist->created_at; ?> </td>
        </tr>
            <?php
        }
        ?>
                </tbody>
        </table>
        <?php
    }
    ?>
    				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
            <form action="addTasklist.php">
						<button type="submit" id="submit" name="submit" class="contact100-form-btn">
							Přidat
							</button>
              </form>
</div>

<?php
  require_once 'inc/footer.php';
?>