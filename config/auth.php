<?php
include "db.php";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn= new mysqli("localhost","root","@mike03!","hostelmanagement",3306);
//grabbing input from login page
if($_SERVER["REQUEST_METHOD"]=="POST"){


$email = htmlspecialchars($_POST['email'] ?? '');
$passw = htmlspecialchars($_POST['password'] ?? '');
// $encode_pass = password_hash($passw,PASSWORD_BCRYPT);


//retrieving data from database

try{
    $result = $conn->query("SELECT * FROM users WHERE email = '$email'");
    $row = $result->fetch_assoc();
    $json = json_encode($row);
}catch(mysqli_sql_exception $e){
    die ("Error occured").$e->getMessage();
}
$_SESSION['userid'] = $row['uuid'];
//creating variables for retrieved data
    $Email=$row['email'] ?? NULL;
    $pass=$row['password'] ?? NULL;
    $firstname=$row['f_name'] ?? NULL;
    $middlename=$row['m_name'] ?? NULL;
    $lastname=$row['l_name'] ?? NULL;
    // //veritying detils
    if(isset($_SESSION['userid'])){
    if(password_verify($passw,$pass)){
    if(($Email == $email)){
    header('location: ../dash.html?message = success');
    exit;
}else{
    header('location: ../login.html?message = unsuccess');
}
}
}
}