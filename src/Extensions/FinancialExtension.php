<?php

namespace Xefi\Faker\FrCh\Extensions;

use Xefi\Faker\Extensions\FinancialExtension as BaseFinancialExtension;

class FinancialExtension extends BaseFinancialExtension
{
    public function getLocale(): string|null
    {
        return 'fr_CH';
    }

    public function iban(?string $countryCode = null, ?string $format = null): string
    {
        if ($countryCode === null) {
            $countryCode = 'CH';
        }

        if ($format === null) {
            $format = str_repeat('{d}', 17);
        }

        return parent::iban($countryCode, $format);
    }
}
