<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/pricing.php">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<h4 class="h1 justify-content-between align-items-center mb-3 text-center">
          <span class="text-primary">tous les comptes</span>
        </h4>
<div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
<?php
    $a=0;
    $requete=$bdd->query("SELECT * FROM user LIMIT $a,1");
    while($don=$requete->fetch()){
        if($don[3]!="administrateur"){
        echo"  <div class='col'>
            <div class='card mb-4 rounded-3 shadow-sm'>
            <div class='card-header py-3'>";
        echo "<h4 class='my-0 fw-normal'>".$don['login']."</h4>
            <h4 class='my-0 fw-normal'>".$don['prenom']."</h4>
            </div>
            <div class='card-body'>
            <ul class='list-unstyled mt-3 mb-4'>
              <li>lieu:<br>".$don['domicile']."</li>
              <li>numero de telephone:<br>".$don['num']."</li>
              <li>adress email: <br>".$don['email']."</li>
            </ul>";
            echo"<details> <summary  class='btn btn-secondary'>message</summary><div></div>
            <form action='' method='post'>
            <textarea name='message' aria-label='Écrire une votre suggetion à propos d'une voyage.' placeholder='Que voulez-vous dire&nbsp;?' rows='6'></textarea>
            <button type='submit' name='".$don['login']."'  class='btn btn-secondary'>Envoyer</button></form></details>";  
            if(isset($_POST[$don['login']])){
              $message=$_POST['message'];
              $donnes=$bdd->query("INSERT INTO demande (input,output,message) VALUES ('admin','".$don['login']."','".$message."')");
              }
            echo"<form action='' method='post'><button type='submit' name=".$don[0]." class='btn btn-outline-danger'>supprimer</button><form>";
            if(isset($_POST[$don[0]])){
                $requet=$bdd->query("DELETE FROM user WHERE uid=$don[0]");
                $reque=$bdd->query("ALTER TABLE `publication` DROP $don[1]");
                header("location:acceuiladmin.php?page=list2");
            }
         echo" </div>
        </div>
        </div>";}
        $a=$a+1;
        $requete=$bdd->query("SELECT * FROM user LIMIT $a,1");
    }
?>
    </div>
</body>
</html>