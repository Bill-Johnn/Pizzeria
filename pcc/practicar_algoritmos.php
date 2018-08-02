<!--<form name="form1" method="post" action="javascript:enviar(this.form1)">
Texto a enviar 
<input type="text" name="textfield">
<input type="submit" name="Submit" value="Submit">
</form>


<script type="text/javascript">function enviar(formul)
{
var nomb = formul.textfield.value 
if (nomb.toLowerCase() != nomb.toUpperCase())
      location = "destino.html"+nomb
else
       alert("No es entrado ningún nombre") 
}
</script>-->

<?php
date_default_timezone_set('America/Lima');

$hora1 = strtotime( "23:00:00" );
$hora2 = strtotime( "20:00:00" );

if( $hora1 > strtotime(date("G:i:s")) ) {
    echo '
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
			<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.1/jquery.jgrowl.min.css" />
			<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.1/jquery.jgrowl.min.js"></script>

			$.jGrowl("Hello world!",{ life : 2000})'
			;
} else {
    echo '$hora2 es mayor a $hora1';
} 

?>

<!--<script type="text/javascript">
document.getElementById('alert').innerHTML='<b>Please wait, Your download will start soon!!!</b>'; 
setTimeout(function() {document.getElementById('alrt').innerHTML='';},5000);
</script>

<div id='alrt' style="fontWeight = 'bold'"></div>