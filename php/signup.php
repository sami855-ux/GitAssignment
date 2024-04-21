<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $email = $_POST["email"];
    $bDate = $_POST["bDate"];
    if($_POST["edvalue"]!=0) {

        $edvalue = $_POST["edvalue"];
    }
    $ppicture = $_FILES["ppicture"];
    // $crePassword = $_POST["createpass"];
    $password = $_POST["confiPass"];

    
    $file_name = $_FILES["ppicture"]["name"];
    $file_tmp = $_FILES["ppicture"]["tmp_name"];
    $file_size = $_FILES["ppicture"]["size"];
    $file_error = $_FILES["ppicture"]["error"];
    $file_type = $_FILES["ppicture"]["type"];
   
    try {

        $errors = [];
        $file_ext = explode('.', $file_name);
        $fileactual_ext = strtolower(end($file_ext));
    
        $allwed = array('jpg', 'jpeg', 'png');
       require_once 'dbh.php';
       require_once 'siginup.modul.php';
       require_once 'signup.con.php';
       
       //Error handling

        if(is_input_empty($username, $email, $password, $bDate, $edvalue)) {
              $errors["empty_input"] = "Fill in all filed!!";
        }
        if(is_email_invalid($email)) {
            $errors["invalid_email"] = "Invalid email is used";
            //49 minutes
            
        }
        if(is_username_taken($pdo, $username)) {
            $errors["username_taken"] = "Entered Username is taken";


        }
        if(is_email_register($pdo,$email)) {
            $errors["email_used"] = "Email alarady Registered!";

        }
        if(in_array($fileactual_ext, $allwed)) {
            if($file_error === 0) {
                if($file_size < 1000000) {
                    // $filenewname = uniqid('', true). ".". $fileactual_ext;

                    $filedestination = '../upload/'.$file_name;

                    move_uploaded_file($file_tmp,  $filedestination);
                    echo "samuel is added";
                }
                else {
                    $errors["file_invalid"] = "File is too long";  
                }
            } else {
                $errors["file_invalid"] = "Error on uploading your file";
            }
        } else {
            $errors["file_invalid"] = "You can not upload this file";
        }
        require_once 'configSeesion.php';

        if($errors) {
            $_SESSION["errors_signup"] = $errors;
            header("Location: ../register.php");
            die();
        }
        
        create_user($pdo,  $email,  $username,  $password, $bDate, $file_name, $edvalue);
        header("Location: ../register.php?signup=success");

        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    } 

} else {
    header("Location: ../register.php");
    die();
}