<?php

namespace Klimo;

use Illuminate\Database\Capsule\Manager as DB;

class TaskModel extends Model
{
    public static function getTask($idTask)
    {
        $tasks = DB::select("SELECT * FROM tasks WHERE id_task = $idTask");
        return $tasks[0];
    }
    public static function addTask($title, $description, $datetime_from, $datetime_to, $id_tasklist)
    {

        $result = DB::insert(
            "INSERT INTO tasks
                         (title,
                         description,
                         datetime_from,
                         datetime_to,
                         id_tasklist)
                         VALUES(
                             '$title',
                             '$description',
                             '$datetime_from',
                             '$datetime_to',
                             '$id_tasklist');"
        );
        return $result;
    }

    public static function getTasksByTasklist($idTasklist)
    {
        $tasks = DB::select("SELECT * FROM tasks WHERE id_tasklist = $idTasklist");
        return $tasks;
    }

    public static function getTasklists()
    {
        $tasklists = DB::select("SELECT * FROM tasklists");
        return $tasklists;
    }
    public static function updateTask($title, $description, $datetime_from, $datetime_to, $id_task)
    {
        $result = DB::update(
            "UPDATE tasks SET title = '$title',
           description = '$description',
           datetime_from = '$datetime_from',
           datetime_to = '$datetime_to'
          WHERE id_task = '$id_task';");
        return $result;
    }
    public static function addComment($content, $id_task, $id_user)
    {
        $result = DB::insert(
            "INSERT INTO comment
                         (content,
                         task_id,
                         user_id,
                         created_at)
                         VALUES(
                             '$content',
                             '$id_task',
                             '$id_user',
                             now());"
        );
        return $result;
    }

    public static function addTasklist($name, $description, $created_at)
    {

        $result = DB::insert(
            "INSERT INTO tasklists
                         (name,
                         description,
                         created_at)
                         VALUES(
                             '$name',
                             '$description',
                             '$created_at');"
        );
        return $result;
    }

    public static function getComments()
    {
        $comments = DB::select(
            "SELECT u.firstname, u.lastname, c.content, c.created_at FROM comment c
            JOIN users u 
            ON c.user_id = u.id_user;");
        return $comments;
    }
}
