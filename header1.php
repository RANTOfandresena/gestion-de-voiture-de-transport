
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/headers.css">
    <link href='css/heroes.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    

</head>
<body>
<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="acceuiladmin.php?page=divpube" class="nav-link px-2 text-white">les voyage disponible</a></li>
          <li><a href="acceuiladmin.php?page=list2" class="nav-link px-2 text-white">liste des personne</a></li>
          <li><a href="acceuiladmin.php?page=uploadpub" class="nav-link px-2 text-white">organiser un voyages</a></li>
          <li><a href="acceuiladmin.php?page=message" class="nav-link px-2 text-white">message des utilisateurs</a></li>
        </ul>
        <div class="text-end">
          <?php echo "<button type='button' class='btn btn-warning'>compte:".$_SESSION['user']."</button>
          <form action='' method='post'><button type='submit' name='z' class='btn btn-outline-light me-2'>se deconnecter</button></form>";
          if(isset($_POST['z'])){    
            session_destroy();
            header("location:index.php");
          } 
          ?>
        </div>
      </div>
    </div>
  </header>
</body>
</html>
