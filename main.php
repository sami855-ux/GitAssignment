<?php
require_once 'php/configSeesion.php';
require_once 'php/dbh.php';
require_once 'php/post/post.model.php';

if(!isset($_SESSION["user_id"])) {
  header("Location: login.php");
} 
?>  
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/main.css" />
    <title>Home-Page</title>
  </head>
  <body>
    <header>
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

      $query = "SELECT *  FROM posts";
      $stmt = $pdo->prepare($query);
      $stmt->execute();
  
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>  
      <h2>$Social Media</h2>
      <section class="serachi-filed">
        <img src="icon/magnifying-glass-solid.svg" alt="serach" />
        <input
          type="text"
          name="serach"
          class="sreach"
          placeholder="serach for users and creators"
        />
      </section>
      <ul>
        <li><a href="post.php?id=<?php echo $user_id ?>">Post</a></li>
        <a href="php/logout.php"><button class="btn">Log Out</button> </a>
      </ul>
      <div class="main-theme">
        <section class="theme">
          <img class="night" src="icon/night.png" alt="night" />
          <img class="light active" src="icon/brightness.png" alt="light" />
        </section>
      </div>
    </header>
    <div class="home">
      <aside class="sidebar">
        <div class="profile">
          <img src="upload/<?php echo $user_pp ?>" alt="profile" />
          <section>
            <b><?php echo $user_name?></b>
            <p><?php echo $user_email?></p>
          </section>
        </div>
        <div class="menu">
          <section class="item">
            <img src="icon/house-solid.svg" alt="Home" />
            <a href="main.php"> <p>Home</p></a>
          </section>
          <section class="item">
            <img src="icon/instagram.svg" alt="Home" />
            <a href="post.php?id=<?php echo $user_id ?>"> <p>Posts</p></a>
          </section>
          <section class="item">
            <img src="icon/envelope-regular.svg" alt="Home" />
            <a href=""> <p>Notification</p></a>
          </section>
        </div>

        <div class="createPost">
          <a href="post.php?id=<?php echo $user_id ?>"
            ><button class="createpost">Create Post</button></a
          >
        </div>
      </aside>

      <div class="textcontent">
        <h2>Posts</h2>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum
          perferendis voluptate sequi quibusdam quo excepturi tenetur. Quod quae
          nam sit?
        </p>
        <div class="wrapper">
        <?php


        foreach($result as $res) {
          $username = $res["username"];
          $query = "SELECT *  FROM users WHERE username = :username";
          $stmt = $pdo->prepare($query);
          $stmt->bindParam(":username", $username);
          $stmt->execute();
          $result2 = $stmt->fetch(PDO::FETCH_ASSOC);
              
          echo '<div class="post-item">
          <div class="poster">
            <img src="upload/'.$result2["pp"].'" alt="profile" />
            <b>'.$result2["username"].'</b>
          </div>
          <div class="main-content">
            <article>
              <h3>'.$res["header"].'</h3>
              <p>
              '.$res["text"].'
              </p>
              <span class="other">Date: <b>'.$res["Date"].'</b></span>
              <span class="other">Time: <b>'.$res["time"].'</b></span>
              <div class="status">
                <img
                  class="like"
                  id="like"
                  src="icon\thumbs-up-regular.svg"
                  alt=""
                />
                <img
                  class="dis"
                  id="dis"
                  src="icon/thumbs-down-regular.svg"
                  alt=""
                />
                <div class="main-comm">
                  <form action="php/comment.php" method="post">
                    <input
                      type="text"
                      name="comment"
                      placeholder="Your comment"
                    />
                    <button type="submit">send</button>
                  </form>
                </div>
                </div>
                </article>
                </div>
          </div>';
          
        }
       
        ?>
        </div>
       
       
      </div>
    </div>

    <script src="javascript/main.js"></script>
  </body>
</html>