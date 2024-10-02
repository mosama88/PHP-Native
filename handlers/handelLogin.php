<?php
require_once('../core/functions.php');
require_once('../core/validations.php');

session_start();

// $errors = array();
$errors = [];

if (checkMethodRequest("POST") && checkRequestInput('email')) {
    // $name = sanitizeInput($_POST['name']);
    // $email = sanitizeInput($_POST['email']);
    // $password = sanitizeInput($_POST['password']);

    foreach ($_POST as $key => $value) {
        $$key = sanitizeInput($value);
    }

    echo $email . "<br>";
    echo $password . "<br>";



    // validations Email
    if (InputVal($email)) {
        $errors[] = "Please Write Your Mail";
    } elseif (!emailVal($email)) {
        $errors[] = "Please Write Your Mail as Email";
    }
    echo "<br>";
    // validations Password
    if (InputVal($password)) {
        $errors[] = "Please Write Your Password";
    }
} else {
    $errors[] = "Not Supported Method";
}

if (empty($errors)) {

    $users_file = fopen("../data/users.csv", "a+");
    $data = [$email, sha1($password)];
    $user_found = false;

    if ($users_file == $data[0]) {
        $_SESSION['auth'] = [$email, sha1($password)];
        redirect("../index.php");
        die();
    } else {
        echo "User Name and Password Is Faild";
    }
} else {
    $_SESSION['errors'] = $errors;
    redirect("../login.php");
    die();
}
