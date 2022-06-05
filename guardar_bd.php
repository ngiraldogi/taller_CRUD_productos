<?php

include("bd.php");

if(isset($_POST['save'])){ 
    $cod = $_POST['cod']; 
    $nom = $_POST['nom'];
    $desc = $_POST['desc'];
    $cantidad = $_POST['cantidad'];
    $valorProd = $_POST['valorProd'];

    $img = $_FILES['img']['name'];
    if (isset($img) && $img != "") {
        $tipo = $_FILES['img']['type'];
        $tamano = $_FILES['img']['size'];
        $temp = $_FILES['img']['tmp_name'];
        move_uploaded_file($temp, 'files/'.$img);
    }

    $query = "INSERT INTO producto(codigo,nombre,descripcion,stock,precio,imagen) VALUES('$cod','$nom','$desc',$cantidad,$valorProd,'$img')"; 
    $result = mysqli_query($conn, $query);

    if(!$result){
        $_SESSION['mensaje'] = "No se pudo agregar este nuevo producto";
        $_SESSION['tipo_mensaje'] = "danger"; 
        echo "No se pudo guardar";
    }
    else{
        $_SESSION['mensaje'] = "Producto agregado con exito";
        $_SESSION['tipo_mensaje'] = "success";
        echo "Guardado con exito";
    }
    //header("Location: index.php"); #para que me vuelva a cargar el formulario
    header("Location: crear_producto.php"); #para que me vuelva a cargar el formulario
}
?>