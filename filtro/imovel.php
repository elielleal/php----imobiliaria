<?php 
sleep (1) ;
echo '<option value="0"> Selecione o tipo de Imóvel </option>';
$imovel = $_POST['imovel'];
echo '<option value="'.$imovel.'">'.$imovel.'</option>';
echo '<option value="Casa">Casa</option>';
echo '<option value="Apartamento">Apartamento</option>';
 ?>