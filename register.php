<?php
require_once 'php/configSeesion.php';
require_once 'php/siginup.view.php';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/styel2.css" />
    <title>Registe-Page</title>
  </head>
  <body>
    <div class="wrapper">
    
      <div class="container">
        <div class="box form-box">
          
          
          <header>Register</header>
          <section class="error">
                 <?php
               check_signup_errors();
                   ?>
              </section>
          <form action="php/signup.php" method="post" enctype = "multipart/form-data" >
            <div class="field input">
              <label for="username">UserName</label>
              <input type="text" name="username" id="username"  />
            </div>

            <div class="field input">
              <label for="email">Email</label>
              <input type="email" name="email" id="email"  />
            </div>

            <div class="field input">
              <label for="bDate">Birth Date</label>
              <input type="date" name="bDate" id="bDate"  />
            </div>

            <div class="field input">
              <label for="ppicture">Upload profile picture</label>
              <input type="file" name="ppicture" id="ppicture"  />
            </div>

            <div class="field input">
              <label for="bDate">Educational Information</label>
              <select name="edvalue" class="edvalue">
                <option value="None">None</option>
                <option value="Stil studing">Still studying</option>
                <option value="Degree">Degree</option>
                <option value="Masters">Matsters</option>
                <option value="PHD">PHD</option>
              </select>
            </div>

            
            <div class="field input">
              <label for="password">Password</label>
              <input type="password" name="confiPass" id="confiPass"  />
            </div>

            <div class="field">
              <button type="submit" class="btn2">Register</button>
            </div>
            <div class="link">
              <p>Do you have an account <a href="login.php">Login</a></p>
            </div>
          </form>
         
        </div>
      </div>
    </div>
    
    <script src="javascript/register.js"></script>
  </body>
</html>
