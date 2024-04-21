<?php 

if($_SERVER["REQUEST_METHOD"] === "POST") {
   
    $username = $_POST["username"];
    $mainIdea = $_POST["mainIdea"];
    $text = $_POST["comment"]; 
    $current_date = date('Y-m-d');
    $current_time = date('H:i:s');
    
    
    try {
        
        $errors = [];


        require_once '../dbh.php';
        require_once 'post.model.php';
        require_once 'post.cont.php';

        //Error handling
        if(is_input_empty($username, $mainIdea, $text)) {
            $errors["empty_input"] = "Fill in all filed!!";
        }
        if(is_username_incorrect($pdo,$username)) {
            $errors["email_used"] = "There is no such username!";

        }
       
        
        $result = get_comment($pdo,$username);


        require_once '../configSeesion.php';

        if($errors) {
            $_SESSION["errors_signup"] = $errors;
            header("Location: ../../post.php");
            die();
        }

        set_comment($pdo, $username, $current_date, $current_time, $mainIdea,  $text);
        header("Location: ../../post.php?post=sucess");

        die();




    } catch (PDOException $e) {
        die("Query failed asam : " . $e->getMessage());
    }


} else {
    header("Location: ../../post.php");
    die();
}