<?php require_once("header_admin.php") ?>


<?php
  
  $xcod  = $_SESSION['codigo'];
 
 
?>
<script type="text/javascript" src="formly.js"></script>
<link rel="stylesheet" href="formly.css" type="text/css" />
</script>
<hr>
<ol>
<form method=post action=generar_backup.php id="BetaSignup1" width="200px" >
       <p>
         <input type=submit name=xgenerar value=Generar>
       </p>
</form>

 
<script>
$(document).ready(function()
  { $('#BetaSignup').formly({'onBlur':false, 'theme':'Light'}); });
</script>
<script>
$(document).ready(function()
  { $('#BetaSignup1').formly({'onBlur':false, 'theme':'Light'}); });
</script>
<?php require_once("footer.php") ?>