<?php 
        include "controlers/functions_boards.php";
?>
<!-- BOARD -->
<div class="container position-relative main__wrap d-flex flex-column rounded-lg my-3 pb-3 bg-white shadow">
    <nav class="nav__list">
        <ol class="breadcrumb bg-transparent pt-5">
            <li class="breadcrumb-item active"><a href="#"><i class="fas fa-home"></i> Home</a></li>
        </ol>
    
    </nav>
    <div class="board__inner row container-fluid">
        
        <div class="board__wrap col-xl-10 mr-0 mb-2">
        
            <!-- BOARD ONE TOPICS-->
            <h4 class="mt-2 mb-5 ml-5 text-black-50">Category One</h4>
           
            <!-- TOPICS WRAP-->

            <div class="topics__wrap container-fluid d-flex flex-wrap bg-light p-1 mb-5">
            <?php $category_id = 1?>
            <?php $boards = get_boards();
            foreach($boards as $board){?>

                <!-- ONE LINK TO TOPICS-->
                <div class="topics bg-white shadow rounded p-1 m-1">

                    <div class="topics__container d-flex flex-column pl-2">

        
                        <div class="row topics__top">
        
                            <div class="col-3">
                                <img src="../static/image/<?=$board['id']%5?>.png">
                            </div>
                            <div class="col-9">
                                <h4 class="topics__title"><a class =""
                                <?php
                                    
                                    if($board['subject']=='Very Secret'){
                                        echo 'href="#"';
                                    }
                                    
                                    else{
                                        echo "href='views/topics.php?boardId=$board[id]'";
                                    }
                                ?>>
                                <?=$board['subject']?></a><i class="fas fa-check ml-1"></i></h4>
                                <p class="topics__description"><?=$board['description']?></p>
                            </div>
        
                        </div>
                        <hr class="topics__hr float-left m-0 mb-3">
                        <div class="row topics__bot">
        
                            <div class="col-3 d-flex flex-column align-items-center">
                                <p class="topics__number"><?php
                                $boardId=$board['id'];
                                $response = $db->query("SELECT id FROM topics WHERE board_id=$boardId");
                                $response->execute();
                                $data = $response->fetchAll();
                                echo sizeof($data);
                                
                                ?></p>
                                <p class="topics__text">Topic(s)</p>
                            </div>
        
                            <div class="col-3 d-flex flex-column align-items-center">
                                <p class="topics__number"><?php
                                $increment=0;
                                $sum=0;
                                $max=intval(sizeof($data));
                                $lastdatetable=array();
                                while($increment<$max){

                                    $topicId=$data[$increment]['id'];
                                    $response = $db->query("SELECT DATE_FORMAT(creation_date, '%Hh%i') AS creation_date FROM messages WHERE topic_id=$topicId ORDER BY creation_date DESC");
                                    $response ->execute();
                                    $result= $response->fetchAll();
                                    $messagesize=sizeof($result);
                                    $sum=$sum+$messagesize;
                                    $increment++;
                                }
                                echo $sum;
                                ?></p>
                                <p class="topics__text">Post(s)</p>
                            </div>
        
                            <div class="col-6 d-flex flex-column align-items-center">
                                <p class="topics__date">Sun 8 Nov</p>
                                <p class="topics__text">Last post</p>
                            </div>
        
                        </div>

                    </div>
                </div>
                <?php } ?>
                <!-- END ONE LINK TO TOPICS-->
            </div>
            <!-- END CATEGORY ONE TOPICS-->
        
        <!-- BOARD TWO TOPICS-->
            <h4 class="mt-2 mb-5 ml-5 text-black-50">Category Two</h4>
           
            <!-- TOPICS WRAP-->

            <div class="topics__wrap container-fluid d-flex bg-light p-1 mb-5">
            <?php $category_id = 2?>
            <?php $boards = get_boards();
            foreach($boards as $board){?>
        
                <!-- TWO LINK TO TOPICS-->
                <div class="topics bg-white shadow rounded p-1 m-1">

                    <div class="topics__container d-flex flex-column pl-2">

        
                        <div class="row topics__top">
        
                            <div class="col-3">
                                <img src="../static/image/<?=$board['id']%5?>.png">
                            </div>
                            <div class="col-9">
                                <h4 class="topics__title"><a class ="" href="views/topics.php?boardId=<?=$board['id']?>"><?=$board['subject']?></a><i class="fas fa-check ml-1"></i></h4>
                                <p class="topics__description"><?=$board['description']?></p>
                            </div>
        
                        </div>
                        <hr class="topics__hr float-left m-0 mb-3">
                        <div class="row topics__bot">
        
                            <div class="col-3 d-flex flex-column align-items-center">
                                <p class="topics__number"><?php
                                $boardId=$board['id'];
                                $response = $db->query("SELECT id FROM topics  WHERE board_id=$boardId ORDER BY creation_date DESC" );
                                $response->execute();
                                $data = $response->fetchAll();
                                echo sizeof($data);
                                ?></p>
                                <p class="topics__text">Topic(s)</p>
                            </div>
        
                            <div class="col-3 d-flex flex-column align-items-center">
                                <p class="topics__number"><?php
                                $increment=0;
                                $sum=0;
                                $max=intval(sizeof($data));
                                $lastdatetable=array();
                                while($increment<$max){

                                    $topicId=$data[$increment]['id'];
                                    $response = $db->query("SELECT DATE_FORMAT(creation_date, '%Hh%i') AS creation_date FROM messages WHERE topic_id=$topicId ORDER BY creation_date DESC");
                                    $response ->execute();
                                    $result= $response->fetchAll();
                                    $messagesize=sizeof($result);
                                    $sum=$sum+$messagesize;
                                    $increment++;
                                }
                                echo $sum;
                                ?></p>
                                <p class="topics__text">Post(s)</p>
                            </div>
        
                            <div class="col-6 d-flex flex-column align-items-center">
                                <p class="topics__date"></p>
                                <p class="topics__text">Last post</p>
                            </div>
        
                        </div>

                    </div>
                </div>
                <?php } ?>
                <!-- END TWO LINK TO TOPICS-->
            </div>
            <!-- END CATEGORY TWO TOPICS-->

        <!-- BOARD THREE TOPICS-->
            <!-- BOARD THREE TOPICS-->
            <h4 class="mt-2 mb-5 ml-5 text-black-50">Category Three</h4>
           
            <!-- TOPICS WRAP-->

            <div class="topics__wrap container-fluid d-flex bg-light p-1 mb-5">
            <?php $category_id = 3?>
            <?php $boards = get_boards();
            foreach($boards as $board){?>
        
                <!-- THREE LINK TO TOPICS-->
                <div class="topics bg-white shadow rounded p-1 m-1">

                    <div class="topics__container d-flex flex-column pl-2">

        
                        <div class="row topics__top">
        
                            <div class="col-3">
                                <img src="../static/image/<?=$board['id']%5?>.png">
                            </div>
                            <div class="col-9">
                                <h4 class="topics__title"><a class ="" href="views/topics.php?boardId=<?=$board['id']?>"><?=$board['subject']?></a><i class="fas fa-check ml-1"></i></h4>
                                <p class="topics__description"><?=$board['description']?></p>
                            </div>
        
                        </div>
                        <hr class="topics__hr float-left m-0 mb-3">
                        <div class="row topics__bot">
        
                            <div class="col-3 d-flex flex-column align-items-center">
                                <p class="topics__number"><?php
                                $boardId=$board['id'];
                                $response = $db->query("SELECT id FROM topics WHERE board_id=$boardId");
                                $response->execute();
                                $data = $response->fetchAll();
                                echo sizeof($data);
                                
                                ?></p>
                                <p class="topics__text">Topic(s)</p>
                            </div>
        
                            <div class="col-3 d-flex flex-column align-items-center">
                                <p class="topics__number"><?php
                                $increment=0;
                                $sum=0;
                                $max=intval(sizeof($data));
                                $lastdatetable=array();
                                while($increment<$max){

                                    $topicId=$data[$increment]['id'];
                                    $response = $db->query("SELECT DATE_FORMAT(creation_date, '%Hh%i') AS creation_date FROM messages WHERE topic_id=$topicId ORDER BY creation_date DESC");
                                    $response ->execute();
                                    $result= $response->fetchAll();
                                    $messagesize=sizeof($result);
                                    $sum=$sum+$messagesize;
                                    $increment++;
                                }
                                echo $sum;
                                ?></p>
                                <p class="topics__text">Post(s)</p>
                            </div>
        
                            <div class="col-6 d-flex flex-column align-items-center">
                                <p class="topics__date">Sun 8 Nov</p>
                                <p class="topics__text">Last post</p>
                            </div>
        
                        </div>

                    </div>
                </div>
                <?php } ?>
                <!-- END three LINK TO TOPICS-->
            </div>
            <!-- END CATEGORY THREE TOPICS-->

        
        
            </div>
        <!-- END OF BOARD WRAP-->
        <?php include "rightcol.php";?>
    </div>
    <!-- END OF BOARD INNER-->
    

</div>
<!-- END OF CONTAINER-->

