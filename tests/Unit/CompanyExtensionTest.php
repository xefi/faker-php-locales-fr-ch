<?php

namespace Unit;

use Random\Randomizer;
use Xefi\Faker\FrCh\Extensions\CompanyExtension;
use Xefi\Faker\FrCh\Tests\Unit\TestCase;

final class CompanyExtensionTest extends TestCase
{
    protected array $companies = [];

    protected function setUp(): void
    {
        parent::setUp();

        $companyExtension = new CompanyExtension(new Randomizer());
        $this->companies = (new \ReflectionClass($companyExtension))->getProperty('companies')->getValue($companyExtension);
    }

    public function testCompany()
    {
        $results = [];
        for ($i = 0; $i < count($this->companies); $i++) {
            $results[] = $this->faker->unique()->company();
        }

        $this->assertEqualsCanonicalizing(
            $this->companies,
            $results
        );
    }

    public function testCompanyNumber()
    {
        for ($i = 0; $i < 100; $i++) {
            $result = $this->faker->unique()->companyNumber();

            $this->assertIsString($result);
            $this->assertMatchesRegularExpression('/^CHE-\d{3}\.\d{3}\.\d{3}$/', $result);
        }
    }

    public function testVat()
    {
        for ($i = 0; $i < 100; $i++) {
            $result = $this->faker->unique()->vat();

            $this->assertIsString($result);
            $this->assertMatchesRegularExpression('/^CHE-\d{3}\.\d{3}\.\d{3} TVA$/', $result);
        }
    }
}
