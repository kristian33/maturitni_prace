<?php

namespace Klimo;

use Illuminate\Database\Capsule\Manager as DB;
$db = new DB;
$db->addConnection(
    [
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'maturitni-prace',
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci'
    ]
);

$db->setAsGlobal();
    $db->bootEloquent();

class Model
{
}
?>
