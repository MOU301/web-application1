
<?php include 'inc/header.php' ; ?>
<?php if(!empty($topics)) :?>
<?php foreach($topics as $topic): ?>
                <div class="d-flex justify-content-start align-items-center p-2">
                    <div class="image">
                        <img src="images/<?php echo $topic->avatar;?>">
                    </div>
                    <div class="p-3">
                        <h3><a class="text-dark" href="topic.php?topic=<?php echo $topic->id;?>"><?php echo $topic->body;?></a></h3>
                        <p><?php echo $topic->name;?> >> <?php echo $topic->username; ?> >> <?php echo format_date($topic->create_date); ?></p>
                    </div>
                  </div>
                  <div class="d-flex justify-content-end pb-2 px-5 bb">
                    <span class="r bg-dark text-white"><?php echo replyCount($topic->id);?></span>
                </div>
                
  <?php endforeach ;?>
  <?php else : ?>
    <p class="px-4">There are not Topics</p>
    <?php endif ;?>
<?php include  'inc/footer.php' ;?>
