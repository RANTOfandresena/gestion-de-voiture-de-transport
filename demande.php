<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <form action="" method="post">  
          <p>ici vous pouvez ecrire une petite message envoyer au administrateur de se site</p><br>
          <p>Vous pouvez nous suggerez une voyage </p>
          <textarea name="message" aria-label="Écrire une votre suggetion à propos d'une voyage." placeholder="Que voulez-vous dire&nbsp;?" rows="6"></textarea>
          <button type="submit" name="envoyer"  class="btn btn-secondary">Envoyer</button>
        </form>
    </div>
</body>
</html> -->
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
  <div style="width: 60%;margin-left: 20%;" class="container px-4 py-5" id="featured-3">
    <h2 class="pb-2 border-bottom">Votre demande</h2>
    <P>Ici vous pouvez propose une idee sur un voyage</P>
    <div class="container px-1 py-1" id="featured-3">
    <div class="feature col">
      
      <form action="acceuil.php?page=demande" method="post">
      <textarea name="message" aria-label="Écrire une votre suggetion à propos d'une voyage." placeholder="Que voulez-vous dire&nbsp;?" rows="3"></textarea>
      <button type="submit" name="envoyer"  class="btn btn-secondary">Envoyer</button></form>
      <?php
        if(isset($_POST['envoyer'])){
            include('connectBDD.php');
            $message=$_POST['message'];
            $donnes=$bdd->query("INSERT INTO demande (input,output,message) VALUES ('".$_SESSION['user']."','admin','".$message."')");
            }
        ?>
        <svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"/></svg>
      </a>
    </div>
  </div>
    <?php
    include('connectBDD.php');
    $donnes=$bdd->query("SELECT * FROM `demande` LIMIT 0 , 30");
    $dem=0;
    while($don=$donnes->fetch()){$dem++;}
    $dem=$dem-1;
    while($dem>=0){
      $requete=$bdd->query("SELECT * FROM `demande` LIMIT $dem , 1");
      $don=$requete->fetch();
      if($don[1]==$_SESSION['user'] && $don[2]=='admin'){
    echo "<div class='row g-1 py-1 row-cols-1 row-cols-lg-1'>
      <div class='feature col'>
        <p>".$don[1]."</p>
        <p class='h1'><span class='badge bg-primary'>".$don[3]."</span></p>";

        echo"
        </a>
      </div>
    </div>";
    }
    if($don[2]==$_SESSION['user'] && $don[1]=='admin'){
        echo "<div  dir='rtl'>
        <div>
          <p>".$don[1]."</p>
          <p class='h1'><span class='badge bg-primary'>".$don[3]."</span></p>";
  
          echo"  <svg class='bi' width='1em' height='1em'><use xlink:href='#chevron-right'></use></svg>
          </a>
        </div>
      </div>";
        }
    $dem=$dem-1;
    }
    ?>
  </div>
</div><br>
</body>
</html>

