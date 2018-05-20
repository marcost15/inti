<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_modificar_concejo_comunal.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('modificar_concejo_comunal.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$concejo = $_REQUEST['id'];
$registro = sql2row("SELECT id,rif,nombre,tlf_fijo,tlf_movil FROM concejo_comunal WHERE id = '$concejo'");

$f1=new FormHandler('personal',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->addHTML(" <br />"."<div id='titulo'>MODIFICAR CONSEJO COMUNAL</div>"."<td colspan='3'><hr size='1' /></td>\n"." </tr>\n");
$f1->hiddenField('id', $registro['id']);
$f1->textField('Rif','rif',FH_STRING,18,15,"onkeyup=\"personal.rif.value=personal.rif.value.toUpperCase();\"");
$f1->setValue('rif', $registro['rif']);
$f1->textField('Nombre','nombre',FH_STRING,30,255,"onkeyup=\"personal.nombre.value=personal.nombre.value.toUpperCase();\"");
$f1->setValue('nombre', $registro['nombre']);
$f1->textField('Teléfono Fijo','tlf_fijo',_FH_DIGIT,15,11,"onkeyup=\"return ValNumero(this);\"");
$f1->setValue('tlf_fijo', $registro['tlf_fijo']);
$f1->textField('Teléfono Movil','tlf_movil',_FH_DIGIT,15,11,"onkeyup=\"return ValNumero(this);\"");
$f1->setValue('tlf_movil', $registro['tlf_movil']);
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
		bd_modificar_concejo_comunal($d);
		?>
				<script type="text/javascript">
				window.alert('CONCEJO_COMUNAL MODIFICADO CORRECTAMENTE');
				location.href='consmod_concejo_comunal.php';
				</script>
		<?php	
}
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();