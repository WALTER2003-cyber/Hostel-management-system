<?php
//verify password
function verifypassword(){
    if(isset($encode_pass) && isset($encode_pass) && $encode_pass === $verify_pass){
        return "correct";
    }else{
        return "incorrect";
    }
}