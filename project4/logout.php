<?php include 'core/init.php'; ?>
<?php 
if(isset($_POST['logout'])){
   $user=new user;
   if($user->logout()){
    redirect('index.php','you are now logged out ','success');
   }
   else{
    redirect('index.php');
   }
}





?>