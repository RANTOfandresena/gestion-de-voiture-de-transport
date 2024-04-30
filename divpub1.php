<?php
    $i=0;
    $requete=$bdd->query("SELECT * FROM publication LIMIT 0,1");
    $b="azertyuiopqsdfghjklmwxcvbn";
    $ar=array();
    while($don=$requete->fetch()){
        $ar[$i]=str_shuffle($b);
        $requete=$bdd->query("SELECT * FROM publication LIMIT $i,1");
    }
?>