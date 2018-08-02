<?php require_once("header_caja.php") ?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript" src="formly.js"></script>
<link rel="stylesheet" href="formly.css" type="text/css" />
</script>
<?php
$xid_dif=leerParam("xid_dif","");
	  $xid_nicho=leerParam("xid_nicho","");
		$xid_pab=leerParam("xid_pab","");
		$xnro_nicho=leerParam("xnro_nicho","");
   ?>             
    <div id="body">
		<div class="cem">
			<h8>REALIZAR TRASLADO</h8>
            

           <form method=post id="BetaSignup7" width="400px"  title="TRASLADAR DIFUNTO?" >

                        <input type=hidden name=xnro_nicho value="<?php echo $xnro_nicho; ?>">
					<input type=hidden   name=xid_pab value="<?php echo $xid_pab; ?>">
					<input type=hidden   name=xid_nicho value="<?php echo $xid_nicho; ?>">
					<input type=hidden name=xid_dif value="<?php echo $xid_dif; ?>">
                        <input type=text hidden name=xid_conv value="<?php echo $xid_conv; ?>">
                         <input type=text hidden name=xcuota value="<?php echo $xcuota; ?>">
                       <input type=submit onclick = "this.form.action = 'comprar_nicho_traslado.php'" name=xenvio  value="       SI       "  > 
                       <input type=submit onclick = "this.form.action = 'consulta_nicho.php'" name=xenvio  value="       NO       "  > 
                       
                       </form>
                        
                        
    </div></div>
    
 <script>
 $(document).ready(function()
{ $('#BetaSignup7').formly({'onBlur':false, 'theme':'Light'}); });
</script>      
                

<?php require_once("footer.php") ?>