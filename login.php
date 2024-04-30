<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/heroes.css">
    <title>Document</title>
</head>
<body style="background-image: url('image/n.jpg'); background-repeat: no-repeat;background-size: 100%;color: #9a9d9f;;">
<div class="container col-xl-10 col-xxl-8 px-4 py-5" >
    <div class="row align-items-center g-lg-5 py-5">
      <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-4 fw-bold lh-1 mb-3">bienvenue dans notre site</h1>
        <p class="col-lg-10 fs-4">Pour participer aux voyage il faut que vous connectez ou inscrire sur notre site web</p>
        
        
      </div>
      <div class="col-md-10 mx-auto col-lg-5">
        <div class="p-4 p-md-5 border rounded-3 bg-dark">
          <form  action="verifUser.php" method="post">
          <div class="form-floating mb-3">
            <input type="text" name="login" class="form-control" id="floatingInput" placeholder="ecrir votre nom">
            <label for="floatingInput">Nom</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" name="mdp" class="form-control" id="floatingPassword" placeholder="mot de passe">
            <label for="floatingPassword">mot de passe</label>
          </div><br>
          <p id="incorrect" style="color:red; font-weight:bolder;"></p>
          <button class="w-100 btn btn-lg btn-primary" type="submit">se connecter</button>
          <hr class="my-4"><br>
          </form>
          <form action="inscription.php">
          <button type="submit" class='btn btn-outline-secondary' >S'inscrire</button></form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>