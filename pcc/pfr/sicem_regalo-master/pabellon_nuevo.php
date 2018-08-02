<?php require_once("header_admin.php") ?>
<?php require_once("crear_ejemplo.php") ?>


<?php
  $xc  = conectar();
	$xid_cem = leerParam("xid_cem","");
    
?>
<div id="body">
		<div class="cem">
<h8>Nuevo Pabellon</h8>
<hr>

<script type="text/javascript" src="formly.js"></script>
<link rel="stylesheet" href="formly.css" type="text/css" />
</script>


<form method=post action=pabellon_grabar.php id="BetaSignup" width="800px" >
  <input type=hidden name=tipo value="INSERT">
   <input type=hidden name=xid_cem value="<?php echo $xid_cem;  ?>">
  <table  align="center" >
  		<tr> <th> Nombre de Pabellon: </th> <td> <input type=text name=xnom_pab size=100 >
            </td> </tr>
                <tr> <th> Nro de Filas: </th> <td> <input type=text name=xtot_fil size=10 >
            </td> </tr>
        <tr> <th> Nro de Columnas: </th> <td> <input type=text name=xtot_col size=10 >
        </td> </tr>
           
        <tr><th>Tipo de Numeracion: </th>
       <td><select name=xtipo_numer size=1>
             <option value=A>A</option>
             <option value=B>B</option>
             <option value=C>C</option>
             <option value=D>D</option>
             
           </select>
       </td>
   </tr>
    <tr> 
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
</script><?php require_once("footer.php") ?>