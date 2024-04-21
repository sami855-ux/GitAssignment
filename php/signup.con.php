<?php
declare(strict_types = 1);

function is_input_empty(string $username, string $email,string $password,string $bDate, string $edvalue):bool {
    if(empty($username) || empty($email)  || empty($password)||  empty($bDate)  || empty($edvalue)) {
            return true;
    } else {
        return false;
    }
}

function is_email_invalid(string $email):bool {
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    else {
        return false;
    }
}
function is_username_taken(object $pdo, string $username) :bool {
    if(get_username($pdo ,$username)) {
        return true;
    }
    else {
        return false;
    }
}
function password_same(string $password, string $crePassword ) {
       if($password !== $crePassword) {
         return true;
       } else {
            return false;
       }
}

function is_email_register(object $pdo, string $email) {
    if(get_email($pdo ,$email)) {
        return true;
    }
    else {
        return false;
    }
}

function password_short(string $password) {
    if(count($password) < 5) {
        return true;
    }
    else {
        return false;
    }
}
function create_user(object $pdo, string $email, string $username, string $password, string $bDate, string $file_name, string $edvalue) {
    set_user( $pdo,  $email,  $username,  $password, $bDate, $file_name, $edvalue);
}
