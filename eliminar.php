<?php

include("bd.php");


//isset() devolverá FALSE si prueba una variable que ha sido definida como NULL
//isset() devolverá TRUE únicamente si todos los parámetros están definidos.
if(isset($_GET['codigo'])){ 
    $codigo = $_GET['codigo'];

    $query = "DELETE FROM producto WHERE codigo=$codigo";
    $result = mysqli_query($conn, $query); 
    if(!$result){
        $_SESSION['mensaje'] = "No se pudo eliminar";
        $_SESSION['tipo_mensaje'] = "danger";
        die("Fallo consulta");
    }
    else{
        $_SESSION['mensaje'] = "producto eliminado";
        $_SESSION['tipo_mensaje'] = "info";
    }
    header("Location: index.php");
    
}
