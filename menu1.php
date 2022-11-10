<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu1</title>
    <script src="https://kit.fontawesome.com/803a531914.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-3.2.1.js"></script>
</head>
<body>
        <!-- Navbar -->

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav me-sm-5">
      &nbsp;&nbsp;&nbsp;&nbsp;
      <a class="nav-lin" href="inicio.php"> 
         <i class="far fa-user"></i> 
      </a>
      &nbsp;&nbsp;&nbsp;&nbsp;
      <a class="nav-lin text-danger" href="inicio.php" title="Cerrar sesion">
        <i class="fas  fa-door-closed" >   </i>    
          
      </a>
      &nbsp;&nbsp;&nbsp;&nbsp;
      <a class="nav-lin text-blue" href="cesta.php" title="cesta">
        <i class="fa-sharp fa-solid fa-basket-shopping"></i>
      </a>
      &nbsp;&nbsp;&nbsp;&nbsp;
      <a class="nav-lin text-yellow" href="tienda1.php" title="tienda">
        <i class="fa-solid fa-house-chimney-window"></i>
      </a>
    </ul>
    <ul class="navbar-nav me-sm-5 mx-auto">    
    <p>Nombre Usuario: </p>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <p>  <?php  session_start();  echo $_SESSION['nombre'] ?> </p>
    </ul>
</nav>

</body>
</html>