<?php
function bd_lista_dependencias()
{
	return sql2opciones("SELECT id,nombre FROM dependencias ORDER BY id ASC");
}