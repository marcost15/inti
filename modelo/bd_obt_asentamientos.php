<?php
function bd_obt_asentamientos($id = null)
{
	if($id==NULL)
	{
		return sql2array("SELECT id,nombre FROM asentamientos ORDER BY id ASC");
	}
	else
	{
		return sql2value("SELECT nombre FROM asentamientos WHERE id = $id LIMIT 1");
	}
}