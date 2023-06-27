<?php
require_once 'conexion.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
$tipo_documento=limpiarDatos($_POST["document-type"]);
$numero_documento=limpiarDatos($_POST["document-number"]);
$nombres=limpiarDatos($_POST["nombres"]);
$Apellidos=limpiarDatos($_POST["Apellidos"]);
$edad=limpiarDatos($_POST["edad"]);
$ultimo_grado=limpiarDatos($_POST["ultimo_grado"]);
$jornada=limpiarDatos($_POST["jornada"]);
$sql="SELECT * from inscripciones where numero_documento=?";
$stmt= $pdo->prepare($sql);
$stmt->execute([$numero_documento]);
$registroExistente=$stmt->fetch();
if ($registroExistente)
{
    echo '<script>alert("El número de documento ya ha sido registrado."); window.location.href = "index.html";</script>';

}
else 
{
    $sql="INSERT INTO inscripciones (tipo_documento,numero_documento,nombres,apellidos,edad,grado,jornada) values (?,?,?,?,?,?,?)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$tipo_documento,$numero_documento,$nombres,$Apellidos,$edad,$ultimo_grado,$jornada]);
    header("Location:index.html");
    exit();  
}


 }
 function limpiarDatos($data) {
    $data = trim($data);//eliminar espacios en blanco
    $data = stripslashes($data);//eliminar barras invertidad
    $data = htmlspecialchars($data);// covierte caracteres en html
    return $data;
}

    
?>