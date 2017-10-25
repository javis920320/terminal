<?php



$cadena_numerica = 4239.57;
setlocale(LC_MONETARY,"es_ES");
echo money_format("%.2n", $cadena_numerica);

?>