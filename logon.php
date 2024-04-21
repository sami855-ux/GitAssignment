<?php
require_once 'php/configSeesion.php';
require_once 'php/login.view.php';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/styel.css" />
    <title>LoginPage</title>
  </head>
  <body>
    <div class="wrapper">
      <div class="container">
        <div class="box form-box">
          <header>Login</header>
          <section class="error">
           
                  <?php
            check_login_erros();
            ?>
          </section>
          <form action="php/signin.php" method="post">
            <div class="field input">
              <label for="username">UserName</label>
              <input type="text" name="username" id="username" required />
            </div>

            <div class="field input">
              <label for="password">Password</label>
              <input type="password" name="password" id="password" required />
            </div>

            <div class="field">
              <button type="submit" class="btn2">login</button>
            </div>
            <div class="link">
              <p>
                Don't have an account <a href="register.php">Register Now</a>
              </p>
              <p>
               <a href="Changepwd.php">Forgot Password ?</a>
              </p>
            </div>
          </form>
       
        </div>
      
      
      </div>
    
    
    </div>
    <div>
      <section class="newsection" id="newsect">
        
      </section>
    </div>
    <script src="javascript/login.js"></script>
  </body>
</html>

