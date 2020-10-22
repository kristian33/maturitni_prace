<?php
use Illuminate\Database\Capsule\Manager as DB;
require_once "UserLogin.php";
class UsersModel extends Model {
        public static function getUsers() {
            $users=DB::select("SELECT * FROM users");
            return $users;
        }
        const SALT = '$2a$09$anexamplestringforsalt$';
        public static function addUser($email, $password, $firstname, $lastname, $address, $city) {
            $saltedPassword = crypt($password, self::SALT);
            var_dump($saltedPassword);
        
                $result = DB::insert("INSERT INTO users 
                                    (email,
                                     password,
                                     firstname,
                                     lastname,
                                     address,
                                     city)
                                     VALUES(
                                         '$email',
                                         '$saltedPassword',
                                         '$firstname',
                                         '$lastname',
                                         '$address',
                                         '$city');"
                                         );
             return $result;
        }
        

}

?>