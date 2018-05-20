<?php
function bd_buscar_concejo_comunal($tipo,$texto)
{
	switch($tipo)
	{
		case 2: //Busqueda de texto completo
			$sql = "SELECT id,rif,nombre,tlf_fijo,tlf_movil
							FROM concejo_comunal
							WHERE id         LIKE '%$texto%' 
 								OR nombre  LIKE '%$texto%'
						  	ORDER BY nombre ASC";
			break;
	}
	return sql2array($sql);
}