<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/features.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div style="width: 70%;margin-left: 20%;" class="container px-4 py-5" id="featured-3">
    <h2 class="pb-2 border-bottom">Demande des clients</h2>
    <?php
    include('connectBDD.php');
    $donnes=$bdd->query("SELECT * FROM `demande`");
    $dem=0;
    while($don=$donnes->fetch()){$dem++;}
    $dem=$dem-1;
    while($dem>=0){
      $requete=$bdd->query("SELECT * FROM `demande` LIMIT $dem , 1");
      $don=$requete->fetch();
      if($don[1]!="admin"){ echo "<div dir='rtl'>";}
      else{ echo "<div >";}
        echo "<div class='feature col'>
        <p>".$don[1].' vers '.$don[2]."</p>
        <p class='h1'><span class='badge bg-primary'>".$don[3]."</span></p>";
        if($don[1]!="admin"){
        echo "<details> <summary  class='btn btn-outline-dark'>repondre</summary>
        <div><form action='' method='post'>
        <textarea name='message' aria-label='Écrire une votre suggetion à propos d'une voyage.' placeholder='Que voulez-vous dire&nbsp;?' rows='3'></textarea>
        <button type='submit' name=$dem  class='btn btn-secondary'>Envoyer</button></form>
        </div></details>";
        if(isset($_POST[$dem])){
          $message=$_POST['message'];
          $donnes=$bdd->query("INSERT INTO demande (input,output,message) VALUES ('admin','".$don[1]."','".$message."')");
          header("location:acceuiladmin.php?page=message");
        }
      }
        echo"</a>
      </div>
    </div>";
    $dem--;
    }
    ?>
  </div>
</body>
</html>