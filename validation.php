<?php
include 'database.php';
class Validation{
    private $data;
    private $errors = [];

    public function __construct($data)
    {
        $this->data = $data;
    }

    private function clean($data){
        return htmlspecialchars(stripslashes(trim($data)));
    }

    private function validateField($field, $name, $pattern, $minLength, $maxLength, $errorMessage){

        $value = $this->clean($this->data[$field]);
        if(empty($value)){
            $this->addError($field, "$name cannot be empty");
        }elseif(!preg_match($pattern, $value)){
            $this->addError($field, $errorMessage);
        }elseif(strlen($value) < $minLength || strlen($value) > $maxLength){
            $this->addError($field, "$name must be between $minLength - $maxLength");
        }
    }

    private function validateName($field){
        $this->validateField($field, ucfirst($field), "/^[A-Za-z ]+$/", 3, 50, 'Invalid'.ucfirst($field).' format');
    }

    private function validateEmail($field){
        $this->validateField($field, 'Email', "/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Z|a-z]{2,}$/", 1, 255, "Invalid email format");
    }
    
    private function validateContact($field){
        $this->validateField($field, 'Contact', "/^[0-9]{10}$/", 10, 10, "Invalid Contact Number");
    }

    private function validatePassword($field){
        $this->validateField($field, 'Password', "/^[A-Za-z0-9@#]+$/", 8, 15, 'Password must contain letters, numbers, and special characters(@, #)');
    }

    private function validateGender(){
        if(!isset($this->data['gender'])){
            $this->addError('gender', 'Please select a gender');
        }
    }

    private function validateAddress(){
        $this->validateField('address', 'Address', "/[A-Za-z0-9. ]+$/", 10, 500, 'Only letters, numbers and spaces are allowed');
    }

    public function validate_Login_Details(){
        $this->validateEmail('email');
        $this->validatePassword('password');
        return $this->errors;
    }

    private function userDuplicateData(){
        $db = new Database();
        $email = $this->clean($this->data['email']);
        $password = $this->clean($this->data['password']);

        //Check if email exists in db
        if($db->selectId("SELECT email FROM users WHERE email = '$email' ")){
        $this->addError('email', 'This email is already taken');
        }

        //Check if passwod exists
        $hashedPassword = $db->selectId("SELECT password FROM users WHERE email = '$email'");
        if($hashedPassword){
            if(password_verify($password, $hashedPassword)){
                $this->addError('password', 'This password has already taken');
            }
        }
    }

    private function addError($key, $message){
        $this->errors[$key] = $message;
    }

    public function validateUserDetails(){
        $this->validateName('fname');
        $this->validateName('lname');
        $this->validateEmail('email');
        $this->validateContact('contact');
        $this->validatePassword('password');
        $this->validateGender();
        $this->validateAddress();
        return $this->errors;
    }
}
?>