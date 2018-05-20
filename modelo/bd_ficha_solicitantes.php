<?php
function bd_ficha_solicitantes($id)
{
	$sql = "SELECT  id,tipo,nombre,apellido,tlf_fijo,tlf_movil,direccion,asentamiento_id,parroquia_id,sector,correo,bene_directo,bene_indirecto,concejo_id
					FROM solicitantes
					WHERE id = '$id'
					LIMIT 0,1";
	return sql2row($sql);
}
function bd_ficha_representantes($id)
{
	$sql = "SELECT  id,nombre,apellido
					FROM representantes
					WHERE solicitante_id = '$id'
					LIMIT 0,1";
	return sql2row($sql);
}