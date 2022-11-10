<?php

include_once "db_UOC.php";
$conexion=mysqli_connect($host,$user,$pass,$db);

if (isset($_GET)) {
    if (!empty($_GET['accion']) ) { 
        $id_g =  $_GET['id'];
        echo $id_g;
        
        if ($_GET['accion'] == 'elimPro') {
            $id = $_GET['id'];            
            $query = mysqli_query($conexion, "DELETE FROM productos WHERE id = $id");            
            if ($query) {
                header('Location: adminProductos.php');
            }
        }
        if ($_GET['accion'] == 'elimCat') {
            $id = $_GET['id'];           
            $query = mysqli_query($conexion, "DELETE FROM categoria WHERE id = $id");           
            if ($query) {
                header('Location: adminCategoria.php');
            }
        }
        if ($_GET['accion'] == 'elimProCesta') {
            echo $prod = $_GET['producto'];            
            $query = mysqli_query($conexion, "DELETE FROM cesta WHERE producto = '$prod'");            
            if ($query) {
                header('Location: cesta.php');
            }
        }
        if ($_GET['accion'] == 'elimUnProCesta') {
            $prod = $_GET['producto'];   
            $query =  mysqli_query($conexion, "SELECT  id FROM cesta where producto = '$prod' LIMIT 1");
            $raw= mysqli_fetch_assoc($query);            
            $id = $raw['id'];
            $query = mysqli_query($conexion, "DELETE FROM cesta WHERE id = $id");            
             if ($query) {
                 header('Location: cesta.php');
             }
         }
    }
}
?>

