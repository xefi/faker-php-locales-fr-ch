<?php

namespace Unit;

use Xefi\Faker\Calculators\Iban;
use Xefi\Faker\FrCh\Tests\Unit\TestCase;

final class FinancialExtensionTest extends TestCase
{
    public function testIban()
    {
        $iban = $this->faker->iban();

        $this->assertEquals(21, strlen($iban));
        $this->assertStringStartsWith('CH', $iban);
        $this->assertTrue(Iban::isValid($iban));
    }
}
