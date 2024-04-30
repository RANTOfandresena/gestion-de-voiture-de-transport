<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <title> Accueil </title>
    </head>   
    <body>
    <!-- @media (min-width: 768px)
.col-md-10 {
    flex: 0 0 auto;
    width: 80.333333%;
} -->
        <fieldse >
        <legend class='text-center h1'> Fiche de renseignement </legend>
        <form style="width: 70%;margin-left: 20%;" method="post" action="uploadinfo.php">
        <h2> information </h2>
        <div class="form-floating">
            <input type="text" name="nom" class="form-control" id="floatingInput" placeholder="ecrir votre Nom " required>
            <label for="floatingInput">ecrir votre Nom </label>
            <p id="deja" style="color:red; font-weight:bolder;"></p>
        </div>
        <div class="form-floating">
            <input type="text" name="prenom" class="form-control" id="floatingInput" placeholder="ecrir votre prenom" required>
            <label for="floatingInput">ecrir votre prenom</label>
        </div><br>
            
        <div class="form-floating">
      <input type="text" name="domicile" class="form-control" id="floatingInput" placeholder="adress" required>
      <label for="floatingInput">adress</label>
    </div>
            
        <h2> CONTACTS </h2>
        <div class="form-floating">
            <input type="tel" pattern="[0-9]{10}" name="numero" class="form-control" id="floatingInput" placeholder="03********(10 chiffre)" required>
            
            <label for="floatingInput">03********(10 chiffre)</label>
        </div><br>

        <div class="form-floating">
            <input type="text" name="email" class="form-control" id="floatingInput" placeholder="adress mail" required>
            <label for="floatingInput">adress mail</label>
        </div><p></p>
        <div class="form-floating">
      <div class="input-group">
      <input type="password" name="mdp1" class="form-control" placeholder="Votre mot de passe" required>
      <input type="password" name="mdp2" class="form-control" placeholder="confirmer votre mot de passe" required>
    </div>
    <p id="aaa" style="color:red; font-weight:bolder;"></p>
    </div>
    <button type="submit" name="subscribe" class="w-100 btn btn-dark btn-primary" >S'inscrire</button>
        </form>
        </fieldset>   
    </body>   
</html>