<?php 
require_once('prosess_form_login.php');

if(isset($_SESSION['user']) && $_SESSION['user'] != null){
    unset($_SESSION['user']);
    header('Location: login.php');
}