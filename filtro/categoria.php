<?php 
sleep (1);
    echo '<option value="0"> Selecione a categoria </option>';
    $cat = $_POST['categoria'];
    echo '<option value="'.$cat.'">'.$cat.' </option>';
    echo '<option value="Residencial">Residencial </option>';
    echo '<option value="Comercial">Comercial </option>';

?>