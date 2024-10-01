<?php
require_once('../core/functions.php');
// echo "<pre>";
// var_dump($_SERVER);
// echo "</pre>";


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
} else {
    echo "Not Supported Method";
}
