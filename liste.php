<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div class="bd-example"><table class="table table-striped"><thead><tr>
            <th scope="col">uid</th>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Adresse</th>
            <th scope="col">Numero</th>
            <th scope="col">Email</th></tr></thead><tbody>
            <?php
    $a=0;
    $requete=$bdd->query("SELECT * FROM user LIMIT $a,1");
    while($don=$requete->fetch()){
        echo '<tr>';
        echo '<th scope="row">'.$don['uid'].'</th>';
        echo '<td>'.$don['login'].'</td>';
        echo '<td>'.$don['prenom'].'</td>';
        echo '<td>'.$don['domicile'].'</td>';
        echo '<td>'.$don['num'].'</td>';
        echo '<td>'.$don['email'].'</td>';
        if($don[3]!="administrateur"){
            echo"<td><form action='' method='post'><button type='submit' name=".$don[0]." class='btn btn-outline-danger'>supprimer</button><form></td>";
            if(isset($_POST[$don[0]])){
                $requet=$bdd->query("DELETE FROM user WHERE uid=$don[0]");
                $reque=$bdd->query("ALTER TABLE `publication` DROP $don[1]");
                header("location:acceuiladmin.php?page=liste");
            }
            echo"<td><form action='' method='post'><button type='submit' name=".$a." class='btn btn-outline-danger'>supprimer</button><form></td>";
        }
        echo '</tr>';
        $a=$a+1;
        $requete=$bdd->query("SELECT * FROM user LIMIT $a,1");
    }
?>
        </tbody>
    </table>
</div>

</body>
</html>