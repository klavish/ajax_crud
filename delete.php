<?php
include 'database.php';
if(isset($_GET['id'])){
$id = $_GET['id'];
$db = new Database();
$sql = "select * from users where id='$id'";
$result = $db->sql($sql);
if($result){
  $db->delete('users', "id='$id'");
  unset($_SESSION['user_id']);
  header('location:registration.php');
}
}
?>