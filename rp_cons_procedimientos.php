<?php
session_start();
include './configs/smarty.php';
include './configs/bd.php';
include './configs/fh3.php';
include './configs/funciones.php';
include './modelo/bd_obt_programas.php';
include './modelo/bd_obt_procedimientos.php';
include './modelo/bd_obt_asentamientos.php';
include './modelo/bd_obt_parroquias.php';
include './modelo/bd_obt_concejo_comunal.php';
include './modelo/bd_obt_status.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('rp_cons_procedimientos.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}
$id = $_REQUEST['id']; 
$plan_nombre_id = bd_obt_procedimientos($_REQUEST['id']);
$expediente = sql2array("SELECT id,solicitante_id,nombre_fundo,superficie,fecha,tipo_proc_id,plan_id,tipo,num_exp,num_solicitud_fenix,num_archivo,num_carpeta,
					fecha_remision,num_memo,status_id FROM expedientes WHERE tipo_proc_id = '$id'");

foreach ($expediente as $i=>$c)
{
	$solicitante_id = $expediente[$i]['solicitante_id'];
	$expediente[$i]['solicitante'] = sql2row("SELECT  id,tipo,nombre,apellido,tlf_fijo,tlf_movil,direccion,asentamiento_id,parroquia_id,sector,correo,bene_directo,
	bene_indirecto,concejo_id FROM solicitantes WHERE id = '$solicitante_id'");
	$expediente[$i]['representante'] = sql2row("SELECT  id,nombre,apellido FROM representantes WHERE solicitante_id = '$solicitante_id'");
	$expediente[$i]['plan_id'] = bd_obt_programas($expediente[$i]['plan_id']);
	$expediente[$i]['status_id'] = bd_obt_status($expediente[$i]['status_id']);
	$expediente[$i]['solicitante']['asentamiento_id'] = bd_obt_asentamientos($expediente[$i]['solicitante']['asentamiento_id']);
	$expediente[$i]['solicitante']['parroquia_id'] = bd_obt_parroquias($expediente[$i]['solicitante']['parroquia_id']);
	$expediente[$i]['solicitante']['concejo_id'] = bd_obt_concejo_comunal($expediente[$i]['solicitante']['concejo_id']);
	$expediente[$i]['fecha'] = f2f($expediente[$i]['fecha']);
	$expediente[$i]['fecha_remision'] = f2f($expediente[$i]['fecha_remision']);
}

$smarty->assign('datos',$expediente);
$smarty->assign('plan_nombre_id',$plan_nombre_id);
$smarty->disp();
$_SESSION['data20']=array(
	'datos'           => $expediente,
	'plan_nombre_id'  => $plan_nombre_id
);