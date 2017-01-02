
<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="sweet/dist/sweetalert.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<?php
    include ("../conexion.php");
    if(isset($_POST["Guardar"])){
        $idasesor=$_POST["idasesor"];
        $nomasesor=$_POST["nomasesor"];
        $telasesor=$_POST["telasesor"];
        $mailasesor=$_POST["mailasesor"];
        $contrasena=$_POST["password"];
        $dirdestino = '../../imagenes/fotos/asesores/';
        $imagensubida = $dirdestino . basename($_FILES['imagen']['name']);
            if(is_uploaded_file($_FILES['imagen']['tmp_name'])){
               if (move_uploaded_file($_FILES['imagen']['tmp_name'], $imagensubida)) {
                    $sql= "INSERT INTO asesor (idasesor,nomasesor,telasesor,mailasesor,password,foto) values ('$idasesor','$nomasesor','$telasesor','$mailasesor','$contrasena','$imagensubida')";
                    mysql_query($sql);
                    echo'<script>';
                    echo 'setTimeout(function () { swal("Los datos han sido guardados!","","success");';
                    echo '},0);</script>';
               }
            }
    }
?>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Chewy' rel='stylesheet' type='text/css'>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <?php
        include("../librerias/librerias.php");
    ?>
    <script src="../../js/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../principalestud/examples/archivos/src/jquery-filestyle.css">
    <script src="../principalestud/examples/archivos/src/jquery-filestyle.js"></script>
    <script type="text/javascript">
        var f=jQuery.noConflict();
        f(function(){
            f('select').selectric({ maxHeight:150});
          });    
    </script>      
    <script type="text/javascript">
        function mostrar(){
            document.getElementById('item_286').style.display ='block';
            document.getElementById('item_287').style.display ='block';
            document.getElementById('item_288').style.display ='block';
            document.getElementById('item_289').style.display ='block';
            document.getElementById('item_290').style.display ='block';
            document.getElementById('item_291').style.display ='block';
            document.getElementById('item_303').style.display ='block';
            document.getElementById('prueba').style.display ='block';
            document.getElementById('no-more-tables').style.display ='none';
            for (i = 0; i <= 10; i++){
                setTimeout("document.getElementById('item_286').style.opacity = '" + (i / 10) + "'", i * 100);
                setTimeout("document.getElementById('item_287').style.opacity = '" + (i / 10) + "'", i * 100);
                setTimeout("document.getElementById('item_288').style.opacity = '" + (i / 10) + "'", i * 100);
                setTimeout("document.getElementById('item_290').style.opacity = '" + (i / 10) + "'", i * 100);
                setTimeout("document.getElementById('item_291').style.opacity = '" + (i / 10) + "'", i * 100);
                setTimeout("document.getElementById('item_289').style.opacity = '" + (i / 10) + "'", i * 100);
                setTimeout("document.getElementById('item_303').style.opacity = '" + (i / 10) + "'", i * 100);
            }
        }
         function mostrar1(){        
              document.getElementById('no-more-tables').style.display ='block';
              document.getElementById('prueba').style.display ='none';
              for (i = 0; i <= 10; i++){    
                  setTimeout("document.getElementById('no-more-tables').style.opacity = '" + (i / 10) + "'", i * 100);
              }
          }      
    </script>        
    <script type="text/javascript" src="//cloudfront.loggly.com/js/loggly.tracker-2.1.min.js"></script>
    <script>
        var _LTracker = _LTracker || [];
          _LTracker.push({
              'logglyKey': 'f215dd7b-ac62-46c4-8071-e9110a89893e',
              'sendConsoleErrors' : true,
              'tag' : 'loggly-jslogger'
          }); 
    </script> 
    <script src='//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js' type='text/javascript'></script>
    <script type="text/javascript">
        window.jQuery || document.write(unescape("%3Cscript src='/scripts/jquery-1.10.2.min.js' type='text/javascript'%3E%3C/script%3E"));
        var isLive = true;
    </script>
    <script type="text/javascript">
        function searchToggle(obj, evt){
            var container = $(obj).closest('.search-wrapper');
            if(!container.hasClass('active')){
                container.addClass('active');
                evt.preventDefault();
            }
            else if(container.hasClass('active') && $(obj).closest('.input-holder').length == 0){
                container.removeClass('active');
                container.find('.search-input').val('');
                container.find('.result-container').fadeOut(100, function(){$(this).empty();});
            }
        }
        function submitFn(obj, evt){
            value = $(obj).find('.search-input').val().trim();
            _html = "";
            if(!value.length){
                _html = "";
            }
            else{
                _html += "<b>" + value + "</b>";
            }
            $(obj).find('.result-container').html('<span>' + _html + '</span>');
            $(obj).find('.result-container').fadeIn(100);
            evt.preventDefault();
        }
    </script>
    <link href="https://web.formey.com//Content/css/themes/standard/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://web.formey.com//content/formey.min.css" />
    <style>
        .well{
            background-color:rgba(245,245,245, 0.7)!important;;
        }
    </style>
    <body onload="mostrar1()">
    <?php
        if(isset($_GET["error"])){
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("No puedes eliminar un asesor que esta vinculado con una empresa","","error");';
            echo '},0);</script>';
        }
    ?>
    <div class="standard ">
        <div class="body">
            <div class="cContainer body-content">
                <div class="pruebaboton "id="boton">
                    <button onClick="mostrar()";><img src="../../imagenes/imagenes/user.png"/></button>
                    <button onClick="mostrar1();"><img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQOwpGEfjFMu8h9bEYm0LdCWGnkmMQKIMfqBeNgEF_4h7Uh4NPa"/></button>
                </div>
                <div id="mostrar-nav"></div>
                <nav> 
                    <ul class="menu">
                        <li><a  href="../estudiantes/index.php" class="animsition-link" id="link">Estudiantes</a></li>
                        <li><a href="../practicas/index.php" class="animsition-link" id="link">Practicas</a></li>
                        <li><a href="../practicas/index.php" class="animsition-link" id="link">Informes</a></li>
                        <li><a href="../empresas/index.php" id="link" class="animsition-link">Empresas</a></li>
                        <div id="extras">Extras
                            <li><a id="link"  href="../figura/index.php"class="animsition-link">Naturaleza</a></li>
                            <li><a id="link"  href="index.php"class="animsition-link">Asesores Uniempresarial</a></li>
                            <li><a id="link"  href="../actividad/index.php"class="animsition-link">Actividad Empresas</a></li>
                        </div> 
                       <li><a href="logout.php" class="animsition-link" id="link">Cerrar Sesi&oacute;n</a></li>
                        <li><a href="../login/index.php" class="animsition-link" id="link">Menu Principal</a></li>                    
                    </ul>
                </nav>
                <script src="mostrar-nav.js"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
                <script src="animsition-master/dist/js/animsition.min.js" charset="utf-8"></script>
                <script>
                    var j=jQuery.noConflict();
                    j(document).ready(function() {
                        j(".animsition").animsition({
                            inClass: 'fade-in-down',
                            outClass: 'fade-out-up',
                            inDuration: 1500,
                            outDuration: 900,
                            linkElement: '.animsition-link',
                            loading: true,
                            loadingParentElement: 'body', //animsition wrapper element
                            loadingClass: 'animsition-loading',
                            loadingInner: '', // e.g '<img src="loading.svg" />'
                            timeout: false,
                            timeoutCountdown: 5000,
                            onLoadEvent: true,
                            browser: [ 'animation-duration', '-webkit-animation-duration'],
                            overlay : false,
                            overlayClass : 'animsition-overlay-slide',
                            overlayParentElement : 'body',
                            transition: function(url){ window.location.href = url; 
                            }
                        });
                    });
                </script>    
                <form  method="post" >
                    <div class="search-wrapper">
                          <div class="input-holder">
                              <input type="text" class="search-input" placeholder=" Busca por Nombre de Asesor o Identificaci&oacute;n" name="buscar"/>
                              <button  type="submit" class="search-icon" onclick="searchToggle(this, event);" name="busqueda"><span></span></button>
                          </div>
                          <span class="close" onclick="searchToggle(this, event);"></span>
                          <div class="result-container"></div>
                    </div>    
                </form>
                <link rel="stylesheet" type="text/css" href="../../css/cssAsesores.css">
                <div class="animsition">
                    <div class="col-lg-6 bodyAlign" id="prueba">
                        <div class="well bs-component formWidth">
                            <form action="index.php" class="form-horizontal" enctype="multipart/form-data" id="formId" method="post" role="form">            
                                <fieldset>
                                    <input data-val="true" data-val-required="The FormListId field is required." id="FormListId" name="FormListId" type="hidden" value="d16ec163-d94e-4785-8776-5e843db6de51" />
                                    <div class="validation-summary-valid" data-valmsg-summary="true">
                                        <ul><li style="display:none"></li></ul>
                                    </div>
                                    <span class="field-validation-valid" data-valmsg-for="CustomError" data-valmsg-replace="true"></span> 
                                    <div class="form-group" id="item_286">
                                       <label id="label_286" class="col-md-4 control-label" for="input_textbox_286"> Identificacion</label> 
                                       <div class="col-md-8">
                                           <input type="number" value="" required aria-labelledby="label_286" class="form-control" name="idasesor" id="input_textbox_286" maxlength="64" />
                                           <input type="hidden" value="Identificacion" name="label_286_textbox" />       
                                       </div>
                                    </div>
                                    <div class="form-group " id="item_287">
                                            <label id="label_287" class="col-md-4 control-label" for="input_textbox_287">Nombre de Asesor</label> 
                                        <div class="col-md-8">
                                            <input type="text" required aria-labelledby="label_287" class="form-control" name="nomasesor" id="input_textbox_287" maxlength="64" value=""/>
                                            <input type="hidden" value="Nombre" name="label_287_textbox" />
                                        </div>  
                                    </div>
                                    <div class="form-group " id="item_288">
                                        <label id="label_287" class="col-md-4 control-label" for="input_textbox_287">Telefono</label> 
                                            <div class="col-md-8">
                                                <input type="text" required pattern="[0-9]{10}"  title="Debes introducir unicamente numeros 10 numeros"  aria-labelledby="label_287" class="form-control" name="telasesor" id="input_textbox_287" maxlength="64" value=""/>
                                                <input type="hidden" value="Nombre" name="label_287_textbox" />
                                            </div>
                                    </div>
                                    <div class="form-group " id="item_289">
                                        <label id="label_287" class="col-md-4 control-label" for="input_textbox_287">Correo Electronico</label>
                                        <div class="col-md-8">          
                                            <input type="email" required aria-labelledby="label_287" class="form-control" name="mailasesor" id="input_textbox_287" maxlength="64" value=""/>
                                            <input type="hidden" value="Nombre" name="label_287_textbox" />
                                        </div>
                                    </div>
                                    <div class="form-group " id="item_290">
                                        <label id="label_287" class="col-md-4 control-label" for="input_textbox_287">Contrase&ntilde;a</label> 
                                        <div class="col-md-8">          
                                            <input type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Debe contener al menos un numero,una mayuscula,una letra minuscula, y al menos 8 o mas caracteres" aria-labelledby="label_287"class="form-control" name="password" id="input_textbox_287" maxlength="64" value=""/>    
                                            <input type="hidden" value="Nombre" name="label_287_textbox" />
                                        </div>
                                    </div>
                                    <div class="form-group " id="item_303">
                                        <label id="label_287" class="col-md-4 control-label" for="input_textbox_287">Fotografia</label>
                                        <div class="col-md-8">          
                                            <input type="file" class="jfilestyle" data-buttonText="<span class='glyphicon glyphicon-folder-open'></span>" name="imagen" required>
                                        </div>
                                    </div>
                                    <div class="form-group" id="item_291">
                                        <div class="col-md-8 col-md-offset-4">
                                            <button type="submit" value="Submit" class="btn btn-primary" name="Guardar" aria-label="Guardar">Guardar</button>
                                        </div>
                                    </div>  
                                    <input id="Id" name="Id" type="hidden" value="d16ec163-d94e-4785-8776-5e843db6de51" />
                                    <input id="logid" name="logid" type="hidden" value="258b33da-ea86-4372-85fb-23a4f49c4ccd" />
                                    <input id="FormName" name="FormName" type="hidden" value="My Form" />
                                    <input id="FormId" name="FormId" type="hidden" value="d16ec163-d94e-4785-8776-5e843db6de51" />
                                    <input id="SavedSubmissionId" name="SavedSubmissionId" type="hidden" />
                                    <input id="Country" name="Country" type="hidden" />
                                    <input id="City" name="City" type="hidden" />
                                    <input id="IPAddress" name="IPAddress" type="hidden" />
                                </fieldset>
                            </form>    
                        </div>
                      </div> 
                      <?php
                        $cantidad_resultados_por_pagina = 10; $cualpagina=1;
                        if (isset($_GET["pagina"])) {
                            $cualpagina=$_GET["pagina"];
                            if (is_string($_GET["pagina"])) {
                                if (is_numeric($_GET["pagina"])) {
                                   if ($_GET["pagina"] == 1) {
                                     $pagina = 1;
                                    } 
                                    else { //Si la petición desde la paginación no es para ir a la pagina 1, va a la que sea
                                        $pagina = $_GET["pagina"];
                                    };
                                } 
                                else { //Si la string no es numérica, redirige al index (por ejemplo: index.php?pagina=AAA)
                                    header("Location: index.php");
                                    die();
                                };
                            };
                        }
                        else { //Si el GET de HTTP no está seteado, lleva a la primera página (puede ser cambiado al index.php o lo que sea)
                            $pagina = 1;
                        };
                        $empezar_desde = ($pagina-1) * $cantidad_resultados_por_pagina;
                      ?>
                      <div  id="no-more-tables">
                        <table class="col-md-12 table-bordered table-striped table-condensed cf">
                            <thead class="cf">   
                                <tr bgcolor="#CECEC2">
                                    <th>Identificacion</th>
                                    <th>Nombre de Asesor</th>
                                    <th>Telefono</th>
                                    <th>Correo Electronico</th>
                                    <th>Fotografia</th>
                                    <th>Eliminar</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>   
                            <?php
                                if(isset($_POST['busqueda'])){
                                    $buscar=$_POST["buscar"];
                                    $obtener_todo_BD ="SELECT * FROM  asesor where nomasesor like '%$buscar%' or idasesor like '%$buscar%'";
                                    $consulta_todo = mysql_query($obtener_todo_BD);
                                    $total_registros = mysql_num_rows($consulta_todo);
                                    $total_paginas = ceil($total_registros / $cantidad_resultados_por_pagina); 
                                    $buscarbase=" SELECT * FROM asesor WHERE nomasesor like '%$buscar%' or idasesor like '%$buscar%'LIMIT $empezar_desde, $cantidad_resultados_por_pagina";
                                    $sql2 = mysql_query($buscarbase);
                                }
                                else{              
                                    if(!isset($_GET['resultado'])){
                                        $_GET['resultado']="";
                                        $resultado="";
                                    } 
                                    else{
                                        $resultado=$_GET['resultado'];
                                    }
                                    $obtener_todo_BD = "select * from asesor where nomasesor like '%$resultado%' or idasesor like '%$resultado%'";
                                    $consulta_todo = mysql_query($obtener_todo_BD);
                                    //Cuenta el número total de registros
                                    $total_registros = mysql_num_rows($consulta_todo);
                                    //Obtiene el total de páginas existentes
                                    $total_paginas = ceil($total_registros / $cantidad_resultados_por_pagina);
                                    $buscarbase="select * from asesor  where nomasesor like '%$resultado%' or idasesor like '%$resultado%' LIMIT $empezar_desde, $cantidad_resultados_por_pagina";
                                    $sql2 = mysql_query($buscarbase);         
                                }
                                while($rs=mysql_fetch_array($sql2))
                                {    
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td data-title="Identificacion"> <?php echo $rs['idasesor']; ?></td>
                                            <td data-title="Nombre"><?php echo $rs['nomasesor']; ?></td>
                                            <td data-title="Telefono"><?php echo $rs['telasesor']; ?></td>
                                            <td data-title="Correo"><?php echo $rs['mailasesor']; ?></td>
                                            <td data title="Foto" ><img src="../../imagenes<?php echo $rs['foto'] ?>"class="img-circle" alt="archivo " style="width:55px;height:55spx"></td>
                                            <td data-title="Eliminar"><a href="eliminar.php?idasesor=<?php echo $rs['idasesor']; ?>" class="confirmation"><img src="../../imagenes/imagenes/logoeliminar.png" id="miimagen"/></a></td>
                                            <td data-title="Editar"><a href="actualizar.php?idasesor=<?php echo $rs['idasesor']; ?>"><img src=" ../../imagenes/imagenes/actualizar.png" id="miimagen"/></a></td>
                                        </tr>
                                    </tbody>
                                <?php
                                }        
                                ?>
                                <tfoot>
                                    <?php
                                        //Crea un bucle donde $i es igual 1, y hasta que $i sea menor o igual a X, a sumar (1, 2, 3, etc.)
                                        //Nota: X = $total_paginas
                                        echo "<h1> Asesores $cualpagina </h1>";
                                        for ($i=1; $i<=$total_paginas; $i++) {
                                            //En el bucle, muestra la paginación
                                            if(!isset($_POST['buscar'])){
                                                $buscar=$_GET['resultado'];
                                            }
                                            else{
                                                $buscar=$_POST['buscar'];
                                            }
                                            //En el bucle, muestra la paginación
                                            echo "<a href='?pagina=".$i."&resultado=".$buscar."'>".$i."</a> | ";
                                        };
                                    ?>
                                </tfoot>
                        </table>
                      </div>  
                      <script>
                        $('.confirmation').click(function (e) {
                            var href = $(this).attr('href');
                            swal({
                                title: "Estas seguro?",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "Si, borrar!",
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
                      </script>
                      <script src='//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js' type='text/javascript'></script>
                      <script src='//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js' type='text/javascript'></script>
                      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/remodal/1.0.3/remodal.min.css">
                      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/remodal/1.0.3/remodal-default-theme.min.css">
                      <script src="//cdnjs.cloudflare.com/ajax/libs/remodal/1.0.3/remodal.min.js"></script>
                      <script src="https://web.formey.com//Scripts/formey.js" type="text/javascript"></script>
                      <script type="text/javascript">
                          var instance = "";
                          $(document).ready(function () {
                              instance = $('form').parsley();
                              $('form').garlic(); //REINSTATE THIS ON PROD
                          });
                      </script>
                      <script src='//cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js' type='text/javascript'></script>
                      <script type="text/javascript">
                          // Fallbacks
                          window.Modernizr || document.write(unescape("%3Cscript src='/scripts/modernizr-2.6.2.js' type='text/javascript'%3E%3C/script%3E"));
                      </script>
                      <script src='//cdnjs.cloudflare.com/ajax/libs/respond.js/1.2.0/respond.min.js' type='text/javascript'></script>
                      <script src='//cdnjs.cloudflare.com/ajax/libs/parsley.js/2.1.2/parsley.min.js' type='text/javascript'></script>
                      <script src='//cdnjs.cloudflare.com/ajax/libs/garlic.js/1.2.2/garlic.min.js' type='text/javascript'></script>
                      <script src='//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.1/js/jasny-bootstrap.min.js' type='text/javascript'></script>
                      <script src='//cdnjs.cloudflare.com/ajax/libs/iframe-resizer/3.2.0/iframeResizer.contentWindow.min.js' type='text/javascript'></script>
                </div>
            </div>
        </div>
    </div>
</html>