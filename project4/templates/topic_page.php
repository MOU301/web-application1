
<?php include 'inc/header.php ';?>      
      
             <div class="d-flex justify-content-start align-items-center border gray">
                <div class=" p-3">
                 <ul class="center" >
                    <li class="image"><img src="images/<?php echo $topic->avatar;?>" alt=""></li>
                    <li><strong><?php echo $topic->username; ?></strong></li>
                    <li><?php echo UserPostCount($topic->user_id);?> view post</li>
                    <li><a href="topics.php?user=<?php echo $topic->user_id;?>">profile</a></li>
                   </ul>
                </div>
                <div class="p-2  ">
                    <p class="led"><?php echo $topic->body;?></p>
                </div>
             </div>
             <?php if(isset($replies)) : ?>
               <?php foreach($replies as $reply) : ?>
                     <div class="d-flex justify-content-start align-items-center border">
                        <div class=" p-3">
                        <ul class="center" >
                           <li class="image"><img src="images/<?php echo $reply->avatar;?>" alt=""></li>
                           <li><strong><?php echo $reply->username; ?></strong></li>
                           <li><?php echo UserPostCount($reply->user_id);?> view post</li>
                           <li><a href="topics.php?user=<?php echo $reply->user_id;?>">profile</a></li>
                           </ul>
                        </div>
                        <div class="p-2  ">
                           <p class="led"><?php echo $reply->body; ?></p>
                        </div>
                     </div>
                  <?php endforeach ; ?>
               <?php endif ; ?>   


            <div class="my-3 p-5 ">
                <h4>Reply To This Topic</h4>
                <?php if(isLoggedIn()) : ?>
                  <form action="topic.php?topic=<?php echo $topic->id;?>" method="post">
                  <div class="form-group my-3">
                     <label class="form-label">Reply :</label>
                     <textarea id="body_r" rows="40" cols="20"  name="body" class="form-control" ></textarea>

                  </div>
                  <input type="submit" value="Send" name="send" class="btn btn-dark">
                  </form>
                <?php else : ?>
                <p>please Login To Reply</p>
                <?php endif ; ?>

            </div>




         
<?php include 'inc/footer.php'; ?>               