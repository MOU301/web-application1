<?php $title='Create An Account';?>
<?php include 'inc/header.php'; ?>
                
               <form action="register.php" enctype="multipart/form-data" method="post" class="p-5">

                 <div class="form-group">
                    <label class="form-label">Name : </label>
                    <input type="text" name="name" class="form-control" >
                 </div>

                 <div class="form-group my-3">
                  <label class="form-label">Email :</label>
                  <input type="email" name="email" class="form-control" >
                </div>
                  
                <div class="form-group my-3">
                  <label class="form-label">Choose username :</label>
                  <input type="text" name="username" class="form-control" >
                </div>
              
                <div class="form-group my-3">
                  <label class="form-label">Password :</label>
                  <input type="password" name="password" class="form-control" >
                </div>

                <div class="form-group my-3">
                  <label class="form-label">Confirm Password :</label>
                  <input type="password" name="confpassword" class="form-control">
                </div>

                <div class="form-group my-3">
                  <label class="form-label">Upload Avatar :</label>
                  <input type="file" name="image" class="form-control" >
                </div>

                <div class="form-group my-3">
                  <label class="form-label">About Me :</label>
                  <textarea  name="about" class="form-control" ></textarea>
                </div>

                <input type="submit" class="btn btn-dark" name="register" value="Register">
               </form>
                  
               
        
        
        
       <?php include 'inc/footer.php' ; ?>