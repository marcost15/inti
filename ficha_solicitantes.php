<?php
session_start();
include './configs/smarty.php';
include './configs/bd.php';
include './configs/fh3.php';
include './configs/funciones.php';
include './modelo/bd_ficha_solicitantes.php';
include './modelo/bd_obt_parroquias.php';
include './modelo/bd_obt_asentamientos.php';
include './modelo/bd_obt_concejo_comunal.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('ficha_solicitantes.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$personal = bd_ficha_solicitantes($_REQUEST['id']);
$representante = bd_ficha_representantes($_REQUEST['id']);
$personal['parroquia_id'] = bd_obt_parroquias($personal['parroquia_id']);
$personal['asentamiento_id'] = bd_obt_asentamientos($personal['asentamiento_id']);
$personal['concejo_id'] = bd_obt_concejo_comunal($personal['concejo_id']);
$smarty->assign('datos2',$representante);
$smarty->assign('ficha',$personal);
$smarty->disp();