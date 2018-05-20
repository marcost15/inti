<?php
function bd_buscar_movimientos($tipo,$texto)
{
	switch($tipo)
	{
		case 2: //Busqueda de texto completo
			$sql = "SELECT id,expediente_id,fecha,tipo,func_entrega_id,func_recibe_id,dependencia_id,observacion
							FROM movimientos
							WHERE id                LIKE '%$texto%' 
 								OR expediente_id    LIKE '%$texto%'
								OR func_recibe_id   LIKE '%$texto%'
								OR func_entrega_id  LIKE '%$texto%'
								OR fecha            LIKE '%$texto%'
						  	ORDER BY id ASC";
			break;
	}
	return sql2array($sql);
}