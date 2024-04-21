<?php

declare(strict_types = 1);

function  check_login_erros() {
    if(isset($_SESSION["errors_login"])) {
        $errors = $_SESSION["errors_login"];

        echo "<br/>";

        foreach($errors as $error) {
            echo "<p class='form-errors'>".$error. "</p>";
        }

        unset($_SESSION["errors_login"]);
    }
    else if(isset($_GET["login"]) && $_GET["login"] === "sucess") {
        echo "<br/>";
        echo "<p class='form-sucess'> Login sucess!<?p>";
    }
}