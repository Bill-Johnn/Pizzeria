<?php
  require_once("funciones.php");
?>
<?php
  $xcodigo = leerParam('xcod','' );
  $xclave  = leerParam('xcla','' );
  //echo "$xcodigo + $xclave";
  //die();
  $xc = conectar();
  $sql = "SELECT count(*) FROM usuario WHERE id_usuario='$xcodigo' AND cla_usu='$xclave'";
  $res = mysqli_query($xc, $sql );    
  $fila = mysqli_fetch_array($res);
  $xcan = $fila[0];
  if ( $xcan > 0 ) {
		session_start();
		$_SESSION['codigo']=$xcodigo;
		$sql1 = "SELECT tipo_usu FROM usuario WHERE id_usuario='$xcodigo' AND cla_usu='$xclave'";
		$res1 = mysqli_query($xc, $sql1 );    
	  $fila1 = mysqli_fetch_array($res1);
	  $xtipousu = $fila1[0];
					if($xtipousu== 'Administrador'){					
						 header("Location: usuario.php");
					}
					else{
							if($xtipousu== 'Caja')							{							
								 header("Location: pendientes.php");
							}
							
							else if($xtipousu== 'Gerente'){
								 header("Location: gestion.php");
						
							}
					}
  }
  else
  {
    header("Location: index.php");
  }
?>
