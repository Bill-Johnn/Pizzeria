<?php 

require_once("Modelos/Curso.php");
require_once("funciones.php");
class CursosDatos{
	function getCursos(){
		$cursos[] = new Curso();
		$xc = conectar();
		$sql = "SELECT * FROM curso";
		$res = mysqli_query($xc,$sql);
		desconectar($xc);
		array_pop($cursos);
		while($fila = mysqli_fetch_array($res)){
			$cursotmp= new Curso;
			$cursotmp->id_cur=$fila['id_cur'];
			$cursotmp->nom_cur=$fila['nom_cur'];
			array_push($cursos,$cursotmp);
		}
		return $cursos;
	}
}
 ?>	
	
