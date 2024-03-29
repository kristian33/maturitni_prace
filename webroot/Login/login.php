<?php
require_once '../vendor/autoload.php';
//use core\plugininfo\filter;
use Klimo\UsersModel;

$submit = filter_input(INPUT_POST, 'submit');
$logout = filter_input(INPUT_GET, 'logout');
$role = UsersModel::getRole();
if (isset($submit)) {
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    $authenticate = Klimo\UsersModel::authenticate($email, $password);
    if ($authenticate == TRUE) {
        header('location: ../index.php');
    }
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
        ?> <p>Byli jste úspěšně odhlášeni</p>
        <?php
    }
    ?>
    <h1>
    <?php
    if (isset($_SESSION['loggedEmail'])) {
        ?> <p>Jsi přihlášen jako <?php echo $_SESSION['loggedEmail']; ?> <?php echo "s rolí $role"; ?>
        <?php $_SESSION['loggedEmail']
        ?>  <a href="logout.php"><p> Odhlasit se</a>
        </p>
        <?php
    }
    ?>
    <?php
    if (isset($submit) && !$authenticate) { ?>
            <p style="color: red;">Špatné přihlašovací údaje</p>
            <?php
    }
    ?>
</h1>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="cs">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="css/style.css">

    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>Laravel</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="../index.php">Maturitní práce</a>
        <button class="navbar-toggler" type="button" 
        data-toggle="collapse" data-target="#navbarSupportedContent" 
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Přihlášení</div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="email" id="email" class="form-control" name="email" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" required>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button name="submit" type="submit" id="submit" class="btn btn-primary">
                                    Přihlásit
                                </button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</main>
<?php require "../inc/footer.php";