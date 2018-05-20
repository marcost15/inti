<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_lista_dependencias.php';
include './modelo/bd_lista_personal.php';
include './modelo/bd_lista_funcionario.php';
include './modelo/bd_guardar_movimientos.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('registrar_movimientos.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$tipo = array(
'ENTRADA' => 'ENTRADA',
'SALIDA' => 'SALIDA'
);

$f1=new FormHandler('movimiento',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->addHTML(" <br />"."<div id='titulo'>REGISTRAR MOVIMIENTO</div>"."<td colspan='3'><hr size='1' /></td>\n"." </tr>\n");
$f1->textField("Expediente", "id",FH_DIGIT,15,11,"onDblClick=\"window.open('ventana_expediente.php','sopa');\"");
$f1->setHelpText('id','Por favor seleccione de la ventana emergente el expediente o introduzca el ID interno del expediente');
$f1->textField("", "nombre_fundo",_FH_STRING,40,40,"readonly=readonly onClick=\"window.open('ventana_expediente.php','sopa');\"");
$f1->textField("", "superficie",_FH_STRING,40,40,"readonly=readonly onClick=\"window.open('ventana_expediente.php','sopa');\"");
$f1->addHTML("<br />"." <td colspan='3'><hr size='1' /></td>\n"." </tr>\n");

$f1->selectField("Tipo","tipo",$tipo,FH_NOT_EMPTY,true);
$f1->hiddenField('personal_id', $_SESSION['usuario']['id']);
$f1->selectField("funcionario","funcionario_id",bd_lista_funcionario(),FH_NOT_EMPTY,true);
$f1->selectField("Dependencia","dependencia_id",bd_lista_dependencias(),FH_NOT_EMPTY,true);
$f1->textArea('Observación','observacion',_FH_STRING,40,2,"onkeyup=\"personal.direccion.value=personal.direccion.value.toUpperCase();\"");
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
	bd_guardar_movimientos($d);
	$_SESSION['mensaje']="MOVIMIENTO REGISTRADO CORRECTAMENTE";	
	ir('registrar_movimientos.php');
}
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);