<?php
    $host="localhost";
    $user="root";
    $password="";
    $db_name="projet";
    try{
        $bdd=new PDO("mysql:host=localhost;port=3306;dbname=$db_name",$user,$password);
        $bdd->setAttribute (PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
?> 