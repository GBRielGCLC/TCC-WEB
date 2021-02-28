<?php
$valores = array('530077.99','31459.89', '2899.39', '600.51', '13', '9', '0.25');
$formatter = new NumberFormatter('pt_BR',  NumberFormatter::CURRENCY);
foreach($valores as $item){
    echo  $formatter->formatCurrency($item, 'BRL') . '<br>';
}

$valor = .5;
$formatter = new NumberFormatter('pt-BR', NumberFormatter:: CURRENCY);
$a = $formatter->formatCurrency($valor, 'BRL');
echo $a;