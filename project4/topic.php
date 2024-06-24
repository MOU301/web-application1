<?php 
include 'core/init.php';
$topic=new topic;
$tempate=new template('templates/topic_page.php');
$topic_id=isset($_GET['topic']) ? $_GET['topic']:'';
$tempate->categories=$topic->getAllCategory();
$tempate->topic=$topic->getTopicById($topic_id);
$tempate->title=$topic->getTopicById($topic_id)->title."?";
$tempate->replies=$topic->getAllRepies($topic_id);
$tempate->TopicsCount=$topic->getTotalTopics();
if(isset($_POST['send'])){
    if(!empty($_POST['body'])){
        $data['topic_id']=$topic_id;
        $data['user_id']=getUser()['user_id'];
        $data['body']=$_POST['body'];
        echo "<pre>";
        print_r($data);
        echo '</pre>';
        if($topic->createReply($data)){
            redirect('topic.php?topic='.$topic_id,'success created reply ','success');
        }
        else{
            redirect('topic.php?topic='.$topic_id,'retry please reply','error');
        }
    }
    else {
        redirect('topic.php?topic='.$topic_id,'fill the field please ','error');
    }
}






echo $tempate;

?>