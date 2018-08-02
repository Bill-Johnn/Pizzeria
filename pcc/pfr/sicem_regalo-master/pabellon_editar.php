<?php require_once("header_admin.php") ?>
<?php require_once("crear_ejemplo.php") ?>


<?php
  
  $xid_pab = leerParam("xid_pab","");
  $xc    = conectar(); 
  $sql   = "SELECT * FROM pabellon WHERE id_pab='$xid_pab'"; 
  $res   = mysqli_query($xc, $sql );
  $fila  = mysqli_fetch_array($res);
  	  $xid_pab = $fila[0];
	 $xnom_pab = $fila[1];
	 $xid_cem = $fila[2];
     $xtot_fil= $fila[3];
	 $xtot_col= $fila[4];
	 $xtipo_numer= $fila[5];
	 
    $sql   = "SELECT * FROM cementerio WHERE id_cem='$xid_cem'"; 
  	$res   = mysqli_query($xc, $sql );
  	$fila  = mysqli_fetch_array($res);
  	 $xid_cem = $fila[0];
	 $xnom_cem = $fila[1];

  desconectar( $xc );
?>
<div id="body">
		<div class="cem">
<h8>Editar Pabellon</h8>
<hr>

<script type="text/javascript" src="formly.js"></script>
<link rel="stylesheet" href="formly.css" type="text/css" />
</script>


<form method=post action=pabellon_grabar.php id="BetaSignup" width="600px">
  <input type=hidden name=tipo value="UPDATE">
     <input type=hidden name=xid_cem value="<?php echo $xid_cem;  ?>">

  <table>
    
    <tr> <th>Id de Pabellon: </th>
         <td><input type=text name=xid_pab size=10  value="<?php echo $xid_pab;  ?>" readonly=yes></td> </tr>
    <tr> <th>Nombre de Pabellon: </th>
         <td><input type=text name=xnom_pab size=10 value="<?php echo $xnom_pab; ?>"></td> </tr>
    <tr> <th>Nro. de Filas: </th>
         <td><input type=text name=xtot_fil size=40 value="<?php echo $xtot_fil; ?>"></td> </tr>
     <tr> <th> Nro. de Columnas: </th> <td> <input type=text name=xtot_col size=15 value="<?php echo $xtot_col; ?>">
        </td> </tr>
       <tr><th>Tipo de Numeracion: </th>
       <td><select name=xtipo_numer size=1>
             <option value="<?php echo $xtipo_numer; ?>"><?php echo $xtipo_numer; ?></option>
             <option value=A>A</option>
             <option value=B>B</option>
             <option value=C>C</option>
             <option value=D>D</option>
             
           </select>
       </td>
   </tr>
   
 
   
         <td><input type=submit value=Grabar></td> </tr>
  </table>
</form>

<form>
<table  align="center" >
  		<tr> <th> Tipo A: <?php crear_A(3,4); ?> </td>
         <th> Tipo B: <?php crear_B(3,4); ?></td> 
         <th> Tipo C: <?php crear_C(3,4); ?></td>
        <th> Tipo D: <?php crear_D(3,4); ?></td> </tr>
         
  </table>
		
</form>

<script>
$(document).ready(function()
  { $('#BetaSignup').formly({'onBlur':false, 'theme':'Light'}); });
</script>
<?php require_once("footer.php") ?>