<?php

declare(strict_types = 1);

function update_password(Object $pdo,String $password, string $id)  {
    $query = "UPDATE users SET password = $password WHERE id = $id;";
    $stmt = $pdo->prepare($query);

    $option = [
        'cost' => 12
    ];

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $option);
    $stmt->bindParam(":password", $password);
    $stmt->bindParam(":id", $id);
  
    $stmt->execute();

}
function get_email(object $pdo,string $email) {
    $query = "SELECT *  FROM users WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_birthDate(object $pdo,string $bDate) {
    $query = "SELECT *  FROM users WHERE birthDate = :bDate;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":bDate", $bDate);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}