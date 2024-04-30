<?php
    include('connectBDD.php');
    $login=$_POST["nom"];
    $z=strlen($login);
    for($i=0;$i<$z;$i++){
      if($login[$i]==" "){
        $login[$i]="_";
      }
    }
    $profil=$bdd->query("SELECT * FROM user ");
    $tsmety=0;
    while($ds=$profil->fetch()){
      if($login==$ds['login']){$tsmety++;}
    }
    if($tsmety==0){
      $prenom=$_POST["prenom"];
      $domocile=$_POST["domicile"];
      $numero=$_POST["numero"];
      $email=$_POST["email"];
      if($_POST["mdp1"]==$_POST["mdp2"]){
        include('login.php');
        $motdepasse=$_POST["mdp1"];
        $donnes=$bdd->query("INSERT INTO user (uid,login,motdepasse,typeUser,prenom,domicile,num,email) VALUES 
        (NULL,'".$login."','".$motdepasse."','utilisateur','".$prenom."','".$domocile."','".$numero."','".$email."')");
        $don=$bdd->query("SELECT * FROM user WHERE login='".$login."'AND motdepasse='".$motdepasse."'");
        $data=$don->fetch();
        $d=$bdd->query("ALTER TABLE publication ADD $login VARCHAR( 50 ) NOT NULL");
      }
      else{
        include("inscription.php");
        echo '<script>document.getElementById("aaa").innerHTML="verifier que les deux mot de passe sont le même"</script>';
      }
    }
    else{
      include('inscription.php');
      echo '<script>document.getElementById("deja").innerHTML="le nom est dejat prise par une  aurtre personne";</script>';
    }
?>