<?php require_once("header.php") ?>

<?php
  $xc   = conectar();
  //$resg = mysqli_query("SELECT * FROM gerencia ORDER BY nomger");
  $resu = mysqli_query($xc,"SELECT * FROM pabellon ORDER BY nom_pab");

  desconectar($xc);
?>
<script type="text/javascript" src="formly.js"></script>

<link rel="stylesheet" href="formly.css" type="text/css" />
</script>
	<div id="body">
		<div class="cem">
        <h8>Seleccione un tipo de reporte:</h8>
<hr>
<ol>


        <div align="center">
      
      <form method=post  target="_blank" id="BetaSignup" width="600px" title="Reporte de General">

           <input type=submit onclick = "this.form.action = 'reportes_general.php'" value="       Reporte General      ">
           
           
     </form>
     
     <form method=post  target="_blank" id="BetaSignup4" width="600px" title="Deudas Vencidas">

           <input type=submit onclick = "this.form.action = 'reporte_deudas_vencidas.php'" value="       Deudas Vencidas      ">
           
           
     </form>
      
     
    
   
   <form method=post  title="Reporte de Nichos Desocupados" target="_blank"  id="BetaSignup1" width="600px">
               <tr><th>Seleccione Pabellon: </th>
                   <td><select name=xid_pab size=1>
                         <option value=0>Elija Pabellon</option>
                         <?php
                            while( $fila = mysqli_fetch_array( $resu ) ) {
                               $xid_pab = $fila[0];
                               $xnom_pab = $fila[1];
                               echo "<option value=$xid_pab>$xnom_pab</option>";
                            }
                         ?> 
                       </select>
                   </td>
               </tr>
            <p>              &nbsp; &nbsp; &nbsp; &nbsp;
                       
              <input type=submit onclick = "this.form.action = 'reportes_vacios_general.php'" value="General Vacios">
              <input type=submit onclick = "this.form.action = 'reportes_vacios_pabellon.php'" value="Generar">
            </p>
          
    </form>
    
        
    
          </div>
    
   
    
</ol>


<script>
$(document).ready(function()
  { $('#BetaSignup').formly({'onBlur':false, 'theme':'Light'}); });
</script>
<script>
$(document).ready(function()
  { $('#BetaSignup1').formly({'onBlur':false, 'theme':'Light'}); });
</script>
<script>
$(document).ready(function()
  { $('#BetaSignup8').formly({'onBlur':false, 'theme':'Light'}); });
</script>
<script>
$(document).ready(function()
  { $('#BetaSignup7').formly({'onBlur':false, 'theme':'Light'}); });
</script>
<script>
$(document).ready(function()
  { $('#BetaSignup6').formly({'onBlur':false, 'theme':'Light'}); });
</script>

<script>
$(document).ready(function()
  { $('#BetaSignup2').formly({'onBlur':false, 'theme':'Light'}); });
</script>
<script>
$(document).ready(function()
  { $('#BetaSignup3').formly({'onBlur':false, 'theme':'Light'}); });
</script>
<script>
$(document).ready(function()
  { $('#BetaSignup4').formly({'onBlur':false, 'theme':'Light'}); });
</script>
<script>
$(document).ready(function()
  { $('#BetaSignup5').formly({'onBlur':false, 'theme':'Light'}); });
</script>
<script>
$(document).ready(function()
  { $('#BetaSignup9').formly({'onBlur':false, 'theme':'Light'}); });
</script>
<script>
$(document).ready(function()
  { $('#BetaSignup10').formly({'onBlur':false, 'theme':'Light'}); });
</script>


<?php require_once("footer.php") ?>