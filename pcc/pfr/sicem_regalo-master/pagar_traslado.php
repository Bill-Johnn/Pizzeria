<?php require_once("funciones.php") ?>
<?php
$xc    = conectar(); 
 
 $xid_pend_tras=leerParam("xid_pend_tras","");
 
// echo "$xid_pendiente + + +s";
// die();

$fecha_hoy=date('Y-m-d');
		$ano_hoy=date('Y');
		$mes_hoy=date('m');
		$dia_hoy=date('d');
 
 $sql="SELECT * FROM pend_tras WHERE id_pend_tras='$xid_pend_tras'";
 $res=mysqli_query($xc,$sql);
 $fila=mysqli_fetch_array($res);
		$xid_dif=$fila[1];
		$xid_nicho_ini=$fila[2];
		$xid_nicho_fin=$fila[3];
				
	$sql123="SELECT * from pen_conv WHERE id_nicho=$xid_nicho_ini";
	$res123=mysqli_query($sql123);
 $fila123=mysqli_fetch_array($res123);
 $xid_conv=$fila123['id_pend_conv'];
 
 $sql_update="UPDATE pen_conv set id_nicho=$xid_nicho_fin WHERE id_nicho=$xid_nicho_ini";
 mysqli_query($sql_update);
	
		

	 $sql1 = "INSERT INTO `traslado` VALUES ('$xid_dif', '$xid_nicho_ini', '$xid_nicho_fin', '$fecha_hoy')";
			mysqli_query($xc, $sql );
//	//	//echo "$sql1 +";/
		//die();
		
		 
		 $sql999="SELECT id_ima_nicho from nicho WHERE id_nicho=$xid_nicho_ini";
		 $res999=mysqli_query($sql999);
 $fila999=mysqli_fetch_array($res999);
 $xid_ima_nicho=$fila999[0];
 if($xid_ima_nicho!=1)
 {
 		$sql7 = "DELETE FROM imagen WHERE id_imagen='$xid_ima_nicho'";
				mysqli_query($xc,$sql7 );
 }
		 
		$sql7 = "UPDATE nicho SET est_nicho='T', id_ima_nicho=1 WHERE id_nicho='$xid_nicho_ini'";
				mysqli_query($xc,$sql7 );
				
		$sql7 = "UPDATE pend_tras SET estado='PAGADO' WHERE id_pend_tras='$xid_pend_tras'";
				mysqli_query($xc,$sql7 );
				
		$sql7 = "UPDATE nicho SET est_nicho='O' WHERE id_nicho='$xid_nicho_fin'";
				mysqli_query($xc,$sql7 );
				
		$sql7 = "UPDATE difunto SET id_nicho='$xid_nicho_fin' WHERE id_dif='$xid_dif'";
				mysqli_query($xc,$sql7 );
				
		
		header("Location: pagos_traslados.php");
		
		
		


 

  desconectar( $xc );
 
?>
