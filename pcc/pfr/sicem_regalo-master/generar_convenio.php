<?php require_once("header.php") ?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php  

		/*DIFUNTO*/
		$xid_sol = leerParam("xid_sol","");
		$xnom_dif = leerParam("xnom_dif","");
		$xpriape_dif=leerParam("xpriape_dif","");
		$xseguape_dif=leerParam("xseguape_dif","");
		$xfentierro=leerParam("xfentierro","");
		$xfautorizacion=leerParam("xfautorizacion","");
		

/*SOLICITANTE*/
		$xdni_sol=leerParam("xdni_sol","");
		$xnom_sol=leerParam("xnom_sol","");
		$xdir_sol=leerParam("xdir_sol","");
		$xcel_sol=leerParam("xcel_sol","");

/*NICHO*/
		$xid_nicho = leerParam("xid_nicho","");
		$xnro_nicho=leerParam("xnro_nicho","");
		$xid_pab=leerParam("xid_pab","");
		$xcost_nicho=leerParam("xcost_nicho","");
		$xnom_cem=leerParam("xnom_cem","");
		$xnom_pab=leerParam("xnom_pab","");
/*CALCULO CONVENIO*/
		
		$xcuota_ini=leerParam("xcuota_ini","");
		$xnro_cuotas=leerParam("xnro_cuotas","");

		$fecha_hoy=date('Y-m-d');
		$ano_hoy=date('Y');
		$mes_hoy=date('m');
		$dia_hoy=date('d');
		
		if($xnro_cuotas)
		{
			
			///////////////////////////
		
						$xpagototal=$xcost_nicho - $xcuota_ini;
						$xresiduo=$xpagototal%$xnro_cuotas;
						$xmontocomun=($xpagototal-$xresiduo)/$xnro_cuotas;
						if($xresiduo>0)
						{
							$xpricuota=$xmontocomun+1;
						}
						else
						{
							$xpricuota=$xmontocomun;
						}
		
		////////////////////////////
			
		}
		
		
		//echo "$xnom_dif + $xpriape_dif  $xseguape_dif + $xfentierro + $xfautorizacion +";
//die();  
?>
<script type="text/javascript" src="formly.js"></script>
<script type="text/javascript" src="restricciones.js"></script>
<link rel="stylesheet" href="formly.css" type="text/css" />
<div id="body">
		<div class="cem">
			<h8>Analizando Costos</h8>

<form method=post id="BetaSignup" action="generar_convenio.php" width="500px">


       <table border=0 cellpadding=5 cellspacing=5>
      
       
       
         <tr> <th> Costo de Nicho: </th> <td> <input type=text name=xcost_nicho size=25 value="<?php echo $xcost_nicho;  ?>" readonly="YES"> </td> </tr>
         <tr> <th> Cuota Inicial: </th> <td> <input type=text name=xcuota_ini onKeyPress="return justNumbers(event);" value="<?php echo $xcuota_ini ;?>" size=25> </td> </tr>
         <tr> <th> Numero de Cuotas:  </th> <td><select name=xnro_cuotas size=1>
             <option value=0>Elija</option>
             <option value=1>1</option>
             <option value=2>2</option>
             <option value=3>3</option>
             <option value=4>4</option>
             <option value=5>5</option>
             <option value=6>6</option>
             <option value=7>7</option>
             <option value=8>8</option>
             <option value=9>9</option>
             <option value=10>10</option>
             <option value=11>11</option>
             <option value=12>12</option>
             
           </select>
       </td> </tr>
         <tr> <th>    
       </table>
     
             <input type=submit  name=xenvio     value="Verificar"  >
                
   

       
       <table border=0 cellpadding=5 cellspacing=5 align="center">
       
		<tr bgcolor=\"#9999CC\" >  
              <td><font color=\"#ffffff\"><strong>Nro de cuotas</strong></font></td>  
              <td><font color=\"#ffffff\"><strong>FECHA</strong></font></TD>  
              <td><font color=\"#ffffff\"><strong>S/.</strong></font></TD>  
         </tr>
         <tr bgcolor=\"#FFCCFF\"><th>Cuota Inicial: </th> <td> <?php echo "$fecha_hoy"; ?></td><td> <?php echo "$xcuota_ini"; ?></td></tr>
  		
        <?php
		
		
		
		
		$dia_hoyX = $dia_hoy;
			if($xcuota_ini and $xnro_cuotas)  
			{   
				
				  $mes_hoy=$mes_hoy+1;  
				 for($j=1; $j<=$xnro_cuotas; $j++) 
				 { 
				 	echo "<tr bgcolor=\"#FFCCFF\">";
					echo "<th>".$j." Cuota</th>"; 
					if($mes_hoy>12)
					{	
						$mes_hoy=1;
						$ano_hoy=$ano_hoy+1;
					}
					
					if (($dia_hoy== 31) &&($mes_hoy==4 || $mes_hoy==6 || $mes_hoy==9 || $mes_hoy==11 )) 
						$dia_hoyX = 30;
					
					if( $mes_hoy == 2 && $dia_hoy>27)
					{
					if (($dia_hoy==29 || $dia_hoy==30 || $dia_hoy==31) &&  (($ano_hoy % 4 == 0) && !($ano_hoy % 100 == 0 && $ano_hoy % 400!= 0)))
						$dia_hoyX = 29;
					else 
						$dia_hoyX = 28;
					}
						
					if ($mes_hoy <10)
						echo "<th>".$ano_hoy."-0".$mes_hoy.'-'.$dia_hoyX."</th>";
					else 
						echo "<th>".$ano_hoy.'-'.$mes_hoy.'-'.$dia_hoyX."</th>";	
						
					if($j<=$xresiduo)
					{
						echo "<td>".round($xpricuota, 2)."</td>";
					}
					else
					{				
						echo "<td>".round($xmontocomun, 2)."</td>";
					}
					$dia_hoyX = $dia_hoy;
					$mes_hoy=$mes_hoy+1;    
					echo "</tr>"; 
				}    	  
			}    
			echo "</table>"; 
		
		?>
  		    
       </table>
       
         <input  type="hidden"  name=xnom_dif size=25 value="<?php echo $xnom_dif; ?>" readonly="yes"> 
         <input type="hidden" name=xid_sol size=15 value="<?php echo $xid_sol;  ?>" readonly="YES" >
        <input type="hidden" name=xpriape_dif size=25 value="<?php echo $xpriape_dif; ?>" readonly="yes"> 
 		 <input type="hidden"  name=xseguape_dif size=25 value="<?php echo $xseguape_dif; ?>" readonly="yes">
		 <input type="hidden"  name=xfentierro size=10 value="<?php echo $xfentierro; ?>" readonly="yes">
        <input type="hidden"  name=xfautorizacion size=25  value="<?php echo $xfautorizacion; ?>">
      <input type="hidden"  name=xdni_sol size=25 value="<?php echo $xdni_sol; ?>" readonly="yes">
         <input type="hidden"  name=xnom_sol size=70 value="<?php echo $xnom_sol; ?>" readonly="yes"> 
         <input type="hidden"  name=xdir_sol size=70 value="<?php echo $xdir_sol; ?>" readonly="yes">
         <input type="hidden"  name=xcel_sol size=25 value="<?php echo $xcel_sol; ?>" readonly="yes">
<input type="hidden"  name=xid_nicho size=25 value="<?php echo $xid_nicho; ?>">
<input type="hidden"  name=xnro_nicho size=25 value="<?php echo $xnro_nicho; ?>"> 
<input type="hidden"  name=xcost_nicho size=25 value="<?php echo $xcost_nicho ?>">
 <input type="hidden"  name=xnom_cem size=70 value="<?php echo $xnom_cem; ?>"> 
 <input type="hidden"  name=xnom_pab size=70  value="<?php echo $xnom_pab; ?>"> 
<input type="hidden"  name=xnro_cuotas_mandar size=70  value="<?php echo $xnro_cuotas; ?>"> 
<input type="hidden" name=xid_pab size=15 value="<?php echo $xid_pab;  ?>" readonly="YES" >
       
            <input type=submit size=25 onclick = "this.form.action = 'comprar_nicho_resumen_convenio.php'" value="Continuar" >
                
    </form>
    
    

    
       
 

    
    
    
    
    
    </div></div>
    
	<script>
$(document).ready(function()
  { $('#BetaSignup').formly({'onBlur':false, 'theme':'Light'}); });
</script>
<script>
$(document).ready(function()
  { $('#BetaSignup1').formly({'onBlur':false, 'theme':'Light'}); });
</script>


<?php require_once("footer.php") ?>