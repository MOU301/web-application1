<?php 
class user{
    private $db;
    private $image;
    
    public function __construct()
    {
      $this->db=new database();  
    }
public function register($data){
  echo '<pre>';
  print_r($data);
  echo '</pre>';
  $q="INSERT INTO 
  `users` (`name`, `email`, `username`, `about`, `last_activity`, `password`, `avatar`) 
  VALUES (:name, :email, :username, :about, :last_activity, :password, :avatar)";
  $this->db->query($q);
  $this->db->bind(':name',$data["name"]);
  $this->db->bind(':email',$data["email"]);
  $this->db->bind(':username',$data["username"]);
  $this->db->bind(':about',$data["about"]);
  $this->db->bind(':last_activity',$data["last_activity"]);
  $this->db->bind(':password',$data["password"]);
  $this->db->bind(':avatar',$data["avatar"]);
  if($this->db->execute()){
    return true;
  }
  else{ 
    return false;
  }
}





 public function UploadAvatar(){
          $allowedExt=['jpeg','jpg','png','gif'];
          $temp=explode('.',$_FILES['image']['name']);
          $ext=end($temp);
          $name=uniqid();
          $name.='.'.$ext;
          $size=$_FILES['image']['size'];
          $tmp_name=$_FILES['image']['tmp_name'];
          $error=$_FILES['image']['error'];
          if(in_array($ext,$allowedExt) && $size<1000000 ){
                if($error==4){
                  redirect('register.php',"there is error in upoad the image",'error');
                }
                else{
                  if(file_exists('images/'.$name)){
                    redirect('register.php','the image is already existes','error');
                  }
                  else{
                    move_uploaded_file($tmp_name,'images/'.$name);
                    $this->image=$name;
                    return true;
                  }
                }
           }else{
            redirect('register.php','enter the your image please ','error');
              }         
      }
      public function getimage(){
        return $this->image;
      }
public function setUserPage($row){
  $_SESSION['is_logged_in']=true;
  $_SESSION['user_id']=$row->id;
  $_SESSION['username']=$row->username;
  $_SESSION['name']=$row->name;
  
}
public function login($username,$pass){
$q='SELECT * FROM `users` WHERE `username`=:username AND `password`=:pass';
$this->db->query($q);
$this->db->bind(':username',$username);
$this->db->bind(':pass',$pass);
$row=$this->db->single();
echo "<pre>";
print_r($row);
echo "</pre>";
if($this->db->rowCount()>0){
  $this->setUserPage($row);
  return true;
}
else {
  return false;
}


}
public function logout(){
  unset($_SESSION['is_logged_in']);
  unset($_SESSION['user_id']);
  unset($_SESSION['username']);
  unset($_SESSION['name']);
  return true;
}
}