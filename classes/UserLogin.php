<?php
include_once "classes/UsersModel.php";
class UserLogin
{
    const SALT = '$2a$09$anexamplestringforsalt$';
    public static function authenticate($email, $password)
    {
        $saltedPassword = crypt($password, self::SALT);
        var_dump($saltedPassword);
        if (($email) && ($password)) {
            $_SESSION['loggedEmail'] = $email;
            return TRUE;
        }
        return FALSE;
    }
}
