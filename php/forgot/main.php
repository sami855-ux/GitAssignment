<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $bDate = $_POST["date"];
    $crePassword = $_POST["changepassword"];
    $password = $_POST["confirmpassword"];
    $bDateSame;
    $emailSame;
    

    try {

        $errors = [];
        require_once '../dbh.php';
        require_once 'forgot.model.php';
        require_once 'forgot.contr.php';

      if(is_input_empty($email, $bDate, $crePassword, $password)) {
            $errors["empty_input"] = "Fill in all filed!!";
       }

      if(password_same($password, $crePassword )){
        $errors["password_incorrect"] = "Password is not the same";
       }

       $result = get_email($pdo, $email);

       if(is_email_wrong($result)) {
        $errors["Login_incorrect"] = "Invalid email";
       }

       $res = get_birthDate( $pdo, $bDate);

       if( is_birthdate_wrong($res)) {
        $errors["Login_incorrect"] = "Invalid birthdate";
       }

       if(is_email_invalid($email)) {
        $errors["invalid_email"] = "Invalid email is used";
    }
    require_once '../configSeesion.php';
    
    if($errors) {
        $_SESSION["errors_forgot"] = $errors;
        header("Location: ../../Changepwd.php");
        die();
    }
       
     if($result) {
        $user_id = $result['id'];
        try {
            $stmt = $pdo->prepare("UPDATE users SET password = :password WHERE id = :id");
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':id', $user_id);
            $stmt->execute();
            
          
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        } 
     }
     else {
        $errors["invalid_email"] =  "User not found";
    }
        
    if($errors) {
                $_SESSION["errors_forgot"] = $errors;
                header("Location: ../../Changepwd.php");
                die();
            }
       
        header("Location: ../../Changepwd.php?forgot=success");

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    } 
}
else {
    header("Location: ../pwdChange.php");
    die();

}