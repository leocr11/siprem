<?php
	$host="localhost";
	$user="root";
	$password="usbw";
	$db="siprem";
	$link=mysql_connect( $host , $user, $password);	
mysql_select_db("siprem",$link) OR DIE ("Error: No es posible establecer la conexión");
$foto=$_POST['cambioimg'];
if($_POST['ir']==true)
       {$identificacion =$_POST["identificacion"];$nombredeimagen=strtolower($_FILES['imagen']['name']);$identificacion=$_POST['identificacion'];$nombredeiamgen2= $identificacion.".jpg";$nombredeimagenpng=$identificacion.".png";$dirdestino = "../../imagenes/fotos/estudiantes/";
                                  if($nombredeimagen==$nombredeiamgen2 || $nombredeimagen==$nombredeimagenpng){$dirdestino = "../../imagenes/fotos/estudiantes/" . basename($_FILES['imagen']['name']);$imagensubida = "../../imagenes/fotos/estudiantes" . $dirdestino;
                                      )){ if(is_uploaded_file($_FILES['imagen']['tmp_name']
              $sql=mysql_query("UPDATE practicante SET foto='$foto' where identificacion=".$_SESSION["user"]);
              echo "Actualizado correctamente";
              header("Location: index.php?actualizado");
        }
        else{
        	header("Location: index.php?error=$error");
        }      
        if(cambio==true){$identificacion =$_POST["identificacion"];$nombredeimagen=strtolower($_FILES['imagen']['name']);$identificacion=$_POST['identificacion'];$nombredeiamgen2= $identificacion.".jpg";$nombredeimagenpng=$identificacion.".png";$dirdestino = "../../imagenes/fotos/estudiantes/";
                                  if($nombredeimagen==$nombredeiamgen2 || $nombredeimagen==$nombredeimagenpng){$dirdestino = "../../imagenes/fotos/estudiantes/" . basename($_FILES['imagen']['name']);$imagensubida = "../../imagenes/fotos/estudiantes" . $dirdestino;
                                      if(is_uploaded_file($_FILES['imagen']['tmp_name']
                                     
                                          if (move_uploaded_file($_FILES['imagen']['tmp_name'], $imagensubida )) {
                                              $sql=mysql_query("UPDATE practicante SET foto='$foto' where identificacion=".$_SESSION["user"]);
                                              $resultado=mysql_query($sql) or die("Error en consulta <br> MySQL dice: ".mysql_error());  
                                          } 
                                          else{
                                              $nombre=$_POST["nombre"];
                                              echo '<script type="text/javascript">';
                                              echo 'setTimeout(function () { swal("su foto a sido cambiada","","success");';
                                              echo '},0);</script>';
                                              header("Location: index.php?actualizado");echo "Actualizado correctamente";
                                            }
                                          }
                                            else{
                                                echo '<script type="text/javascript">';
                                                echo 'setTimeout(function () {swal("Tu foto debe tener el numero de tu identificacion","","error");';
                                                echo '},0);</script>';
                                            
                                            }
                                             }
                                          }     
