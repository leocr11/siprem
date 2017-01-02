<?php
    session_start();
    // Inicializar la sesión.
    // Si está usando session_name("Ejemplo"), ¡no lo olvide ahora!
    // Destruir todas las variables de sesión.
    include ("../../conexion.php");
    if(isset($_SESSION['user'])) {
    ?>
    <?php
     if(isset($_POST['actualizar'])){
      $identificacion=$_SESSION['user'];
      $nombre=$_POST["nombre"];
      $direccion=$_POST["direccion"];
      $contrasena=$_POST["contrasena"];
      $semestre=$_POST["semestre"];
      $promocion=$_POST["promocion"];
      $correo=$_POST["correo"];
      $programa=$_POST["programa"];
      $celular=$_POST["celular"];
      $fijo=$_POST["fijo"];
      $fechanac=$_POST["fechanac"];
      $lugarnac=$_POST["lugarnac"];
      $sql="update practicante  set nombre='$nombre',direccion='$direccion',password='$contrasena',semestre='$semestre',promocion='$promocion',correo='$correo',idprograma='$programa',celular='$celular',fijo='$fijo',fechanac='$fechanac',lugarnac='$lugarnac' where identificacion='$identificacion'";
      //echo $sql;
      mysql_query($sql);
    }
    if(isset($_POST['actuahv'])){
      $identificacion=$_SESSION['user'];
      $institucion=$_POST["institucion"];
      $anogrado=$_POST["anogrado"];
      $tituloins=$_POST["tituloins"];
      $universidad=$_POST["universidad"];
      $anocurso=$_POST["anocurso"];
      $titulouni=$_POST["titulouni"];
      $idioma=$_POST["idioma"];
      $institutoing=$_POST["institutoing"];
      $nivel=$_POST["nivel"];
      $porhabla=$_POST["porhabla"];
      $porescrito=$_POST["porescrito"];
      $institutosis=$_POST["institutosis"];
      $habsistemas=$_POST["habsistemas"];
      $nivelsis=$_POST["nivelsis"];
      $sql="update practicante  set institucion='$institucion',anogrado='$anogrado',tituloins='$tituloins',universidad='$universidad',anocurso='$anocurso',titulouni='$titulouni',idioma='$idioma',institutoing='$institutoing',nivel='$nivel',porhabla='$porhabla',porescrito='$porescrito',institutosis='$institutosis',habsistemas='$habsistemas',nivelsis='$nivelsis' where identificacion='$identificacion'";
      //echo $sql;
      mysql_query($sql);
    }
    if(isset($_POST['actualab'])){
      $identificacion=$_SESSION['user'];
      $nomempresa1=$_POST["nomempresa1"];
      $direccionem1=$_POST["direccionem1"];
      $ciudadpais1=$_POST["ciudadpais1"];
      $cargo1=$_POST["cargo1"];
      $fechaing1=$_POST["fechaing1"];
      $fechasal1=$_POST["fechasal1"];
      $funcionem1=$_POST["funcionem1"];
      $nomempresa2=$_POST["nomempresa2"];
      $direccionem2=$_POST["direccionem2"];
      $ciudadpais2=$_POST["ciudadpais2"];
      $cargo2=$_POST["cargo2"];
      $fechaing2=$_POST["fechaing2"];
      $fechasal2=$_POST["fechasal2"];
      $funcionem2=$_POST["funcionem2"];
      $sql="update practicante  set nomempresa1='$nomempresa1',direccionem1='$direccionem1',ciudadpais1='$ciudadpais1',cargo1='$cargo1',fechaing1='$fechaing1',fechasal1='$fechasal1',funcionem1='$funcionem1',nomempresa2='$nomempresa2',direccionem2='$direccionem2',ciudadpais2='$ciudadpais2',cargo2='$cargo2',fechaing2='$fechaing2',fechasal2='$fechasal2',funcionem2='$funcionem2' where identificacion='$identificacion'";
      //echo $sql;
      mysql_query($sql);
    }

    if(isset($_POST['actuaref'])){
      $identificacion=$_SESSION['user'];
      $nomreco1=$_POST["nomreco1"];
      $empreco1=$_POST["empreco1"];
      $telereco1=$_POST["telereco1"];
      $nomreco2=$_POST["nomreco2"];
      $empreco2=$_POST["empreco2"];
      $telereco2=$_POST["telereco2"];
      $ideps=$_POST["ideps"];
      $sql="update practicante  set nomreco1='$nomreco1',empreco1='$empreco1',telereco1='$telereco1',nomreco2='$nomreco2',empreco2='$empreco2',telereco2='$telereco2',ideps='$ideps' where identificacion='$identificacion'";
      //echo $sql;
      mysql_query($sql);
      
    }
?>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <link type="text/css" rel="styleheet" href="../../../css/prinpalestudiantes.css">
        <link type="text/css" rel="styleheet" href="../../../css/sweetalert.css">
    </head>
    <?php
      if(isset($_GET["error"])){
          echo '<script type="text/javascript">';
          echo 'setTimeout(function () { swal("No puedes tener mas de tres Solicitudes ","","error");';
          echo '},0);</script>';
      }
      if(isset($_GET["errore"])){
          echo '<script type="text/javascript">';
          echo 'setTimeout(function () { swal("Ya estas aspirando a esta oferta","","error");';
          echo '},0);</script>';
      }
    ?>
    <body>
        <div class="navbar-fixed">
            <nav>
                <div class="nav-wrapper  #ffffff white">
                    <a href="#!" class="brand-logo"><img class=" circle responsive-img" src="https://media.licdn.com/mpr/mpr/shrinknp_200_200/AAEAAQAAAAAAAANqAAAAJGVmYmQ0NmM2LTc4NzktNDM5YS04ZmUwLWNkNWNkMmQxYjhmZg.jpg" style="width:50px"></a>
                    <ul class="right hide-on-med-and-down">
                  </ul>
                </div>
            </nav>
        </div>
        <!-- Div donde esta la informacion del usuario los usuarios -->
        <?php
          $C=mysql_query("SELECT * FROM practicante WHERE identificacion=".$_SESSION["user"]);
                        if ($R=mysql_fetch_array($C))
                        {
        ?>
        <div class="row">
          <div class="col s3">
              <div class="card small">
                  <div class="card-image waves-effect waves-block waves-light" align="center">
                      <form action="cambioImagen.php" method="post">
                          <input  type="file" id= "$R['cambioimg']" name="cambio">
                          <input type='submit' name='ir' value='Actualizar'>
                          <?php
                          // $identificacion =$_POST["identificacion"]
                              if($R==true){$identificacion =$_POST["identificacion"];$nombredeimagen=strtolower($_FILES['imagen']['name']);$identificacion=$_POST['identificacion'];$nombredeiamgen2= $identificacion.".jpg";$nombredeimagenpng=$identificacion.".png";
                                  if($nombredeimagen==$nombredeiamgen2 || $nombredeimagen==$nombredeimagenpng){$dirdestino = "../../imagenes/fotos/estudiantes/" . basename($_FILES['imagen']['name']);$imagensubida = "../../imagenes/fotos/estudiantes" . $dirdestino;
                                      if(is_uploaded_file($_FILES['imagen']['tmp_name']
                                      )){
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
                                            ?>
                      </form>
                      <br>
                      <img class="activator" src="../../../imagenes/<?php  echo $R['foto'] ?>" style="width:150px">
                  </div>
                  <div class="card-content"> 
                      <span class="card-title activator grey-text text-darken-4" style="font-size:14px"><?php echo $R['nombre'] ?>
                          <br>
                          <i class="material-icons right">more_vert</i>
                      </span>
                      <a href="logout.php" class="blue-text text-darken-4">Cerrar Sesion</a>
                      <a href="logout.php"><i class="material-icons right blue-text text-darken-4">account_box</i></a>
                  </div>
                  <div class="card-reveal">
                      <span class="card-title grey-text text-darken-4">Mi informacion<i class="material-icons right">close</i></span>
                      <p> <strong>Direccion</strong>  <?php  echo $R['direccion'] ?></p>
                      <p> <strong>Correo</strong>  <?php  echo $R['correo'] ?></p>
                      <p> <strong>Programa</strong> 
                          <?php 
                              $programa=$R['idprograma'];
                              $programac=mysql_query("select nomprograma from programa,practicante where practicante.idprograma=programa.idprograma and programa.idprograma=$programa");
                              if ($nomprograma=mysql_fetch_array($programac)){
                                  echo $nomprograma['nomprograma'];
                              }
                          ?>
                      </p>
                      <p> 
                          <strong>Semestre</strong> 
                          <?php $semestre=$R['semestre']; 
                              if($semestre==1){
                                 echo 'Primero';
                              }
                              if($semestre==2){
                                 echo 'Segundo';
                              }
                              if($semestre==3){
                                 echo 'Tercero';
                              }
                              if($semestre==4){
                                 echo 'Cuarto';
                              }
                              if($semestre==5){
                                 echo 'Quinto';
                              }
                              if($semestre==6){
                                 echo 'Sexto';
                              }
                              if($semestre==7){
                                 echo 'Septimo';
                              }
                              if($semestre==8){
                                 echo 'Octavo';
                              }
                              if($semestre==9){
                                 echo 'Noveno';
                              }
                              if($semestre==10){
                                 echo 'Decimo';
                              }
                          ?>
                      </p>
                      <p> <strong>Usuario</strong>  <?php  echo $R['usuario'] ?></p>
                  </div>
              </div>
          </div>
          <div class="col s6">
              <ul class="tabs">
                  <li class="tab col" id="tab"><a href="#voted" class="blue-text text-darken-4">Mi informacion</a></li>
                  <li class="tab col s3"><a class="blue-text text-darken-4" href="#empresas"> Mis Empresas</a></li>
                  <li class="tab col s3"><a href="#informes" class="blue-text text-darken-4">Informes</a></li>
                  <div class="indicator #1a237e indigo darken-4" style="z-index:1"></div>
              </ul>
              <br>
              <br>
              <img class="responsive-img" src="http://1.bp.blogspot.com/-UAj4IgD2qyo/VcEgGHq05xI/AAAAAAAAf0g/9xt6jRIpzo4/s1600/p.png" >
          </div>
          <div class="col s2">
              <div id="voted" class="col s12 center-align" style="margin-top:50%">
                 <a class="waves-effect waves-light btn modal-trigger #1a237e indigo darken-5 " href="#actualizar" onclick="Materialize.toast('Actualiza tus datos', 4000)">Datos Personales<i class="material-icons right">mode_edit</i></a>
                 <br><br>
                  <a class="waves-effect waves-light btn modal-trigger #1a237e indigo darken-5" href="#hojadevida">Estudios Realizados<i class="material-icons right">mode_edit</i></a>
                   <br><br>
                  <a class="waves-effect waves-light btn modal-trigger #1a237e indigo darken-5" href="#laboral">Experiencia Laboral<i class="material-icons right">mode_edit</i></a>
                  <br><br>
                  <a class="waves-effect waves-light btn modal-trigger #1a237e indigo darken-5" href="#referencia">Referencias Personales<i class="material-icons right">mode_edit</i></a>
              </div>
              <div id="empresas">
                  <div class="card-panel  #1a237e indigo darken-4">
                      <span class="white-text">Practicas Ue<br>
                          <br>
                          Recuerda que puedes aspirar a un maximo de 3 empresas
                      </span>
                  </div>
                  <ul class="collection">
                      <?php 
                      $solicitudes=mysql_query("SELECT * FROM solicitud WHERE estado=0  and identificacion=".$_SESSION["user"]);
                       while($rssolicitudes=mysql_fetch_array($solicitudes)){
                      ?>
                      <a class="confirmation" href="cancelarsolicitud.php?idsolicitud=<?php echo $rssolicitudes['idsolicitud'] ?>"><i class="material-icons right blue-text text-darken-4">delete</i></a>
                      <li class="collection-item"><?php $idoferta=$rssolicitudes['idoferta']; 
                          $ofertas=mysql_query("select * from ofertas where idoferta=$idoferta");
                          if($rsofertas=mysql_fetch_array($ofertas)){
                              $idempresa=$rsofertas['idempresa'];
                              $empresainf=mysql_query("SELECT * from empresa where idempresa=$idempresa");
                              $rsempresas=mysql_fetch_array($empresainf);
                              echo $rsempresas['nomempresa']; echo'</br>';
                              echo $rsofertas['cargo'];
                          }            
                          ?>
                      </li>
                      <?php
                        }    
                        $identificacion=$_SESSION["user"];
                        $contar=mysql_num_rows(mysql_query("SELECT * from registro where identificacion=$identificacion and estado=1"));
                        if($contar > 0 ){
                            echo '<li class="collection-item">Ya estas en practicas </li>';
                        }
                      ?>
                  </ul>
              </div>
              <div id="informes" style="margin-top:20%">
                  <a class="modal-trigger waves-effect waves-light btn #1a237e indigo darken-4" href="#informe">Semanal<i class="material-icons right">send</i></a>
                  <br>
                  <br>
                  <br>
                  <a class="modal-trigger waves-effect waves-light btn #1a237e indigo darken-4" href="#planmejora">Plan mejora<i class="material-icons right">send</i></a>
                  <br>
                  <br>         
                  </button>
              </div>
          </div>
          <!-- separadores de divs -->
          <!-- el siguiente es el div de la informacion de las empresas que estan ofertas-->
          <div class="row">
              <div class="col s12">
                  <div class="card-panel #1a237e indigo darken-4" align="center">
                      <span class="white-text">
                          Ofertas Empresariales
                      </span>
                  </div>
              </div>
          </div>
          <?php
              $log=mysql_query("SELECT * FROM practicante WHERE identificacion=".$_SESSION["user"]);
              $row = mysql_fetch_array($log);
              $idprograma=$row['idprograma'];
              $buscarbase="select cargo,perfil,nomempresa,localidad,idprograma,estado,idoferta from ofertas,empresa where ofertas.idempresa=empresa.idempresa and idprograma='$idprograma' and estado < 2";
              $sql2 = mysql_query($buscarbase);
              while($rs=mysql_fetch_array($sql2)){
          ?>
          <div class="collection">
              <table>
                  <tr>
                      <td width="125">
                          <a  href="solicitud.php?idoferta=<?php echo $rs['idoferta']?>&identificacion=<?php echo $_SESSION["user"]?>" class="confirmation" style="align:left">
                            <?php 
                                $identificacion=$_SESSION["user"];
                                $contar=mysql_num_rows(mysql_query("select * from registro where identificacion=$identificacion and estado=1"));
                                if($contar > 0 ){                         
                                }
                                else{
                                    echo '<i class="material-icons right blue-text text-darken-9">thumb_up</i></span><strong>Click Aqui</strong>'; 
                                }
                            ?>
                         </a>
                      </td>
                      <td>
                          <a class="collection-item blue-text text-darken-4">
                              <td><strong>Cargo :</strong> <?php echo $rs['cargo'] ?></td>
                              <td><strong>Perfil :</strong><?php echo $rs['perfil'] ?></td>
                              <td><strong>Localidad :</strong> <?php echo $rs['localidad'] ?></td>
                              <td><strong>Estado :</strong><?php $estado=$rs['estado'];
                                  if($estado==0){
                                      echo 'Disponible';
                                  }
                                  if($estado==1){
                                     echo  'Solicitada';
                                  }
                                  ?>
                              </td>
                          </a>
                      </td>
                      <td>
                          <a href="#!" class="collection-item blue-text text-darken-4">Personas Interesadas en esta oferta
                              <span class="badge">
                                  <?php  
                                      $idoferta=$rs['idoferta'];
                                      $interesados=mysql_num_rows(mysql_query("select * from solicitud where idoferta=$idoferta"));
                                      echo $interesados;
                                  ?>
                              </span> 
                          </a>
                      </td>
                  </tr>
              </table>
          </div>
          <?php
              }
          ?>
          <!-- div separadores -->
          <!-- Aca empieza a diujarse el modal del informe de Plan de mejora -->
        <div id="hojadevida" class="modal modal-fixed-footer">
            <form action="index.php" method="post">
                <div class="modal-content">
                    <h4>Hoja de Vida</h4>
                    <div class="input-field col s6">
                        <label for="first_name">Institucion</label>
                        <input placeholder="Institucion" id="first_name"  value="<?php echo $R['institucion']?>" type="text" class="validate" name="institucion">          
                    </div>
                    <div class="input-field col s4">
                        <input placeholder="Titulo" id="first_name" value="<?php echo $R['tituloins']?>" type="text" class="validate" name="tituloins">
                        <label for="first_name">Titulo</label>
                    </div>
                    <div class="input-field col s2">
                        <input placeholder="Año Grado"  value="<?php  echo $R['anogrado']?>" id="first_name" type="text" class="validate" name="anogrado">
                        <label for="first_name">Año Grado</label>
                    </div>
                    <div class="input-field col s6">
                        <label for="first_name">Universidad</label>
                        <input placeholder="Instirucion" id="first_name"  value="<?php echo $R['universidad']?>" type="text" class="validate" name="universidad">          
                    </div>
                    <div class="input-field col s4">
                        <input placeholder="Titulo" id="first_name" value="<?php echo $R['titulouni']?>" type="text" class="validate" name="titulouni">
                        <label for="first_name">Titulo</label>
                    </div>
                    <div class="input-field col s2">
                        <input placeholder="Año Grado"  value="<?php  echo $R['anocurso']?>" id="first_name" type="text" class="validate" name="anocurso">
                        <label for="first_name">Año Grado</label>
                    </div>
                    <div class="input-field col s2">
                        <select id="idioma" class="form-control" name="idioma">
                            <option value="Ingles" selected >Ingles</option>
                            <option value="Frances">Frances</option>
                            <option value="Aleman">Aleman</option>
                            <option value="Italiano">Italiano</option>
                            <option value="Chino">Chino</option>
                        </select>
                      <label>Escoge un Idioma</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="Institucion de Ingles" id="first_name" value="<?php echo $R['institutoing']?>" type="text" class="validate" name="institutoing">
                        <label for="first_name">Institucion Ingles</label>
                    </div>
                    <div class="input-field col s2">
                        <select id="nivel" class="form-control" name="nivel">
                            <option value="A1">A1</option>
                            <option value="A2">A2</option>
                            <option value="B1">B1</option>
                            <option value="B2">B2</option>
                            <option value="C1">C1</option>
                        </select>
                        <label>Nivel Certificado</label>
                    </div>
                    <div class="input-field col s1">
                        <label for="first_name">% Hablado</label>
                        <input placeholder="% Hablado" id="first_name"  value="<?php echo $R['porhabla']?>" type="text" class="validate" name="porhabla">          
                    </div>
                    <div class="input-field col s1">
                      <input placeholder="% Escrito" id="first_name" value="<?php echo $R['porescrito']?>" type="text" class="validate" name="porescrito">
                      <label for="first_name">% Escrito</label>
                    </div>
                    <div class="input-field col s5">
                    <label for="first_name">Institucion Sistemas</label>
                     <input placeholder="Institucion Sistemas" id="first_name"  value="<?php echo $R['institutosis']?>" type="text" class="validate" name="institutosis">          
                    </div>
                    <div class="input-field col s6">
                    <label for="first_name">Habilidades en Sistemas</label>
                     <input placeholder="Habilidades" id="first_name"  value="<?php echo $R['habsistemas']?>" type="text" class="validate" name="habsistemas">          
                    </div>
                    <div class="input-field col s1">
                      <input placeholder="% Sistemas" id="first_name" value="<?php echo $R['nivelsis']?>" type="text" class="validate" name="nivelsis">
                      <label for="first_name">% Sistemas</label>
                    </div>
                <button class="btn waves-effect waves-light #1a237e indigo darken-4" type="submit" name="actuahv">Actualizar
                    <i class="material-icons right">send</i>
                </button>
                <div class="modal-footer">
                  <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cerrar</a>
                </div>
              </div>
          </form>
      </div>
      <!-- div separadores -->
      <!-- Aca empieza a diujarse el modal del informe de Plan de mejora -->
      <div id="laboral" class="modal modal-fixed-footer">
          <form action="index.php" method="post">
              <div class="modal-content">
                  <h4>Hoja de Vida Laboral</h4>
                    <div class="input-field col s4">
                        <label for="first_name">Nombre Empresa</label>
                        <input placeholder="Nombre Empresa" id="first_name"  value="<?php echo $R['nomempresa1']?>" type="text" class="validate" name="nomempresa1">          
                    </div>
                    <div class="input-field col s4">
                        <label for="first_name">Direccion Empresa</label>
                        <input placeholder="Direccion Empresa" id="first_name"  value="<?php echo $R['direccionem1']?>" type="text" class="validate" name="direccionem1">          
                    </div>
                    <div class="input-field col s4">
                        <label for="first_name">Pais / Ciudad Empresa</label>
                        <input placeholder="Nombre Empresa" id="first_name"  value="<?php echo $R['ciudadpais1']?>" type="text" class="validate" name="ciudadpais1">          
                    </div>
                    <div class="input-field col s2">
                        <label for="first_name">Cargo Empresa</label>
                        <input placeholder="Direccion Empresa" id="first_name"  value="<?php echo $R['cargo1']?>" type="text" class="validate" name="cargo1">          
                    </div>
                    <div class="input-field col s2">
                        <label for="first_name">Fecah Ingreso</label>
                        <input placeholder="Direccion Empresa" id="first_name"  value="<?php echo $R['fechaing1']?>" type="text" class="validate" name="fechaing1">          
                    </div>
                    <div class="input-field col s2">
                        <label for="first_name">Fecha Salida</label>
                        <input placeholder="Direccion Empresa" id="first_name"  value="<?php echo $R['fechasal1']?>" type="text" class="validate" name="fechasal1">          
                    </div>
                    <div class="input-field col s6">
                        <label for="first_name">Funciones</label>
                        <input placeholder="Direccion Empresa" id="first_name"  value="<?php echo $R['funcionem1']?>" type="text" class="validate" name="funcionem1">          
                    </div>
                    <div class="input-field col s4">
                        <label for="first_name">Nombre Empresa</label>
                        <input placeholder="Nombre Empresa" id="first_name"  value="<?php echo $R['nomempresa2']?>" type="text" class="validate" name="nomempresa2">          
                    </div>
                    <div class="input-field col s4">
                        <label for="first_name">Direccion Empresa</label>
                        <input placeholder="Direccion Empresa" id="first_name"  value="<?php echo $R['direccionem2']?>" type="text" class="validate" name="direccionem2">          
                    </div>
                    <div class="input-field col s4">
                        <label for="first_name">Pais / Ciudad Empresa</label>
                        <input placeholder="Nombre Empresa" id="first_name"  value="<?php echo $R['ciudadpais2']?>" type="text" class="validate" name="ciudadpais2">          
                    </div>
                    <div class="input-field col s2">
                        <label for="first_name">Cargo Empresa</label>
                        <input placeholder="Direccion Empresa" id="first_name"  value="<?php echo $R['cargo2']?>" type="text" class="validate" name="cargo2">          
                    </div>
                    <div class="input-field col s2">
                        <label for="first_name">Fecah Ingreso</label>
                        <input placeholder="Direccion Empresa" id="first_name"  value="<?php echo $R['fechaing2']?>" type="text" class="validate" name="fechaing2">          
                    </div>
                    <div class="input-field col s2">
                        <label for="first_name">Fecha Salida</label>
                        <input placeholder="Direccion Empresa" id="first_name"  value="<?php echo $R['fechasal2']?>" type="text" class="validate" name="fechasal2">          
                    </div>
                    <div class="input-field col s6">
                        <label for="first_name">Funciones</label>
                        <input placeholder="Funciones" id="first_name"  value="<?php echo $R['funcionem2']?>" type="text" class="validate" name="funcionem2">          
                    </div>
                  <button class="btn waves-effect waves-light #1a237e indigo darken-4" type="submit" name="actualab">Actualizar
                      <i class="material-icons right">send</i>
                  </button>
                  <div class="modal-footer">
                      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cerrar</a>
                  </div>
              </div>
          </form>
      </div>
    <!-- div separadores -->
      <!-- Aca empieza a diujarse el modal del informe de Plan de mejora -->
      <div id="referencia" class="modal modal-fixed-footer">
          <form action="index.php" method="post">
              <div class="modal-content">
                <h4>Hoja de Vida Referencias</h4>
                <div class="input-field col s5">
                    <label for="first_name">Nombre Empresa</label>
                    <input placeholder="Nombre Empresa" id="first_name"  value="<?php echo $R['empreco1']?>" type="text" class="validate" name="empreco1">          
                </div>
                <div class="input-field col s5">
                    <label for="first_name">Nombre Persona</label>
                    <input placeholder="Nombre Persona" id="first_name"  value="<?php echo $R['nomreco1']?>" type="text" class="validate" name="nomreco1">          
                </div>
                <div class="input-field col s2">
                    <label for="first_name">Telefono</label>
                    <input placeholder="Telefono Empresa" id="first_name"  value="<?php echo $R['telereco1']?>" type="text" class="validate" name="telereco1">          
                </div>
                <div class="input-field col s5">
                    <label for="first_name">Nombre Empresa</label>
                    <input placeholder="Nombre Empresa" id="first_name"  value="<?php echo $R['empreco2']?>" type="text" class="validate" name="empreco2">          
                </div>
                <div class="input-field col s5">
                    <label for="first_name">Nombre Persona</label>
                    <input placeholder="Nombre Persona" id="first_name"  value="<?php echo $R['nomreco2']?>" type="text" class="validate" name="nomreco2">          
                </div>
                <div class="input-field col s2">
                    <label for="first_name">Telefono</label>
                    <input placeholder="Telefono Empresa" id="first_name"  value="<?php echo $R['telereco2']?>" type="text" class="validate" name="telereco2">          
                </div>
                <div class="input-field col s4">
                    <select <select id="first_name" class="form-control" name="ideps">
                        <option>Selecciona una EPS</option>
                        <?php  
                            $queryfolio="select * from eps";
                            $resfolio=mysql_query($queryfolio);
                            while($arreps = mysql_fetch_array($resfolio))
                            {
                            if($ideps==$arreps['deseps']){
                        ?>
                        <option value="<?php echo $arreps['ideps'] ?>"> <?php echo $arreps['deseps']; ?> </option>
                        <?php }
                        else{
                        ?>
                        <option value="<?php echo $arreps['ideps'] ?>" selected > <?php echo $arreps['deseps']; ?> </option>
                        <?php 
                            }
                            }
                        ?>
                    </select>
                    <label>Escoge una EPS</label>
                </div>
                <button class="btn waves-effect waves-light #1a237e indigo darken-5" type="submit" name="actuaref">Actualizar
                    <i class="material-icons right">send</i>
                </button>
                <div class="modal-footer">
                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cerrar</a>
                </div>
            </div>
        </form>
      </div>  
      <div id="planmejora" class="modal">
          <div class="modal-content">
              <div class="row">
                  <div class="col s6">
                      <img class="responsive-img" src="http://1.bp.blogspot.com/-UAj4IgD2qyo/VcEgGHq05xI/AAAAAAAAf0g/9xt6jRIpzo4/s1600/p.png">
                  </div>
                  <div class="col s6">
                      <h4>Informe Plan de mejora</h4> 
                  </div>
             </div>
              <div class="row">
                  <div class="col s6">
                      <div class="card-panel #1a237e indigo darken-4">
                          <span class="white-text">
                              Sector externo de tu empresa
                          </span>
                      </div>    
                  </div>
                  <div class="col s6">
                      <div class="input-field">
                          <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
                          <label for="icon_prefix2">Sector externo de la empresa</label>
                      </div>  
                  </div>
              </div>
              <div class="row">
                  <div class="col s6">
                      <div class="card-panel #1a237e indigo darken-4">
                          <span class="white-text">
                            Sector Interno de tu empresa
                          </span>
                      </div>    
                  </div>
                  <div class="col s6">
                      <div class="input-field">
                          <textarea id="icon_prefix2" class="materialize-textarea" ></textarea>
                          <label for="icon_prefix2">Sector interno de la empresa</label>
                      </div>  
                  </div>
              </div>
              <div class="row">
                  <div class="col s12">
                      <div class="card-panel #1a237e indigo darken-4">
                          <span class="white-text" style="margin-left:50%">
                              Matriz Dofa
                          </span>
                      </div>    
                  </div>
              </div>
              <div class="row">
                  <div class="col s6">
                      <div class="input-field">
                          <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
                          <label for="icon_prefix2">Fortalezas</label>
                      </div> 
                  </div>
                  <div class="col s6">
                      <div class="input-field">
                          <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
                          <label for="icon_prefix2">Debilidades</label>
                      </div>  
                  </div>
              </div>
              <div class="row">
                  <div class="col s6">
                      <div class="input-field">
                          <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
                          <label for="icon_prefix2">Oportunidades</label>
                      </div> 
                  </div>
                  <div class="col s6">
                      <div class="input-field">
                          <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
                          <label for="icon_prefix2">Amenazas</label>
                      </div>  
                  </div>
              </div>
              <div class="row">
                  <div class="col s12">
                      <div class="card-panel #1a237e indigo darken-4">
                          <span class="white-text" style="margin-left:30%">
                            Justificacion del proyecto
                          </span>
                      </div>    
                  </div>
              </div>
              <div class="row">
                  <div class="col s12">
                      <div class="input-field">
                          <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
                          <label for="icon_prefix2">Situacion</label>
                      </div> 
                  </div>
             </div>
          </div>
          <div class="row">
              <div class="col s12">
                  <div class="card-panel #1a237e indigo darken-4">
                      <span class="white-text" style="margin-left:50%">
                        Objetivos
                      </span>
                  </div>    
              </div>
          </div>
          <div class="row">
              <div class="col s6">
                  <div class="input-field">
                      <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
                      <label for="icon_prefix2">Objetivo General</label>
                  </div> 
              </div>
              <div class="col s6">
                  <div class="input-field">
                      <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
                      <label for="icon_prefix2">Objectivos Especificos</label>
                  </div>  
              </div>
          </div>
          <div class="modal-footer">
              <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>
          </div>
      </div>
      <!-- div separadores -->
      <!-- Aca empieza a diujarse el modal del informe Semanal -->
      <div id="informe" class="modal modal-fixed-footer">
          <div class="modal-content">
              <form action="hola.html">
                    <div class="row">
                        <div class="col s6">
                            <img class="responsive-img" src="http://1.bp.blogspot.com/-UAj4IgD2qyo/VcEgGHq05xI/AAAAAAAAf0g/9xt6jRIpzo4/s1600/p.png">
                        </div>
                        <div class="col s6">
                            <h4>Informe Semanal</h4> 
                        </div>
                    </div>
                  <div class="row">
                      <div class="col s6">
                          <div class="card-panel #1a237e indigo darken-4">
                              <span class="white-text">
                                  Semana 1
                              </span>
                          </div>
                      </div>
                      <div class="col s6">
                          <div class="input-field">
                              <textarea id="icon_prefix2" class="materialize-textarea" required minlength="20"></textarea>
                              <label for="icon_prefix2">Tus principales actividades en la Semana 1</label>
                          </div>
                      </div> 
                  </div>
                  <div class="row">
                      <div class="col s6">
                          <div class="card-panel #1a237e indigo darken-4">
                              <span class="white-text">
                                 Semana 2
                              </span>
                          </div>
                      </div>
                      <div class="col s6">
                          <div class="input-field">
                              <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
                              <label for="icon_prefix2">Tus principales actividades en la Semana 2</label>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col s6">
                          <div class="card-panel #1a237e indigo darken-4">
                              <span class="white-text">
                                  Semana 3
                              </span>
                          </div>
                      </div>
                      <div class="col s6">
                          <div class="input-field">
                              <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
                              <label for="icon_prefix2">Tus principales actividades en la Semana 3</label>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col s6">
                          <div class="card-panel #1a237e indigo darken-4">
                              <span class="white-text">
                                  Semana 4
                              </span>
                          </div>
                      </div>
                      <div class="col s6">
                          <div class="input-field">
                              <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
                              <label for="icon_prefix2">Tus principales actividades en la Semana 4</label>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col s6">
                        <div class="card-panel #1a237e indigo darken-4">
                            <span class="white-text">
                                Semana 5
                            </span>
                        </div>
                    </div>
                    <div class="col s6">
                        <div class="input-field">
                            <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
                            <label for="icon_prefix2">Tus principales actividades en la Semana 5</label>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col s6">
                          <div class="card-panel #1a237e indigo darken-4">
                              <span class="white-text">
                                  Semana 6
                              </span>
                          </div>
                      </div>
                      <div class="col s6">
                          <div class="input-field">
                              <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
                              <label for="icon_prefix2">Tus principales actividades en la Semana 6</label>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col s6">
                          <div class="card-panel #1a237e indigo darken-4">
                              <span class="white-text">
                                 Semana 7
                              </span>
                          </div>
                      </div>
                      <div class="col s6">
                          <div class="input-field">
                              <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
                              <label for="icon_prefix2">Tus principales actividades en la Semana 7</label>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col s6">
                          <div class="card-panel #1a237e indigo darken-4">
                              <span class="white-text">
                                 Semana 8
                              </span>
                          </div>
                      </div>
                      <div class="col s6">
                          <div class="input-field">
                              <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
                              <label for="icon_prefix2">Tus principales actividades en la Semana 8</label>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col s6">
                          <div class="card-panel #1a237e indigo darken-4">
                              <span class="white-text">
                                  Semana 9
                              </span>
                          </div>
                      </div>
                      <div class="col s6">
                          <div class="input-field">
                              <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
                              <label for="icon_prefix2">Tus principales actividades en la Semana 10</label>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col s6">
                          <div class="card-panel #1a237e indigo darken-4">
                              <span class="white-text">
                                  Semana 11
                              </span>
                          </div>
                      </div>
                      <div class="col s6">
                          <div class="input-field">
                              <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
                              <label for="icon_prefix2">Tus principales actividades en la Semana 11</label>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col s6">
                          <div class="card-panel #1a237e indigo darken-4">
                              <span class="white-text">
                                  Semana 12
                              </span>
                          </div>
                      </div>
                      <div class="col s6">
                          <div class="input-field">
                              <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
                              <label for="icon_prefix2">Tus principales actividades en la Semana 12</label>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col s6">
                            <div class="card-panel #1a237e indigo darken-4">
                                <span class="white-text">
                                    Semana 13
                                </span>
                            </div>
                      </div>
                      <div class="col s6">
                          <div class="input-field">
                              <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
                              <label for="icon_prefix2">Tus principales actividades en la Semana 13</label>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col s12">
                          <button class="btn waves-effect waves-light #1a237e indigo darken-4" type="submit" name="action">Guardar
                            <i class="material-icons right">assignment</i>
                          </button>
                      </div>
                  </div>
              </form>
          </div>
          <div class="modal-footer">
              <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cerrar</a>
          </div>
      </div>
      <!-- Aca empieza a dibjuar el  modal de actualizar datos -->
      <!-- div separadores -->
      <div id="actualizar" class="modal">
          <div class="modal-content">
              <form action="index.php" method="post">
                  <div class="input-field col s4">
                      <input value="<?php  echo $R['identificacion']?>" disabled type="text" class="validate" name="id">
                      <label for="disabled">Identificacion</label>
                  </div>
                  <div class="input-field col s4">
                      <input placeholder="Placeholder" value="<?php echo $R['nombre'] ?>" id="first_name" type="text" class="validate" name="nombre">
                      <label for="first_name">Nombre</label>
                  </div>
                  <div class="input-field col s4">
                      <input placeholder="Placeholder" value="<?php  echo $R['direccion']?>" id="first_name" type="text" class="validate" name="direccion">
                      <label for="first_name">Direccion</label>
                  </div>
                  <div class="input-field col s4">
                      <input placeholder="Placeholder" value="<?php echo $R['correo']?>" id="first_name" type="email" class="validate" name="correo">
                      <label for="first_name">Correo</label>
                  </div>
                  <div class="input-field col s4">
                      <input placeholder="Placeholder"  value="<?php  echo $R['celular']?>" id="first_name" type="text" class="validate" name="celular">
                      <label for="first_name">Celular</label>
                  </div>
                  <div class="input-field col s4">
                      <input placeholder="Placeholder" id="first_name" value="<?php echo $R['password']?>" type="password" class="validate" name="contrasena">
                      <label for="first_name">contrasena</label>
                  </div>
                  <div class="input-field col s4">
                      <input placeholder="Placeholder" id="first_name" value="<?php echo $R['promocion']?>" type="text" class="validate" name="promocion">
                      <label for="first_name">Promocion</label>
                  </div>
                  <div class="input-field col s4">
                      <select id="semestre" class="form-control" name="semestre">
                          <option value="1" <?php if($R['semestre']==1) { echo 'selected'; }?>>
                              Primero
                          </option>
                          <option value="2"  <?php if($R['semestre']==2) { echo 'selected'; }?> >Segundo</option>
                          <option value="3"   <?php if($R['semestre']==3) { echo 'selected'; }?>>Tercero</option>
                          <option value="4"  <?php if($R['semestre']==4) { echo 'selected'; }?> >Cuarto</option>
                          <option value="5"   <?php if($R['semestre']==5) { echo 'selected'; }?>>Quinto</option>
                          <option value="6"   <?php if($R['semestre']==6) { echo 'selected'; }?>>Sexto</option>
                          <option value="7"   <?php if($R['semestre']==7) { echo 'selected'; }?>>Septimo</option>
                          <option value="8"   <?php if($R['semestre']==8) { echo 'selected'; }?>>Octavo</option>
                          <option value="9"   <?php if($R['semestre']==9) { echo 'selected'; }?>>Noveno</option>
                          <option value="10"    <?php if($R['semestre']==10) { echo 'selected'; }?>>Decimo</option>
                      </select>
                      <label>Escoge un Semestre</label>
                  </div>
                  <div class="input-field col s4">
                      <select name="programa" id="input_programa" name="programa">
                          <?php  
                            $queryfolio="select * from programa";
                            $resfolio=mysql_query($queryfolio);
                            while($arrprograma = mysql_fetch_array($resfolio))
                            {
                          ?>
                              <option value="<?php echo $arrprograma['idprograma'] ?>"  
                                  <?php 
                                    $identificacion=$R['identificacion']; 
                                    $nomprograma="select nomprograma from practicante,programa where practicante.idprograma=programa.idprograma and identificacion='$identificacion'";
                                    $sql3=mysql_query($nomprograma);
                                    $fila = mysql_fetch_row($sql3); 
                                    if($fila[0]==$arrprograma['nomprograma']){
                                         echo ' selected="selected"';
                                    }
                                ?> 
                              >
                              <?php echo $arrprograma['nomprograma'] ?>
                              </option>
                          <?php 
                            }
                          ?>
                      </select>
                      <label>Escoge un programa</label>
                  </div>
                  <div class="input-field col s4">
                      <label for="first_name">Fecha Nacimiento</label>
                      <input placeholder="Placeholder" id="first_name"  value="<?php echo $R['fechanac']?>" type="text" class="datepicker" name="fechanac">
                  </div>
                  <div class="input-field col s4">
                      <input placeholder="Telefono Fijo"  value="<?php  echo $R['fijo']?>" id="first_name" type="text" class="validate" name="fijo">
                      <label for="first_name">Telefono Fijo</label>
                  </div>
                  <div class="input-field col s4">
                      <input placeholder="Lugar Nacimiento" value="<?php echo $R['lugarnac']?>" type="text" class="validate" name="lugarnac">
                      <label for="first_name">Lugar Nacimiento</label>
                  </div>
                  <button class="btn waves-effect waves-light #1a237e indigo darken-4" type="submit" name="actualizar">Actualizar
                      <i class="material-icons right">send</i>
                  </button>
              </form>
              <div class="modal-footer">
                  <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>
              </div>
          </div>
          <!-- Scripts importantes en los archivos por favor no quitarlos,ni cambiarlos de posicion en la pagina -->
          <script type="text/javascript">
            $(document).ready(function(){
            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
            $('.modal-trigger').leanModal();
          });
          </script>
          <script type="text/javascript">
            $(document).ready(function() {
            $('select').material_select();
          });
          </script>
          <script type="text/javascript">
           $(document).ready(function(){
            $('ul.tabs').tabs();
          });
          </script>
          <script>
        $('.confirmation').click(function (e) {
            var href = $(this).attr('href');
            swal({
                title: "Estas seguro?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Si,solicitar!",
                cancelButtonText: "No, cancelar!",
                closeOnConfirm: true,
                closeOnCancel: true
            },
                    function (isConfirm) {
                        if (isConfirm) {
                            window.location.href = href;
                        }
                    });
            return false;
        });

          $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15 // Creates a dropdown of 15 years to control year
          });

        </script>
           <!-- cdn de materialize.js no quitarlo por favor -->
             <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script> 
        </body>
        <?php
      }
      ?>
</html>
<?php
}else{
  echo '<script> window.location="../../index.php"; </script>';
}
?>