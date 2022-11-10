<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
   <!-- Custom styles for this template-->
   <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body>
<?php include("menu.php"); ?>
<div class="container  pt-3">
    <div class="col-md-12">
        <table class="table  table-hover table-bordered"  style="width: 100%">
            <thead>
                <tr>
                    <th>id</th>
                    <th>email</th>
                    <th>password</th>
                    <th>nombre</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once "db_UOC.php";
                $con=mysqli_connect($host,$user,$pass,$db);
                $query = "SELECT * FROM Usuarios ORDER BY id DESC";
                $res=mysqli_query($con,$query);
               // $row=mysqli_fetch_assoc($res);
                while ($row = mysqli_fetch_assoc($res)){
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['pass']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><button class="btn btn-danger" type="submit">Eliminar</button></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>