<?php
function bd_guardar_concejo_comunal($d)
{
	enviar_sql("INSERT INTO concejo_comunal (id,nombre,tlf_fijo,tlf_movil,rif) 
	VALUES ('$d[id]','$d[nombre]','$d[tlf_fijo]','$d[tlf_movil]','$d[rif]');");
}