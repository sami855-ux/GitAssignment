<?php


if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    try {
        $errors = [];
        require_once 'dbh.php';
        require_once 'login.model.php';
        require_once 'login.contr.php';

         //Error handling
     if(is_input_empty($username, $password)) {
            $errors["empty_input"] = "Fill in all filed!!";
      }

      $result = get_user($pdo, $username);

      if(is_username_wrong($result)) {
        $errors["Login_incorrect"] = "Invalid Username";
      }
      if(!is_username_wrong($result) && is_password_wrong($password, $result["password"])) {
        $errors["Login_incorrect2"] = "Incorrect Password";
      }

      require_once 'configSeesion.php';

      if($errors) {
          $_SESSION["errors_login"] = $errors;
          header("Location: ../login.php");
          die();
      }

      $newSesssionId = session_create_id();
      $sessionId = $newSesssionId . "_" . $result["id"];
      session_id($sessionId);

      $_SESSION["user_id"] = $result["id"];
      $_SESSION["user_username"] = htmlspecialchars($result["username"]);
      $_SESSION["pp"] = htmlspecialchars($result["pp"]);
      $_SESSION["email"] = $result["emial"];

     

      header("Location: ../login.php?login=sucess");
      header("Location: ../main.php?username=". $username);
      
      die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    } 
} else {
    header("Location: ../login.php");
    die();
}