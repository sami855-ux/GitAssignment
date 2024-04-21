<?php
require_once 'php/configSeesion.php';
require_once 'php/post/post.view.php';
require_once 'php/post/post.model.php';

$host = 'localhost';
$dbname = 'myfristdatabase';
$dbusername = 'root';
$dbpassword = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("connection failed: " . $e->getMessage());
}   

if(!isset($_SESSION["user_id"])) {
  header("Location: post/post.php");
} 

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--Added a reset Style sheet-->
    <link rel="stylesheet" href="css/reset.css" />
    <!-- Added style sheet -->
    <link rel="stylesheet" href="css/post.css" />
    <title>Post page</title>
  </head>
  <body>
    <!-- Header section -->
    <?php
     $id =  $_SESSION["user_id"];
     $query = "SELECT * FROM users WHERE id = $id;";
     $stmt = $pdo->prepare($query);
     $stmt->execute();

     while( $result = $stmt->fetch(PDO::FETCH_ASSOC)) {
       $user_name = $result["username"];
       $user_email = $result["email"];
       $user_pp = $result["pp"];
       $user_id = $result['id'];
     }
   
    $result = get_comment($pdo, $user_name); 
    
    ?>
    <header>
      <h2>Simple Social Media</h2>
      <ul>
        <li><a href="main.php">Home</a></li>
        <li><a href="post.php">Post</a></li>
        <a href="php/logout.php"><button class="btn">Log Out</button></a>
      </ul>
    </header>
    <div class="main-header">
      
      <div class="postheader">
        <h2>Posting Filed</h2>
        <form action="php/post/posthandl.php" method="post">
        <div class="list input header">
            <label>username</label>
            <input type="text" name="username" value="<?php echo $user_name?>" />
    </div>
          <div class="list input header">
            <label for="idea">Header of your comment</label>
            <input type="text" name="mainIdea" class="main-idea" />
          </div>

         
          <div class="list textarea">
            <label for="idea">Your comment</label>
            <textarea
              name="comment"
              id="comment"
              cols="30"
              rows="10"
               
            ></textarea>
          </div>
          <div class="list input">
            <button type="submit" class="submit">Post</button>
          </div>
        </form>
         <?php
        check_signup_errors();
        ?>
      </div>
      <div class="post-by-me">
      <?php 
     
     
      foreach($result as $res) {
        echo '<section class="posts"> <h1>'.$res["header"] .' </h1> <p class="text">'.$res["text"].'</p> Date: <span class="date1">'.$res["Date"].'</span>  Time: <span class="date1">'.$res["time"].'</span></section>';
      }
     
    
    ?>
      </div>
    </div>
  </body>
</html>