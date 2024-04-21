<?php
declare(strict_types = 1);
//errors_forgot
function check_signup_errors() {
    if(isset($_SESSION["errors_forgot"])) {
        $errors =$_SESSION["errors_forgot"];

        echo"<br/>";

        foreach($errors as $error) {
            echo '<p class = "form-errors">'. $error. '</p>';
        }

        unset($_SESSION["errors_forgot"]);
    } else if(isset($_GET["forgot"]) && $_GET["forgot"] === "success") {
        echo "<br/>";
        echo "<p class='form-sucess'>Password changed successfully <?p>";
    }
}