<?php
session_start();
require_once "config.php";

session_destroy();
if(isset($_SESSION["admin_email"])){
    $path = ADMIN_BASE_URL . "ADLogin/";
    header("Location: $path");
}

if(isset($_SESSION["teacher_email"])){
    $path = Teacher_BASE_URL."TLogin/";
    header("Location: $path");
}

if(isset($_SESSION["parent_email"])){
    header("Location:".PARENT_BASE_URL);
}