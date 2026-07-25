<?php
$conn= new mysqli("localhost","root","@mike03!","hostelmanagement",3306);
//check connection
if($conn->connect_error){
    echo("failure").$conn->connect_error;}
    $id = session_id();
    echo " $id";