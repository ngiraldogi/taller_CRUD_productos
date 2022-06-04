<?php

include("bd.php");

if(isset($_POST['save'])){ 
    $cod = $_POST['cod']; 
    $nom = $_POST['nom'];
    $desc = $_POST['desc'];
    $cantidad = $_POST['cantidad'];
    $valorProd = $_POST['valorProd'];

    $query = "INSERT INTO producto(codigo,nombre,descripcion,stock,precio) VALUES('$cod','$nom','$desc',$cantidad,$valorProd)"; 
    $result = mysqli_query($conn, $query);

    //$id_insert = mysqli_insert_id($result);

    //para poder recibir un tipo file (recibir un campo de tipo file)
    if($_FILES["img"]["error"]>0){
        echo "Error al cargar la imagen";
    }
    //si no hay error con la carga de la imagen, se procede a guardar la imagen
    else{
        $tiposImag = array("image/png","image/jpg"); //tipo de archivo de imagen permitido
        $limite_kb = 200;
        //evaluar si el archivo que se carga cumple con los requisitos anteriormente definidos
        if(in_array($_FILES["img"]["type"], $tiposImag) && $_FILES["img"]["size"] <= $limite_kb * 1024){
            $ruta = 'files/'.$id_insert.'/';
            $img = $ruta.$_FILES["img"]["name"];

            //verificar que si exista esa ruta
            if(!file_exists($ruta)){
                mkdir($ruta);
            }
            //validar si exite o no el archivo
            if(!file_exists($img)){
                $resultado =@move_uploaded_file($_FILES["img"]["tmp_name"], $img);
                if($resultado){
                    echo "Imagen guardada";
                }
                else{
                    "Error al guardar la imagen";
                }
            }
            else{
                echo "El archivo ya existe";
            }
        }
        else{
            echo "Archivo no permitido o excede el tamaño";
        }
    }

    /* 
    if(!$result){
        $_SESSION['mensaje'] = "No se pudo agregar este nuevo producto";
        $_SESSION['tipo_mensaje'] = "danger"; #tipo de mensaje: es una variable de sesion
    }
    else{
        $_SESSION['mensaje'] = "Producto agregado con exito";
        $_SESSION['tipo_mensaje'] = "success";
    }*/
    //header("Location: index.php"); #para que me vuelva a cargar el formulario
    header("Location: crear_producto.php"); #para que me vuelva a cargar el formulario
}
?>