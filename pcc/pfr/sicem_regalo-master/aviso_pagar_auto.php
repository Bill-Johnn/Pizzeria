<?php require_once("header_caja.php") ?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript" src="formly.js"></script>
<link rel="stylesheet" href="formly.css" type="text/css" />
</script>
<?php
 $xid_auto=leerParam("xid_auto","");
   ?>             
    <div id="body">
		<div class="cem">
			<h8>PAGAR AUTORIZACIÓN</h8>
            

           <form method=post id="BetaSignup7" width="400px"  title="CANCELAR AUTORIZACIÓN?" >

                        
                        <input type=text hidden name=xid_auto value="<?php echo $xid_auto;  ?>">
                       
                       <input type=submit onclick = "this.form.action = 'pagar_auto.php'" name=xenvio  value="       SI       "  > 
                       <input type=submit onclick = "this.form.action = 'pend_autori.php'" name=xenvio  value="       NO       "  > 
                       
                       </form>
                        
                        
    </div></div>
    
 <script>
 $(document).ready(function()
{ $('#BetaSignup7').formly({'onBlur':false, 'theme':'Light'}); });
</script>      
                

<?php require_once("footer.php") ?>