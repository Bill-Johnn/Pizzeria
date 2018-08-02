<?php require_once("header_caja.php") ?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript" src="formly.js"></script>
<link rel="stylesheet" href="formly.css" type="text/css" />
</script>
<?php
/*DIFUNTO*/
$xid_sol = leerParam("xid_sol","");
		$xnom_dif = leerParam("xnom_dif","");
		$xpriape_dif=leerParam("xpriape_dif","");
		$xseguape_dif=leerParam("xseguape_dif","");
		$xfentierro=leerParam("xfentierro","");
		$xfautorizacion=leerParam("xfautorizacion","");

/*SOLICITANTE*/
		$xdni_sol=leerParam("xdni_sol","");
		$xnom_sol=leerParam("xnom_sol","");
		$xdir_sol=leerParam("xdir_sol","");
		$xcel_sol=leerParam("xcel_sol","");

/*NICHO*/
		$xid_nicho = leerParam("xid_nicho","");
		$xnro_nicho=leerParam("xnro_nicho","");
		$xid_pab=leerParam("xid_pab","");
		$xcost_nicho=leerParam("xcost_nicho","");
		$xnom_cem=leerParam("xnom_cem","");
		$xnom_pab=leerParam("xnom_pab","");
		
		$xnom_alcalde=leerParam("xnom_alcalde","");
		$xdni_alcalde=leerParam("xdni_alcalde","");
		$xdir_alcalde=leerParam("xdir_alcalde","");
		
		
		$xcuota_ini=leerParam("xcuota_ini","");
		$xnro_cuotas=leerParam("xnro_cuotas","");
   ?>             
    <div id="body">
		<div class="cem">
			<h8>COMPRAR NICHO - CONVENIO</h8>
            

           <form method=post id="BetaSignup7" width="400px"  title="REALIZAR CONVENIO?" >

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
                         
                         <input type=text hidden name=xnom_cem value="<?php echo $xnom_cem; ?>">
                         <input type=text hidden name=xnom_pab value="<?php echo $xnom_pab; ?>">
                         <input type=text hidden name=xnom_alcalde value="<?php echo $xnom_alcalde; ?>">
                         <input type=text hidden name=xdni_alcalde value="<?php echo $xdni_alcalde; ?>">
                         <input type=text hidden name=xdir_alcalde value="<?php echo $xdir_alcalde; ?>">
                         <input type=text hidden name=xcuota_ini value="<?php echo $xcuota_ini; ?>">
                         <input type=text hidden name=xnro_cuotas value="<?php echo $xnro_cuotas; ?>">
                         <input type=text hidden name=xnro_cuotas_mandar value="<?php echo $xnro_cuotas; ?>">
                                            
                       <input type=submit onclick = "this.form.action = 'comprar_nicho_convenio_ticket.php'" name=xenvio  value="       SI       "  > 
                       <input type=submit onclick = "this.form.action = 'comprar_nicho_resumen_convenio.php'" name=xenvio  value="       NO       "  > 
                       
                       </form>
                        
                        
    </div></div>
    
 <script>
 $(document).ready(function()
{ $('#BetaSignup7').formly({'onBlur':false, 'theme':'Light'}); });
</script>      
                

<?php require_once("footer.php") ?>