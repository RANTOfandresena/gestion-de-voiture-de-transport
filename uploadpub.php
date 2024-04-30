<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/boostrap.min.css">
</head>
<body style="background-color: rgb(211, 207, 235);">
    <form style="width: 70%;margin-left: 20%;" method="post" action="" enctype="multipart/form-data">
        <legend> organiser un voyages </legend>
        <label for="nom"> ecrir le titre </label>
        <input type="text" name="titre" id="titre" class="form-control" id="floatingInput" placeholder="titre" required> <p></p>
        <label for="prenom"> legende </label>
        <textarea name="legende" class="form-control" id="floatingInput" placeholder="😁😁 à propos lieu 😁😁" rows="5"></textarea>
        <label for="datemax">date de depart:</label>
        <?php echo'<input type="date" min='.date('Y-m-d').' name="date"  id="floatingInput"><br>';?>
        <label for="nom"> prix du voyage </label>
        <input type="number" name="prix" id="titre" class="form-control" id="floatingInput" placeholder="entrer le prix du voyage" required> <p></p>
        <div class="mb-3">
          <input type="file" name="image" id="image" required class="form-control form-control-lg" aria-label="Large file input example">
        </div>
        <input type="submit" name="envoi">
    </form>
</body>
</html>
<?php
    include('connectBDD.php');
    if(isset($_POST['envoi'])){
        if(!empty($_FILES['image'])){
            if($_FILES['image']['size']<4000000){
                $verext=pathinfo($_FILES['image']['name']);
                $verext1=$verext['extension'];
                $autoriser=array('PNG','png','JPG','jpg','JPEG','jpeg');
                if(in_array($verext1,$autoriser)){
                    move_uploaded_file($_FILES['image']['tmp_name'], 'image/' . basename($_FILES['image']['name']));
                    $titre=$_POST['titre'];
                    $source="image/".$_FILES['image']['name'];
                    $legende=$_POST['legende'];
                    $z=strlen($legende);
                    for($i=0;$i<$z;$i++){
                        if($legende[$i]=="'"){ //eee
                          $legende[$i]=" ";
                        }
                      }
                      $date=$_POST['date'];
                    $donnes=$bdd->query("INSERT INTO publication (titre,legende,image,date,prix) VALUES ('".$titre."','".$legende."','".$source."','".$date."','".$_POST['prix']."')");
                }
                else {
                    echo "le fichier non autoriser";
                }
            }
            else{
                echo "le fichier <4MB ";
            }
        }
    }
// $requete=$bdd->query("INSERT INTO user(phone,motdepasse,typeuser) SELECT telephone,password,typeuser FROM inscription");
?>