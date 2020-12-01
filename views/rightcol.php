      <!-- RIGHT COL -->


      <div class="col-xl-3 themed-grid-col rightcol"> 
        
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
        <div class="login_wrap">
          
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

                <div class="form-group">
                  <div class="checkbox">
                    <label class="text-black-50"> <input name="remember" type="checkbox">
                      Save password 
                    </label>
                  </div>
                </div>

                <div class="form-group d-flex justify-content-center">
                  <button type="submit" class="button--modifier btn text-black border rounded rounded-pill login-button">
                    Login 
                  </button>
                </div> 
              </form>

              <!-- <?php include 'login-php';?> -->

            </div>
          </div>
        </div>
        <a href="#">
          Forgot my password
        </a>

        <!-- END LOGIN -->
        
        <!-- last posts  -->
        <div class="card topics-top">
          <div class="card-header topics-top-title">
            <h4>Last posts</h4>
          </div>
            <div class="card-body last-topics-wrap">
              <div> 
                <span class="content-title">titre (php)</span> <span class="float-right">2 hours ago</span>
                  <div>
                    <span>contents contents</span>
              </div>
                  </div>
              </div>
        </div>
    <!-- end last posts  -->

    <!-- last activer users -->
    <div class="card user-top">
          <div class="card-header user-top-title">
            <h4>Last active users</h4>
          </div>
            <div class="row d-flex flex-row align-items-start card-body last-user-wrap">
              <div class="col-4"> 
              <img src="../static/image/3.png" alt="User1" style="width:75px">
              <p>#User1</p>             
             </div>
              <div class="col-4"> 
              <img src="../static/image/3.png " alt="user2" style="width:75px">
              <p>#User2</p>             
              </div>
              <div class="col-4"> 
              <img src="../static/image/3.png" alt="user3" style="width:75px">
              <p>#User</p>             
              </div>
                  </div>
              </div>
        </div>
        
      </div>
      <!--END RIGHT COL-->