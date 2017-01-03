<?php
require('conexion.php');
require('fpdf/fpdf.php');
require('attach/AttachMailer.php');
class PDF extends FPDF
{
var $widths;
var $aligns;
function SetWidths($w)
{
	//Set the array of column widths
	$this->widths=$w;
}
function SetAligns($a)
{
	//Set the array of column alignments
	$this->aligns=$a;
}
function Row($data)
{
	//Calculate the height of the row
	$nb=0;
	for($i=0;$i<count($data);$i++)
		$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	$h=5*$nb;
	//Issue a page break first if needed
	$this->CheckPageBreak($h);
	//Draw the cells of the row
	for($i=0;$i<count($data);$i++)
	{
		$w=$this->widths[$i];
		$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
		//Save the current position
		$x=$this->GetX();
		$y=$this->GetY();
		//Draw the border
		$this->Rect($x,$y,$w,$h);
		$this->MultiCell($w,5,$data[$i],0,$a,'true');
		//Put the position to the right of the cell
		$this->SetXY($x+$w,$y);
	}
	//Go to the next line
	$this->Ln($h);
}
function CheckPageBreak($h)
{
	//If the height h would cause an overflow, add a new page immediately
	if($this->GetY()+$h>$this->PageBreakTrigger)
		$this->AddPage($this->CurOrientation);
}
function NbLines($w,$txt)
{
	//Computes the number of lines a MultiCell of width w will take
	$cw=&$this->CurrentFont['cw'];
	if($w==0)
		$w=$this->w-$this->rMargin-$this->x;
	$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	$s=str_replace("\r",'',$txt);
	$nb=strlen($s);
	if($nb>0 and $s[$nb-1]=="\n")
		$nb--;
	$sep=-1;
	$i=0;
	$j=0;
	$l=0;
	$nl=1;
	while($i<$nb)
	{
		$c=$s[$i];
		if($c=="\n")
		{
			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		}
		if($c==' ')
			$sep=$i;
		$l+=$cw[$c];
		if($l>$wmax)
		{
			if($sep==-1)
			{
				if($i==$j)
					$i++;
			}
			else
				$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		}
		else
			$i++;
	}
	return $nl;
}
function Header()
{
	$this->SetFont('Arial','B',12);
	$this->SetXY(20,10);
	$this->Rect(20,15,176,22); 
	$this->Image('uniempresarial.png' , 21 ,18, 15 , 15,'png', 'Julian Castillo');
	$this->SetXY(38,17);   
	$this->Cell(38,17,'Fundacion Universitaria Empresarial de la Camara de Comercio de Bogota',0,1);
	$this->Ln(30);
}
function Footer()
{
	$this->SetY(-15);
	$this->SetFont('Arial','B',6);
	$this->Cell(100,10,'Sistema Integrado de Practicas Empresariales - SIPREM',0,0,'L');
}
}
	$paciente= $_GET['id'];
	$con = new DB;
	$pacientes = $con->conectar();	
	$strConsulta = "SELECT *, DATE_FORMAT(fechanac, '%M %e de %Y') AS fecha, DATE_FORMAT(fechaing1, '%M %e de %Y') AS fechain1, DATE_FORMAT(fechasal1, '%M %e de %Y') AS fechasa1, DATE_FORMAT(fechaing2, '%M %e de %Y') AS fechain2, DATE_FORMAT(fechasal2, '%M %e de %Y') AS fechasa2 from practicante where identificacion =  '$paciente'";
	echo $strConsulta;
	$eng = array('January','February','March','April','May','June','July','August','September','October','November','December','Mon','Tue','Wed','Thu','Fri','Sat','Sun');
 	$esp = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre','Lunes','Martes','Miercoles','Jueves','Viernes','Sábado','Domingo');
	$pacientes = mysql_query($strConsulta);
	$fila = mysql_fetch_array($pacientes);
	$pdf=new PDF('P','mm','Letter');
	$pdf->Open();
	$pdf->AddPage();
	$pdf->SetMargins(20,20,20);
	$pdf->Ln(1);
	$pdf->Rect(20,42,176,7); 
	$pdf->SetY(43);
	$pdf->Cell(0,6,'DATOS PERSONALES',0,1);
    $pdf->SetFont('Arial','',11);	
	$pdf->Rect(20,49,176,48); 
	$pdf->SetXY(25,52);   
	$pdf->Cell(0,6,'Documento Identidad',0,0);
	$pdf->SetXY(95,52);  
	$pdf->Cell(0,6,$fila['identificacion'],0,0);
	$pdf->SetXY(25,58);  
	$pdf->Cell(0,6,'Nombres',0,1); 
	$pdf->SetXY(95,58);
	$pdf->Cell(0,6,$fila['nombre'],0,1);
	$pdf->SetXY(25,64);   
	$pdf->Cell(0,6,'Direccion Residencia',0,0);
	$pdf->SetXY(95,64);  
	$pdf->Cell(0,6,$fila['direccion'],0,0);
	$pdf->SetXY(25,70);  
	$pdf->Cell(0,6,'Celular',0,1); 
	$pdf->SetXY(95,70);
	$pdf->Cell(0,6,$fila['celular'],0,1);
	$pdf->SetXY(25,76);  
	$pdf->Cell(0,6,'Correo',0,1); 
	$pdf->SetXY(95,76);
	$pdf->Cell(0,6,$fila['correo'],0,1);
	$pdf->SetXY(25,82);  
	$pdf->Cell(0,6,'Lugar y Fecha de Nacimiento',0,1); 
	$pdf->SetXY(95,82);
	$pdf->Cell(0,6,$fila['lugarnac'],0,1);
	$pdf->SetXY(125,82);
	$fecha = str_replace($eng,$esp,$fila['fecha']);
	$pdf->Cell(0,6,$fecha,0,1);
	$pdf->Rect(20,90,176,58); 
	$pdf->SetY(91);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(0,6,'ESTUDIOS REALIZADOS',0,1);
	$pdf->SetFont('Arial','',11);
	$pdf->SetXY(25,98);   
	$pdf->Cell(0,6,'Educacion Media Basica',0,0);
	$pdf->SetXY(95,98);  
	$pdf->Cell(0,6,$fila['institucion'],0,0);
	$pdf->SetXY(95,104);  
	$pdf->Cell(0,6,$fila['anogrado'],0,0);
	$pdf->SetXY(95,110);  
	$pdf->Cell(0,6,$fila['tituloins'],0,0);
	$pdf->SetXY(25,120);   
	$pdf->Cell(0,6,'Educacion Superior',0,0);
	$pdf->SetXY(95,120);  
	$pdf->Cell(0,6,$fila['universidad'],0,0);
	$pdf->SetXY(95,126);  
	$pdf->Cell(0,6,$fila['anocurso'],0,0);
	$pdf->SetXY(95,132);  
	$pdf->Cell(0,6,$fila['titulouni'],0,0);
	$pdf->Rect(20,140,176,68); 
	$pdf->SetY(141);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(0,6,'COMPETENCIAS INGLES / SISTEMAS',0,1);
	$pdf->SetFont('Arial','',11);
	$pdf->SetXY(25,150); 
	$pdf->Cell(0,6,'Idioma Extranjero',0,0);  
	$pdf->SetXY(95,150);  
	$pdf->Cell(0,6,$fila['idioma'],0,0);
	$pdf->SetXY(25,156); 
	$pdf->Cell(0,6,'Nivel',0,0);  
	$pdf->SetXY(95,156);  
	$pdf->Cell(0,6,$fila['nivel'],0,0);
	$pdf->SetXY(25,162); 
	$pdf->Cell(0,6,'Institucion que Certifica',0,0);  
	$pdf->SetXY(95,162);  
	$pdf->Cell(0,6,$fila['institutoing'],0,0);
	$pdf->SetXY(95,168);  
	$pdf->Cell(0,6,'Porcentaje Habla '.$fila['porhabla'].'%',0,0);
	$pdf->SetXY(145,168);  
	$pdf->Cell(0,6,'Porcentaje escrito '.$fila['porescrito'].'%',0,0);
	$pdf->SetXY(25,174);   
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(0,6,'Habilidades en Sistemas',0,0);
	$pdf->SetFont('Arial','',11);
	$pdf->SetXY(25,180); 
	$pdf->Cell(0,6,'Institucion ',0,0); 
	$pdf->SetXY(95,180);  
	$pdf->Cell(0,6,$fila['institutosis'],0,0);
	$pdf->SetXY(25,186); 
	$pdf->Cell(0,6,'Habilidades en ',0,0); 
	$pdf->SetXY(95,186);  
	$pdf->Cell(0,6,$fila['habsistemas'],0,0);
	$pdf->SetXY(25,192); 
	$pdf->Cell(0,6,'Nivel ',0,0); 
	$pdf->SetXY(95,192);  
	$pdf->Cell(0,6,$fila['nivelsis'].'%',0,0);
	$pdf->Rect(20,200,176,66); 
	$pdf->SetY(201);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(0,6,'EXPERIENCIA LABORAL',0,1);
	$pdf->SetFont('Arial','',11);
	$pdf->SetXY(25,210); 
	$pdf->Cell(0,6,'Empresa ',0,0);  
	$pdf->SetXY(95,210);  
	$pdf->Cell(0,6,$fila['nomempresa1'],0,0);
	$pdf->SetXY(25,216); 
	$pdf->Cell(0,6,'Direccion',0,0);  
	$pdf->SetXY(95,216);  
	$pdf->Cell(0,6,$fila['direccionem1'],0,0);
	$pdf->SetXY(25,222); 
	$pdf->Cell(0,6,'Ciudad / Pais',0,0);  
	$pdf->SetXY(95,222);  
	$pdf->Cell(0,6,$fila['ciudadpais1'],0,0);
	$pdf->SetXY(25,228);  
	$pdf->Cell(0,6,'Cargo Desempeñado ',0,0);
	$pdf->SetXY(95,228);  
	$pdf->Cell(0,6,$fila['cargo1'],0,0);
	$pdf->SetXY(25,234);   
	$pdf->Cell(0,6,'Periodo',0,0);
	$fechain1 = str_replace($eng,$esp,$fila['fechain1']);
	$pdf->SetXY(95,234);  
	$pdf->Cell(0,6,'Desde ' . $fechain1,0,0);
	$fechasa1 = str_replace($eng,$esp,$fila['fechasa1']);
	$pdf->SetXY(145,234);  
	$pdf->Cell(0,6,'Hasta ' . $fechasa1,0,0);
	$pdf->SetXY(25,240); 
	$pdf->Cell(0,6,'Funciones ',0,0); 
	$pdf->SetXY(95,240); 
	$pdf->SetAligns(array('C','L','R')); 
	$pdf->MultiCell(0,6,$fila['funcionem1'],0,4,0,'L');
	$pdf->AddPage();
	$pdf->SetMargins(20,20,20);
	$pdf->Ln(1);
	$pdf->Rect(20,42,176,7); 
	$pdf->SetY(43);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(0,6,'EXPERIENCIA LABORAL',0,1);
	$pdf->SetFont('Arial','',11);
	$pdf->Rect(20,49,176,60); 
	$pdf->SetXY(25,52); 
	$pdf->Cell(0,6,'Empresa ',0,0);  
	$pdf->SetXY(95,52);  
	$pdf->Cell(0,6,$fila['nomempresa2'],0,0);
	$pdf->SetXY(25,58); 
	$pdf->Cell(0,6,'Direccion',0,0);  
	$pdf->SetXY(95,58);  
	$pdf->Cell(0,6,$fila['direccionem2'],0,0);
	$pdf->SetXY(25,64); 
	$pdf->Cell(0,6,'Ciudad / Pais',0,0);  
	$pdf->SetXY(95,64);  
	$pdf->Cell(0,6,$fila['ciudadpais2'],0,0);
	$pdf->SetXY(25,70);  
	$pdf->Cell(0,6,'Cargo Desempeñado ',0,0);
	$pdf->SetXY(95,70);  
	$pdf->Cell(0,6,$fila['cargo2'],0,0);
	$pdf->SetXY(25,76);   
	$pdf->Cell(0,6,'Periodo',0,0);
	$fechain2 = str_replace($eng,$esp,$fila['fechain2']);
	$pdf->SetXY(95,76);  
	$pdf->Cell(0,6,'Desde ' . $fechain2,0,0);
	$fechasa2 = str_replace($eng,$esp,$fila['fechasa2']);
	$pdf->SetXY(145,76);  
	$pdf->Cell(0,6,'Hasta ' . $fechasa2,0,0);
	$pdf->SetXY(25,82); 
	$pdf->Cell(0,6,'Funciones ',0,0); 
	$pdf->SetXY(95,82); 
	$pdf->SetAligns(array('C','L','R')); 
	$pdf->MultiCell(0,6,$fila['funcionem2'],0,4,0,'L');
	$pdf->Rect(20,100,176,58); 
	$pdf->SetY(101);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(0,6,'REFERENCIAS PERSONALES',0,1);
	$pdf->SetFont('Arial','',11);
	$pdf->SetXY(25,112);   
	$pdf->Cell(0,6,'refrencia',0,0);
	$pdf->SetXY(95,112);  
	$pdf->Cell(0,6,$fila['nomreco1'],0,0);
	$pdf->SetXY(95,118);  
	$pdf->Cell(0,6,$fila['empreco1'],0,0);
	$pdf->SetXY(95,122);  
	$pdf->Cell(0,6,$fila['telereco1'],0,0);
	$pdf->SetXY(25,128);   
	$pdf->Cell(0,6,'Referencia',0,0);
	$pdf->SetXY(95,134);  
	$pdf->Cell(0,6,$fila['nomreco2'],0,0);
	$pdf->SetXY(95,140);  
	$pdf->Cell(0,6,$fila['empreco2'],0,0);
	$pdf->SetXY(95,146);  
	$pdf->Cell(0,6,$fila['telereco2'],0,0);
	$pdf->Ln(10);
	$archivo='hv.pdf';
	$pdf->Output($archivo,"F");
	$correo="------";
	$nombre="--";
	header("Location: email.php?email=$correo&nombre=$nombre");
?>
