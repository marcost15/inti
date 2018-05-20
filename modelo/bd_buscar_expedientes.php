<?php
function bd_buscar_expedientes($tipo,$texto)
{
	switch($tipo)
	{
		case 2: //Busqueda de texto completo
			$sql = "SELECT id,nombre_fundo,superficie,solicitante_id,num_exp
							FROM expedientes
							WHERE solicitante_id          LIKE '%$texto%' 
 								OR nombre_fundo           LIKE '%$texto%'
								OR superficie             LIKE '%$texto%' 
								OR tipo                   LIKE '%$texto%' 
								OR num_exp                LIKE '%$texto%' 
								OR num_solicitud_fenix    LIKE '%$texto%' 
						  	ORDER BY nombre_fundo ASC";
			break;
	}
	return sql2array($sql);
}