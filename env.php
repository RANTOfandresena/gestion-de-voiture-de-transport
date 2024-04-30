<?php
        $a=$_SESSION['user'];
        $list=$bdd->query("SELECT * FROM publication LIMIT $id,1");
        $data=$list->fetch();
        if($data[$_SESSION['user']]==""){
          $liste=$bdd->query("UPDATE publication SET $a='".$a."' WHERE uid=$data[0]");
        }
        else{
           $liste=$bdd->query("UPDATE publication SET $a='' WHERE uid=$data[0]");
        }
        echo '<meta http-equiv="refresh" content="0;URL=acceuil.php?page=divpube")';
?>