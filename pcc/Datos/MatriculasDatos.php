<?php 
require_once("Modelos/Matricula.php");
require_once("funciones.php");
class MatriculaDatos{
	function getMatriculas(){
		$matriculas[]= new Matricula;
		
		$xc = conectar();
		$sql = "SELECT * FROM matricula";
		$res = mysqli_query($xc,$sql);
		desconectar($xc);
		array_pop($matriculas);
		while($fila = mysqli_fetch_array($res)){
			$matriculatmp= new Area;
			$matriculatmp->id_mat=$fila['id_mat'];
			$matriculatmp->id_per=$fila['id_per'];
			$matriculatmp->id_sem_carr=$fila['id_sem_carr'];
			$matriculatmp->fec_mat=$fila['fec_mat'];
			array_push($matriculas,$matriculatmp);
		}
		return $matriculas;
	}
}
 ?>