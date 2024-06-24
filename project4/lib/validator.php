<?php
class validator{ 
public function isRequired($field_array){
    foreach($field_array as $field){
            if($_POST[''.$field.'']==''){
                return false;
            }    
     }
     return true;
}
public function validEmail($email){
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        return true;
    }
    else {
        return false ;
    }
}
public function checkpass($pass1,$pass2){
    if($pass1==$pass2){
        return true;
    }
    else{ 
        return false;
    }
}

}
?>