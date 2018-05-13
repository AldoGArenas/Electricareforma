<?php

$errorMSG = "";

// NAME
if (empty($_POST["nombre"])) {
    $errorMSG = "Favor de poner tu nombre ";
} else {
    $nombre = $_POST["nombre"];
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Se requiere dirección de email ";
} else {
    $email = $_POST["email"];
}
if (empty($_POST["telefono"])) {
    $errorMSG .= "Se require un número de telefono ";
} else {
    $telefono = $_POST["telefono"];
}

if (empty($_POST["producto"])) {
    $errorMSG .= "Es necesario un producto ";
} else {
    $producto = $_POST["producto"];
}
// MESSAGE
if (empty($_POST["mensaje"])) {
    $errorMSG .= "Es necesario tipear un mensaje ";
} else {
    $mensaje = $_POST["mensaje"];
}


$EmailTo = "myr.reformasadecv@gmail.com";
$Subject = "Nuevo mensaje del Website";

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $nombre;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Telefono: ";
$Body .= $telefono;
$Body .= "\n";
$Body .= "Producto: ";
$Body .= $producto;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $mensaje;
$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body, "From:".$email);

// redirect to success page
if ($success && $errorMSG == ""){
   echo "success";
}else{
    if($errorMSG == ""){
        echo "Algo anda mal :(";
    } else {
        echo $errorMSG;
    }
}

?>