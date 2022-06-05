<?php include("bd.php"); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHAZA MARGARITO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body>
<nav class="navbar navbar-dark bg-dark"> 
        <div class="container">
                <h1> <a href="index.php" class="navbar-brand">CHAZA MARGARITO</a> </h1>
        </div>
</nav>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4">
                <?php if(isset($_SESSION['mensaje'])) {?> 
                    <div class="alert alert-<?= $_SESSION['tipo_mensaje'];?> alert-dismissible fade show" role="alert">
                        <?php echo $_SESSION['mensaje'];?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php session_unset();}?> 

                <a href="crear_producto.php" class="btn btn-success btn-block-primary">
                    <i class="bi bi-bag-plus-fill"></i>
                </a>
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Código del Producto</th>
                            <th>Nombre del Producto</th>
                            <th>Descripción</th>
                            <th>Stock del Producto</th>
                            <th>Precio del Producto</th>
                            <th>Imagen del Producto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query = "SELECT * FROM producto";
                            $result = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_array($result)){?> <!--volver esa consulta en una tabla e itero sobre los datos-->
                                <tr>
                                    <td><?php echo $row['codigo']?></td>
                                    <td><?php echo $row['nombre']?></td>
                                    <td><?php echo $row['descripcion']?></td>
                                    <td><?php echo $row['stock']?></td>
                                    <td><?php echo $row['precio']?></td>

                                    <td><img class="imagenes" src="files/<?= $row['imagen'] ?>" alt=""/></td>
                                    <td>

                                        <a href="editar.php?id=<?php echo $row['codigo']?>" class="btn btn-primary"> <!--vinculo al archivo editar.php y manda una variable a ese archivo-->
                                            <i class="bi bi-pencil-fill"></i> <!--etiqueta i es de iconos-->
                                        </a>
                                        <a href="eliminar.php?id=<?php echo $row['codigo']?>" class="btn btn-danger">
                                            <i class="bi bi-trash-fill"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="verificar.js"></script>
</body>
</html>