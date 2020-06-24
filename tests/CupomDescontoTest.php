<?php

namespace Test;

use App\CupomDesconto;
use PHPUnit\Framework\TestCase;

class CupomDescontoTest extends TestCase
{
    /**
     * @dataProvider dados
     */
    public function testCupomComDataValida()
    {
        $dataInicio = new \DateTime('now');
        $dataFim = new \DateTime('now');
        $dataFim->modify("+1 day");

        $cupom = new CupomDesconto(
            13.50,
            $dataInicio,
            $dataFim
        );

        $this->assertTrue($cupom->isValid());
        $this->assertEquals(13.50, $cupom->getValor());
    }

    public function testCupomComDataInvalida()
    {
        $dataInicio =  new \DateTime('now');
        $dataFim =  new \DateTime('now');

        $cupom = new CupomDesconto(
            13.50,
            $dataInicio,
            $dataFim
        );

        $this->assertFalse($cupom->isValid());
        $this->assertEquals(0, $cupom->getValor());
    }
}
