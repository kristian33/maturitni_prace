<?php
use Klimo;
use core\plugininfo\filter;
include_once "inc/header.php";
?>
<div class="content-wrapper" style="min-height: 855px;">
  <?php
    $name = filter_input(INPUT_POST, 'name');
    $description = filter_input(INPUT_POST, 'description');
    $created_at = filter_input(INPUT_POST, 'created_at');
    $submit = filter_input(INPUT_POST, 'submit');
    $message = 'stránka byla odeslána';


    if (isset($submit)) {
        $message = 'Stránka byla načtena s odeslaným formulářem . <br>';
        $result = Klimo\TaskModel::addTasklist($name, $description, $created_at);
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
			<form action="addTasklist.php" method="post" class="contact100-form validate-form">
				<span class="contact100-form-title">
					Přidání úkolu
				</span>
				<div class="wrap-input100 validate-input">
					<span class="label-input100">Název úkolu</span>
					<input class="input100" type="text" id="text  " name="name" placeholder="">
				</div>

				<div class="wrap-input100 validate-input">
					<span class="label-input100">Popis úkolu</span>
					<input class="input100" type="description" id="description" name="description" placeholder="">
				</div>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate = "">
					<span class="label-input100">Vytvořeno</span>
					<input class="input100" type="datetime-local" id="created_at" name="created_at" value="YYYY-MM-DD HH:MM:SS" placeholder="">
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
    ?>