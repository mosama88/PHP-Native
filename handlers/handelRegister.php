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

    echo $name . "<br>";
    echo $email . "<br>";
    echo $password . "<br>";



    // validations Name
    if (InputVal($name)) {
        $errors[] = "Please Write Your Name";
    } elseif (InputValMax($name, 25)) {
        $errors[] = "Please Write less Than 25 Chars";
    } elseif (InputValMin($name, 5)) {
        $errors[] = "Please Write More Than 5 Chars";
    }
    echo "<br>";
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
    if ($password != $_POST["password_confirm"]) {
        $errors[] = "Your Password Not Match";
    }
} else {
    $errors[] = "Not Supported Method";
}

if (empty($errors)) {

    $users_file = fopen("../data/users.csv", "a+");
    $data = [$name, $email, sha1($password)];
    fputcsv($users_file, $data);
    $_SESSION['auth'] = [$name, $email];
    redirect("../index.php");
    die();
} else {
    $_SESSION['errors'] = $errors;
    redirect("../register.php");
    die();
}
