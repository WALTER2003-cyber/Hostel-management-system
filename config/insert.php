<?php
include "db.php";
require "capture.php";
//query to insert
$insert=$conn->query("INSERT INTO users(f_name,m_name,l_name,email,password) values('$firstname','$middlename','$lastname','$email','$encode_pass')");

echo " <br> success";