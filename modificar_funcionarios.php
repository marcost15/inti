<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_modificar_funcionarios.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('modificar_funcionarios.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$concejo = $_REQUEST['id'];
$registro = sql2row("SELECT id,nombre,cargo FROM funcionarios WHERE id = '$concejo'");

$f1=new FormHandler('personal',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->addHTML(" <br />"."<div id='titulo'>MODIFICAR FUNCIONARIO</div>"."<td colspan='3'><hr size='1' /></td>\n"." </tr>\n");
$f1->hiddenField('id', $registro['id']);
$f1->textField('Nombre','nombre',FH_STRING,30,255,"onkeyup=\"personal.nombre.value=personal.nombre.value.toUpperCase();\"");
$f1->setValue('nombre', $registro['nombre']);
$f1->textField('Cargo','cargo',FH_STRING,30,255,"onkeyup=\"personal.cargo.value=personal.cargo.value.toUpperCase();\"");
$f1->setValue('cargo', $registro['cargo']);

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
		bd_modificar_funcionarios($d);
		?>
				<script type="text/javascript">
				window.alert('FUNCIONARIO MODIFICADO CORRECTAMENTE');
				location.href='consmod_funcionarios.php';
				</script>
		<?php	
}
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();