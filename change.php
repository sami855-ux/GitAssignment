<?php
require_once 'php/configSeesion.php';
require_once 'php/forgot/fogot.view.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/changepwd.css" />
    <title>Document</title>
</head>

<body>
    <div class="wrapper">
        <header>Forgot password</header>
        <section class="error">
            <?php
            check_signup_errors();
            ?>
        </section>
        <form action="php\forgot\main.php" method="post">
            <div class="field input">
                <label for="email">Email</label>
                <input type="email" name="email" />
            </div>
            <div class="field input">
                <label for="username">Birth Date</label>
                <input type="date" name="date" />
            </div>

            <div class="field input">
                <label for="email">Change Password</label>
                <input type="password" name="changepassword" id="password" />
            </div>
            <div class="field input">
                <label for="email">Confirm Password</label>
                <input type="password" name="confirmpassword" id="password" />
            </div>

            <div class="submit">
                <button type="submit" class="btn2">Submit</button>
            </div>
            <div class="link">
                <p>Head back and <a href="login.php">Login Now</a></p>
                <section class="iconn">
                    <img src="icon/facebook (1).svg" alt="" />
                    <img src="icon/instagram.svg" alt="" />
                    <img src="icon/twitter.svg" alt="" />
                </section>
            </div>
        </form>
    </div>


</body>

</html>