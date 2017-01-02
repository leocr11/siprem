<?php
	session_start(); 
?>
<?php
	include ("../conexion.php");
	if(isset($_POST['login'])){
		$usuario = $_POST['usuario'];
		$pw =$_POST['password'];
				$log = mysql_query("SELECT * FROM practicante WHERE (identificacion='$usuario' or usuario='$usuario' or correo='$usuario') AND password='$pw'");
				if (mysql_num_rows($log)>0){
					$row = mysql_fetch_array($log);
					if($row['estado']==1){
						$error='$$';
						header("Location: ../login/index.php?errore=$error");
					}
					else{
					$usuario=$row['tipo'];
					if($usuario=='Estudiante'){
					 $_SESSION["user"] = $row['identificacion'];
					echo '<script> window.location="index.php"; </script>';
				 	}else{
				 		$_SESSION["user"] = $row['identificacion'];
				 		echo '<script> window.location="../principaldocen/index.php"; </script>';
				 		}
				 	}
				}
				else{
					$usuario =$_POST['usuario'];
					$pw =$_POST['password'];
					$login =mysql_query("SELECT * FROM asesor WHERE idasesor='$usuario' and password='$pw'");
					if (mysql_num_rows($login)>0){
					$row = mysql_fetch_array($login);
					$_SESSION["asesor"]=$row['idasesor'];
					echo '<script> window.location="../principaldocen/index.php"; </script>';
					}
					else{
				  	$error='$$';
				  	header("Location: ../login/index.php?error=$error");
				  	}
				}
			}
		?>	