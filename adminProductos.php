<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="bootstrap.min.css" rel="stylesheet">
     <!-- CSS only -->

     <link rel="stylesheet" href="css/estilo.css" >
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
   <!-- Custom styles for this template-->
   <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="js/app.js" >-->

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
                    <th>IMAGEN</th>
                    <th>NOMBRE</th>
                    <th>DESCRIPCION</th>
                    <th>CANTIDAD</th>
                    <th>PRECIO</th>
                    <th>CATEGORIA</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once "db_UOC.php";
                $con=mysqli_connect($host,$user,$pass,$db);
                $query = "SELECT p.*,  c.nombre AS categoria FROM productos p INNER JOIN categoria c ON c.id = p.id_categoria ORDER BY p.id DESC";
                $res=mysqli_query($con,$query);
               // $row=mysqli_fetch_assoc($res);
                while ($row = mysqli_fetch_assoc($res)){
                    echo $row['id'];
                ?>
                <tr>
                    <td><?php echo $row['imagen']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['descripcion']; ?></td>
                    <td><?php echo $row['cantidad']; ?></td>
                    <td><?php echo $row['precio']; ?></td>                    
                    <td><?php echo $row['categoria']; ?></td>
                    <td>
                        <form method="post" action="eliminar.php?accion=elimPro&id=<?php echo $row['id']; ?> "class="d-inline eliminar">
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
            <h1>Nuevo Producto</h1>
                <form action="adminProductos.php" method="get">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" name="nombre" placeholder="Nombre" required>
                        </div>
                        <div class="col-md-6">
                            <label for="cantidad">Cantidad</label>
                            <input type="text" id="cantidad" name="cantidad" placeholder="cantidad" required>
                        </div>
                        <div class="col-md-12">
                            <label for="descripcion">descripcion</label>
                            <input type="text" id="descripcion" name="descripcion" placeholder="descripcion" required>
                        </div>
                        <div class="col-md-6">
                            <label for="precio">precio</label>
                            <input type="text" id="precio" name="precio" placeholder="precio" required>
                        </div>
                        <div class="col-md-6">
                            <label for="categoria">categoria</label>
                            <select id="categoria" name="categoria" >
                                <?php
                                include_once "db_UOC.php";
                                $con=mysqli_connect($host,$user,$pass,$db);
                                $categorias = "SELECT * FROM categoria";
                                $res = mysqli_query($con,$categorias);
                                while ($row = mysqli_fetch_array($res, MYSQLI_NUM)){
                                    ?>
                                    <option value="<?php echo $row[0]?>">
                                        <?php  echo $row[1]?>
                                    </option>
                                    <?php                                  
                                }
                                ?> 
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="imagen">imagen</label>
                            <input type="text" id="imagen" name="imagen" placeholder="imagen">
                        </div>
                        <input class="btn btn-primary" type="submit"></input>                        
                    </div>
                </form>
               

                <?php
                if(isset($_GET)){  
                    
                    if (!empty($_GET)) {  
                        ?><script>alert ("AGREGAR")</script><?php
                    $nombre = $_GET['nombre'];
                    $cantidad = $_GET['cantidad'];
                    $descripcion = $_GET['descripcion'];
                    $precio = $_GET['precio'];                    
                    $categoria = $_GET['categoria'];
                    $img = $_GET['imagen'];
                    include_once "db_UOC.php";
                    $con=mysqli_connect($host,$user,$pass,$db);
                    $query = "INSERT INTO productos(`nombre`, `descripcion`, `cantidad`, `imagen`, `precio`, `id_categoria`) VALUES 
                                                    ('$nombre','$descripcion','$cantidad','$img','$precio','$categoria')";
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