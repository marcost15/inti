<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_obt_municipios.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('municipios.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}
$f1=new dbFormHandler('municipios',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->setConnectionResource($link,'municipios','mysql');
$f1->addHTML(" <br />"."<div id='titulo'>MUNICIPIOS</div>"."<td colspan='3'><hr size='1' /></td>\n"." </tr>\n");
$f1->textField('Municipio','nombre',FH_NOT_EMPTY,40,255,"onkeyup=\"municipios.nombre.value=municipios.nombre.value.toUpperCase();\"");
$f1->setHelpText('nombre','Por Favor Introduzca el Nombre del Municipio junto con su Capital');
$f1->submitButton('Continuar','continuar');
$f1->addHTML("<br />"." <td colspan='3'><hr size='1' /></td>\n"." </tr>\n");
$f1->onSaved('mensaje');

function mensaje($id,$d)
{
	$_SESSION['mensaje']="MUNICIPIO PROCESADO CORRECTAMENTE";
	ir('municipios.php');
}
$smarty->assign('municipios',bd_obt_municipios());
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);