<?php
	$host="localhost";
	$user="root";
	$password="usbw";
	$db="siprem";
	$link=mysql_connect( $host , $user, $password);	
mysql_select_db("siprem",$link) OR DIE ("Error: No es posible establecer la conexión");
$foto=$_POST['cambioimg'];
if($_POST['ir']=="Actualizar")
       {
              $sql=mysql_query("UPDATE practicante SET foto='$foto' where identificacion=".$_SESSION["user"]);
              echo "Actualizado correctamente";
              header("Location: index.php?actualizado");
        }
        else{
        	header("Location: index.php?error=$error");
        }      