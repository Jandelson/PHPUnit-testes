<?php

namespace App;

use Datetime;

class CupomDesconto
{
    private $valor;
    private $dataHoraInicio;
    private $dataHoraFim;

    public function __construct(
        float $valor,
        DateTime $dataHoraInicio,
        DateTime $dataHoraFim
    ) {
        $this->valor = $valor;
        $this->dataHoraInicio = $dataHoraInicio;
        $this->dataHoraFim = $dataHoraFim;
    }

    private function dataAtual(): DateTime
    {
        return new DateTime('now');
    }

    public function isValid(): bool
    {
        if (
            $this->dataHoraInicio <= $this->dataAtual() &&
            $this->dataHoraFim > $this->dataAtual() &&
            $this->valor > 0
        ) {
            return true;
        }

        return false;
    }

    public function getValor(): float
    {
        if ($this->isValid() === true) {
            return $this->valor;
        }

        return 0;
    }
}
