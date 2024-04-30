
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Album</title>
<link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
  </head>
  <body>
    <div>
<main>
  <?php
      include('connectBDD.php');
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
    echo "<div class='album py-5 bg-light'>
    <div class='container'>
    <div class='row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3'>";
      $i=$i-1;
      while($i>=0){
        $list=$bdd->query("SELECT * FROM publication LIMIT $i,1");
        $data=$list->fetch();
        echo"<div class='col'>
        <div class='card shadow-sm'>
        <img src='".$data[4]."'>
        <div class='card-body'>
        <h1 class='display-5 fw-bold lh-1 mb-3'>".$data[2]."</h1>
        <p class='card-text'>".$data[3]."</p>";
        $daty=date_create($data[5]);
        $daty1=date_create(date('Y-m-d'));
        $jours=date_diff($daty1,$daty)->format('%R%a');
        // $jours[0]="";
        echo "<p class=h5> dans $jours jours </p>";
//-------------------------------------------------------------------------------------------
        echo "<div class='d-flex justify-content-between align-items-center'>
        <div class='btn-group'>";
        if($_SESSION['a']=="administrateur"){
          echo" <details> <summary  class='btn btn-sm btn-outline-secondary'>liste des participants</summary>";
          echo"</BR>";
          $e=(count($data)/2);
          $d=7;
          echo "<div class='bd-example'><table class='table table-striped'><thead><tr>
          <th scope='col'>NOM</th>
          <th scope='col'>NUMERO</th></tr></thead><tbody>";
          $part=0;
          while($d!=$e){
            if($data[$d]!=""){
              $req=$bdd->query("SELECT * FROM user WHERE login='".$data[$d]."'");
              $dn=$req->fetch();
              $part++;
                echo "<tr>";
                echo "<th>".$dn['login']."</th>";
                echo "<th>".$dn['num']."</th>";
                echo"<th><details> <summary  class='btn btn-secondary'>message</summary><div></div>
                <form action='' method='post'>
                <textarea name='message' aria-label='Écrire une votre suggetion à propos d'une voyage.' placeholder='Que voulez-vous dire&nbsp;?' rows='6'></textarea>
                <button type='submit' name=$data[$d] class='btn btn-secondary'>Envoyer</button></form>";  
                if(isset($_POST[$data[$d]])){
                  $message=$_POST['message'];
                  $donnes=$bdd->query("INSERT INTO demande (input,output,message) VALUES ('admin','".$dn[1]."','".$message."')");
                  }    
                  echo "<th></tr>";
            }
                   $d=$d+1;
          }
          if($part==0){echo"<p class='list-group-item list-group-item-action list-group-item-warning'>aucunne participant pour l'instant</a>";}
          echo "</tbody></table></div></details></BR>";
          echo"<form action='acceuiladmin.php?page=divpube' method='post'><button type='submit' name=".$data[1]." class='btn btn-sm btn-outline-secondary'>suprimer</button></form>";
          if(isset($_POST[$data[1]])){
            $list=$bdd->query("DELETE FROM `projet`.`publication` WHERE `publication`.`uid` = $data[0] LIMIT 1");
            header("location:acceuiladmin.php");
            }
        }
        else{
          echo " <details> <summary  class='btn btn-sm btn-outline-secondary'>a propos du voyage</summary>";
          echo   "<div><div class='ard mb-4 rounded-3 shadow-sm border-primary'>
                  <div class='card-header py-3 text-white bg-primary border-primary'>
                  <h4 class='my-0 fw-normal'>INFORMATION SUR LE VOYAGE</h4>
                  </div>
                  <div class='card-body'>
                  <h1 class='card-title pricing-card-title'>".$data[6]."AR</h1>";
                //------------------------test---------------------------------------
                  $e=(count($data)/2);
                  $d=7;
                  $nombre=0;
                  while($d!=$e){
                    if(!empty($data[$d])){$nombre++;}
                    $d++;
                    }
                  $place=9-$nombre;
                //-------------------------test-------------------------------------
                  echo"<ul class='list-unstyled mt-3 mb-4'>";
                  $daty=date_create($data[5]);
                  $daty1=date_create(date('Y-m-d'));
                  $jours=date_diff($daty1,$daty)->format('%R%a');
                  // $jours[0]="";
                  echo"<li>date du depart:".$data[5]."(dans ".$jours." jours)</li>";
                  echo"<li>nombre de place dispnible:".$place."</li>";
                  
                  if($data[$_SESSION['user']]==""){
                    if($nombre<9){
                      echo"<form method='post'><button onclick='excecute()' type='submit' name=".$data[1]." class='w-100 btn btn-lg btn-primary'>participer</button></form>";
                    }
                    else{
                      echo"<button type='button' class='w-100 btn btn-lg btn-primary'>l'equipe est dejat complet<br>😅😅</button>";
                    }
                  }
                  else{
                    echo"  <form method='post'><button onclick='exe()' type='submit' name=".$data[1]." class='w-100 btn btn-lg btn-primary'>annuler la reservation</button></form>";
                  }
                  if(isset($_POST[$data[1]])){
                  $a=$_SESSION['user'];
                      if($data[$a]==""){
                        $liste=$bdd->query("UPDATE publication SET $a='".$a."' WHERE uid=$data[0]");
                        
                        // for($ss=0;$ss<=3000;$ss++){echo"<div></div>";}
                        header("location:acceuil.php?page=divpube");
                      }
                      else{
                        
                         $liste=$bdd->query("UPDATE publication SET $a='' WHERE uid=$data[0]");
                         for($ss=0;$ss<=3000000;$ss++){echo"<div></div>";}
                        header("location:acceuil.php?page=divpube");
                      }
                  }
                  echo "</div></div></details>";
                }
        
        echo"</div></div></div></div></div>";
        $i=$i-1;
      }
        ?>
      </div>
    </div>
  </div>

</main>
</div>
<!-- ------------------------------------------------- -->
<div> 
<div id="div1" class="badge bg-success" style="visibility: hidden;position:fixed;top: 40%;left: 35%;z-index: 1;">
       <p class="h2"> DEMANDE ENVOYE AVEC SUCCES </p>
    </div>
    <div id="div2" class="badge bg-danger" style="visibility: hidden;position:fixed;top: 40%;left: 40%;z-index: 1;">
       <p class="h2"> DEMANDE ANNULLER </p>
    </div>
    <div id="div3" class="badge bg-info text-dark" style="visibility: hidden;position:fixed;top: 40%;left: 40%;z-index: 1;">
       <p class="h2"> ...en cours... </p>
    </div>
    <script type="text/javascript">
      function showDiv1() {
        document.getElementById("div1").style.visibility = "visible";
      }
      function showDiv2() {
        document.getElementById("div1").style.visibility = "hidden";
      }
      function showDiv3() {
        document.getElementById("div2").style.visibility = "visible";
      }
      function showDiv4() {
        document.getElementById("div2").style.visibility = "hidden";
      }
      function showDiv5() {
        document.getElementById("div3").style.visibility = "visible";
      }
      function showDiv6() {
        document.getElementById("div3").style.visibility = "hidden";
      }

      function excecute(){
      setTimeout("showDiv5()", 1);
      setTimeout("showDiv6()",1000);
      setTimeout("showDiv1()",1000);
      setTimeout("showDiv2()",20000);
      }
      function exe(){
      setTimeout("showDiv5()", 1);
      setTimeout("showDiv6()",1000);
      setTimeout("showDiv3()",1000);
      setTimeout("showDiv4()",2000);
      }
     </script>
</div>
<!-- ------------------------------------------------- -->
  </body>
</html>
