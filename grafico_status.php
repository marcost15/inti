<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/libchart.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);

$c = sql2value("SELECT COUNT(id) FROM  status_solicitudes");
$programas = sql2array("SELECT id,nombre FROM  status_solicitudes");

$total=0;
foreach ($programas as $i=>$c)
{
$a = $programas[$i]['id'];
$programas[$i][cant] = sql2value("SELECT COUNT(*) FROM expedientes WHERE status_id = '$a'");
$total = $total	+ $programas[$i][cant];			
}
foreach ($programas as $i=>$c)
{
$b = $programas[$i][cant];
$programas[$i][porc] = $b*100/$total;
$programas[$i][porc] = round($programas[$i]['porc']);
}
$chart = new HorizontalBarChart(850, 420);
$dataSet = new XYDataSet();
foreach ($programas as $i=>$c)
{
$nombre = $programas[$i][nombre];
$porc = $programas[$i][porc];
$cant = $programas[$i][cant];
$dataSet->addPoint(new Point("$nombre ($cant)", $porc));
}
	$chart->setDataSet($dataSet);
	$chart->getPlot()->setGraphPadding(new Padding(5, 30, 20, 140));
$chart->setTitle("");
$chart->render("./graficos/grstatusxexpediente.png");
$smarty->disp();