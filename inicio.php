<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link href="bootstrap.min.css" rel="stylesheet">
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<style>
    body{
        background: #ffe259;
        background: linear-gradient(to right, #ffa751, #ffe259);
    }
    .bg{
        background-image: url(imagen/remco.jpg);
        background-position: center center;
    }
    
  </style>
</head>
<body>
<?php
  
  if (isset($_REQUEST['login']) ) {
    session_start();
    $email=$_REQUEST['email']??'';
    $password=$_REQUEST['password']??'';
    echo $email .  $password . "<br>";
    //$password=md5($password);
    include_once "db_UOC.php";
    $con=mysqli_connect($host,$user,$pass,$db);
    $query = "SELECT id,email,nombre from Usuarios where email='" . $email . "' and pass='" . $password . "';";
    $res=mysqli_query($con,$query);
    $row=mysqli_fetch_assoc($res);
   
    if($row){
      $_SESSION['id'] =$row['id'];
      $_SESSION['email']=$row['email'];
      $_SESSION['nombre']=$row['nombre'];
      if($_SESSION['id']=="1"){
        header("Location: adminProductos.php");
      }else{
        header("Location: tienda1.php");
      }
    }else{
  ?>    
      <div class="alert alert-danger" role="alert">
         Error de loginN <img src="images/haha.jpg" width="200">
      </div>        
  <?php
    }
  }
?>

<div class="container w-75 bg-primary mt-5 rounded shadow">
    <div class="row align-items-stretch">
        <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">

        </div>
        <div class="col bg-white p-5 rounded-end">
            <div class="text-end">
                <img src="img/logo.png" width="48" alt="">
            </div>
            <h2 class="fw-bold text-center pt-5 mb-5">Bienvenido</h2>

            <!---- login --->

            
            <form action="#" method="GET">
                <div class="mb-4">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="mb-4"></div>
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                <div class="mb-4 form-check">
                    <input type="checkbox" name="connected" class="form-check-input" >
                    <label for="connected" class="form-check-label">Mantenerme conecado</label>
                </div>

                <div class="d-grid"> 
                    <button type="submit" class="btn btn-primary" name="login">Iniciar Sesion</button>
                </div>

                <div class="my-3">
                    <span>No tienes cuenta? <a href="#">Registrate</a></span><br>
                    <span><a href="#">Recuperar password</a></span>
                </div>
            </form>

              <!---- login  con redes sociales--->
              <div class="container w-100 my-5">
                <div class="row text-center">
                    <div class="col-12">Iniciar Sesion</div>
                </div>  
                <div class="row">
                    <div class="col">
                        <button class="btn btn-outline-primary w-100 my=1">
                            <div class="row align-items-center">
                                <div class="col-2 d-none d-md-block">
                                    <img src="imagen/facebook.png" width="20" alt="">
                                </div>
                                <div class="col-12 col-md-10 text-center">
                                    Facebook
                                </div>
                            </div>
                        </button>
                    </div>
                    <div class="col">
                    <button class="btn btn-outline-danger w-100 my=1">
                            <div class="row align-items-center">
                                <div class="col-2 d-none d-md-block">
                                    <img src="imagen/google.png" width="20" alt="">
                                </div>
                                <div class="col-12 col-md-10 text-center">
                                    Google
                                </div>
                            </div>
                        </button>
                    </div>
                </div>
              </div>

        </div>


 
    </div>
  </div>
  
</body>
</html>