<?php 

    session_start();

    if($_SESSION['role'] == 'member') {
        header('location:web/main.php');
    } 
    elseif($_SESSION['role'] == 'admin')
    {
        header('location:admin/main.php');
    }    
    else 
    {
        header('location:web/main.php');
    }
?>