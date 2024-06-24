<?php 
include 'core/init.php';
$topic=new topic;
$tempate=new template('templates/create_page.php');
$tempate->categories=$topic->getAllCategory();
$tempate->TopicsCount=$topic->getTotalTopics();
$validator=new validator;
if(isset($_POST['create'])){
     $data=array();
     
     $field_array=['title','body','category'];
    if($validator->isRequired($field_array)){
        $data['title']=$_POST['title'];
        $data['category_id']=$_POST['category'];
        $data['body']=$_POST['body'];
        $data['user_id']=getUser()['user_id'];
        $data['last_activity']=date('Y-m-d H:i:s');
        echo '<pre>';
        print_r($data);
        echo "</pre>";
       if($topic->create($data)){
        redirect('index.php','success created the to topic','succuss');
       }
       else{
        redirect('create.php','there is wrong register in the data base retry again','error');
       }
    }
    else{
        redirect('create.php','fill the field please ','error');
    }
}






echo $tempate;

?>