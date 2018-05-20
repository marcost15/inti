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
if (bd_verificar_privilegios('rp_cons_movixfecha.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}
$fecha_ini = $_REQUEST['fecha_ini']; 
$fecha_fin = $_REQUEST['fecha_fin']; 
$fecha_ini = f2f($_REQUEST['fecha_ini']);
$fecha_fin = f2f($_REQUEST['fecha_fin']); 
$movimientos = sql2array("SELECT id,expediente_id,fecha,tipo,func_entrega_id,func_recibe_id,dependencia_id,observacion
							FROM movimientos WHERE fecha BETWEEN '$fecha_ini' AND '$fecha_fin'");

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
$smarty->assign('fecha_ini',$fecha_ini);
$smarty->assign('fecha_fin',$fecha_fin);
$smarty->disp();
$_SESSION['data30']=array(
	'datos'      => $movimientos,
	'fecha_ini'  => $fecha_ini,
	'fecha_fin'  => $fecha_fin
);