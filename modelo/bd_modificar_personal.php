<?php
function bd_modificar_personal($d)
{
	$id  = $d['id'];
	$sql = "UPDATE personal
			SET apellido        =  '$d[apellido]',
				nombre          =  '$d[nombre]',
				nivel_id        =  '$d[nivel_id]'
				WHERE CONVERT(`personal`.`id` USING utf8 ) = '$id' LIMIT 1 ;";
	enviar_sql($sql);
	
	$sql = "UPDATE personal_datos
			SET direccion  =  '$d[direccion]',
				tlf_fijo   =  '$d[tlf_fijo]',
				tlf_movil  =  '$d[tlf_movil]',
				correo      =  '$d[email]'
				WHERE CONVERT(`personal_datos`.`personal_id` USING utf8 ) = '$id' LIMIT 1 ;";
	enviar_sql($sql);
 }