<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_lista_niveles.php';
include './modelo/bd_guardar_concejo_comunal.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('registrar_concejo_comunal.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$foto = array(
  "path"        => './upload/personal',
  "type" 	=> "JPG jpg JPEG jpeg GIF gif PNG png BMP bmp",
  "required"    => false,
  "exists"      => "overwrite"
);

$f1=new FormHandler('personal',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->addHTML(" <br />"."<div id='titulo'>REGISTRAR CONSEJO COMUNAL</div>"."<td colspan='3'><hr size='1' /></td>\n"." </tr>\n");
$f1->textField('Rif','rif',FH_STRING,18,15,"onkeyup=\"personal.rif.value=personal.rif.value.toUpperCase();\"");
$f1->textField('Nombre','nombre',FH_STRING,30,255,"onkeyup=\"personal.nombre.value=personal.nombre.value.toUpperCase();\"");
$f1->textField('Teléfono Fijo','tlf_fijo',_FH_DIGIT,15,11,"onkeyup=\"return ValNumero(this);\"");
$f1->textField('Teléfono Movil','tlf_movil',_FH_DIGIT,15,11,"onkeyup=\"return ValNumero(this);\"");
$f1->setMask(
   " <tr>\n".
   "   <td> </td>\n".
   "   <td> </td>\n".
   "   <td>%field% %field%</td>\n".
   " </tr>\n"
);
$f1->submitButton('Registrar','registrar');
$f1->resetButton();
$f1->addHTML("<br />"." <td colspan='3'><hr size='1' /></td>\n"." </tr>\n");
$f1->onCorrect("procesar");

function procesar($d)
{
	$rif=$d['rif'];
	$n=sql2value("SELECT COUNT(*) FROM concejo_comunal WHERE rif LIKE '$rif'");
	if ($n==0)
	{
			bd_guardar_concejo_comunal($d);
			$_SESSION['mensaje']="CONCEJO COMUNAL REGISTRADO CORRECTAMENTE";	
	}
	else
	{
		$_SESSION['mensaje']="EL RIF YA EXISTE, POR FAVOR INTRODUZCA UNA NUEVA";
		return false;
	}
	ir('registrar_concejo_comunal.php');
}
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);