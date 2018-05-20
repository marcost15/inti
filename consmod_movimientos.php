<?php
session_start();
include './configs/smarty.php';
include './configs/bd.php';
include './configs/fh3.php';
include './configs/funciones.php';
include './modelo/bd_verificar_privilegios.php';
include './modelo/bd_buscar_movimientos.php';
include './modelo/bd_obt_personal.php';
include './modelo/bd_obt_funcionarios.php';
include './modelo/bd_obt_dependencias.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('consmod_movimientos.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$error1 = '0';

$f1  = new formHandler('busqueda_personal',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->addHTML(" <br />"."<div id='titulo'>BUSQUEDA DE MOVIMIENTOS</div>"."<td colspan='3'><hr size='1' /></td>\n"." </tr>\n");
$f1 -> textField('Texto a buscar','texto');
$f1 -> submitButton('Continuar');
$f1->addHTML("<br />"." <td colspan='3'><hr size='1' /></td>\n"." </tr>\n");
$f1 ->onCorrect('procesar');


function procesar($d)
{
	global $smarty;
	$texto=$d['texto'];
	$datos15 = bd_buscar_movimientos(2,$texto);
	foreach ($datos15 as $i=>$c)
	{
		$datos15[$i]['dependencia_id'] = bd_obt_dependencias($datos15[$i]['dependencia_id']);
		$ti = $datos15[$i]['tipo'];
		if ("$ti" == 'ENTRADA')
		{
			$datos15[$i]['func_entrega_id'] = bd_obt_funcionarios($datos15[$i]['func_entrega_id']);
			$datos15[$i]['func_recibe_id'] = bd_obt_personal($datos15[$i]['func_recibe_id']);
		}
		else
		{
			$datos15[$i]['func_recibe_id'] = bd_obt_funcionarios($datos15[$i]['func_recibe_id']);
			$datos15[$i]['func_entrega_id'] = bd_obt_personal($datos15[$i]['func_entrega_id']);
		}
	}
	if (isset($datos15))
	{
		$error1 = '2';
	}
	$smarty->assign('error1',$error1);
	$smarty->assign('datos',$datos15);
	return false;
}

$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['datos']);