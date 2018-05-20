<?php
function bd_modificar_solicitantes($d)
{
	$id  = $d['id'];
	$sql = "UPDATE solicitantes
			SET tipo              =  '$d[tipo]',
				apellido          =  '$d[apellido]',
				tlf_fijo          =  '$d[tlf_fijo]',
				tlf_movil         =  '$d[tlf_movil]',
				direccion         =  '$d[direccion]',
				asentamiento_id   =  '$d[asentamiento_id]',
				parroquia_id      =  '$d[parroquia_id]',
				sector            =  '$d[sector]',
				correo            =  '$d[correo]',
				bene_directo      =  '$d[bene_directo]',
				bene_indirecto    =  '$d[bene_indirecto]',
				concejo_id        =  '$d[concejo_id]'
				WHERE CONVERT(`solicitantes`.`id` USING utf8 ) = '$id' LIMIT 1 ;";
	enviar_sql($sql);
	
	$sql = "UPDATE representantes
			SET id        =  '$d[id]',
				nombre    =  '$d[nombre]',
				apellido  =  '$d[apellido]'
				WHERE CONVERT(`representantes`.`solicitante_id` USING utf8 ) = '$id' LIMIT 1 ;";
	enviar_sql($sql);
 }