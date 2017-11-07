<?php 
sleep (1) ;
echo '<option value="0"> Selecione o tipo de Imóvel </option>';
$bairro = $_POST['bairro'];
echo '<option value="'.$bairro.'">'.$bairro.'</option>';
echo '<option value="Jardim Paraná">Jardim Paraná</option>';
echo '<option value="Vila Progresso">Vila Progresso</option>';
?>