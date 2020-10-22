<?php
use core\plugininfo\filter;
include_once "./inc/header.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./dist/css/adminlte.css">
    <title>Document</title>
</head>
<body>
<h1>Přidání úkolu</h1>
<?php
$title = filter_input(INPUT_POST, 'title');
$description = filter_input(INPUT_POST, 'description');
$datetime_from = filter_input(INPUT_POST, 'datetime_from');
$datetime_to = filter_input(INPUT_POST, 'datetime_to');
$submit = filter_input(INPUT_POST, 'submit');
$message = 'stránka byla odeslána';


if (isset($submit)) {
  $message = 'Stránka byla načtena s odeslaným formulářem . <br>';
  $result = TaskModel::addTask($title, $description, $datetime_from, $datetime_to);
  if ($result) {
    $message .= 'stránka byla odeslána';
  }
}
?>
<?php
$datetimestring = "2020-09-30T15:16";
$SQLdatetime = date("Y-m-d H:i:s", strtotime($datetimestring));
?>
<div class="form">
<form action="addTask.php" method="post">
<label for="nazev">Název úkolu:</label><br>
  <input type="text" id="title" name="title" value="title"><br><br>
  <label for="title">Popis:</label><br>
  <input type="description" id="description" name="description" value="description"><br><br>
  <label for="datetime_from">Čas od kolika:</label><br>
  <input type="datetime-local" id="datetime_from" name="datetime_from" value="YYYY-MM-DD HH:MM:SS"><br><br>
  <label for="datetime_to">Čas do kolika:</label><br>
  <input type="datetime-local" id="datetime_to" name="datetime_to" value="YYYY-MM-DD HH:MM:SS"><br><br>
  <input type="submit" name="submit" value="Pridani ukolu">
</form> 
</div>
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