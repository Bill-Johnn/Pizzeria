<?php require_once("header.php") ?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript" src="formly.js"></script>
<link rel="stylesheet" href="formly.css" type="text/css" />
</script>
<?php
$xid_nicho=leerParam("xid_nicho","");
   ?>             
    <div id="body">
		<div class="cem">
			<h8>DESOCUPAR</h8>
            

           <form method=post id="BetaSignup7" width="400px"  title="ESTA SEGURO?" >

                        
                        <input type="hidden" name=xid_nicho size=15 value="<?php echo $xid_nicho;  ?>" readonly >
                       <input type=submit onclick = "this.form.action = 'desocupar_nicho.php'" name=xenvio  value="       SI       "  > 
                       <input type=submit onclick = "this.form.action = 'consulta_nicho.php'" name=xenvio  value="       NO       "  > 
                       
                       </form>
                        
                        
    </div></div>
    
 <script>
 $(document).ready(function()
{ $('#BetaSignup7').formly({'onBlur':false, 'theme':'Light'}); });
</script>      
                

<?php require_once("footer.php") ?>