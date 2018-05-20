<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_obt_status.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('status.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}
$f1=new dbFormHandler('accesos',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->setConnectionResource($link,'status_solicitudes','mysql');
$f1->addHTML(" <br />"."<div id='titulo'>STATUS DE SOLICITANTES</div>"."<td colspan='3'><hr size='1' /></td>\n"." </tr>\n");
$f1->textField('Nombre','nombre',FH_NOT_EMPTY,30,255,"onkeyup=\"accesos.nombre.value=accesos.nombre.value.toUpperCase();\"");
$f1->setHelpText('nombre','Por Favor Introduzca el nombre del Status del expediente');
$f1->submitButton('Continuar','continuar');
$f1->addHTML("<br />"." <td colspan='3'><hr size='1' /></td>\n"." </tr>\n");
$f1->onSaved("mensaje");

function mensaje()
{
	$_SESSION['mensaje']="EL STATUS SE REGISTRO CORRECTAMENTE";
	ir("status.php");
}
$smarty->assign('status',bd_obt_status());
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);