<?php include 'core/init.php'; ?>
<?php 

if(isset($_POST['login'])){
    $user=new user;
    $username=$_POST['username'];
    $pass=md5($_POST['password']);
    if($user->login($username,$pass)){
        redirect('index.php','you have been longen in','success');
    }
    else{
       redirect('index.php','that longin is not valid','error');
    }
    
}





?>