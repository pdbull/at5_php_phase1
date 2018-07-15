<?php
/**
 * Created by PhpStorm.
 * User: pauld
 * Date: 7/13/2018
 * Time: 12:19 PM
 */

 function checkPassword($pwd) {
     $error = '';

    if (strlen($pwd) < 8) {
        $error = "Password too short!";
    }

    if (!preg_match("#[0-9]+#", $pwd)) {
        $error = "Password must include at least one number!";
    }

    if (!preg_match("#[a-zA-Z]+#", $pwd)) {
        $error = "Password must include at least one letter!";
    }

    return $error;
}

  function checkPasswordMatch($pwd1, $pwd2,&$errors){
    $errors_init = $errors;
    if(trim($$pwd1) =='' || trim($pwd2)=='')
    {
        $errors[] = "All fields are required";
    }
    else if($pwd1 != $pwd2)
    {
        $errors[] = "Passwords do not match";
    }

    return ($errors == $errors_init);
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}