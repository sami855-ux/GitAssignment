<?php
declare(strict_types = 1);

function get_username(object $pdo ,string $username) {
          $query = "SELECT username FROM users WHERE username = :username;";
          $stmt = $pdo->prepare($query);
          $stmt->bindParam(":username", $username);
          $stmt->execute();

          $result = $stmt->fetch(PDO::FETCH_ASSOC);
          return $result;
}

function get_email(object $pdo ,string $email) {
    $query = "SELECT email FROM users WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function  set_user(Object $pdo, String $email, String $username, String $password,string $bDate, string $file_name, string  $edvalue)  {
    $query = "INSERT INTO users (username, birthDate, email,password, pp, Edvalue) VALUES (:username,:bDate,:email, :password, :file_name, :Edvalue);";
    $stmt = $pdo->prepare($query);

    $option = [
        'cost' => 12
    ];

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $option);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":bDate", $bDate);
    $stmt->bindParam(":password", $password);
    $stmt->bindParam(":file_name", $file_name);
    $stmt->bindParam(":Edvalue", $edvalue);
    $stmt->execute();

}