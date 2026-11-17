<?php

namespace Xefi\Faker\FrCh\Tests\Unit;

final class PhoneExtensionTest extends TestCase
{
    public function testPhoneNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^0(2[12467]|32|7[5-9])\d{7}$/', $this->faker->phoneNumber());
        }
    }

    public function testLandlinePhoneNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^0(2[12467]|32)-\d{3}-\d{2}-\d{2}$/', $this->faker->dashedLandlinePhoneNumber());
        }
    }

    public function testCellPhoneNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^07[5-9] \d{3} \d{2} \d{2}$/', $this->faker->spacedCellPhoneNumber());
        }
    }

    public function testIndicatoredPhoneNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^\+41(2[12467]|32|7[5-9])\d{7}$/', $this->faker->indicatoredPhoneNumber());
        }
    }
}
