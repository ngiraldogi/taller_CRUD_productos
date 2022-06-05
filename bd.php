<?php

session_start(); 

#establece la conexion con la base de datos
$conn = mysqli_connect( 
    'localhost', 
    'root', 
    '', 
    'taller_crud_productos' 
);
?>