<?php
ob_start();
?>
<html>
<script src="sweet/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="sweet/dist/sweetalert.css">
<script type="text/javascript">
 function mensaje(){
    swal("Here's a message!");

}
</script>

<body onload="mensaje()">
  <?php
include ("../conexion.php");
?>

<?php
  $idasesor=$_GET['idasesor'];
  $total=mysql_num_rows(mysql_query("SELECT * FROM empresa,asesor WHERE asesor.idasesor=empresa.idasesor and empresa.idasesor=$idasesor"));
  if($total==0){
  $query="DELETE FROM asesor where idasesor='$idasesor'";
  mysql_query($query);
  echo "El registro fue eliminado correctamente";
   header("Location: index.php");
  }
  else{
    $error="$$$$";
    header("Location: index.php?error=$error");
  }
?>
</body>
<?php
ob_end_flush();
?>

