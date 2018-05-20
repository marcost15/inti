<?php
function bd_ficha_expedientes($id)
{
	$sql = "SELECT  id,solicitante_id,nombre_fundo,superficie,fecha,tipo_proc_id,plan_id,tipo,num_exp,num_solicitud_fenix,num_archivo,num_carpeta,
					fecha_remision,num_memo,status_id
					FROM expedientes
					WHERE id = '$id'
					LIMIT 0,1";
	return sql2row($sql);
}