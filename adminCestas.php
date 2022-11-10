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
    <!-- <link rel="stylesheet" href="js/app.js" >-->
  
</head>
<body>
<?php
if(isset($_POST["iDusuario"])){
    $iDusuarioCesta=$_POST["iDusuario"];
    
}
?>
<?php include("menu.php"); ?>
<div class="container  pt-3">
    <div class="col-md-12">
    <div class="col-md-12">
            <label for="categoria">Cestas</label>
            <form action="" method="post">
            <label for="cestas">Escoger usuario: </label>
            <select id="iDusuario" name="iDusuario" onchange="this.form.submit()">
                <?php
                include_once "db_UOC.php";
                $con=mysqli_connect($host,$user,$pass,$db);
                $categorias = "SELECT * FROM Usuarios";
                $res = mysqli_query($con,$categorias);
                while ($row = mysqli_fetch_array($res, MYSQLI_NUM)){
                ?>
                <option value="<?php echo $row[0]?>">
                    <?php echo  $row[1];
                          ?>
                </option>
                <?php  } ?>
            </select>
            </form>
    </div>
        <table class="table  table-hover table-bordered"  style="width: 100%">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Final</th>
                    <th>ID</th>
                    <th>Nombre</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                #session_start();
                include_once "db_UOC.php";
                $con=mysqli_connect($host,$user,$pass,$db);
                $query = "SELECT producto, SUM(total), SUM(cantidad) FROM cesta  WHERE id_nombre = '$iDusuarioCesta' GROUP BY producto";
                $res=mysqli_query($con,$query);               
                while ($row = mysqli_fetch_assoc($res)){
                ?>
                <tr>
                    <td><?php echo $row['producto']; ?></td>                            
                    <td><?php echo $row['SUM(cantidad)']; ?></td>
                    <td><?php echo $row['SUM(total)']; ?></td>  
                    <td><?php echo $iDusuarioCesta; ?></td>  
                    <td><?php $resCest=mysqli_query($con,"SELECT nombre FROM Usuarios WHERE id='$iDusuarioCesta'");
                         $rowCest = mysqli_fetch_assoc($resCest);
                         echo $rowCest['nombre'];
                        ?></td>               
                    
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
  
</div>
</body>
</html>