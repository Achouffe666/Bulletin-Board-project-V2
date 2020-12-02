<!-- TOPICS -->
<?php
session_start();
?>
<?php include 'header.php';?>

<!-- MAIN WRAP -->
<div class="main__wrap container overlay rounded-lg position-relative my-3 pb-3">
  <nav class="nav-list">
    <ol class="breadcrumb bg-transparent pt-5">
      <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i> Home</a></li>
      <li class="breadcrumb-item" ><a href="#">Board Index</a></li>
      <li class="breadcrumb-item"><a href="#">Category One</a></li>
      <li class="breadcrumb-item">Forum One</li>
    </ol>
  </nav>

  <?php
  include "../database/db.php";
  global $db;

    try {
        $query =$db ->query('SELECT * FROM topics');
        $query->execute();
        $topics = $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        ?>
        <div class="alert alert-danger" role="alert">
         Error apeared, try again,
        </div>
        <?php
    }
?>
 <!-- formulaire de creation de topic -->
<form action='' method='post' class="form_topics">
        <h4>Create your own topic!</h4>
        <div class='form-group'>
        <input type="text" class="form-control bg-light rounded rounded-pill" name='Title' placeholder="Topic Title Here!" required>
        </div>
        
        <input type="submit" name="formSend" id="formSend" class="button--modifier btn text-black border rounded rounded-pill login-button" value="Create a topic">
        <button type="button" class="button--modifier btn text-black border rounded rounded-pill login-button" id='cancel'>Cancel</button>
</form>
 
 

  <div class="container-lg">

    <div class="row">

      <div class="col-xl-9">

        <h4 class="mb-5 text-black-50">Topics exemple</h4>
        <div class="alert b-radius alert-danger" role="alert">
          <a href="#" class="alert-link">Forum rules</a>
        </div>

        <div class="d-flex">

          <button class="button--modifier btn text-black rounded-pill border" type="submit" id="btn">
            New topic     

            <includ class="fas fa-pencil-alt"></>
          </button>


          <div class="bg-light rounded rounded-pill border ml-3">

            <div class="input-group">

              <input type="search" placeholder="Search this forum..."
                class="form-control bg-transparent rounded-pill border-0">

              <div class="input-group-append">

                <button id="search-glass" type="submit" class="btn btn-link border-right border-left">
                  <i class="fa fa-search magnifying-glass"></i>
                </button>

                <button id="cogoption" type="submit" class="btn btn-link">
                  <i class="fas fa-cog cog"></i>
                </button>

              </div>

            </div>

          </div>

          <p class="ml-auto text-black-50"> 12 topics · Page <strong>1</strong> of <strong>1</strong>
          </p>

          <!-- END SEARCH -->
        </div>

        <!-- ANNONCE -->
        <div class="b-radius">

          <div class="topics-top text-black row no-gutters align-items-center w-100">
          
            <div class="col">
              <h4>Announcements</h4>
            </div>
          
            <div class="d-none d-md-block col-6 text-black-50">
              <div class="row no-gutters align-items-center text-black">
                <div class="col-3"><i class="fas fa-comments"></i></div>
                <div class="col-3"><i class="fas fa-eye"></i></div>
                <div class="col-6"><i class="fas fa-clock"></i></div>
              </div>
            </div>
          
          </div>
          
          <div class="topic b-radius bg-light p-2">
            
            <div class="shadow-sm bg-white b-radius p-2">
              
              <div class="row no-gutters text-black-50 align-items-center">

                <div class="col-1 text-center">
                  <i class="fas fa-bullhorn"></i>
                </div>
                
                <div class="col">
                  <a href="#">This is an
                    announcement!
                  </a>
                  <p class="text-secondary small">by <a class="author" href="#">rourouxx</a> » in <a href="#">Unread Forum</a></p>
                </div>
                
                <p class="ml-auto pr-4"><i class="fas fa-bullhorn cog"></i></p>

                <div class="col-6 d-none d-md-block">
                  <div class="row no-gutters align-items-center pl-2">
                    <div class="col-3">33</div>
                    <div class="col-3">333</div>
                    <div class="col-6 align-items-center">
                      <p>
                        by <a class="author" href="#">Bibi</a> 
                        <a href=" #"><i class="fas fa-external-link-alt"></i></a>
                        <span class="d-block">Monday Nov 3, 2020 3:00pm</span>
                      </p>
                    </div>
                  </div>
                </div>

              </div>
            </div>

          </div>
        </div>

        <!-- END ANNONCE -->

        <!-- TOPICS -->

        <div class="b-radius">

          <div class="topics-top text-black row no-gutters align-items-center w-100">
            
            <div class="col">
              <h4>Topics</h4>
            </div>

            <div class="d-none d-md-block col-6 text-black-50">
              <div class="row no-gutters align-items-center text-black">
                <div class="col-3"><i class="fas fa-comments"></i></div>
                <div class="col-3"><i class="fas fa-eye"></i></div>
                <div class="col-6"><i class="fas fa-clock"></i></div>
              </div>
            </div>

          </div>

          <!-- EXEMPLE POST -->
          <div class="topic bg-light b-radius p-2">

            <div class="shadow-sm b-radius bg-white p-3">

              <div class="row no-gutters text-black-50 align-items-center">
                
                <div class="col-1 text-center">
                  <i class="fas fa-check"></i>
                </div>

                <div class="col">
                  <a href="#"> Your Bank Account ( Locked )</a>
                  <p class="text-secondary small">
                    by <a class="author" href="#"> TheMafia</a>
                  </p>
                </div>

                <div class="d-none d-md-block col-6">
                  <div class="row no-gutters align-items-center pl-2">
                    <div class="col-3">33</div>
                    <div class="col-3">333</div>
                    <div class="col-6 align-items-center">
                      <p>
                        by <a class="author" href="#">your mom</a> 
                        <a href=" #"><i class="fas fa-external-link-alt"></i></a>
                        <span class="d-block">Mon Nov 3, 2020 04:20pm</span>
                      </p>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <!-- END POST -->
        </div>
        <!-- END TOPIC -->


        <div class=" d-flex pt-3">

          <button class="button--modifier btn text-black border rounded-pill px-4 py-2" type="submit" id="btn2">
            New topic
            <i class="fas fa-pencil-alt"></i>
          </button>

          
          <div class="dropdown">

            <button class="btn rounded rounded-pill border dropdown-toggle ml-3" type="button"
              id="dropdownmenu" data-toggle="dropdown">
              Sort
              <i class="fas fa-sort-amount-down-alt"></i>
            </button>

            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Most recent to oldest</a>
              <a class="dropdown-item" href="#">Oldest to most recent</a>
              <a class="dropdown-item" href="#">Publication date</a>
              <a class="dropdown-item" href="#">Most popular</a>
              <a class="dropdown-item" href="#">Author</a>
            </div>

          </div>

          <p class="ml-auto font-weight-normal text-black-50 pt-2">
            12 topics · Page <strong>1</strong> of <strong>1</strong>
          </p>

          <!-- END SEARCH -->
        </div>

        <div class=" d-flex pt-3">
          <a href="#">Return to Board Index</a>

          <div class="dropdown ml-auto">

            <button class="btn bg-light rounded ml-3 rounded-pill border dropdown-toggle text-black-50" type="button" data-toggle="dropdown">
              Jump to
            </button>

            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">X</a>
              <a class="dropdown-item" href="#">Y</a>
              <a class="dropdown-item" href="#">Z</a>
              <a class="dropdown-item" href="#">W</a>
              <a class="dropdown-item" href="#">Forum</a>
            </div>

          </div>
        </div>



      </div>
      <!--END LEFT COL-->

      <!-- <?php include "rightcol.php";?> -->      

    </div>
    <!-- END ROW -->

  </div>
  <!-- END CONTAINER -->

</div>
<!-- END MAIN CONTAINER -->
<?php include 'footer.php';?>