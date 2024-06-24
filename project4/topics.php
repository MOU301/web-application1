<?php 
include 'core/init.php';
$topic=new topic;
$tempate=new template('templates/topics_page.php');
$tempate->categories=$topic->getAllCategory();
$tempate->TopicsCount=$topic->getTotalTopics();

$category_id=isset($_GET['category']) ? $_GET['category']:null;
$user_id=isset($_GET['user']) ? $_GET['user']:null;
if(isset($category_id)){
    $tempate->title="Post In :" .$topic->getCategory($category_id)->name;
    $tempate->topics=$topic->getTopicsById($category_id);
}
elseif(isset($user_id)){
    $tempate->title="Post In :" .$topic->getUser($user_id)->name;
    $tempate->topics=$topic->getTopicsByIdUser($user_id);
}





echo $tempate;

?>