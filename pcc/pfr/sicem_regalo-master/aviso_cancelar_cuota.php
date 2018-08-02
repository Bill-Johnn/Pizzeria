<?php require_once("header_caja.php") ?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript" src="formly.js"></script>
<link rel="stylesheet" href="formly.css" type="text/css" />
</script>
<?php
$xid_conv=leerParam("xid_conv","");
 $xcuota=leerParam("xcuota","");
   ?>             
    <div id="body">
		<div class="cem">
			<h8>CANCELAR CUOTA</h8>
            

           <form method=post id="BetaSignup7" width="400px"  title="CANCELAR CUOTA?" >

                        
                        <input type=text hidden name=xid_conv value="<?php echo $xid_conv; ?>">
                         <input type=text hidden name=xcuota value="<?php echo $xcuota; ?>">
                       <input type=submit onclick = "this.form.action = 'cancelar_cuota.php'" name=xenvio  value="       SI       "  > 
                       <input type=submit onclick = "this.form.action = 'pagar_cuotas.php'" name=xenvio  value="       NO       "  > 
                       
                       </form>
                        
                        
    </div></div>
    
 <script>
 $(document).ready(function()
{ $('#BetaSignup7').formly({'onBlur':false, 'theme':'Light'}); });
</script>      
                

<?php require_once("footer.php") ?>