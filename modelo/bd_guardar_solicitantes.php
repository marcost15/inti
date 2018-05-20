<?php
function bd_guardar_solicitantes($d)
{
	enviar_sql("INSERT INTO solicitantes (id,tipo,nombre,apellido,tlf_fijo,tlf_movil,direccion,asentamiento_id,parroquia_id,sector,correo,bene_directo,bene_indirecto,
	concejo_id) 
	VALUES ('$d[id]','$d[tipo]','$d[nombre]','$d[apellido]','$d[tlf_fijo]','$d[tlf_movil]','$d[direccion]','$d[asentamiento_id]','$d[parroquia_id]','$d[sector]',
	'$d[correo]','$d[bene_directo]','$d[bene_indirecto]','$d[concejo_id]');");
	$cedula = $d['id_repre'];
	if (!empty($cedula))
	{	
		enviar_sql("INSERT INTO representantes (id,nombre,apellido,solicitante_id) 
		VALUES ('$d[id_repre]','$d[nombre_repre]','$d[apellido_repre]','$d[id]');");
	}
}