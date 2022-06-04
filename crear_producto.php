<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"> 
</head>

<body>
    <div class="container p-5">
        <div class="row">
            <div class="card card-body">
                <form action="guardar_bd.php" method="POST" enctype="multipart/form-data"> <!--el -enctype="multipart/form-data"- permite agregar imagenes o archivos en un input de tipo FILE-->
                    <div class="mb-3">
                        <label for="cod" class="form-label">Código del Producto:</label>
                        <input type="text" id="cod" name="cod" class="form-control" require>
                    </div>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nombre del Producto:</label>
                        <input type="text" id="nom" name="nom" class="form-control" require>
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label">Descripción del Producto:</label>
                        <input type="text" id="desc" name="desc" class="form-control" require>
                    </div>
                    <div class="mb-3">
                        <label for="cantidad" class="form-label">Stock del Producto: </label>
                        <input type="number" id="cantidad" name="cantidad" step="any" class="form-control" onchange="verificar()" require>
                    </div>
                    <div class="mb-3">
                        <label for="valorProd" class="form-label">Precio Unitario del Producto: </label>
                        <input type="number" id="valorProd" name="valorProd" step="any" class="form-control" require>
                    </div>
                    <!--################################################imagen################################################-->
                    <div class="mb-3">
                        <label for="img" class="form-label">Imagen del Producto:</label>
                        <input type="file" id="img" name="img" class="form-control" accept="image/*">
                    </div>
                    <!--######################################################################################################-->
                    <input type="submit" class="btn btn-success btn-block" name="save" value="Crear">
                </form>
            </div>
        </div>
    </div>
    <script src="validar.js"></script>
</body>

</html>