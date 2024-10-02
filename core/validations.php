<?php



function InputVal($input)
{
    if (empty($_POST[$input])) {
        return false;
    }
    return true;
}

function InputValMax($input, $length)
{
    if (strlen(($_POST[$input])) > $length) {
        return false;
    }
    return true;
}

function InputValMin($input, $length)
{
    if (strlen(($_POST[$input])) < $length) {
        return false;
    }
    return true;
}


function emailVal($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    return true;
}
