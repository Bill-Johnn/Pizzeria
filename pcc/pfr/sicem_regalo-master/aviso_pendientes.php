<?php require_once("header_caja.php") ?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript" src="formly.js"></script>
<link rel="stylesheet" href="formly.css" type="text/css" />
</script>
<?php
 $xcod_pendiente=leerParam("xid_pendiente","");
   ?>             
    <div id="body">
		<div class="cem">
			<h8>ESTA SEGURO?</h8>
            

           <form method=post id="BetaSignup7" width="400px"  title="PAGAR NICHO" >

                        
						<input type="hidden" name=xid_pendiente value="<?php echo $xcod_pendiente;  ?>">                       
                       <input type=submit onclick = "this.form.action = 'pagar.php'" name=xenvio  value="       SI       "  > 
                       <input type=submit onclick = "this.form.action = 'pendientes.php'" name=xenvio  value="       NO       "  > 
                       
                       </form>
                        
                        
    </div></div>
    
 <script>
 $(document).ready(function()
{ $('#BetaSignup7').formly({'onBlur':false, 'theme':'Light'}); });
</script>      
                

<?php require_once("footer.php") ?>