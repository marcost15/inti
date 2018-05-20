<?php
function bd_obt_procedimientos($id = null)
{
	if($id==NULL)
	{
		return sql2array("SELECT id,nombre FROM tipos_procedimientos ORDER BY id ASC");
	}
	else
	{
		return sql2value("SELECT nombre FROM tipos_procedimientos WHERE id = $id LIMIT 1");
	}
}