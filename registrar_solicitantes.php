<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_lista_municipios.php';
include './modelo/bd_lista_asentamientos.php';
include './modelo/bd_lista_concejo_comunal.php';
include './modelo/bd_guardar_solicitantes.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('registrar_solicitantes.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$tipo = array(
'V' => 'Venezolano',
'G' => 'Gobierno',
'J' => 'Juridico',
);

$municipios = bd_lista_municipios();
if (!empty($municipios)) {array_unshift($municipios,'- - Seleccione - -');}
$asentamientos = bd_lista_asentamientos();
if (!empty($asentamientos)) {array_unshift($asentamientos,'- - Seleccione - -');}
$concejo = bd_lista_concejo_comunal();
if (!empty($concejo)) {array_unshift($concejo,'- - Seleccione - -');}

$f1=new FormHandler('personal',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$star = '<font color="blue">*</font>';
$f1->addHTML(" <br />"."<div id='titulo'>REGISTRAR SOLICITANTES</div>"."<td colspan='3'><hr size='1' /></td>\n"." </tr>\n");
$f1->selectField("Tipo","tipo",$tipo,FH_NOT_EMPTY,true);
$f1->textField($star.'Cedula o Rif','id',FH_DIGIT,12,11, "onkeyup=\"return ValNumero(this);\"");
$f1->textField($star.'Nombre o Razón Social','nombre',FH_STRING,30,35,"onkeyup=\"personal.nombre.value=personal.nombre.value.toUpperCase();\"");
$f1->textField($star.'Apellido','apellido',_FH_STRING,30,35,"onkeyup=\"personal.apellido.value=personal.apellido.value.toUpperCase();\"");
$f1->textArea($star.'Direccion','direccion',FH_STRING,40,2,"onkeyup=\"personal.direccion.value=personal.direccion.value.toUpperCase();\"");
$f1->textField($star.'Sector','sector',FH_STRING,30,35,"onkeyup=\"personal.sector.value=personal.sector.value.toUpperCase();\"");
$f1->selectField($star."Municipio", "municipio",$municipios,FH_NOT_EMPTY,true);
$f1->selectField($star."Parroquias", "parroquia_id", array(),FH_NOT_EMPTY,true);
$f1->linkSelectFields("casiajax.php", "municipio", "parroquia_id");
$f1->selectField("Asentamiento", "asentamiento_id",$asentamientos);
$f1->textField('Teléfono Fijo','tlf_fijo',_FH_DIGIT,15,11,"onkeyup=\"return ValNumero(this);\"");
$f1->setHelpText('tlf_fijo','El formato es solo numero 0000999999');
$f1->textField('Teléfono Movil','tlf_movil',_FH_DIGIT,15,11,"onkeyup=\"return ValNumero(this);\"");
$f1->setHelpText('tlf_movil','El formato es solo numero 0000999999');
$f1->textField('Correo Electronico','correo',_FH_EMAIL,30,50);
$f1->textField($star.'Beneficiarios Directos','bene_directo',FH_DIGIT,10,4, "onkeyup=\"return ValNumero(this);\"");
$f1->textField($star.'BeneficiariosIndirectos','bene_indirecto',FH_DIGIT,10,4, "onkeyup=\"return ValNumero(this);\"");
$f1->selectField("Consejo Comunal","concejo_id",$concejo,FH_NOT_EMPTY,true);

$f1->addHTML("<br />"." <td colspan='3'><hr size='1' /></td>\n"." </tr>\n");
$f1->addHTML("<td colspan='3' id='titulo'>DATOS DEL REPRESENTANTE<hr size='1' /></td>\n"." </tr>\n");
$f1->textField('Cedula','id_repre',_FH_DIGIT,12,11, "onkeyup=\"return ValNumero(this);\"");
$f1->textField('Nombre ','nombre_repre',_FH_STRING,30,35,"onkeyup=\"personal.nombre.value=personal.nombre.value.toUpperCase();\"");
$f1->textField('Apellido','apellido_repre',_FH_STRING,30,35,"onkeyup=\"personal.apellido.value=personal.apellido.value.toUpperCase();\"");
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
	$cedula=$d['id'];
	$n=sql2value("SELECT COUNT(*) FROM solicitantes WHERE id LIKE '$cedula'");
	if ($n==0)
	{
		$cedula2=$d['id_repre'];
		$n=sql2value("SELECT COUNT(*) FROM representantes WHERE id LIKE '$cedula2'");
		if ($n==0)
		{
			$tipo_soli = $d['tipo'];
			if (($tipo_soli == "J" OR $tipo_soli == "G") AND empty($cedula2))
			{
				$_SESSION['mensaje']="CUANDO EL SOLICITANTE ES JURIDICO DEBE LLENAR LOS CAMPOS DE REPRESENTANTE";
				return false;
			}
			else
			{
				bd_guardar_solicitantes($d);
				$_SESSION['mensaje']="SOLICITANTE REGISTRADO CORRECTAMENTE";
			}
		}
		else
		{
			$_SESSION['mensaje']="LA CÉDULA DEL REPRESENTANTE YA EXISTE, POR FAVOR INTRODUZCA UNA NUEVA";
			return false;
		}
	}
	else
	{
		$_SESSION['mensaje']="LA CÉDULA O RIF YA EXISTE, POR FAVOR INTRODUZCA UNA NUEVA";
		return false;
	}
	ir('registrar_solicitantes.php');
}
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);