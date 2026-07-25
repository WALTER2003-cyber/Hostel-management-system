<?php
class User{
private string $first_name;
private string $middle_name;
private string $last_name;
public function __construct(string $f, string $m, string $l){
$this->first_name = $f;
$this->middle_name = $m;
$this->last_name = $l;
}
public function setfirstname(string $fn){
    $this->first_name = $fn;
}
public function setmiddlename(string $mn){
    $this->middle_name = $mn;
}
public function setlastname(string $ln){
    $this->last_name = $ln;
}
public function getf_name(){
    return $this->first_name;
}
public function getl_name(){
    return $this->last_name;
}   
public function getm_name(){
    return $this->middle_name;
}
};