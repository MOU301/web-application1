
<?php include 'inc/header.php'; ?>
<?php if($topics) : ?>
    <?php foreach($topics as $topic) :?>
<div class="d-flex justify-content-start align-items-center p-2">
                    <div class="image">
                        <img src="images/<?php echo $topic->avatar; ?>">
                    </div>
                    <div class="p-3">
                        <h3><a class="text-dark" href="topic.php?topic=<?php echo $topic->id;?>"><?php echo $topic->title;?></a></h3>
                        <p><?php echo $topic->name; ?> >> <?php echo $topic->username;?> >> <?php echo format_date($topic->create_date);?> </p>
                    </div>
                  </div>
                  <div class="d-flex justify-content-end pb-2 px-5 bb">
                    <span class="r"><?php echo replyCount($topic->id);?></span>
                </div>
 <?php endforeach ;?>
<?php else :  ?>
    <P class="p-4">No Topics To Display</P>
<?php endif ;?>
             
               <div class="my-5 px-3">
                <h3>forum statistics</h3>
                <ul>
                    <li>Total Number of Users <strong>5</strong></li>
                    <li>Total Number of Topics <strong><?php echo $TotalTopics;?></strong></li>
                    <li>Total Number of categories <strong><?php echo $TotalCategories ;?></strong></li>
                </ul>
               </div>
            
       <?php include 'inc/footer.php' ;?>