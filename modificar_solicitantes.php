<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_lista_parroquias.php';
include './modelo/bd_lista_asentamientos.php';
include './modelo/bd_lista_concejo_comunal.php';
include './modelo/bd_modificar_solicitantes.php';
include './modelo/bd_ficha_solicitantes.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('modificar_solicitantes.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}
$tipo = array(
'V' => 'Venezolano',
'G' => 'Gobierno',
'J' => 'Juridico'
);
$solicitantes = bd_ficha_solicitantes($_REQUEST['id']);
$representante = bd_ficha_representantes($_REQUEST['id']);
$asentamientos = bd_lista_asentamientos();
if (!empty($asentamientos)) {array_unshift($asentamientos,'- - Seleccione - -');}
$concejo = bd_lista_concejo_comunal();
if (!empty($concejo)) {array_unshift($concejo,'- - Seleccione - -');}

$f1=new FormHandler('personal',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$star = '<font color="blue">*</font>';
$f1->addHTML(" <br />"."<div id='titulo'>MODIFICAR SOLICITANTES</div>"."<td colspan='3'><hr size='1' /></td>\n"." </tr>\n");
$f1->hiddenField('id', $solicitantes['id']);
$f1->selectField("Tipo","tipo",$tipo,FH_NOT_EMPTY,true);
$f1->setValue('tipo', $solicitantes['tipo']);
$f1->textField($star.'Nombre o Razón Social','nombre',FH_STRING,30,35,"onkeyup=\"personal.nombre.value=personal.nombre.value.toUpperCase();\"");
$f1->setValue('nombre', $solicitantes['nombre']);
$f1->textField($star.'Apellido','apellido',_FH_STRING,30,35,"onkeyup=\"personal.apellido.value=personal.apellido.value.toUpperCase();\"");
$f1->setValue('apellido', $solicitantes['apellido']);
$f1->textArea($star.'Direccion','direccion',FH_STRING,40,2,"onkeyup=\"personal.direccion.value=personal.direccion.value.toUpperCase();\"");
$f1->setValue('direccion', $solicitantes['direccion']);
$f1->textField($star.'Sector','sector',FH_STRING,30,35,"onkeyup=\"personal.sector.value=personal.sector.value.toUpperCase();\"");
$f1->setValue('sector', $solicitantes['sector']);
$f1->selectField($star."Parroquias", "parroquia_id", bd_lista_parroquias(),FH_NOT_EMPTY,true);
$f1->setValue('parroquia_id', $solicitantes['parroquia_id']);
$f1->selectField("Asentamiento", "asentamiento_id",$asentamientos);
$f1->setValue('asentamiento_id', $solicitantes['asentamiento_id']);
$f1->textField('Teléfono Fijo','tlf_fijo',_FH_DIGIT,15,11,"onkeyup=\"return ValNumero(this);\"");
$f1->setValue('tlf_fijo', $solicitantes['tlf_fijo']);
$f1->textField('Teléfono Movil','tlf_movil',_FH_DIGIT,15,11,"onkeyup=\"return ValNumero(this);\"");
$f1->setValue('tlf_movil', $solicitantes['tlf_movil']);
$f1->textField('Correo Electronico','correo',_FH_EMAIL,30,50);
$f1->setValue('correo', $solicitantes['correo']);
$f1->textField($star.'Beneficiarios Directos','bene_directo',FH_DIGIT,10,4, "onkeyup=\"return ValNumero(this);\"");
$f1->setValue('bene_directo', $solicitantes['bene_directo']);
$f1->textField($star.'BeneficiariosIndirectos','bene_indirecto',FH_DIGIT,10,4, "onkeyup=\"return ValNumero(this);\"");
$f1->setValue('bene_indirecto', $solicitantes['bene_indirecto']);
$f1->selectField("Consejo Comunal","concejo_id",$concejo,FH_NOT_EMPTY,true);
$f1->setValue('concejo_id', $solicitantes['concejo_id']);

$f1->addHTML("<br />"." <td colspan='3'><hr size='1' /></td>\n"." </tr>\n");
$f1->addHTML("<td colspan='3' id='titulo'>DATOS DEL REPRESENTANTE<hr size='1' /></td>\n"." </tr>\n");
$f1->textField('Cedula','id_repre',_FH_DIGIT,12,11, "onkeyup=\"return ValNumero(this);\"");
$f1->setValue('id_repre', $representante['id']);
$f1->textField('Nombre ','nombre_repre',_FH_STRING,30,35,"onkeyup=\"personal.nombre.value=personal.nombre.value.toUpperCase();\"");
$f1->setValue('nombre_repre', $representante['nombre']);
$f1->textField('Apellido','apellido_repre',_FH_STRING,30,35,"onkeyup=\"personal.apellido.value=personal.apellido.value.toUpperCase();\"");
$f1->setValue('apellido_repre', $representante['apellido']);
$f1->addLine($star ." = Campos Requeridos Obligatoriamente");
$f1->setMask(
   " <tr>\n".
   "   <td> </td>\n".
   "   <td> </td>\n".
   "   <td>%field% %field%</td>\n".
   " </tr>\n"
);
$f1->submitButton('modificar','modificar');
$f1->resetButton();
$f1->addHTML("<br />"." <td colspan='3'><hr size='1' /></td>\n"." </tr>\n");
$f1->onCorrect("procesar");

function procesar($d)
{
	bd_modificar_solicitantes($d);
	?>
		<script type="text/javascript">
		window.alert('SOLICITANTE MODIFICADO CORRECTAMENTE');
		location.href='consmod_solicitantes.php';
		</script>
	<?php	
}
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);