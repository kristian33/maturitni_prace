<?php
include_once "inc/header.php";
include_once "inc/footer.php";
?>
<?php
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        $firstname = filter_input(INPUT_POST, 'firstname');
        $lastname = filter_input(INPUT_POST, 'lastname');
        $address = filter_input(INPUT_POST, 'address');
        $city = filter_input(INPUT_POST, 'city');
        $submit = filter_input(INPUT_POST, 'submit');
        $message = 'stránka byla odeslána';
        

        if(isset($submit)) {
          $message = 'Stránka byla načtena s odeslaným formulářem . <br>';
            $result = UsersModel::addUser($email, $password, $firstname, $lastname, $address, $city);
            if($result){
              $message .= 'stránka byla odeslána LOL LOL';
            }
        }
?>

<h2>UŽÍVATEL</h2>

<form action="addUser.php" method="post">
<label for="emial">Email:</label><br>
  <input type="text" id="email" name="email" value="xxx@xxx.xx"><br><br>
  <label for="password">Vaše heslo:</label><br>
  <input type="password" id="saltedPassword" name="password" value="password"><br><br>
  <label for="firstname">Jméno:</label><br>
  <input type="text" id="firstname" name="firstname" value="Jmeno"><br>
  <label for="lastname">Přijmení:</label><br>
  <input type="text" id="lastname" name="lastname" value="Prijmeni"><br><br>
  <label for="address">Bydliště:</label><br>
  <input type="text" id="address" name="address" value="address"><br><br>
  <label for="city">Město:</label><br>
  <input type="text" id="city" name="city" value="city"><br><br>
  <input type="submit" name="submit" value="Přidání uživatele">

</form>
<style>
  body, form {
    text-align: center;
}
form {
    display: inline-block;
}
</style>

</body>
</html>
