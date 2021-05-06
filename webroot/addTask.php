<?php
use Klimo\TaskModel;
use core\plugininfo\filter;
include_once "inc/header.php";
?>
<div class="content-wrapper" style="min-height: 855px;">
  <?php
    $title = filter_input(INPUT_POST, 'title');
    $description = filter_input(INPUT_POST, 'description');
    $datetime_from = filter_input(INPUT_POST, 'datetime_from');
    $datetime_to = filter_input(INPUT_POST, 'datetime_to');
	$id_tasklist = filter_input(INPUT_POST, 'id_tasklist');
	$tasklists = Klimo\TaskModel::getTasklists();
    $submit = filter_input(INPUT_POST, 'submit');
    $message = 'stránka byla odeslána';


    if (isset($submit)) {
        $message = 'Stránka byla načtena s odeslaným formulářem . <br>';
        $result = Klimo\TaskModel::addTask($title, $description, $datetime_from, $datetime_to, $id_tasklist);
        if ($result) {
            $message .= 'stránka byla odeslána';
        }
    }
    ?>
  <?php
    if (in_array($roleName, ['ADMINISTRÁTOR', 'ZADAVATEL', 'REALIZÁTOR'])) {
        $datetimestring = "2020-09-30T15:16";
        $SQLdatetime = date("Y-m-d H:i:s", strtotime($datetimestring));
        ?>

	<div class="container-contact100">
		<div class="wrap-contact100">
			<form action="addTask.php" method="post" class="contact100-form validate-form">
				<span class="contact100-form-title">
					Přidání úkolu
				</span>
				<div class="wrap-input100 validate-input">
					<span class="label-input100">Název úkolu</span>
					<input class="input100" type="text" id="text  " name="title" placeholder="">
				</div>

				<div class="wrap-input100 validate-input">
					<span class="label-input100">Popis úkolu</span>
					<input class="input100" type="description" id="description" name="description" placeholder="">
				</div>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="">
					<span class="label-input100">Čas od kolika</span>
					<input class="input100" type="datetime-local" id="datetime_from" name="datetime_from"  value="YYYY-MM-DD HH:MM:SS" placeholder="">
				</div>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate = "">
					<span class="label-input100">Čas do kolika</span>
					<input class="input100" type="datetime-local" id="datetime_to" name="datetime_to" value="YYYY-MM-DD HH:MM:SS" placeholder="">
				</div>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate = "">
					<span class="label-input100">Výpis úkolů</span>
					<div class="wrap-input100 validate-input">
				<select class="input100" id="id_tasklist" name="id_tasklist">
				<?php foreach ($tasklists as $tasklist) {
            	?>
    			<option class="input100" value=<?php echo $tasklist->id_tasklist; ?> id="id_tasklist"><?php echo $tasklist->name;?> </option>
				<?php } ?>
  				</select>
				</div>

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button type="submit" id="submit" name="submit" class="contact100-form-btn">
							Přidat
							</button>
					</div>
				</div>
			</form>
		</div>
	</div>



  <?php
  }
  require_once 'inc/footer.php';
?>