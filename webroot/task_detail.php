<?php
use Klimo\UsersModel;
require_once __DIR__ . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR . 'header.php';
?>
<div class="content-wrapper" style="min-height: 855px;">
  <!-- Content Header (Page header) -->

  <?php
if (in_array($roleName, ['ADMINISTRÁTOR', 'REALIZÁTOR'])) {
    $idTask = filter_input(INPUT_GET, 'id_task');
    if (isset($idTask)) {
        ?>
        <?php
$task = Klimo\TaskModel::getTask($idTask);
        ?>

         	<div class="container-contact100">
		    <div class="wrap-contact100">
        <br>
        <span class="contact100-form-title">
					Task, který se vybral pro úpravu
				</span>
      <span class="label-input100">Název úkolu</span>
        <br>
        <b><?php echo "$task->title"; ?></b>
        <br>
        <br>
        <span class="label-input100">Popis úkolu</span>
        <br>
        <b><?php echo "$task->description"; ?></b>
        <br>
        <br>
        <span class="label-input100">Od kdy</span>
        <br>
        <b><?php echo "$task->datetime_from"; ?></b>
        <br>
        <br>
        <span class="label-input100">Do kdy</span>
        <br>
        <b><?php echo "$task->datetime_to"; ?></b>
        <div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<a href="updateTask.php?id_task=<?php echo "$task->id_task"; ?>" id="" name="" class="contact100-form-btn">
							Upravit
              </a>
        <?php
} else {
        echo "Není úkol k vypsání.";
    }
  }
?>








<?php
$content = filter_input(INPUT_POST, 'content');
$submit = filter_input(INPUT_POST, 'submit');
$created_at = filter_input(INPUT_POST, 'created_at');
$message = 'stránka byla odeslána';
if (isset($submit)) {
    $message = 'Stránka byla načtena s odeslaným formulářem . <br>';
    $result = Klimo\TaskModel::addComment($content, $idTask, $_SESSION['id_user']);
    if ($result) {
        $message .= 'stránka byla odeslána LOL LOL';
    }
}
?>
     </div>
              </div>
              <span class="contact100-form-title">
					    Komentáře
				      </span>
              <form action="task_detail.php?id_task=<?php echo $task->id_task; ?>" method="post">
              <div class="wrap-input100 validate-input">
					    <span class="label-input100">Vaše zpráva</span>
					    <input class="input100" type="text" id="content" name="content" placeholder="">
				      </div>
              <div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button type="submit" id="submit" name="submit" class="contact100-form-btn">
							Okomentovat
							</button>
    </form>

</div>
<?php
$comments = Klimo\TaskModel::getComments();
?>
<table class="table">
<tbody>
<?php
foreach ($comments as $comment) {
    ?>
    <tr>
      <td><b><?php echo $comment->firstname . "  " . $comment->lastname;?></b></td>
      <td> <?php echo $comment->content; ?> </td>
      <td> <?php echo $comment->created_at; ?> </td>
      </tr>
        <?php
       }
?>
    </tbody>
        </table>
<footer>
<?php
require_once 'inc/footer.php';
?>
</footer>