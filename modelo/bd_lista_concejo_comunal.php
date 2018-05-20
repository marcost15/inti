<?php
function bd_lista_concejo_comunal()
{
	return sql2opciones("SELECT id,nombre FROM concejo_comunal ORDER BY id ASC");
}