<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_lista_procedimientos.php';
include './modelo/bd_lista_programas.php';
include './modelo/bd_lista_status.php';
include './modelo/bd_guardar_expediente.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('registrar_expedientes.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$tipo = array(
'FENIX' => 'FENIX',
'MANUAL' => 'MANUAL'
);

$procedimientos = bd_lista_procedimientos();
if (!empty($procedimientos)) {array_unshift($procedimientos,'- - Seleccione - -');}
$programas = bd_lista_programas();
if (!empty($programas)) {array_unshift($programas,'- - Seleccione - -');}
$status = bd_lista_status();
if (!empty($status)) {array_unshift($status,'- - Seleccione - -');}

$f1=new FormHandler('personal',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$star = '<font color="blue">*</font>';
$f1->addHTML(" <br />"."<div id='titulo'>REGISTRAR EXPEDIENTE</div>"."<td colspan='3'><hr size='1' /></td>\n"." </tr>\n");
$f1->textField($star."Solicitante", "solicitante_id",FH_DIGIT,15,11,"onDblClick=\"window.open('ventana_solicitantes.php','sopa');\"");
$f1->setHelpText('solicitante_id','Por favor seleccione de la ventana emergente el solicitante o introduzca la cedula del solicitante');
$f1->textField("", "solicitante_nombre",_FH_STRING,40,40,"readonly=readonly onClick=\"window.open('ventana_solicitantes.php','sopa');\"");
$f1->textField("", "solicitante_apellido",_FH_STRING,40,40,"readonly=readonly onClick=\"window.open('ventana_solicitantes.php','sopa');\"");
$f1->addHTML("<br />"." <td colspan='3'><hr size='1' /></td>\n"." </tr>\n");

$f1->jsDateField($star.'Fecha','fecha','validafecha',1,'d-m-y',"40:00");
$f1->textField($star.'Nombre del Fundo','nombre_fundo',FH_STRING,30,35,"onkeyup=\"personal.nombre_fundo.value=personal.nombre_fundo.value.toUpperCase();\"");
$f1->textField($star.'Superficie','superficie',FH_STRING,30,35,"onkeyup=\"personal.superficie.value=personal.superficie.value.toUpperCase();\"");
$f1->selectField($star."programa","plan_id",$programas,FH_NOT_EMPTY,true);
$f1->selectField($star."Tipo de Procedimiento","tipo_proc_id",$procedimientos,FH_NOT_EMPTY,true);
$f1->selectField($star."Tipo","tipo",$tipo,FH_NOT_EMPTY,true);
$f1->textField($star.'Nro de Expediente','num_exp',FH_STRING,40,35,"onkeyup=\"personal.superficie.value=personal.superficie.value.toUpperCase();\"");
$f1->textField('Nro de Solicitud','num_solicitud_fenix',_FH_STRING,40,35,"onkeyup=\"personal.superficie.value=personal.superficie.value.toUpperCase();\"");
$f1->textField('Nro de Archivo','num_archivo',_FH_STRING,40,35,"onkeyup=\"personal.superficie.value=personal.superficie.value.toUpperCase();\"");
$f1->textField('Nro de Carpeta','num_carpeta',_FH_STRING,40,35,"onkeyup=\"personal.superficie.value=personal.superficie.value.toUpperCase();\"");
$f1->selectField($star."Status","status_id",$status,FH_NOT_EMPTY,true);
$f1->jsDateField('Fecha de Remisión','fecha_remision','_validafecha',1,'d-m-y',"40:00");
$f1->textField('Nro de Memo','num_memo',_FH_STRING,40,35,"onkeyup=\"personal.superficie.value=personal.superficie.value.toUpperCase();\"");
$f1->addLine($star ." = Campos Requeridos Obligatoriamente");
$f1->setMask(
   " <tr>\n".
   "   <td> </td>\n".
   "   <td> </td>\n".
   "   <td>%field% %field%</td>\n".
   " </tr>\n"
);
$f1->submitButton('Registrar','registrar');
$f1->resetButton();
$f1->addHTML("<br />"." <td colspan='3'><hr size='1' /></td>\n"." </tr>\n");
$f1->onCorrect("procesar");

function procesar($d)
{
	$d['fecha']=f2f($d['fecha']);
	$d['fecha_remision']=f2f($d['fecha_remision']);
	bd_guardar_expediente($d);
	$_SESSION['mensaje']="EXPEDIENTE REGISTRADO CORRECTAMENTE";	
	ir('registrar_expedientes.php');
}
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);