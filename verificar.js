function verificar(){
    let num1 = document.getElementById("cantidad").ariaValueMax;
    let num2 = document.getElementById("valorProd").ariaValueMax;
    if (num1<0){
        alert("Error en el Stock del Producto");
    }
    if (num2<0){
        alert("Error en el Precio Unitario del Producto");
    }
}