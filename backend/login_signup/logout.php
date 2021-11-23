<?php 
require_once('prosess_form_login.php');

if(isset($_SESSION['user']) && $_SESSION['user'] != null){
    var_dump($_SESSION['user']);
    unset($_SESSION['user']);
    header('Location: login.php');
}