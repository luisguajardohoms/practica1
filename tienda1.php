<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estiloTienda.css" >
    <script src="https://kit.fontawesome.com/803a531914.js" crossorigin="anonymous"></script>
    
    <script src="js/jquery-3.2.1.js"></script>
    <script  src="js/tienda.js"></script>
</head>
<body>
<header>
<?php include("menu1.php"); ?>
</header>
<div class="wrap">

    <h1>Productos</h1>

<div class="store-wrapper">
    <div class="category_list">
        <?php
        include_once "db_UOC.php";
        $con=mysqli_connect($host,$user,$pass,$db);
        $query = "SELECT * FROM categoria";
        $res=mysqli_query($con,$query);
        ?><a href="#" class="category_item "  category="all">Todo</a><?php
        while ($data = mysqli_fetch_assoc($res)) {?>      
          <a href="#" class="category_item" category="<?php echo $data['nombre'];?>"> <?php echo $data['nombre'];?> </a>
        <?php }        
        ?>
    </div>   

    <div class="product_list">
        <?php
        $con=mysqli_connect($host,$user,$pass,$db);
        $query2 = "SELECT p.*,  c.nombre AS categoria FROM productos p INNER JOIN categoria c ON c.id = p.id_categoria";
        $result = mysqli_query($con,$query2);
        echo $category;
        while ($row = mysqli_fetch_assoc($result)){
            ?>
            <div class="product_item" category="<?php echo $row['categoria'];?>">
            <?php echo $row['categoria'];?>
                <img src="imagen/<?php echo $row['imagen'];?>" alt="">
                <?php 
                 $producto = $row['nombre'];
                 $cantidad = 1;
                 $precio = $row['precio'];
                 $total = $row['precio'] + $precio;                    
                 $id_nombre = $_SESSION['id'];
                 
                    session_start();                    
                    echo $_SESSION['id'] ;
                    if( isset($_SESSION['id'])== true){
                    $my_assoc = array('producto'=>$producto,'cantidad'=>$cantidad,'precio'=>$precio,'total'=>$total,'usuario'=>$id_nombre);  
                    $compactada=serialize($my_assoc);            
                    $compactada=urlencode($compactada);
                    ?>  <a href="tienda1.php?producto=<?php echo $producto ?>&precio=<?php echo $precio?>"><?php echo $row['nombre'];?></a>
                    <form action="tienda1.php?producto=<?php echo $producto ?>&precio=<?php echo $precio?>" method="POST">
                        <button type="submit" class="btn btn-primary" name="agregar" value=<?php echo $my_assoc; ?>>Añadir</button>
                        <?php 
                             # var_dump($my_assoc); 
                             $prueba = $my_assoc[1];
                             echo $prueba; 
                        ?>
                    </form>
                    <?php 
                        #header("location: index.php");
                    } else {
                        header("location: inicio.php");
                    }                    
                     ?>                
                <p>Descripcion:<br> <?php echo $row['descripcion'];?> </p>
                
                
            </div>
            <?php
        }
        ?>
    </div>
    <?php  
        if (isset($_GET)) {            
            $producto= $_GET['producto'];
            $precio = $_GET['precio'];    
            session_start();        
            $_SESSION['carrito'][]  =  array('producto'=>$producto,'precio'=>$precio);
        }
   ?>
</div>

    </div>


</body>

</html>