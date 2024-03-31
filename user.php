<?php
session_start();
include_once 'database.php';
class User{

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function addUser($data){
      $userData = [
        'fname' => $_POST['fname'],
        'lname' => $_POST['lname'],
        'email' => $_POST['email'],
        'contact' => $_POST['contact'],
        'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
        'gender' => $_POST['gender'],
        'address' => $_POST['address'],
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ];
      $inserted = $this->db->insert('users', $userData);
      // if($inserted){
      //   echo 1;
      //   //header('location: login.php');
      // }else{
      //   echo 0;
      //  // header('location: registration.php');
      // }
    }

    public function updateUser($data){
        $id = $_SESSION['user_id'];
        $userData = [
            'fname' => $_POST['fname'],
            'lname' => $_POST['lname'],
            'email' => $_POST['email'],
            'contact' => $_POST['contact'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'gender' => $_POST['gender'],
            'address' => $_POST['address'],
            'updated_at' => date('Y-m-d H:i:s'),
          ];
          $updated = $this->db->update('users', $userData, "id='$id'");
          if($updated){
            header('location: index.php');
        }else{
            header('location: login.php');
        }
    }

  
    public function login($email, $password){
       $sql = "select * from users where email= '$email'";
       $this->db->sql($sql);
       $user = $this->db->getResult();
       if($user && password_verify($password, $user[0]['password'])){
       $_SESSION['user_id'] = $user[0]['id'];
        header('location: index.php');
       }
    }

}
?>