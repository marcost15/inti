<?php
session_start();
include './configs/smarty.php';
include './configs/bd.php';
include './configs/fh3.php';
include './configs/funciones.php';
include './modelo/bd_obt_funcionarios.php';
include './modelo/bd_obt_dependencias.php';
include './modelo/bd_obt_personal.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('rp_cons_movixdependencia.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}
$id = $_REQUEST['id'];
$tipo = $_REQUEST['tipo']; 

$movimientos = sql2array("SELECT id,expediente_id,fecha,tipo,func_entrega_id,func_recibe_id,dependencia_id,observacion
							FROM movimientos WHERE dependencia_id = '$id' AND tipo = '$tipo'");
$dependencia_nombre = bd_obt_dependencias($id);

foreach ($movimientos as $i=>$c)
{
	$tipo = $movimientos[$i]['tipo'];
	$id_exp = $movimientos[$i]['expediente_id'];
	$movimientos[$i]['expediente_id'] = sql2value("SELECT num_exp FROM expedientes WHERE id = '$id_exp'");
	if ("$tipo" == 'ENTRADA')
	{
		$movimientos[$i]['func_entrega_id'] = bd_obt_funcionarios($movimientos[$i]['func_entrega_id']);
		$movimientos[$i]['func_recibe_id'] = bd_obt_personal($movimientos[$i]['func_recibe_id']);
	}
	else
	{
		$movimientos[$i]['func_entrega_id'] = bd_obt_personal($movimientos[$i]['func_entrega_id']);
		$movimientos[$i]['func_recibe_id'] = bd_obt_funcionarios($movimientos[$i]['func_recibe_id']);
	}
	$movimientos[$i]['dependencia_id'] = bd_obt_dependencias($movimientos[$i]['dependencia_id']);
}
 
$smarty->assign('datos',$movimientos);
$smarty->assign('dependencia_nombre',$dependencia_nombre);
$smarty->disp();
$_SESSION['data31']=array(
	'datos'      => $movimientos,
	'dependencia_nombre'  => $dependencia_nombre
);