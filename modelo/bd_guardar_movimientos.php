<?php
function bd_guardar_movimientos($d)
{
	$fecha = date('Y-m-d');
	$tipo = $d['tipo'];
	$personal_id = $d['personal_id'];
	$funcionario = $d['funcionario_id'];
	if ("$tipo" == 'ENTRADA')
	{
		enviar_sql("INSERT INTO movimientos (id,expediente_id,fecha,tipo,func_entrega_id,func_recibe_id,dependencia_id,observacion) 
		VALUES ('','$d[id]','$fecha','$d[tipo]','$funcionario','$personal_id','$d[dependencia_id]','$d[observacion]');");
	}
	else
	{
		enviar_sql("INSERT INTO movimientos (id,expediente_id,fecha,tipo,func_entrega_id,func_recibe_id,dependencia_id,observacion) 
		VALUES ('','$d[id]','$fecha','$d[tipo]','$personal_id','$funcionario','$d[dependencia_id]','$d[observacion]');");
	}
}