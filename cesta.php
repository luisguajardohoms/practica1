<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="bootstrap.min.css" rel="stylesheet">
     <!-- CSS only -->
     
     
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
   <!-- Custom styles for this template-->
   <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
<header>
<?php include("menu1.php"); ?>
</header>
<?php
session_start();
#unset($_SESSION['carrito']);
?>



<div class="container  pt-3">
    <div class="col-md-12">
        <table class="table  table-hover table-bordered"  style="width: 100%">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Total</th>                   
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $cantidad = 1;
                session_start();
                include_once "db_UOC.php";
                $con=mysqli_connect($host,$user,$pass,$db);    
                if (isset($_SESSION['id'])) { 
                    echo $_SESSION['id'];
                    if (!empty($_SESSION['carrito']) ) { 
                    foreach($_SESSION['carrito'] as $fila){  
                        echo " carrito ";
                         $producto = $fila['producto'];
                        $precio = $fila['precio'];
                        $cantidad = 1;
                        
                        $total = $precio * $cantidad;
                        $id_nombre = $_SESSION['id'];
                    
                        $query3="INSERT INTO cesta (producto,precio,cantidad,total, id_nombre) VALUES 
                                ('$producto','$precio','$cantidad','$total','$id_nombre')";
                        #INSERT INTO cesta (producto, precio,cantidad,total,id_nombre) VALUES ('ultegra','120.00','1','1','6')
                        $res3 = mysqli_query($con,$query3);  
                    }
                    }
                    echo "passsa";
                    $id_nombre = $_SESSION['id'];
                   # $query = "SELECT *  FROM cesta";
                    $query = "SELECT producto, SUM(total), SUM(cantidad) FROM cesta  WHERE id_nombre = '$id_nombre' GROUP BY producto";
                    $res=mysqli_query($con,$query);
                    // $row=mysqli_fetch_assoc($res);
                    while ($row = mysqli_fetch_assoc($res)){
                            # $row['id'];
                        ?>
                        <tr>
                            <td><?php echo $row['producto']; ?></td>                            
                            <td><?php echo $row['SUM(cantidad)']; ?></td>
                            <td><?php echo $row['SUM(total)']; ?></td>                  
                            <td> 
                                 <form method="post" action="eliminar.php?accion=elimProCesta&producto=<?php echo $row['producto']; ?> "class="d-inline eliminar">
                                      <button class="btn btn-danger" type="submit">Eliminar Total</button>
                                </form> 
                                <form method="post" action="eliminar.php?accion=elimUnProCesta&producto=<?php echo $row['producto']; ?> "class="d-inline eliminar">
                                      <button class="btn btn-warning" type="submit" >Menos uno</button>
                                </form> 
                            </td>
                        </tr>
                        <?php
                        }
                        
                       
                }
                
                unset($_SESSION['carrito']);
                        ?>
                   
            </tbody>
        </table>

    </div>

</body>
</html>