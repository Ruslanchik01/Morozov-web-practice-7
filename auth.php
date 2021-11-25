<?php
session_start();
const ADMIN_EMAIL = 'admin@admin.com';
const ADMIN_PASSWORD = '111111';
if($_POST['email']!=ADMIN_EMAIL || $_POST['password']!=ADMIN_PASSWORD)
{
    header('Location: login.php');
}
else
{
    $_SESSION["auth"]=true;
    header('Location: logout.php');
}