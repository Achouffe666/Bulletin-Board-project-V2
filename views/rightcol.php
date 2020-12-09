      <!-- RIGHT COL -->
      <?php
      //  include 'markdown/Michelf/MarkdownExtra.inc.php';
      //  use Michelf\MarkdownExtra;

        function last_post(){
        global $db;

        $lastMessage = $db->prepare("SELECT creation_date, title, content FROM messages ORDER BY creation_date DESC LIMIT 0, 3");
        $lastMessage->execute();
        $last = $lastMessage->fetchAll();
        
        return $last;
      }
        $last_post = last_post();
      ?>

      <div class="col-xl-2 themed-grid-col rightcol"> 
        
        <div class="bg-light rounded rounded-pill border mt-5"> 
          <div class="input-group">
            <input type="search" placeholder="Search..."
              class="form-control  bg-transparent rounded rounded-pill border-0"> 
            <div class="input-group-append">
              <button id="search-glass" type="submit" class="btn btn-link"><i 
                  class="fa fa-search magnifying-glass"></i></button> 
            </div>
          </div>
        </div>
        <!-- END SEARCHBAR -->
        
        <hr>
        
        <!-- LOGIN -->
        <div class="login_wrap mb-3">
          
          <button type="button button-login"
            class="btn bg-transparent text-black-50 text-left mb-2">
             Login · Register 
          </button>
          
          <div id="user_login">
            <div class="input__wrap">
              <form id="submit" method="post" action="../controlers/functions.php">

                <div class="form-group">
                  <label class="text-black-50">
                    Username
                  </label>
                  <input id="username" name="nickname" class="form-control bg-light rounded rounded-pill" type="username">
                </div>

                <div class="form-group">
                  <label class="text-black-50">
                    Password
                  </label>
                  <input id="password" name="password" class="form-control bg-light rounded rounded-pill" type="password">
                </div> 

                <div class="form-check">
                  <div class="checkbox">
                    <label class="text-black-50"> <input name="remember" type="radio">
                      Save password 
                    </label>
                  </div>
                </div>

                <div class="form-group d-flex justify-content-center">
                <?php $address = $_SERVER['PHP_SELF']; ?>
                  <button type="submit" value=<?php $address ?> name="address_url" class="button--modifier py-1 border rounded rounded-pill login-button">
                    Login 
                  </button>
                </div> 
              </form>


            </div>
          </div>
          
          <a href="#">
          Forgot my password
          </a>
        </div>


        <!-- END LOGIN -->
        
        <!-- last posts  -->
 
        <div class="card">

          <div class="card-header gradient topics-top">
            <h4 class="topics-top-title">Last posts</h4>
          </div>

          <?php 
          foreach($last_post as $posts){
            // $markdown = MarkdownExtra::defaultTransform($posts['content']);
          ?>

          <div class="card-body last-topics-wrap">
            
            <div>

              <span class="content-title"><?=$posts['title']?></span>
              <span class="float-right"><?=date("D H:i",strtotime($posts['creation_date']))?></span>

              <div>
                <span><?=$posts['content']?></span>
                <hr>
              </div>

            </div>
          </div>
          <?php } ?>
        </div>
    <!-- end last posts  -->

    <!-- last activer users -->
    <div class="card user-top">
          <div class="card-header user-top-title">
            <h4>Last active users</h4>
          </div>
            <div class="row d-flex flex-row align-items-center justify-content-center card-body last-user-wrap p-0">
              <div class="col d-flex flex-column align-items-center justify-content-center mx-1 p-1"> 
              <img src="../static/image/3.png" alt="User1" style="width:35px">
              <p>#User1</p>             
             </div>
              <div class="col d-flex flex-column mx-1 p-1"> 
              <img src="../static/image/3.png " alt="user2" style="width:35px">
              <p>#User2</p>             
              </div>
              <div class="col d-flex flex-column mx-1 p-1"> 
              <img src="../static/image/3.png" alt="user3" style="width:35px">
              <p>#User3</p>             
              </div>
                  </div>
              </div>
        </div>
        
      </div>
      <!--END RIGHT COL-->