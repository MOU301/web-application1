<?php 
include 'core/init.php';
$topic=new topic;
$validator=new validator;
$user=new user;
if(isset($_POST['register'])){
   $field_array=['name','email','username','about','password','confpassword'];
   if($validator->isRequired($field_array)){
      $data['name']=$_POST['name'];
      $email=$_POST['email'];
      $data['username']=$_POST['username'];
      $data['about']=$_POST['about'];
      $data['last_activity']=date('Y-m-d H:m:i');
      $pass1=md5($_POST['password']);
      $pass2=md5($_POST['confpassword']);
      if($validator->validEmail($email)){
        $data['email']=$email;
          if($validator->checkpass($pass1,$pass2)){
            $data['password']=$pass1;
              if($user->UploadAvatar()){
                $data['avatar']=$user->getimage();
              }
              else{
                $data['avatar']="noimage.jpeg";
              }

              if($user->register($data)){
                redirect('index.php','success create account','success');
              }
              else{
                redirect('index.php','there is error in the registeration','error');
              }

          }
          else{
            redirect('register.php','check the password please ','error');
          }
      }
      else{
        redirect('register.php','valid Email please','error');
      }
   }else{
    redirect('register.php','fill all a field Required','error');
   }
    
  }
$tempate=new template('templates/register_page.php');
$tempate->categories=$topic->getAllCategory();
$tempate->TopicsCount=$topic->getTotalTopics();







echo $tempate;

?>