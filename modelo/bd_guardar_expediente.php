<?php
function bd_guardar_expediente($d)
{
	enviar_sql("INSERT INTO expedientes (id,solicitante_id,nombre_fundo,superficie,fecha,tipo_proc_id,plan_id,tipo,num_exp,num_solicitud_fenix,num_archivo,num_carpeta,
	fecha_remision,num_memo,status_id) 
	VALUES ('','$d[solicitante_id]','$d[nombre_fundo]','$d[superficie]','$d[fecha]','$d[tipo_proc_id]','$d[plan_id]','$d[tipo]','$d[num_exp]','$d[num_solicitud_fenix]',
	'$d[num_archivo]','$d[num_carpeta]','$d[fecha_remision]','$d[num_memo]','$d[status_id]');");
}