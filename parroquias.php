<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_obt_parroquias.php';
include './modelo/bd_obt_municipios.php';
include './modelo/bd_lista_municipios.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('parroquias.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$f1=new dbFormHandler('parroquias',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->setConnectionResource($link,'parroquias','mysql');
$f1->addHTML(" <br />"."<div id='titulo'>PARROQUIAS</div>"."<td colspan='3'><hr size='1' /></td>\n"." </tr>\n");
$f1->textField('Parroquia','nombre',FH_NOT_EMPTY,30,255,"onkeyup=\"parroquias.nombre.value=parroquias.nombre.value.toUpperCase();\"");
$f1->SelectField('Municipio','municipio_id',bd_lista_municipios(),FH_NOT_EMPTY,true);
$f1->setHelpText('nombre','Por Favor Introduzca el Nombre de la Parroquia y asignele el municipio correspondiente');
$f1->submitButton('Modificar','continuar');
$f1->addHTML("<br />"." <td colspan='3'><hr size='1' /></td>\n"." </tr>\n");
$f1->onSaved('mensaje');

function mensaje($id,$d)
{
    $_SESSION['mensaje']="PARROQUIA PROCESADA CORRECTAMENTE";
	ir('parroquias.php');
}
$parroquias1 = bd_obt_parroquias();
foreach ($parroquias1 as $i=>$c)
{
$parroquias1[$i]['municipio_id'] = bd_obt_municipios($parroquias1[$i]['municipio_id']);
}
$smarty->assign('parroquia',$parroquias1);
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);