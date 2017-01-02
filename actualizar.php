<?php
ob_start();
?>
<?php
include ("../conexion.php");
?>
<?php
 if(isset($_POST["cancelar"])){
       header('Location: index.php');
    }     
?>
<?php
 if(isset($_POST["actualizar"])){
     $idasesor=$_POST["idasesor"];
     $nomasesor=$_POST["nomasesor"];
      $telasesor=$_POST["telasesor"];
      $mailasesor=$_POST["mailasesor"];
      $squery="update asesor set nomasesor='$nomasesor', telasesor='$telasesor', mailasesor='$mailasesor' where idasesor='$idasesor'";
      $status =mysql_query($squery);  
      if($status){ 
       echo "El registro fue modificado correctamente";
       header('Location: index.php');
  }
  else{
       echo "Error";
  }
    }     
?>
<script src="sweet/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.selectric/1.9.6/jquery.selectric.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="sweet/dist/sweetalert.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animsition/3.5.2/css/animsition.css" ></link>
<link rel="stylesheet" type="text/css" href="css/selectric.css" />
</script>
<script type="text/javascript">
 var f=jQuery.noConflict();
  f(function(){
  f('select').selectric({
    maxHeight:150
  });
});
</script>
<script>
  var _LTracker = _LTracker || [];
  _LTracker.push({}
      'logglyKey': 'f215dd7b-ac62-46c4-8071-e9110a89893e',
    'sendConsoleErrors' : true,
    'tag' : 'loggly-jslogger'
  });
    }
</script>
</script>
    <script src='//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js' type='text/javascript'></script>
    <script type="text/javascript">
        // Fallbacks
        window.jQuery || document.write(unescape("%3Cscript src='/scripts/jquery-1.10.2.min.js' type='text/javascript'%3E%3C/script%3E"));
        var isLive = true;
    </script>

<link href="https://web.formey.com//Content/css/themes/standard/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://web.formey.com//content/formey.min.css" />
    <style>
        .well{
            background-color:rgba(245,245,245, 0.7)!important;;
        }
    </style>
    <div class="standard ">
        <div class="body">
            <div class="cContainer body-content">
                <script src="mostrar-nav.js"></script>
                <style>
                    @media (min-width: 480px) {
                        .formWidth{ margin:auto;width:564px};
                     
                    }
                    h1{
                       color:black;
                       margin:auto;
}
                 div{
                     color:blue;
}
                 body{
                      background-image: url("imagenes/fondo-actualizar.png");
                      background-position: center center;
                       background-repeat: no-repeat;
                         background-attachment: fixed;

}
}
                div#prueba{
                    display:none;
}
                @media (min-width: 480px) {
                        .table-group{ margin:auto;width:514px;
                         height:200px;
};
                    }
                 div#item_232{
                    background-color:rgba(255, 255, 255, 0.3); ;
                    width:50%;
}
                .pruebaboton{ margin:auto;
                        width:514px;
                 };
            td{  
                color:black;
                background-color:white;
                border: 2px solid #000;
                font-family: verdana;

            }

           select {
            background-color: rgba(255, 255, 255, 0.3);
            width:200px;
            color:blue;
 }
            #identificacion{
                background-color: rgba(0, 7, 15, 0.4);
                color:white;
                font-family: Impact;

            }
            a{
                 color:red;

            }
            img{
                width:75px;
                height:75px;
            }
            button{
                  border-radius: 6em;
            }
            input[type=number]::-webkit-outer-spin-button,

              input[type=number]::-webkit-inner-spin-button {

              -webkit-appearance: none;

               margin: 0;

}
input[type=number] {

    -moz-appearance:textfield;

}
              a:link   
     {   
         text-decoration:none;   
      }  
      .menu{
        display:none;
      } 

                </style>
<body onload>


  <div id="mostrar-nav"></div>
                 <nav> 
                  <ul class="menu">
                       <li><a href="../index.php" class="animsition-link">ESTUDIANTES</a></li>
                      <li><a href="index.php" class="animsition-link">EMPRESAS</a></li>
                      <li><a href="#">PRACTICAS</a></li>
                      <li><a href="#">EMPRESAS</a></li>
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
    // e.g. linkElement: 'a:not([target="_blank"]):not([href^="#"])'
    loading: true,
    loadingParentElement: 'body', //animsition wrapper element
    loadingClass: 'animsition-loading',
    loadingInner: '', // e.g '<img src="loading.svg" />'
    timeout: false,
    timeoutCountdown: 5000,
    onLoadEvent: true,
    browser: [ 'animation-duration', '-webkit-animation-duration'],
    // "browser" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
    // The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
    overlay : false,
    overlayClass : 'animsition-overlay-slide',
    overlayParentElement : 'body',
    transition: function(url){ window.location.href = url; }
  });
});
                 </script>

<div class="animsition">
<div class="col-lg-6 bodyAlign" id="prueba">
    <div class="well bs-component formWidth">

 <?php
$C=mysql_query("SELECT * FROM  asesor  WHERE idasesor=".$_GET["idasesor"]);
if ($R=mysql_fetch_array($C))
{
?> 

<form action="actualizar.php" class="form-horizontal" enctype="multipart/form-data" id="formId" method="post" role="form">            <fieldset>
           <!-- <input name="__RequestVerificationToken" type="hidden" value="fAkOhSBcaNNnwYQcfnYLOWD44svScTlJ4dczg84FhmU9S1tUfKuZjKpXdL4Kg53qudp0TGMY9xmUpn3lr3C0NV1HlmDweQ-LP-7mitfoHOg1" />-->
<input data-val="true" data-val-required="The FormListId field is required." id="FormListId" name="FormListId" type="hidden" value="d16ec163-d94e-4785-8776-5e843db6de51" /><div class="validation-summary-valid" data-valmsg-summary="true"><ul><li style="display:none"></li>
</ul></div><span class="field-validation-valid" data-valmsg-for="CustomError" data-valmsg-replace="true"></span> 
   
    <img src="<?php echo $R['foto']?>" class="img-circle" alt="No imagen" style="width:100px;height:100px">
    <div class="form-group" id="item_286">
        <label id="label_286" class="col-md-4 control-label" for="input_textbox_286">
            Identificacion  
        </label>
       
        <div class="col-md-8">
           
            <input type="number" 
                   pattern="[0-9]+"
                   value="<?php echo $R['idasesor'];?>"
                   aria-labelledby="label_286"
                   class="form-control" name="idasesor" id="input_textbox_286" maxlength="64" readonly/>
            <input type="hidden" value="Identificacion" name="label_286_textbox" />
        </div>
    </div>

     <div class="form-group " id="item_287">
        <label id="label_287" class="col-md-4 control-label" for="input_textbox_287">
            Nombre de Asesor
        </label>
       
        <div class="col-md-8">
           
            <input type="text" 
                   value="<?php echo $R['nomasesor'];?>"
                   required
                   aria-labelledby="label_287"
                   class="form-control" name="nomasesor" id="input_textbox_287" maxlength="64" value="" />
            <input type="hidden" value="Nombre" name="label_287_textbox" />
        </div>
    </div>
     <div class="form-group " id="item_287">
        <label id="label_287" class="col-md-4 control-label" for="input_textbox_287">
            Telefono de  Asesor
        </label>
       
        <div class="col-md-8">
           
            <input type="text" 
                   value="<?php echo $R['telasesor'];?>"
                   required
                   aria-labelledby="label_287"
                   class="form-control" name="telasesor" id="input_textbox_287" maxlength="64" value="" />
            <input type="hidden" value="Nombre" name="label_287_textbox" />
        </div>
    </div>
     <div class="form-group " id="item_287">
        <label id="label_287" class="col-md-4 control-label" for="input_textbox_287">
            Correo de Asesor
        </label>
       
        <div class="col-md-8">
           
            <input type="text" 
                   value="<?php echo $R['mailasesor'];?>"
                   required
                   aria-labelledby="label_287"
                   class="form-control" name="mailasesor" id="input_textbox_287" maxlength="64" value="" />
            <input type="hidden" value="Nombre" name="label_287_textbox" />
        </div>
    </div>
      <div class="form-group" id="item_289">
        <div class="col-md-8 col-md-offset-4">
            <button type="submit" value="Submit" class="btn btn-primary" name="actualizar" aria-label="Guardar">Actualizar</button>
             <button type="submit" value="Submit" class="btn btn-primary" name="cancelar" aria-label="Guardar" class="animsition-link" >Cancelar</button>
        </div>
 <?php  
}
?>
</div>
<?php
ob_end_flush();
?>

