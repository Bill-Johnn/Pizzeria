<?php require_once("header_caja.php") ?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript" src="formly.js"></script>
<link rel="stylesheet" href="formly.css" type="text/css" />
</script>
<?php
$xnom_dif = leerParam("xnom_dif","");
	    $xid_sol = leerParam("xid_sol","");
		$xpriape_dif=leerParam("xpriape_dif","");
		$xseguape_dif=leerParam("xseguape_dif","");
		$xfentierro=leerParam("xfentierro","");
		$xfautorizacion=leerParam("xfautorizacion","");
		$xdni_sol=leerParam("xdni_sol","");
		$xnom_sol=leerParam("xnom_sol","");
		$xdir_sol=leerParam("xdir_sol","");
		$xid_nicho = leerParam("xid_nicho","");
		$xid_pab=leerParam("xid_pab","");
		$xcel_sol=leerParam("xcel_sol","");
		$xnro_nicho=leerParam("xnro_nicho","");
		$xcost_nicho=leerParam("xcost_nicho","");
   ?>             
    <div id="body">
		<div class="cem">
			<h8>COMPRAR NICHO</h8>
            

           <form method=post id="BetaSignup7" width="400px"  title="REALIZAR COMPRA?" >

                        <input type=hidden name=xnom_dif value="<?php echo $xnom_dif; ?>">
					<input type=hidden   name=xid_sol value="<?php echo $xid_sol; ?>">
					<input type=hidden   name=xpriape_dif value="<?php echo $xpriape_dif; ?>">
					<input type=hidden name=xseguape_dif value="<?php echo $xseguape_dif; ?>">
                        <input type=hidden name=xfentierro value="<?php echo $xfentierro; ?>">
                         <input type=hidden name=xfautorizacion value="<?php echo $xfautorizacion; ?>">
                         <input type=hidden name=xdni_sol value="<?php echo $xdni_sol; ?>">
					<input type=hidden   name=xnom_sol value="<?php echo $xnom_sol; ?>">
					<input type=hidden   name=xdir_sol value="<?php echo $xdir_sol; ?>">
					<input type=hidden name=xid_nicho value="<?php echo $xid_nicho; ?>">
                        <input type=text hidden name=xid_pab value="<?php echo $xid_pab; ?>">
                         <input type=text hidden name=xcel_sol value="<?php echo $xcel_sol; ?>">
                          <input type=text hidden name=xnro_nicho value="<?php echo $xnro_nicho; ?>">
                         <input type=text hidden name=xcost_nicho value="<?php echo $xcost_nicho; ?>">
                       <input type=submit onclick = "this.form.action = 'comprar_nicho_ticket.php'" name=xenvio  value="       SI       "  > 
                       <input type=submit onclick = "this.form.action = 'comprar_nicho_resumen.php'" name=xenvio  value="       NO       "  > 
                       
                       </form>
                        
                        
    </div></div>
    
 <script>
 $(document).ready(function()
{ $('#BetaSignup7').formly({'onBlur':false, 'theme':'Light'}); });
</script>      
                

<?php require_once("footer.php") ?>