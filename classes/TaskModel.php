<?php
use Illuminate\Database\Capsule\Manager as DB;

class TaskModel extends Model{
    public static function getTask(){
    $tasks = DB::select('SELECT * FROM task');
return $tasks;
}
public static function addTask($title, $description, $datetime_from, $datetime_to) {
         

    $result = DB::insert("INSERT INTO task 
                         (title,
                         description,
                         datetime_from,
                         datetime_to)
                         VALUES(
                             '$title',
                             '$description',
                             '$datetime_from',
                             '$datetime_to');"
                             );
 return $result;
}
}