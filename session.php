<?php
session_start();

$_SESSION['username'] = $_POST['username'];
$_SESSION['passowrd'] = $_POST['password'];
$_SESSION['level'] = $_POST['level'];

if (isset($_SESSION['username']) 
and isset($_SESSION['password']) 
and isset($_SESSION['level'])) {
    
}