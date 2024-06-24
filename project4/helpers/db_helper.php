<?php 
function replyCount($topic_id){
$db=new database();
$db->query("SELECT * FROM replies WHERE topic_id=$topic_id");
$rows=$db->resultSet();
return $db->rowCount();
}
function TopicCount($category_id){
    $db=new database();
    $db->query("SELECT * FROM topics WHERE category_id=:category_id");
    $db->bind(':category_id',$category_id);
    $rows=$db->resultSet();
    return $db->rowCount();
}
function UserPostCount($user_id){
    $db=new database();
    $db->query("SELECT * FROM topics WHERE user_id=$user_id") ;
    $rows=$db->resultSet();
    $topic_count=$db->rowCount();
    $db->query("SELECT * FROM replies WHERE user_id=$user_id") ;
    $rows=$db->resultSet();
    $reply_count=$db->rowCount();
    return $reply_count+$topic_count;
}


