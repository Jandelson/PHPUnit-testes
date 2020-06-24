<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\CupomDesconto;

$dataInicio = new \DateTime('now');
$dataFim = new \DateTime('now');
$dataFim->modify("+1 day");

$cupom = new CupomDesconto(33, $dataInicio, $dataFim);

$valor =  $cupom->getValor();

if ($cupom->isValid()) {
    echo 'Valor: ' . $valor;
}
