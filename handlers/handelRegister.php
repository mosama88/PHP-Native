<?php
require_once('../core/functions.php');
require_once('../core/validations.php');

session_start();

// $errors = array();
$errors = [];

if (checkMethodRequest("POST") && checkRequestInput('email')) {
    // $name  = sanitizeInput(checkMethod('name'));
    // $email = sanitizeInput(checkMethod('email'));
    // $password = sanitizeInput(checkMethod('password'));

    foreach ($_POST as $key => $value) {
        $$key = sanitizeInput($value);
    }

    echo $name . "<br>";
    echo $email . "<br>";
    echo $password . "<br>";



    // validations Name
    if (!InputVal("name")) {
        $errors[] = "Please Write Your Name";
    } elseif (!InputValMax("name", 25)) {
        $errors[] = "Please Write less Than 3 Chars";
    } elseif (!InputValMin("name", 5)) {
        $errors[] = "Please Write More Than 3 Chars";
    }
    echo "<br>";
    // validations Email
    if (!InputVal("email")) {
        $errors[] = "Please Write Your Mail";
    } elseif (!emailVal($_POST["email"])) {
        $errors[] = "Please Write Your Mail as Email";
    }
    echo "<br>";
    // validations Password
    if (!InputVal("password")) {
        $errors[] = "Please Write Your Password";
    }
    if ($_POST["password"] != $_POST["password_confirm"]) {
        $errors[] = "Your Password Not Match";
    }
} else {
    $errors[] = "Not Supported Method";
}

if (empty($errors)) {
    echo "Your Data Send Successfully";
} else {
    $_SESSION['errors'] = $errors;
    header("location: ../register.php");
    die();
}
echo "<pre>";
var_dump($errors);
echo "</pre>";
