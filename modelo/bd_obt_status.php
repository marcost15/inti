<?php
function bd_obt_status($id = null)
{
	if($id==NULL)
	{
		return sql2array("SELECT id,nombre FROM status_solicitudes ORDER BY id ASC");
	}
	else
	{
		return sql2value("SELECT nombre FROM status_solicitudes WHERE id = $id LIMIT 1");
	}
}