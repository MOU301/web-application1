<?php 

function format_date($date){
$date=date('F j: Y  g:i a',strtotime($date));
return $date;
}

function is_select($category){
    if(isset($_GET['category'])){
       if($_GET['category']==$category){
        return 'sel';
        } 
        else{
         return '';
       }
    }else{
        if($category==null){
            return 'sel';
        }
    }
}
?>