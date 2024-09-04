<?php
class user
{
    public $id;
    public $firstname;
    public $lastname;
    public $username;
    public $password;
    public $role;
    public $email;

    public static function validateUser($username, $password)
    {
        $conn = database::start();
        $user = null;

        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);

        $sql = "SELECT * FROM users WHERE user_username = '$username' AND user_password = '$password'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $user = new user;
            $user->id = $row['user_id'];
            $user->firstname = $row['user_firstname'];
            $user->lastname = $row['user_lastname'];
            $user->username = $row['user_username'];
            $user->password = $row['user_password'];
            $user->role = $row['user_role'];
            $user->email = $row['user_email'];
        }
        $conn->close();
        return $user;
    }
    //deze functie haalt (aan de hand van de gegeven ID) klantgegevens op uit de database
    public static function findById($id)
    {
        $conn = database::start();
        $user = null;

        $sql = "SELECT * FROM users WHERE user_id = $id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $user = new user;
            $user->id = $row['user_id'];
            $user->firstname = $row['user_firstname'];
            $user->lastname = $row['user_lastname'];
            $user->username = $row['user_username'];
            $user->password = $row['user_password'];
            $user->role = $row['user_role'];
            $user->email = $row['user_email'];
            $conn->close();
            return $user;
        }
    }

}
