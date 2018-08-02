<?php 
require_once("Modelos/Area.php");
require_once("funciones.php");
class AreaDatos{
	function getAreas(){
		$areas[]= new Area;
		
		$xc = conectar();
		$sql = "SELECT * FROM area";
		$res = mysqli_query($xc,$sql);
		desconectar($xc);
		array_pop($areas);
		while($fila = mysqli_fetch_array($res)){
			$areatmp= new Area;
			$areatmp->id_area=$fila['id_area'];
			$areatmp->nom_area=$fila['nom_area'];
			array_push($areas,$areatmp);
		}
		return $areas;
	}

	function listarAreas(){
		$xc = conectar();
		$sql = "SELECT * FROM area";
		$res = mysqli_query($xc,$sql);
		desconectar($xc);

            while ($fila = mysqli_fetch_array($res)) {
                 $xid_area = $fila["id_area"];
                 $xnomarea = $fila["nom_area"];
                 echo "<tr>";
                 echo "<td>$xid_area</td>";
                 echo "<td>$xnomarea</td>";
                 echo "<td><a href='areas_editar.php?xid_area=$xid_area'>Editar</a> 
                                                    <a href='areas_grabar.php?xid_area=$xid_area'>Eliminar</a></td>";
                                        echo "</tr>";
                                    }
                                    	}

    function editarAreas($xid_area){

      $sql="SELECT * FROM area WHERE id_area = '$xid_area'";
      $xc= conectar();
      $res = mysqli_query($xc,$sql);
      desconectar($xc);
      $fila = mysqli_fetch_array($res);
    }
}
 ?>
