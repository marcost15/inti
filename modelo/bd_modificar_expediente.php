<?php
function bd_modificar_expediente($d)
{
	$id  = $d['id'];
	$sql = "UPDATE expedientes
			SET nombre_fundo            =  '$d[nombre_fundo]',
				superficie              =  '$d[superficie]',
				fecha                   =  '$d[fecha]',
				tipo_proc_id            =  '$d[tipo_proc_id]',
				plan_id                 =  '$d[plan_id]',
				tipo                    =  '$d[tipo]',
				num_exp                 =  '$d[num_exp]',
				num_solicitud_fenix     =  '$d[num_solicitud_fenix]',
				num_archivo             =  '$d[num_archivo]',
				num_carpeta             =  '$d[num_carpeta]',
				fecha_remision          =  '$d[fecha_remision]',
				num_memo                =  '$d[num_memo]',
				status_id               =  '$d[status_id]'
				WHERE CONVERT(`expedientes`.`id` USING utf8 ) = '$id' LIMIT 1 ;";
	enviar_sql($sql);
 }