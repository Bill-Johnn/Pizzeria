<?php
  // funciones PHP
  function leerParam($param, $default) {
     if ( isset($_POST["$param"] ) )
        return $_POST["$param"];
     if ( isset($_GET["$param"] ) )
        return $_GET["$param"];
     return $default; 
  }
  function conectar() {
     $xc = mysqli_connect("localhost","root","root");
     mysqli_select_db($xc,"municementerio" );
     return $xc;
  }

  function desconectar($xc) {
     mysqli_close( $xc );
  }
  function estallena($variable) {
     if (isset($variable)) 
	 {
		 return $variable;
	 }
	 $variable="-------------------";
	 return $variable;
  }
  function dateDiff($start, $end) { 

$start_ts = strtotime($start); 

$end_ts = strtotime($end); 

$diff = $end_ts - $start_ts; 

return round($diff / 86400); 

}
 
  
  function verestado($xdia,$xmes,$xlimite) 
  {
	  $xhoy=date('d');
	  $xanohoy=date('Y');
	  if (($xanohoy % 4 == 0) && (($xanohoy % 100 != 0) || ($xanohoy % 400 == 0)))
	  {
		  switch($xmes)
		  {
			  case 1: {
				  		if($xhoy-$xdia < 0)
						{
							$xresto=$xdia+$xlimite-31;
							if($xhoy<$xresto)
							{
								$rpta=$xresto-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xresto;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
						else
						{
							if($xhoy<$xlimite+$xdia)
							{
								$rpta=$xdia+$xlimite-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xdia+$xlimite;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
				  	  }break;
				case 2: {
				  		if($xhoy-$xdia < 0)
						{
							$xresto=$xdia+$xlimite-29;
							if($xhoy<$xresto)
							{
								$rpta=$xresto-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xresto;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
						else
						{
							if($xhoy<$xlimite+$xdia)
							{
								$rpta=$xdia+$xlimite-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xdia+$xlimite;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
				  	  }break;
				case 3: {
				  		if($xhoy-$xdia < 0)
						{
							$xresto=$xdia+$xlimite-31;
							if($xhoy<$xresto)
							{
								$rpta=$xresto-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xresto;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
						else
						{
							if($xhoy<$xlimite+$xdia)
							{
								$rpta=$xdia+$xlimite-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xdia+$xlimite;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
				  	  }break;
				case 4: {
				  		if($xhoy-$xdia < 0)
						{
							$xresto=$xdia+$xlimite-30;
							if($xhoy<$xresto)
							{
								$rpta=$xresto-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xresto;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
						else
						{
							if($xhoy<$xlimite+$xdia)
							{
								$rpta=$xdia+$xlimite-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xdia+$xlimite;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
				  	  }break;
				case 5: {
				  		if($xhoy-$xdia < 0)
						{
							$xresto=$xdia+$xlimite-31;
							if($xhoy<$xresto)
							{
								$rpta=$xresto-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xresto;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
						else
						{
							if($xhoy<$xlimite+$xdia)
							{
								$rpta=$xdia+$xlimite-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xdia+$xlimite;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
				  	  }break;
			case 6: {
				  		if($xhoy-$xdia < 0)
						{
							$xresto=$xdia+$xlimite-30;
							if($xhoy<$xresto)
							{
								$rpta=$xresto-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xresto;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
						else
						{
							if($xhoy<$xlimite+$xdia)
							{
								$rpta=$xdia+$xlimite-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xdia+$xlimite;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
				  	  }break;
				case 7: {
				  		if($xhoy-$xdia < 0)
						{
							$xresto=$xdia+$xlimite-31;
							if($xhoy<$xresto)
							{
								$rpta=$xresto-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xresto;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
						else
						{
							if($xhoy<$xlimite+$xdia)
							{
								$rpta=$xdia+$xlimite-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xdia+$xlimite;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
				  	  }break;
				case 8: {
				  		if($xhoy-$xdia < 0)
						{
							$xresto=$xdia+$xlimite-31;
							if($xhoy<$xresto)
							{
								$rpta=$xresto-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xresto;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
						else
						{
							if($xhoy<$xlimite+$xdia)
							{
								$rpta=$xdia+$xlimite-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xdia+$xlimite;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
				  	  }break;
				case 9: {
				  		if($xhoy-$xdia < 0)
						{
							$xresto=$xdia+$xlimite-30;
							if($xhoy<$xresto)
							{
								$rpta=$xresto-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xresto;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
						else
						{
							if($xhoy<$xlimite+$xdia)
							{
								$rpta=$xdia+$xlimite-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xdia+$xlimite;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
				  	  }break;
				case 10: {
				  		if($xhoy-$xdia < 0)
						{
							$xresto=$xdia+$xlimite-31;
							if($xhoy<$xresto)
							{
								$rpta=$xresto-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xresto;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
						else
						{
							if($xhoy<$xlimite+$xdia)
							{
								$rpta=$xdia+$xlimite-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xdia+$xlimite;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
				  	  }break;
				case 11: {
				  		if($xhoy-$xdia < 0)
						{
							$xresto=$xdia+$xlimite-30;
							if($xhoy<$xresto)
							{
								$rpta=$xresto-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xresto;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
						else
						{
							if($xhoy<$xlimite+$xdia)
							{
								$rpta=$xdia+$xlimite-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xdia+$xlimite;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
				  	  }break;
				case 12: {
				  		if($xhoy-$xdia < 0)
						{
							$xresto=$xdia+$xlimite-31;
							if($xhoy<$xresto)
							{
								$rpta=$xresto-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xresto;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
						else
						{
							if($xhoy<$xlimite+$xdia)
							{
								$rpta=$xdia+$xlimite-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xdia+$xlimite;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
				  	  }break;
					  default: {
					  			$msj= "Vencio hace: $rpta dias";
								return $msj;
								}
					  break;
			  
		  }
	  }
	  else
	  {
		  switch($xmes)
		  {
			  case 1: {
				  		if($xhoy-$xdia < 0)
						{
							$xresto=$xdia+$xlimite-31;
							if($xhoy<$xresto)
							{
								$rpta=$xresto-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xresto;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
						else
						{
							if($xhoy<$xlimite+$xdia)
							{
								$rpta=$xdia+$xlimite-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xdia+$xlimite;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
				  	  }break;
				case 2: {
				  		if($xhoy-$xdia < 0)
						{
							$xresto=$xdia+$xlimite-28;
							if($xhoy<$xresto)
							{
								$rpta=$xresto-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xresto;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
						else
						{
							if($xhoy<$xlimite+$xdia)
							{
								$rpta=$xdia+$xlimite-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xdia+$xlimite;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
				  	  }break;
				case 3: {
				  		if($xhoy-$xdia < 0)
						{
							$xresto=$xdia+$xlimite-31;
							if($xhoy<$xresto)
							{
								$rpta=$xresto-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xresto;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
						else
						{
							if($xhoy<$xlimite+$xdia)
							{
								$rpta=$xdia+$xlimite-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xdia+$xlimite;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
				  	  }break;
				case 4: {
				  		if($xhoy-$xdia < 0)
						{
							$xresto=$xdia+$xlimite-30;
							if($xhoy<$xresto)
							{
								$rpta=$xresto-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xresto;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
						else
						{
							if($xhoy<$xlimite+$xdia)
							{
								$rpta=$xdia+$xlimite-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xdia+$xlimite;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
				  	  }break;
				case 5: {
				  		if($xhoy-$xdia < 0)
						{
							$xresto=$xdia+$xlimite-31;
							if($xhoy<$xresto)
							{
								$rpta=$xresto-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xresto;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
						else
						{
							if($xhoy<$xlimite+$xdia)
							{
								$rpta=$xdia+$xlimite-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xdia+$xlimite;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
				  	  }break;
			case 6: {
				  		if($xhoy-$xdia < 0)
						{
							$xresto=$xdia+$xlimite-30;
							if($xhoy<$xresto)
							{
								$rpta=$xresto-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xresto;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
						else
						{
							if($xhoy<$xlimite+$xdia)
							{
								$rpta=$xdia+$xlimite-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xdia+$xlimite;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
				  	  }break;
				case 7: {
				  		if($xhoy-$xdia < 0)
						{
							$xresto=$xdia+$xlimite-31;
							if($xhoy<$xresto)
							{
								$rpta=$xresto-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xresto;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
						else
						{
							if($xhoy<$xlimite+$xdia)
							{
								$rpta=$xdia+$xlimite-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xdia+$xlimite;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
				  	  }break;
				case 8: {
				  		if($xhoy-$xdia < 0)
						{
							$xresto=$xdia+$xlimite-31;
							if($xhoy<$xresto)
							{
								$rpta=$xresto-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xresto;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
						else
						{
							if($xhoy<$xlimite+$xdia)
							{
								$rpta=$xdia+$xlimite-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xdia+$xlimite;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
				  	  }break;
				case 9: {
				  		if($xhoy-$xdia < 0)
						{
							$xresto=$xdia+$xlimite-30;
							if($xhoy<$xresto)
							{
								$rpta=$xresto-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xresto;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
						else
						{
							if($xhoy<$xlimite+$xdia)
							{
								$rpta=$xdia+$xlimite-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xdia+$xlimite;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
				  	  }break;
				case 10: {
				  		if($xhoy-$xdia < 0)
						{
							$xresto=$xdia+$xlimite-31;
							if($xhoy<$xresto)
							{
								$rpta=$xresto-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xresto;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
						else
						{
							if($xhoy<$xlimite+$xdia)
							{
								$rpta=$xdia+$xlimite-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xdia+$xlimite;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
				  	  }break;
				case 11: {
				  		if($xhoy-$xdia < 0)
						{
							$xresto=$xdia+$xlimite-30;
							if($xhoy<$xresto)
							{
								$rpta=$xresto-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xresto;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
						else
						{
							if($xhoy<$xlimite+$xdia)
							{
								$rpta=$xdia+$xlimite-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xdia+$xlimite;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
				  	  }break;
				case 12: {
				  		if($xhoy-$xdia < 0)
						{
							$xresto=$xdia+$xlimite-31;
							if($xhoy<$xresto)
							{
								$rpta=$xresto-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xresto;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
						else
						{
							if($xhoy<$xlimite+$xdia)
							{
								$rpta=$xdia+$xlimite-$xhoy;
								$msj= "Quedan: $rpta dias";
								return $msj;
							}
							else
							{
								$rpta=$xhoy-$xdia+$xlimite;
								$msj= "Vencio hace: $rpta dias";
								return $msj;
							}
						}
				  	  }break;
					  default: {
					  			$msj= "Vencio hace: $rpta dias";
								return $msj;
								}
					  break;
			  
		  }
	  }
  }
    
   $xcodigo = leerParam('xcod','');
  $xcla = leerParam('xcla','');

  if ( $xcodigo == "" && $xcla == "" ) {
     session_start();
     if ( ! isset( $_SESSION['codigo'] ) )
        header("Location: index.php");
  }

?>

