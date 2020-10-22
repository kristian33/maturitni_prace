<?php
define('DB_SERVER', 'localhost:3308');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_DATABASE', 'maturitni_prace');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>
<?php
use core\plugininfo\filter;
include_once "inc/header.php";
include_once "inc/footer.php";
include_once "classes/UsersModel.php";
?>
<?php
session_start();
$submit = filter_input(INPUT_POST, 'submit');
$logout = filter_input(INPUT_GET, 'logout');
if (isset($submit)) {
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password'); 
    $authenticated = UserLogin::authenticate($email, $password);
}
?>

<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($logout)) {
    ?> <p>Byli jste úspěšně dohlášeni</p>
    <?php
    }
    if (isset($_SESSION['loggedEmail'])) {
    ?> <p>Luxus! Jsi přihlášen jako
            <? $_SESSION['loggedEmail'];?> <a href="logout.php">Odhlasit se</a>
        </p>
    <?php } else { ?>

        <h1>Přihlašovací formulář</h1>
        <form action="login.php" method="post">
            <label for="email">Přihlašovací email:</label>
            <input type="email" name="email" id="email">
            <label for="password">Heslo:</label>
            <input type="password" name="password" id="password">
            <input type="submit" name="submit" id="submit" value="Přihlasit se">
        </form>
        <?php 
        if(isset($submit) && !$authenticated) { ?>
        <p style="color: red;">Špatné přihlašovací údaje</p>            
        <?php } ?>
    <?php } ?>
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