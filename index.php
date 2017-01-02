<html>
    <head>
        <?php
        include ("../conexion.php");
        session_start();
        if(isset($_SESSION['user'])){
           $usuario=$_SESSION['user'];
           $queryfolio="select * from practicante  where identificacion=$usuario";
           $resfolio=mysql_query($queryfolio);
           while($arrprograma = mysql_fetch_array($resfolio)){
            if($arrprograma['tipo']=='Estudiante'){
           echo '<script>window.location="../principalestud/index.php";</script>';
              }
            else{
               echo '<script>window.location="../principaldocen/index.php";</script>';    
            }
          }
        }
        if(isset($_SESSION['asesor'])){
            echo '<script>window.location="../principaldocen/index.php";</script>';
        }
        ?>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../css/reset.css">
        <link rel="stylesheet prefetch" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900">
        <link rel="stylesheet prefetch" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0-rc2/angular-material.min.css">
        <link href="https://fonts.googleapis.com/css?family=Antic+Slab" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="../../css/login.css">
        <script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.selectric/1.9.6/jquery.selectric.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/selectric.css" />
        <script src="../../js/sweetalert.min.js"></script> 
        <link rel="stylesheet" type="text/css" href="../../css/sweetalert.css">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.2/material.blue_grey-red.min.css" />
        <script src="https://storage.googleapis.com/code.getmdl.io/1.0.0/material.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src='../../js/index.js'></script>
            <script type="text/javascript">
                var f=jQuery.noConflict();
                  f(function(){
                  f('select').selectric({
                    maxHeight:150
                  });
                });
            </script>
        <style>
            .btn-file {
              position: relative;
              }
            .btn-file input[type=file] {
                position: absolute;
                top: 0;
                right: 0;
                min-width: 100%;
                min-height: 100%;
                font-size: 100px;
                text-align: right;
                opacity: 0;
                outline: none;
                background: black;
                cursor: inherit;
                display: block;
            }
             input[type=number]::-webkit-outer-spin-button,
                        input[type=number]::-webkit-inner-spin-button {
                          -webkit-appearance: none;
                           margin: 0;
            }
        </style>
    </head>
    <body> 
        <?php
            if(isset($_GET["error"])){
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("Usuario o contraseña incorrectos","","error");';
                echo '},0);</script>';
            }
            if(isset($_GET["errore"])){
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("Usuario Inactivo.","","error");';
                echo '},0);</script>';
            }
        ?> 
        <div class="container">
            <div class="card">
                <h1 class="title">Ingreso Practicas</h1>
                <form action="../principalestud/validarusuario.php" method="post">
                    <div class="input-container">
                      <input type="text" id="Username" required="required" name="usuario"/>
                      <label for="Username">Usuario</label>
                      <div class="bar"></div>
                    </div>
                    <div class="input-container">
                      <input type="password" id="Password" required="required" name="password"/>
                      <label for="Password">Contraseña</label>
                      <div class="bar"></div>
                    </div>
                    <div class="button-container">
                      <button name="login"><span>Iniciar Sesión</span></button>
                    </div>
                    <div class="footer"><a href="#">Olvidaste tu contraseña?</a></div>
                    <?php
                        if(isset($_POST["Guardar"])){
                            $contrasena = $_POST["contrasena"];
                            $confirme_contrasena = $_POST["confirme_contrasena"];
                            if($contrasena == $confirme_contrasena){
                                
                                $identificacion=$_POST["identificacion"];
                                $total = mysql_num_rows(mysql_query("SELECT identificacion FROM practicante WHERE identificacion=$identificacion"));
                                if($total==0){$identificacion =$_POST["identificacion"];$nombre = $_POST["nombre"];$direccion =$_POST["direccion"];$correo = $_POST["email"];$celular = $_POST["celular"];$usuario = $_POST["usuario"];$programa = $_POST["programa"];$semestre = $_POST["semestre"];$tipo='Estudiante';$promocion= $_POST["promocion"];$dirdestino = "../../imagenes/fotos/estudiantes/"$activo=1;$nombredeimagen=strtolower($_FILES['imagen']['name']);$identificacion=$_POST['identificacion'];$nombredeiamgen2= $identificacion.".jpg";$nombredeimagenpng=$identificacion.".png";
                                    if($nombredeimagen==$nombredeiamgen2 || $nombredeimagen==$nombredeimagenpng){ $imagensubida =$dirdestino.basename($_FILES['imagen']['name']);
                                        
                                        if(is_uploaded_file($_FILES['imagen']['tmp_name']
                                        )){
                                            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $imagensubida )) {
                                                $sql= "INSERT INTO practicante (identificacion,nombre,direccion,celular,correo,idprograma,semestre,promocion,uEsuario,password,tipo,estado,foto) values ('$identificacion','$nombre','$direccion','$celular','$correo','$programa','$semestre','$promocion','$usuario','$contrasena','$tipo',$activo,'$dirdestino')";
                                                $resultado=mysql_query($sql) or die("Error en consulta <br> MySQL dice: ".mysql_error());  
                                            } 
                                        }
                                        $nombre=$_POST["nombre"];
                                        echo '<script type="text/javascript">';
                                        echo 'setTimeout(function () { swal("Bienvenido a la Familia Uniempresarial","","success");';
                                        echo '},0);</script>';
                                    }
                                    else{
                                        echo '<script type="text/javascript">';
                                        echo 'setTimeout(function () {swal("Tu foto debe tener el numero de tu identificacion","","error");';
                                        echo '},0);</script>';
                                    }
                                }
                                else{
                                    echo '<script type="text/javascript">';
                                    echo 'setTimeout(function () { swal("Ya tienes cuenta con nosotros","","error");';
                                    echo '},0);</script>';
                                }
                            }    
                            else{
                                echo '<script type="text/javascript">';
                                echo 'setTimeout(function () {swal("Las contraseñas no coinciden ","Ingreselas nuevamente","error");';
                                echo '},0);</script>';
                            }
                        }
                    ?> 
                </form>
            </div>
            <div class="card alt">
                <div class="toggle"></div>
                <h1 class="title">Registrese<div class="close"></div></h1>
                <form action="index.php" method="post" enctype="multipart/form-data">
                    <div class="input-container">
                        <input  type="text" id="Username" required="required" pattern="[0-9]{5,15}" title="Minimo 5 numeros" name="identificacion" />
                        <label for="Username" >Identificacion</label>
                        <div class="bar"></div>
                    </div>
                    <div class="input-container">
                        <input type="text" required="required" name="nombre" autocomplete="off" pattern="[A-Za-z ]+"/>
                        <label for="Password">Nombre</label>
                        <div class="bar"></div>
                    </div>
                    <div class="input-container">
                        <input type="text" required="required" name="direccion" autocomplete="off"/>
                        <label>Dirección</label>
                        <div class="bar"></div>
                    </div>
                    <div class="input-container">
                        <input type="text" required="required" pattern="[0-9]{10}" maxlength="10" title="Debes introducir unicamente numeros 10 numeros" name="celular"/>
                        <label for="Password">Celular</label>
                        <div class="bar"></div> 
                    </div>
                    <div class="input-container">
                        <input type="email" required="required"  name="email"/>
                        <label for="Password">Correo Electrónico</label>
                        <div class="bar"></div> 
                    </div>
                    <div class="input-container">
                        <input type="text" required="required"maxlength="10"minlength="4"title="Minimo de 4 caracteres  y maximo 10"name="usuario"/>
                        <label for="Repeat Password">Usuario</label>
                        <div class="bar"></div>
                    </div>
                    <div class="input-container">
                        <input id="Password" type="password" required="required"    maxlength="10" minlength="4"  name="contrasena"/>
                        <label for="Password">Contraseña</label>
                        <div class="bar"></div>
                    </div>
                      <div class="input-container">
                        <input id="RepeatPassword" type="password" required="required"   maxlength="10" minlength="4"  name="confirme_contrasena"/>
                        <label for="RepeatPassword">Comfirme Contraseña</label>
                        <div class="bar"></div>
                    </div>
                    <div class="input-container">
                        <select name="programa" required >
                            <option>Selecciona una Opción</option>
                            <?php  
                                $queryfolio="select * from programa";
                                $resfolio=mysql_query($queryfolio);
                                while($arrprograma = mysql_fetch_array($resfolio))
                                {
                            ?>
                            <option value="<?php echo $arrprograma['idprograma'] ?>">-
                                <?php echo $arrprograma['nomprograma'];
                                ?> 
                            </option>
                            <?php 
                                }
                            ?>
                        </select>
                    </div>
                    <div class="input-container">
                        <select name="semestre" required title="Selecciona un semestre">
                            <option value="">Seleccione el Semestre</option>
                            <option value="1">Primero</option>
                            <option value="2">Segundo</option>
                            <option value="3">Tercero</option>
                            <option value="4">Cuarto</option>
                            <option value="5">Quinto</option>
                            <option value="6">Sexto</option>
                            <option value="7">Septimo</option>
                            <option value="8">Octavo</option>
                            <option value="9">Noveno</option>
                            <option value="10">Decimo</option>
                        </select>
                    </div>
                    <div class="input-container">
                        <input type="number" required="required"maxlength="2" name="promocion"/>
                        <label for="Repeat Password">Promocion</label>
                        <div class="bar"></div>
                    </div>
                    <div class="input-container">
                        <div class="top-row">
                            <div class="field-wrap">
                                <br>
                                <label>Selecciona tu imagen</label>
                            </div>
                            <div class="field-wrap">
                                <br>
                                <br>
                                <input type="file" id="foto"  name="imagen" required/>
                                <label class="labelDos" for="foto">Subir foto</label>
                            </div>
                        </div>
                    </div>
                    <div class="button-container">
                        <div class="form-group">
                            <button name="Guardar" id="buttonDos" onclick="comprobarPassword()" >Empezar Proceso</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src="../../js/index.js"></script>
    </body>
</html>