<?php
require_once "inc/header.php";
use Klimo\UsersModel;
?>
<div class="content-wrapper" style="min-height: 855px;">
<?php
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
$firstname = filter_input(INPUT_POST, 'firstname');
$lastname = filter_input(INPUT_POST, 'lastname');
$address = filter_input(INPUT_POST, 'address');
$city = filter_input(INPUT_POST, 'city');
$id_role = filter_input(INPUT_POST, 'id_role');
$submit = filter_input(INPUT_POST, 'submit');
$message = 'stránka byla odeslána';

if (isset($submit)) {
     $message = 'Stránka byla načtena s odeslaným formulářem . <br>';
     $result = UsersModel::addUser($email, $password, $firstname, $lastname, $address, $city, $id_role);
    if ($result) {
        $message .= 'stránka byla odeslána LOL LOL';
    }
}
?>
<?php
if (in_array($roleName, ['ADMINISTRÁTOR'])) {
    ?>

	<div class="container-contact100">
		<div class="wrap-contact100">
			<form action="addUser.php" method="post" class="contact100-form validate-form">
				<span class="contact100-form-title">
					Přidání uživatele
				</span>
				<div class="wrap-input100 validate-input">
					<span class="label-input100">E-Mail</span>
					<input class="input100" type="email" id="email" name="email" placeholder="">
				</div>

				<div class="wrap-input100 validate-input">
					<span class="label-input100">Heslo</span>
					<input class="input100" type="password" id="saltedPassword" name="password" placeholder="">
				</div>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="">
					<span class="label-input100">Jmeno *</span>
					<input class="input100" type="text" id="firstname" name="firstname" placeholder="">
				</div>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate = "">
					<span class="label-input100">Příjmení *</span>
					<input class="input100" type="text" id="lastname" name="lastname" placeholder="">
				</div>

				<div class="wrap-input100 validate-input">
					<span class="label-input100">Bydliště</span>
					<input class="input100" type="text" id="address" name="address" placeholder="">
				</div>

				<div class="wrap-input100 validate-input">
					<span class="label-input100">Město</span>
					<input class="input100" type="text" id="city" name="city" placeholder="">
				</div>

				<div class="wrap-input100 validate-input">
				<span class="">Role</span>
				<select class="input100 id="id_role" name="id_role">
    			<option class="input100" value="2" id="id_role">Zadavatel</option>
    			<option class="input100" value="3" id="id_role">Realizátor</option>
    			<option class="input100" value="4" id="id_role">Administrátor</option>
  				</select> <br><br>
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



	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
 <script src="dist/js/main.js"></script>

<?php
}
?>