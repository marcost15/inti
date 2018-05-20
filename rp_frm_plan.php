<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_lista_programas.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('rp_frm_plan.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$f1=new dbFormHandler('jefe');
$f1->addHTML(" <br />"."<div id='titulo'>REPORTE POR PLAN</div>"."<td colspan='3'><hr size='1' /></td>\n"." </tr>\n");
$f1->selectField('Plan', 'id',bd_lista_programas(),FH_NOT_EMPTY,true);

$f1->setMask(
   " <tr>\n".
   "   <td> </td>\n".
   "   <td> </td>\n".
   "   <td>%field% %field%</td>\n".
   " </tr>\n"
);
$f1->submitButton('Aceptar','Aceptar');
$f1->addHTML("<br />"." <td colspan='3'><hr size='1' /></td>\n"." </tr>\n");
$f1->onCorrect("procesar");

function procesar($d)
{
	$id = $d['id'];
	ir("rp_cons_plan.php?id=$id");
}
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);
