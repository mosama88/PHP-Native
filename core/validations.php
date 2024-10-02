<?php



function InputVal($input)
{
    if (empty($input)) {
        return true;
    }
    return false;
}


function InputValMax($input, $length)
{
    if (strlen(($_POST[$input])) > $length) {
        return true;
    }
    return false;
}

function InputValMin($input, $length)
{
    if (strlen(($_POST[$input])) < $length) {
        return true;
    }
    return false;
}


function emailVal($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    return true;
}
