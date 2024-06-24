<?php 
function redirect($page=false,$message=null,$type=null){
    if(is_string($page)){
        $location=$page;
    }
    else{
        $location=$_SERVER['SCRIPT_NAME'];
    }

    if($message !=null){
        $_SESSION['message']=$message;
    }
    if($type !=null){
        $_SESSION['type']=$type;
    }

    header('location:'.$location);
    exit;
}
function DisplayMessage(){
    if(!empty($_SESSION['message'])){
        $message=$_SESSION['message'];
        if(!empty($_SESSION['type'])){
            $type=$_SESSION['type'];
            if($type=='error'){
                echo '<div class="alert alert-danger">'.$message.'</div>';
            }
            else{
                echo '<div class="alert alert-success">'.$message.'</div>'; 
            }
           
        
        unset($_SESSION['message']);
        unset($_SESSION['$type']);      
    }
}
    else{
        echo '';
    }
}
function getUser(){
    $userarray=array();
    $userarray['username']=$_SESSION['username'];
    $userarray['name']=$_SESSION['name'];
    $userarray['user_id']=$_SESSION['user_id'];
    return $userarray;
  }
function isLoggedIn(){
    if(isset($_SESSION['is_logged_in'])){
        return true;
    }
    else { return false;
    }
}