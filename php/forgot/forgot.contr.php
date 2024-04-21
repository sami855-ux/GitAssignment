<?php

declare(strict_types = 1);

function is_input_empty(string $email, string $bDate, string $crePassword, string $password) {
    if(empty($email) || empty($bDate) || empty($crePassword) || empty($password)) {
        return true;
  }
  else{
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

function is_email_wrong(bool | array $result) {
    if(!$result) {
        return true;
    }
    else {
     
        return false;
    }
}
function is_birthdate_wrong(bool | array $res) {
    if(!$res) {
        return true;
    }
    else {
        
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