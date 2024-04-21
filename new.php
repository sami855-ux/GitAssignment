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
       
        <!-- 
          <div class="poster">
            <img src="upload/360_F.jpg" alt="profile" />
            <b>Full Name</b>
          </div>
          <div class="main-content">
          
          </div>
        </div> -->
      </div>
    </div>

    <script src="javascript/main.js"></script>
  </body>
</html>