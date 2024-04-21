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

function get_comment(object $pdo, string $username) {
    $query = "SELECT *  FROM posts WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function  set_comment(Object $pdo, String $username, string $current_date, string  $current_time,  String $mainIdea, String $text){
    $query = "INSERT INTO posts (username, Date, time, header, text) VALUES (:username,:current_date, :current_time, :mainIdea, :text);";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":current_date", $current_date);
    $stmt->bindParam(":current_time", $current_time);
    $stmt->bindParam(":mainIdea", $mainIdea);
    $stmt->bindParam(":text", $text);
    $stmt->execute();

}