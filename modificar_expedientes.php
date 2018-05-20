<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_lista_procedimientos.php';
include './modelo/bd_lista_programas.php';
include './modelo/bd_lista_status.php';
include './modelo/bd_modificar_expediente.php';
include './modelo/bd_ficha_expedientes.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('modificar_expedientes.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$tipo = array(
'FENIX' => 'FENIX',
'MANUAL' => 'MANUAL'
);
$expedientes = bd_ficha_expedientes($_REQUEST['id']);
$expedientes['fecha']=f2f($expedientes['fecha']);
$expedientes['fecha_remision']=f2f($expedientes['fecha_remision']);

$f1=new FormHandler('personal',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$star = '<font color="blue">*</font>';
$f1->addHTML(" <br />"."<div id='titulo'>MODIFICAR EXPEDIENTE</div>"."<td colspan='3'><hr size='1' /></td>\n"." </tr>\n");
$f1->hiddenField('id', $expedientes['id']);
$f1->jsDateField($star.'Fecha','fecha','validafecha',1,'d-m-y',"40:00");
$f1->textField($star.'Nombre del Fundo','nombre_fundo',FH_STRING,30,35,"onkeyup=\"personal.nombre_fundo.value=personal.nombre_fundo.value.toUpperCase();\"");
$f1->setValue('nombre_fundo', $expedientes['nombre_fundo']);
$f1->textField($star.'Superficie','superficie',FH_STRING,30,35,"onkeyup=\"personal.superficie.value=personal.superficie.value.toUpperCase();\"");
$f1->setValue('superficie', $expedientes['superficie']);
$f1->setValue('fecha', $expedientes['fecha']);
$f1->selectField($star."programa","plan_id",bd_lista_programas(),FH_NOT_EMPTY,true);
$f1->selectField($star."Tipo de Procedimiento","tipo_proc_id",bd_lista_procedimientos(),FH_NOT_EMPTY,true);
$f1->setValue('tipo_proc_id', $expedientes['tipo_proc_id']);
$f1->setValue('plan_id', $expedientes['plan_id']);
$f1->selectField($star."Tipo","tipo",$tipo,FH_NOT_EMPTY,true);
$f1->setValue('tipo', $expedientes['tipo']);
$f1->textField($star.'Nro de Expediente','num_exp',FH_STRING,40,35,"onkeyup=\"personal.superficie.value=personal.superficie.value.toUpperCase();\"");
$f1->setValue('num_exp', $expedientes['num_exp']);
$f1->textField('Nro de Solicitud','num_solicitud_fenix',_FH_STRING,40,35,"onkeyup=\"personal.superficie.value=personal.superficie.value.toUpperCase();\"");
$f1->setValue('num_solicitud_fenix', $expedientes['num_solicitud_fenix']);
$f1->textField('Nro de Archivo','num_archivo',_FH_STRING,40,35,"onkeyup=\"personal.superficie.value=personal.superficie.value.toUpperCase();\"");
$f1->setValue('num_archivo', $expedientes['num_archivo']);
$f1->textField('Nro de Carpeta','num_carpeta',_FH_STRING,40,35,"onkeyup=\"personal.superficie.value=personal.superficie.value.toUpperCase();\"");
$f1->setValue('num_carpeta', $expedientes['num_carpeta']);
$f1->selectField($star."Status","status_id",bd_lista_status(),FH_NOT_EMPTY,true);
$f1->jsDateField('Fecha de Remisión','fecha_remision','_validafecha',1,'d-m-y',"40:00");
$f1->setValue('fecha_remision', $expedientes['fecha_remision']);
$f1->textField('Nro de Memo','num_memo',_FH_STRING,40,35,"onkeyup=\"personal.superficie.value=personal.superficie.value.toUpperCase();\"");
$f1->setValue('num_memo', $expedientes['num_memo']);
$f1->setValue('status_id', $expedientes['status_id']);
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
	bd_modificar_expediente($d);
	?>
		<script type="text/javascript">
		window.alert('EXPEDIENTE MODIFICADO CORRECTAMENTE');
		location.href='consmod_expediente.php';
		</script>
	<?php	
}
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);