<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_guardar_funcionarios.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('registrar_funcionarios.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}
$f1=new FormHandler('funcionarios',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->addHTML(" <br />"."<div id='titulo'>REGISTRAR FUNCIONARIOS</div>"."<td colspan='3'><hr size='1' /></td>\n"." </tr>\n");
$f1->textField('Cedula','id',FH_DIGIT,12,11, "onkeyup=\"return ValNumero(this);\"");
$f1->textField('Nombre','nombre',FH_STRING,30,255,"onkeyup=\"funcionarios.nombre.value=funcionarios.nombre.value.toUpperCase();\"");
$f1->textField('Cargo','cargo',FH_STRING,30,255,"onkeyup=\"funcionarios.cargo.value=funcionarios.cargo.value.toUpperCase();\"");
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
	$nombre=$d['id'];
	$n=sql2value("SELECT COUNT(*) FROM funcionarios WHERE id LIKE '$nombre'");
	if ($n==0)
	{
			bd_guardar_funcionarios($d);
			$_SESSION['mensaje']="FUNCIONARIO REGISTRADO CORRECTAMENTE";	
	}
	else
	{
		$_SESSION['mensaje']="LA CEDULA YA EXISTE, POR FAVOR INTRODUZCA UNO NUEVO";
		return false;
	}
	ir('registrar_funcionarios.php');
}
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);