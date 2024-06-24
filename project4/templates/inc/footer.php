<style><?php include 'settes/bootstrap/css/style.css'; ?></style>
</div>
</div>
        <div class="col-md-4">
          <div class="p-3 my-5 border bg-white">
            <h4>login form</h4>
            <?php if(isLoggedIn()): ?>
                <div class="p-3">
                   welcome to  <span class="text-success"><?php echo getUser()['username']; ?> !!</span>
                </div>
                <form action="logout.php" method="post">
                  <input type="submit" value="log out" name="logout" class="btn btn-dark">
                </form>
            <?php else : ?>
            <form action="login.php" method="post">
                    <div class="p-1">
                        <label class="form-label">User Name :</label>
                        <input type="text" name="username" class="form-control" >
                    </div>
                    <div class="p-1">
                        <label class="form-label">Password :</label>
                        <input type="password" name="password" class="form-control" >
                    </div>
                    <input type="submit" name="login" name='login' class="my-2 btn btn-dark">
                     <a href="register.php" class="btn btn-outline-dark">create Account</a>
            </form>
            <?php endif ; ?>
          </div>
          <div class=" my-5 border bg-white">
           
            <ul class="list-group">
            <li class="d-flex justify-content-between p-2 bb <?php echo isset($_GET['category']) ? '':'sel';?> ">
                <a href="index.php">All Topics</a>
                <span class="w"><?php echo $TopicsCount;?></span>
            </li>
            <?php foreach($categories as $category) :?>
                <li class="d-flex justify-content-between p-2 bb <?php echo is_select($category->id);?>">
                   <a  href="topics.php?category=<?php echo $category->id;?>">
                        <?php echo $category->name;?>
                   </a>
                   <span class="r"><?php echo TopicCount($category->id);?></span>
                </li>
            <?php endforeach ;?>
            </ul>
            
          </div>
        </div>
    </div>
    



</div>




<script src="templates/settes/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="templates/settes/bootstrap/js/ckeditor/ckeditor.js"></script> 

<script>
    ClassicEditor
        .create( document.querySelector( '#body_i' ))
        .catch( error => {
            console.error( error );
        } );
        ClassicEditor
        .create( document.querySelector( '#body_r' ))
        .catch( error => {
            console.error( error );
        } );
</script> 
</body>
</html>