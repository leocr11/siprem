<?php
require_once('phpmailer/class.phpmailer.php');
$correo = new PHPMailer(); //Creamos una instancia en lugar usar mail()
//Usamos el SetFrom para decirle al script quien envia el correo
$correo->SetFrom("jcastillo@uniempresarial.edu.co", "Uniempresarial - Practicas");
//Usamos el AddReplyTo para decirle al script a quien tiene que responder el correo
$correo->AddReplyTo("jcastillo@uniempresarial.edu.co","Uniempresarila - Administracion");
//Usamos el AddAddress para agregar un destinatario
$email=$_GET['email'];
$nombre=$_GET['nombre'];
$correo->AddAddress($email,$nombre);
$correo->AddAddress("jcastillo@uniempresarial.edu.co", "JAC");
//Ponemos el asunto del mensaje
$correo->Subject = "Envio HV Estudiante";
$nombre=$_GET['nombre'];
/*
 * Si deseamos enviar un correo con formato HTML utilizaremos MsgHTML:
 * $correo->MsgHTML("<strong></strong>");
 * Si deseamos enviarlo en texto plano, haremos lo siguiente:
 * $correo->IsHTML(false);
 * $correo->Body = "Mi mensaje en Texto Plano";
 */
$correo->MsgHTML("<strong> $nombre </strong> Tu HV Fue enviada");
//Si deseamos agregar un archivo adjunto utilizamos AddAttachment
$correo->AddAttachment("hv.pdf");
//Enviamos el correo
if(!$correo->Send()) {
  echo "Hubo un error: " . $correo->ErrorInfo;
} else {
  echo '<script> window.location="index.php"; </script>';
}
?>