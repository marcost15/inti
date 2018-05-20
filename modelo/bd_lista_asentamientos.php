<?php
function bd_lista_asentamientos()
{
	return sql2opciones("SELECT id,nombre FROM asentamientos ORDER BY id ASC");
}