<?php
require_once 'validation.php';
require_once 'user.php';
if (isset($_POST['register'])) {
    $validation = new Validation($_POST);
    $errors = $validation->validateUserDetails();
    if (empty($errors)) {
        $user = new User();
        $result = $user->addUser($_POST);
        if ($result) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
    } else {
        echo json_encode(['errors' => $errors]);
    }
}

if(isset($_POST['login'])){
   $validation = new Validation($_POST);
   $errors = $validation->validate_Login_Details();
   if(empty($errors)){
    $user = new User();
    $user->login($_POST['email'], $_POST['password']);
   }
}

if(isset($_GET['id'])){
   $id = $_GET['id'];
   $db = new Database();
   $db->sql("select * from users where id='$id'");
   $result = $db->getResult();
   foreach($result as $row){

   }
}

if(isset($_POST['update'])){
    $validation = new Validation($_POST);
    $errors = $validation->validateUserDetails();
    if (empty($errors)) {
        $user = new User();
        $errors = $user->updateUser($_POST);
    }
}
?>