<?php
include "db.php";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
//variable declaration
if($_SERVER["REQUEST_METHOD"]=="POST"){
$firstname = htmlspecialchars($_POST['firstName'] ?? '');
$middlename = htmlspecialchars($_POST['middleName'] ?? '');
$lastname = htmlspecialchars($_POST['lastName'] ?? '');
$email = htmlspecialchars($_POST['email'] ?? '');
$password = htmlspecialchars($_POST['password'] ?? '');
$confirmpassword = htmlspecialchars($_POST['confirm'] ?? '');
}

//password encoding
 if(isset($firstname,$middlename,$lastname,$email,$password,$confirmpassword))
    {
$encode_pass = password_hash($password,PASSWORD_BCRYPT);
$verify_pass = password_hash($confirmpassword,PASSWORD_BCRYPT);

//insert query
if(password_verify($password,$verify_pass)){
        
        try{
            $query= "INSERT INTO users(f_name,m_name,l_name,email,password) values('$firstname','$middlename','$lastname','$email','$encode_pass')";
            $sent = $conn->query($query);
        }catch(mysqli_sql_exception $e){
            die ("error occured").$e->getMessage();
        }
            header('location:../login.html?msg=success');
            echo "location changed";
            exit;
    }}