<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- CSS only -->
    
     <link rel="stylesheet" href="css/estilo.css" >
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
   <!-- Custom styles for this template-->
   <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body>
<?php include("menu.php"); ?>

<button id="myBtnOpen">
        Hacer click
</button>
<div class="container  pt-3">
    <div class="col-md-12">
        <table class="table  table-hover table-bordered"  style="width: 100%">
            <thead>
                <tr>
                    <th>id</th>
                    <th>NOMBRE</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once "db_UOC.php";
                $con=mysqli_connect($host,$user,$pass,$db);
                $query = "SELECT * FROM categoria ORDER BY id DESC";
                $res=mysqli_query($con,$query);
               // $row=mysqli_fetch_assoc($res);
                while ($row = mysqli_fetch_assoc($res)){
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td>
                    <form method="post" action="eliminar.php?accion=elimCat&id=<?php echo $row['id']; ?> "class="d-inline eliminar">
                            <button class="btn btn-danger" type="submit">Eliminar</button>
                        </form>      
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <div  id="myModal" class="myModal">
        <div class="nuevoProducto">
            <h1>Nueva Categoria</h1>
                <form action="adminCategoria.php" method="get">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" name="nombre" placeholder="Nombre" required>
                        </div>                       
                                             
                    </div>
                    <input class="btn btn-primary" type="submit"></input> 
                </form>
               

                <?php
                if(isset($_GET)){  
                    
                    if (!empty($_GET)) {  
                        ?><script>alert ("AGREGAR")</script><?php
                    $nombre = $_GET['nombre'];
                    
                    include_once "db_UOC.php";
                    $con=mysqli_connect($host,$user,$pass,$db);
                    $query = "INSERT INTO categoria(`nombre`) VALUES ('$nombre')";
                    $res1 = mysqli_query($con,$query);
                    }
                }   
                ?>
                 
            <button id="myBtnClose">Cerrar</button>
        </div>
    </div>


</div>
<script>
var btnOpen = document.getElementById('myBtnOpen');
var modal= document.getElementById('myModal');
var btnClose = document.getElementById('myBtnClose');


  btnOpen.onclick = function() {    
    modal.style.display = "block";
   
  }

  btnClose.onclick = function() {
    modal.style.display = "none";
  }            
            
</script>




</body>
</html>