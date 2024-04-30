<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body >
    <h4 class="h1 justify-content-between align-items-center mb-3">
          <span class="text-primary">Votre profil</span>
        </h4>
    <?php
    include('connectBDD.php');
    $profil=$bdd->query("SELECT * FROM user WHERE login='".$_SESSION['user']."'");
    $ds=$profil->fetch();
echo'<div class="row g-5">
        <div class="col-md-7 col-lg-8 order-md-last">';
// ----------------------------------------------------------------------------------------------
  echo'<h4 class="h3 justify-content-between align-items-center mb-3 text-center"><span class="text-primary">Modification de votre profil</span></h4>
  <form method="post" class="card p-2">
          <div class="input-group">
            <input type="text" name="a1" class="form-control" placeholder="Votre adress">
            <button type="submit" name="1" class="btn btn-secondary">modifier</button>
          </div>
        </form>

        <form method="post" class="card p-2">
        <div class="input-group">
          <input type="tel" pattern="[0-9]{10}" name="a2" class="form-control" placeholder="03********(10 chiffre)">
          <button type="submit" name="2" class="btn btn-secondary">modifier</button>
        </div>
      </form>

      <form method="post" class="card p-2">
      <div class="input-group">
        <input type="email" name="a3" class="form-control" placeholder="Votre email">
        <button type="submit" name="3" class="btn btn-secondary">modifier</button>
      </div>
    </form>

    <form method="post" class="card p-2">
    <div class="input-group">
      <input type="password" name="a4" class="form-control" placeholder="Votre mot de passe"><br>
      <input type="password" name="a5" class="form-control" placeholder="confirmer votre mot de passe">
      <button type="submit" name="4" class="btn btn-secondary">modifier</button>
    </div>
    <p id="aze" style="color:red; font-weight:bolder;"></p>
  </form>';
  $req=$bdd->query("SELECT * FROM user WHERE login='".$_SESSION['user']."'");
  $aze=$req->fetch();
  if(isset($_POST['1'])){
    if($_POST['a1']!=""){$donnes=$bdd->query("UPDATE user SET domicile = '".$_POST['a1']."' WHERE uid=$aze[0]");}
    echo '<meta http-equiv="refresh" content="0;URL=acceuil.php?page=profil")';
  }
  if(isset($_POST['2'])){
    if($_POST['a2']!=""){$donnes=$bdd->query("UPDATE user SET num = '".$_POST['a2']."' WHERE uid=$aze[0]");}
    echo '<meta http-equiv="refresh" content="0;URL=acceuil.php?page=profil")';
  }
  if(isset($_POST['3'])){
    if($_POST['a3']!=""){$donnes=$bdd->query("UPDATE user SET `email` = '".$_POST['a3']."' WHERE uid=$aze[0]");}
    echo '<meta http-equiv="refresh" content="0;URL=acceuil.php?page=profil")';
  }
  if(isset($_POST['4'])){
    if($_POST['a4']==$_POST['a5']){
      if($_POST['a4']!=""){ $donnes=$bdd->query("UPDATE user SET `motdepasse` = '".$_POST['a4']."' WHERE uid=$aze[0]");}
      echo '<meta http-equiv="refresh" content="0;URL=acceuil.php?page=profil")';
    }
    else{
      echo '<script>document.getElementById("aze").innerHTML="verifier que les deux mot de passe sont le même"</script>';}
  }
// ----------------------------------------------------------------------------------------------
        echo '</div>
        <div class="col-md-5 col-lg-4 ">
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Votre nom</h6>
              <small class="text-muted">'.$ds['login'].'</small>
            </div>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Votre prenom</h6>
              <small class="text-muted">'.$ds['prenom'].'</small>
            </div>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">adress</h6>
              <small class="text-muted">'.$ds['domicile'].'</small>
            </div>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
          <div>
            <h6 class="my-0">Numero de telephone</h6>
            <small class="text-muted">'.$ds['num'].'</small>
          </div>
        </li>
          <li class="list-group-item d-flex justify-content-between bg-light">
            <div class="text-success">
              <h6 class="my-0">Adress email</h6>
              <small>'.$ds['email'].'</small>
            </div>
          </li>
        </ul>
      </div>
      </div>';
      ?>
</body>
</html>