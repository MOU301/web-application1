<?php 
include 'database.php';
class topic{
private $db;
public function __construct()
{
   $this->db=new database() ;
}
public function getAllTopic(){
    $q="SELECT `topics`.*,`users`.`username`,`users`.`avatar`,`categories`.`name` 
    FROM `topics` 
    INNER JOIN `users` 
    on `topics`.`user_id`=`users`.`id` 
    INNER JOIN `categories` 
    on `topics`.`category_id`=`categories`.`id` 
    ORDER BY `create_date` DESC";
    // $q="SELECT * FROM `topics`";
    $this->db->query($q);
    $result=$this->db->resultSet();
    return $result;
}

public function getAllRepies($topic_id){
    $q="SELECT `replies`.*,`users`.`username`,`users`.`avatar` 
    FROM `replies` 
    INNER JOIN `users` 
    on `replies`.`user_id`=`users`.`id`
    WHERE `replies`.`topic_id`=:topic_id  
    ORDER BY `create_date` DESC";
    $this->db->query($q);
    $this->db->bind(':topic_id',$topic_id);
    $result=$this->db->resultSet();
    return $result;
}
 public function getTopicsById($category_id){
    $q="SELECT `topics`.*,`users`.`username`,`users`.`avatar`,`categories`.`name` 
    FROM `topics` 
    INNER JOIN `users` 
    on `topics`.`user_id`=`users`.`id` 
    INNER JOIN `categories` 
    on `topics`.`category_id`=`categories`.`id`
    WHERE `topics`.`category_id`=$category_id 
    ORDER BY `create_date` DESC";
    
    $this->db->query($q);

    $result=$this->db->resultSet();
    return $result;
}
public function getTopicsByIdUser($user_id){
    $q="SELECT `topics`.*,`users`.`username`,`users`.`avatar`,`categories`.`name` 
    FROM `topics` 
    INNER JOIN `users` 
    on `topics`.`user_id`=`users`.`id` 
    INNER JOIN `categories` 
    on `topics`.`category_id`=`categories`.`id`
    WHERE `topics`.`user_id`=$user_id 
    ORDER BY `create_date` DESC";
    
    $this->db->query($q);

    $result=$this->db->resultSet();
    return $result;
}
public function getTopicById($topic_id){
    $q="SELECT `topics`.*,`users`.`username`,`users`.`avatar`,`categories`.`name` 
    FROM `topics` 
    INNER JOIN `users` 
    on `topics`.`user_id`=`users`.`id` 
    INNER JOIN `categories` 
    on `topics`.`category_id`=`categories`.`id`
    WHERE `topics`.`id`=$topic_id ";
    
    $this->db->query($q);

    $result=$this->db->single();
    return $result;
}
public function getAllCategory(){
    $q="SELECT * FROM `categories`";
    $this->db->query($q);
    return $this->db->resultSet();
}
public function getCategory($category_id){
    $this->db->query("SELECT * FROM categories WHERE id=$category_id");
  $row=$this->db->single();
  return $row ;
}
public function getUser($user_id){
    $this->db->query("SELECT * FROM users WHERE id=$user_id");
  $row=$this->db->single();
  return $row ;
}
public function getTotalTopics(){
    $this->db->query('SELECT * FROM `topics`');
    $rows=$this->db->resultSet();
    return $this->db->rowCount();
}
 public function getTopicByCategoryId($id){
  $this->db->query('SELECT * FROM `topics` WHERE `category_id`=:id');
  $this->db->bind(':id',$id);
    $rows=$this->db->resultSet();
    return $this->db->rowCount();
 }

public function getTotalGategory(){
    $this->db->query('SELECT * FROM `categories`');
    $rows=$this->db->resultSet();
    return $this->db->rowCount();
}

public function getTotalReplies($topic_id){
    $this->db->query("SELECT * FROM `replies` WHERE `topic_id`='$topic_id'");
    $rows=$this->db->resultSet();
    return $this->db->rowCount();
}
public function create($data){
    $q="INSERT INTO `topics` (`title`, `category_id`, `body`, `user_id`, `last_activity`) 
  VALUES (:title, :category_id, :body, :user_id, :last_activity)";
  $this->db->query($q);
  $this->db->bind(':title',$data["title"]);
  $this->db->bind(':category_id',$data["category_id"]);
  $this->db->bind(':body',$data["body"]);
  $this->db->bind(':user_id',$data["user_id"]);
  $this->db->bind(':last_activity',$data["last_activity"]);
  if($this->db->execute()){
    return true;
  }
  else{ 
    return false;
  }
   
}
  public function createReply($data){
    $q="INSERT INTO `replies` (`topic_id`, `user_id`, `body`) 
    VALUES (:topic_id, :user_id, :body)";
    $this->db->query($q);
    $this->db->bind(':topic_id',$data['topic_id']);
    $this->db->bind(':user_id',$data['user_id']);
    $this->db->bind(':body',$data['body']);
    if($this->db->execute()){
      return true;
    }
    else{ 
      return false;
    }
  }


}
?>