<?php

namespace Klimo;

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
$roleName = UsersModel::getRole();
//var_dump($roleName);
//die();
if (!in_array($roleName, ['ADMINISTRÁTOR', 'ZADAVATEL', 'REALIZÁTOR'])) {
    header('location: Login/login.php');
}

require_once __DIR__ . DIRECTORY_SEPARATOR . 'menu.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="dist/css/form.css">
    <link rel="stylesheet" href="./dist/css/adminlte.css">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="dist/img/icons/favicon.ico"/>
<!--===============================================================================================-->
<?php	/*<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="dist/fonts/font-awesome-4.7.0/dist/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="dist/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="dist/css/util.css"> */ ?>
    <title>Maturitní práce - Klimek</title>
</head>
<body>
