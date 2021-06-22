<?php
session_start();

if(isset($_SESSION["admin_email"])){
    session_destroy();
    $path = ADMIN_BASE_URL . "ADLogin/";
    header("Location: $path");

}

if(isset($_SESSION["teacher_email"])){
    session_destroy();
    $path = Teacher_BASE_URL."TLogin/";
    header("Location: $path");
}