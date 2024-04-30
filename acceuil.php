<?php
include('connectBDD.php');
include('pubexpirer.php');
 session_start();
if(empty($_SESSION['user'])){ 
    header("location:index.php");}
    
    $page="divpube";
    if(isset($_GET['page'])){
        $page=$_GET['page'];
    }
    if(isset($_GET['id'])){
        $id=$_GET['id'];
    }
    include('header.php');
    include($page.'.php');
    // include('footer.php');
?>