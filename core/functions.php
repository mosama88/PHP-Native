<?php


// checkMethodRequest

// checkRequestInput  


function checkMethodRequest($method)
{
    if ($_SERVER["REQUEST_METHOD"] == $method) {
        return true;
    } else {
        return false;
    }
}


function checkRequestInput($input)
{
    if (isset($_POST[$input])) {
        return true;
    } else {
        return false;
    }
}


function sanitizeInput($input)
{

    return   trim(htmlspecialchars(htmlentities($input)));
}
