

function verificar(){
    let num1 = document.getElementById("cantidad").value;
    let num2 = document.getElementById("valorProd").value;
    console.log(num1);
    console.log(num2);
    if (num1<0){
        alert("Error en el Stock del Producto");
    }
    if (num2<0){
        alert("Error en el Precio Unitario del Producto");
    }
}