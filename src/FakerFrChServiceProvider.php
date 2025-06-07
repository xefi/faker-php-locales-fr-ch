<?php

namespace Xefi\Faker\FrCh;

use Xefi\Faker\FrCh\Extensions\AddressExtension;
use Xefi\Faker\FrCh\Extensions\ColorsExtension;
use Xefi\Faker\FrCh\Extensions\CompanyExtension;
use Xefi\Faker\FrCh\Extensions\FinancialExtension;
use Xefi\Faker\FrCh\Extensions\PersonExtension;
use Xefi\Faker\FrCh\Extensions\TextExtension;
use Xefi\Faker\Providers\Provider;

class FakerFrChServiceProvider extends Provider
{
    public function boot(): void
    {
        $this->extensions([
            AddressExtension::class,
            ColorsExtension::class,
            CompanyExtension::class,
            FinancialExtension::class,
            PersonExtension::class,
            TextExtension::class,
        ]);
    }
}
