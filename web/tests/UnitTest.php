<?php

class UnitTest extends TestCase
{
    public function testReserveWord_GivenNameMatchReserveWord_ExpectReturnTrue()
    {
        $reserveWordProvider = \Mockery::mock(\App\Helpers\ReserveWordProviderInterface::class)
            ->shouldReceive('reserveWords')
            ->andReturn(['chaiyapong', '3dsinteractive'])
            ->getMock();

        $reserveWord = new \App\Helpers\ReserveWord($reserveWordProvider);
        $isContains = $reserveWord->isContainsReserveWord('my name is chaiyapong');

        $this->assertTrue($isContains, 'Reserve word not found');
    }

    public function testReserveWord_GivenNameNotMatchReserveWord_ExpectReturnFalse()
    {
        $reserveWordProvider = \Mockery::mock(\App\Helpers\ReserveWordProviderInterface::class)
            ->shouldReceive('reserveWords')
            ->andReturn(['chaiyapong', '3dsinteractive'])
            ->getMock();

        $reserveWord = new \App\Helpers\ReserveWord($reserveWordProvider);
        $isContains = $reserveWord->isContainsReserveWord('my name is bejita');

        $this->assertFalse($isContains, 'Reserve word should not be found');
    }
}