<?php
    include('connectBDD.php');
    include('pubexpirer.php');
    $requete=$bdd->query("SELECT * FROM publication");
    $i=0;
    $requete=$bdd->query("SELECT * FROM publication LIMIT 0,1");
    while($don=$requete->fetch()){
        $requete=$bdd->query("SELECT * FROM publication LIMIT $i,1");
        $don=$requete->fetch();
        $a=$i+999;
        $r=$bdd->query("UPDATE `projet`.`publication` SET `id` = '".$a."' WHERE `publication`.`uid` =".$don[0]."");//ERREUR DE DEBUTANT 😅😅
        $i=$i+1;
        $requete=$bdd->query("SELECT * FROM publication LIMIT $i,1");
    }
    $i=$i-1;
    while($i>=0){
        $list=$bdd->query("SELECT * FROM publication LIMIT $i,1");
        $data=$list->fetch();
        echo "<html lang='en'>
        <head>
        <meta charset='UTF-8'>
        <link href='css/bootstrap.min.css' rel='stylesheet'>
        <link href='css/heroes.css' rel='stylesheet'>
        </head>
        <body>
        <div class='container col-xxl-8 px-4 py-5'>
            <div class='row flex-lg-row-reverse align-items-center g-5 py-5'>
                <div class='col-10 col-sm-8 col-lg-6'>
                    <img src='".$data[4]."' class='d-block mx-lg-auto img-fluid' width='700' height='500' loading='lazy'>
                </div>
                <div class='col-lg-6'>
                    <h1 class='display-5 fw-bold lh-1 mb-3'>".$data[2]."</h1>
                    <p class='lead'>".$data[3]."</p>";
                echo "</div>
            </div></div>";
// -----------------------------------------------------------------------------------------------------------------------------
if($_SESSION['a']=="administrateur"){
   echo" <details> <summary  class='w-100 btn btn-lg btn-primary'>liste des participants</summary>";
  echo"</BR>";
    $e=(count($data)/2);
    $d=7;
    echo "<div class='bd-example'><table class='table table-striped'><thead><tr>
    <th scope='col'>NOM</th>
    <th scope='col'>PRENOM</th>
    <th scope='col'>NUMERO</th>
    <th scope='col'>EMAIL</th></tr></thead><tbody>";
      while($d!=$e){
        if($data[$d]!=""){
          $req=$bdd->query("SELECT * FROM user WHERE login='".$data[$d]."'");
          $dn=$req->fetch();
          echo "<tr>";
            echo "<th>".$dn['login']."</th>";
            echo "<th>".$dn['prenom']."</th>";
            echo "<th>".$dn['num']."</th>";
            echo "<th>".$dn['email']."</th>";
            echo"<th><details> <summary  class='btn btn-secondary'>message</summary><div></div>
            <form action='' method='post'>
            <textarea name='message' aria-label='Écrire une votre suggetion à propos d'une voyage.' placeholder='Que voulez-vous dire&nbsp;?' rows='6'></textarea>
            <button type='submit' name='envoyer'  class='btn btn-secondary'>Envoyer</button></form>";
            
              if(isset($_POST['envoyer'])){
                  $message=$_POST['message'];
                  $donnes=$bdd->query("INSERT INTO demande (input,output,message) VALUES ('admin','".$dn[1]."','".$message."')");
                  }
          echo "<th></tr>";
        }
      $d=$d+1;
    }
    echo "</tbody></table></div></details></BR>";
  echo"<form action='acceuiladmin.php?page=divpub2' method='post'><button type='submit' name=".$data[1]." class='w-100 btn btn-lg btn-primary'>suprimer</button></form>";
  if(isset($_POST[$data[1]])){
      $list=$bdd->query("DELETE FROM `projet`.`publication` WHERE `publication`.`uid` = $data[0] LIMIT 1");
  }
}
else{
  echo " <details> <summary  class='w-100 btn btn-lg btn-primary'>a propos du voyage</summary>";
echo   "<div><div class='ard mb-4 rounded-3 shadow-sm border-primary'>
                <div class='card-header py-3 text-white bg-primary border-primary'>
                    <h4 class='my-0 fw-normal'>INFORMATION SUR LE VOYAGE</h4>
                </div>
                <div class='card-body'>
                    <h1 class='card-title pricing-card-title'>".$data[6]."<small class='text-muted fw-light'>/personne</small></h1>";
                    //------------------------test---------------------------------------
                    $e=(count($data)/2);
                    $d=7;
                    $nombre=0;
                      while($d!=$e){
                        if(!empty($data[$d])){
                          $nombre++;
                        }
                      $d++;
                    }
                    $place=10-$nombre;
                    //-------------------------test-------------------------------------
                    echo"<ul class='list-unstyled mt-3 mb-4'>";
                    echo"<li>date:".$data[5]."</li>";
                    $isa=strlen($data[5]);
                    echo"<li>nombre de place dispnible:".$place."</li>";
                    echo"<li>Phone and email support</li><li></li></ul>";
              if($nombre<10){
                if($data[$_SESSION['user']]==""){
                echo"<form action='' method='post'><button type='submit' name=".$data[1]." class='w-100 btn btn-lg btn-primary'>participer</button></form>";
                }
                else{
                  echo"  <form action='acceuil.php?page=divpub2#a' method='post'><button type='submit' name=".$data[1]." class='w-100 btn btn-lg btn-primary'>annuler la reservation</button></form>";
                }
              }
              else{
                echo"<form><button type='button' class='w-100 btn btn-lg btn-primary'>😅l equipe est complet 😅</button></form>";
              }
              if(isset($_POST[$data[1]])){
                $a=$_SESSION['user'];
                if($data[$a]==""){
                  $liste=$bdd->query("UPDATE publication SET $a='".$a."' WHERE uid=$data[0]");
                }
                else{
                  $liste=$bdd->query("UPDATE publication SET $a='' WHERE uid=$data[0]");
                }
              }
          echo "</div></div></details>";
        }
// -------------------------------------------------------------------------------------------------------------------
  echo "</body>
        </html>";
        echo "</main><div class='b-example-divider'></div>";
        $i=$i-1;
    }
?>