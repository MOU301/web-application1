<?php 
include 'core/init.php';
$topic=new topic;
$tempate=new template('templates/front_page.php');
$tempate->topics=$topic->getAllTopic();
$tempate->categories=$topic->getAllCategory();
$tempate->TotalTopics=$topic->getTotalTopics();
$tempate->TotalCategories=$topic->getTotalGategory();
$tempate->title="Welcome To Talkingspace";
$tempate->TopicsCount=$topic->getTotalTopics();





echo $tempate;

?>