<?php require_once("header_caja.php") ?>
<script type="text/javascript" src="formly.js"></script>
<link rel="stylesheet" href="formly.css" type="text/css" />

<style type="text/css">
<!--
@import url("style_tables.css");
-->
</style>
<?php
$xc    = conectar(); 
 
 $xid_conv=leerParam("xid_conv","");
 $xcuota=leerParam("xcuota","");
 
 $sql = "UPDATE deudas SET estado='PAGADO' WHERE id_conv='$xid_conv' AND cuotas='$xcuota'";
				mysqli_query($xc, $sql );
				
				header("Location:pagar_cuotas.php?xid_conv=$xid_conv");



  desconectar( $xc );
 
?>
