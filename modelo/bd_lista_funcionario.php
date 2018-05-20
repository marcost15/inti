<?php
function bd_lista_funcionario()
{
	return sql2opciones("SELECT id,nombre FROM funcionarios ORDER BY nombre ASC");
}