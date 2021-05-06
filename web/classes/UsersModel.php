<?php

namespace Klimo;

use Illuminate\Database\Capsule\Manager as DB;

class UsersModel extends Model {
    private const SALT = '$2a$09$anexamplestringforsalt$';

    public static function getUsers()
    {
        $users = DB::select("SELECT * FROM users");
        return $users;
    }

    public static function authenticate(string $email, string $password): bool
    {
        $saltedPassword = crypt($password, self::SALT);
        //echo "SELECT * FROM users WHERE email LIKE '$email' AND password LIKE '$saltedPassword'";
        $authenticate = DB::select("SELECT * FROM users WHERE email LIKE '$email' AND password LIKE '$saltedPassword'");
        if (count($authenticate) > 0) {
            //session_start();
            $_SESSION['loggedEmail'] = $email;
            $_SESSION['id_user'] = $authenticate[0]->id_user;
            return true;
        }
        return false;
    }
    public static function addUser($email, $password, $firstname, $lastname, $address, $city, $id_role)
    {
        $saltedPassword = crypt($password, self::SALT);
        $result = DB::insert(
            "INSERT INTO users 
                                    (email,
                                     password,
                                     firstname,
                                     lastname,
                                     address,
                                     city,
                                     id_role)
                                     VALUES(
                                         '$email',
                                         '$saltedPassword',
                                         '$firstname',
                                         '$lastname',
                                         '$address',
                                         '$city',
                                         '$id_role');"
        );
        return $result;
    }
    public static function getRole(): string
    {
        session_start();
        $roleName = "guest";
        if (isset($_SESSION['loggedEmail'])) {
            $role = DB::select(
                "SELECT name AS role
            FROM users u 
            JOIN roles r ON u.id_role = r.id_role
            WHERE u.email LIKE '" . $_SESSION['loggedEmail'] . "'"
            );
            if (count($role) > 0) {
                $roleName = $role[0]->role;
            }
        }
        return $roleName;
    }
}