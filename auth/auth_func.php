<?php

require "../shared/config.php";


function checkUser($name, $email)
{
    global $con;
    $sqlEmailCheck = <<<SQL
    SELECT * FROM users
    WHERE email = '$email'
    SQL;
    $sqlNameCheck = <<<SQL
    SELECT * FROM users
    WHERE name = '$name'
    SQL;
    $nameCheck = mysqli_query($con, $sqlNameCheck);
    $emailCheck = mysqli_query($con, $sqlEmailCheck);
    if (mysqli_num_rows($nameCheck) > 0 || mysqli_num_rows($emailCheck) > 0) {
        return true; // user found
    }
    return false; // user not found
}

function createUser($name, $email, $password)
{
    if (checkUser($name, $email) == false) {
        global $con;
        $sql = <<<SQL
            INSERT INTO users (name, email, password)
            VALUES ('$name', '$email', '$password')
            SQL;
        mysqli_query($con, $sql);
        header("Location: auth.php");
        exit();
    }else{
        header("Location: auth.php");
        exit();
    }
}

function signIn($email, $password)
{
    global $con;
    $sql = <<<SQL
    SELECT * FROM users 
    WHERE email='$email' and password='$password'
    SQL;
    $result = mysqli_query($con, $sql);
    $user = mysqli_fetch_assoc($result);
    if ($user) {
        define("USER_ID", $user['user_id']);
        session_start();
        $_SESSION['name'] = $user['name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['user_id'] = $user['user_id'];
        if($user['email'] == "admin@gmail.com" && $user['name'] == "admin"){
            header('Location: ../view/dashboard/dashboard.php');
        }else{
            header('Location: ../view/home/home.php');
        }
        exit();
    } else {
        header("Location: auth.php");
        echo "User: $user";
        exit();
    }
}
