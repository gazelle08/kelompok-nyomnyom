<?php session_start();

$conn = mysqli_connect('localhost','','styleme');

if(!$conn){
    die('Database tidak terhubung');
}

$db = $conn->select_db('styleme');

function is_logged_in(){
    if(isset($_SESSION['username'])){
        return true;
    } else {
        return false;
    }
}