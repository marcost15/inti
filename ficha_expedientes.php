<?php
session_start();
include './configs/smarty.php';
include './configs/bd.php';
include './configs/fh3.php';
include './configs/funciones.php';
include './modelo/bd_ficha_expedientes.php';
include './modelo/bd_obt_programas.php';
include './modelo/bd_obt_procedimientos.php';
include './modelo/bd_obt_status.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('ficha_expedientes.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}
$expedientes = bd_ficha_expedientes($_REQUEST['id']);

$expedientes['tipo_proc_id'] = bd_obt_procedimientos($expedientes['tipo_proc_id']);
$expedientes['plan_id'] = bd_obt_programas($expedientes['plan_id']);
$expedientes['status_id'] = bd_obt_status($expedientes['status_id']);
$expedientes['fecha'] = f2f($expedientes['fecha']);
$expedientes['fecha_remision'] = f2f($expedientes['fecha_remision']);

$smarty->assign('ficha',$expedientes);
$smarty->disp();