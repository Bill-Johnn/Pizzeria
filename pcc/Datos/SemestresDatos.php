<?php 
require_once("Modelos/Semestre.php");
require_once("funciones.php");
class SemestreDatos{
	function getSemestres(){
		$semestres[]= new Semestre;
		
		$xc = conectar();
		$sql = "SELECT * FROM semestre";
		$res = mysqli_query($xc,$sql);
		desconectar($xc);
		array_pop($semestres);
		while($fila = mysqli_fetch_array($res)){
			$semestretmp= new Semestre;
			$semestretmp->id_sem=$fila['id_sem'];
			$semestretmp->nro_sem=$fila['nro_sem'];
			array_push($semestres,$semestretmp);
		}
		return $semestres;
	}
}
 ?>