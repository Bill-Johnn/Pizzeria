<?php require_once("header_caja.php") ?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript" src="formly.js"></script>
<link rel="stylesheet" href="formly.css" type="text/css" />
</script>
<?php
 $xid_pend_tras=leerParam("xid_pend_tras","");
   ?>             
    <div id="body">
		<div class="cem">
			<h8>PAGAR</h8>
            

           <form method=post id="BetaSignup7" width="400px"  title="CANCELAR?" >

						<input type="hidden" name=xid_pend_tras value="<?php echo $xid_pend_tras;  ?>">
                        
                        
                       <input type=submit onclick = "this.form.action = 'pagar_traslado.php'" name=xenvio  value="       SI       "  > 
                       <input type=submit onclick = "this.form.action = 'pagos_traslados.php'" name=xenvio  value="       NO       "  > 
                       
                       </form>
                        
                        
    </div></div>
    
 <script>
 $(document).ready(function()
{ $('#BetaSignup7').formly({'onBlur':false, 'theme':'Light'}); });
</script>      
                

<?php require_once("footer.php") ?>