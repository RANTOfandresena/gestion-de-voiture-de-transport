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
  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">BIENVENUE</h1>
        <p class="lead text-muted">ce site est concue pour aider les gens afin qu'ils puissent rechercher de nouveaux voyages et faire une reservetion</p>
        <p>
          <a href="login.php" class="btn btn-primary my-2">SE CONNECTER</a>
        </p>
      </div>
    </div>
  </section>
<main>
  
  <?php

  // session_start();
      include('connectBDD.php');
      include('pubexpirer.php');
      $requete=$bdd->query("SELECT * FROM publication");
      $i=0;
      $requete=$bdd->query("SELECT * FROM publication LIMIT 0,1");
      while($don=$requete->fetch()){
          $requete=$bdd->query("SELECT * FROM publication LIMIT $i,1");
          $don=$requete->fetch();
          $a=$i+999;
          $r=$bdd->query("UPDATE `projet`.`publication` SET `id` = '".$a."' WHERE `publication`.`uid` =".$don[0]."");
          $i=$i+1;
          $requete=$bdd->query("SELECT * FROM publication LIMIT $i,1");
      }
      echo"<p class='h2 text-center'>Les voyages disponible</p>";

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
            <p class='h2'>".$data[2]."</p>
              <p class='card-text'>".$data[3]."</p>";
              echo "<div class='d-flex justify-content-between align-items-center'>
                <div class='btn-group'>";
                  echo"<div class='d-flex justify-content-between align-items-center'>
                <div class='btn-group'>
                <details><summary  class='btn btn-sm btn-outline-secondary'>participer</summary>
                <a href='login.php' class='btn btn-primary my-2'>SE CONNECTER</a>
                </details>
                </div>
                </div>";
                echo"<ul class='list-unstyled mt-3 mb-4'>";
                $daty=date_create($data[5]);
                $daty1=date_create(date('Y-m-d'));
                $jours=date_diff($daty1,$daty)->format('%R%a');
                // $jours[0]="";
                echo"</div>
                <small class='text-muted'>dans ".$jours."jours</small>
              </div>
            </div>
          </div>
        </div>";
        $i=$i-1;
      }
        ?>
        <!-- --------------------- -->
      <!-- </div>
    </div>
  </div> -->

</main>
  </body>
<script>
var mysql = require('mysql');

var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: ""
});

con.connect(function(err) {
  if (err) throw err;
  console.log("Connected!");
});
</script>
</html>
