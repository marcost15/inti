<?php
function bd_obt_concejo_comunal($id = null)
{
	if($id==NULL)
	{
		return sql2array("SELECT id,nombre FROM concejo_comunal ORDER BY id ASC");
	}
	else
	{
		return sql2value("SELECT nombre FROM concejo_comunal WHERE id = $id LIMIT 1");
	}
}