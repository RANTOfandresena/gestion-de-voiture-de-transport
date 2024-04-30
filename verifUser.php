
<?php
    session_start();
    include('connectBDD.php');
    $login=$_POST ["login"];
    $z=strlen($login);
    for($i=0;$i<$z;$i++){
        if($login[$i]==" "){ //eee
          $login[$i]="_";
        }
      }
    $motdepasse=$_POST ["mdp"]; 
    $donnes=$bdd->query("SELECT * FROM user WHERE login='".$login."'AND motdepasse='".$motdepasse."'");
    $i=0;
    while($donnees=$donnes->fetch()){
        $i=$i+1;
    }
    if($i==0){
        include("login.php");
        echo '<script>document.getElementById("incorrect").innerHTML="mot de passe incorrect";</script>';
    }
    else{
        $don=$bdd->query("SELECT * FROM user WHERE login='".$login."'AND motdepasse='".$motdepasse."'");
        $donnees=$don->fetch();
        $_SESSION['user']=$donnees['login'];
        $_SESSION['prenom']=$donnees['prenom'];
        $_SESSION['a']=$donnees[3];
        if($donnees[3]=="administrateur"){
            header("location:acceuiladmin.php");
        }
        else{
            header("location:acceuil.php");
        }
    }
?>