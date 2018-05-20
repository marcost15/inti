<?php
function bd_lista_programas()
{
	return sql2opciones("SELECT id,nombre FROM programas_asociados ORDER BY id ASC");
}