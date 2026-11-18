<?php

namespace Xefi\Faker\FrCh\Extensions;

use Xefi\Faker\Extensions\PhoneExtension as BasePhoneExtension;

class PhoneExtension extends BasePhoneExtension
{
    public string $defaultPrefix = '0';

    public string $indicator = '+41';

    /**
     * Get the locale handled by this extension.
     *
     * @return string|null
     */
    public function getLocale(): ?string
    {
        return 'fr_CH';
    }

    protected array $landlineFormats = [
        '21{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '22{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '24{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '26{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '27{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '32{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
    ];

    protected array $cellFormats = [
        '75{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '76{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '77{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '78{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '79{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
    ];

    /**
     * Generate a phone number, keeping a separator between the indicator and the number.
     *
     * @param string|null $format
     * @param string      $separator
     * @param string|null $prefix
     *
     * @return string
     */
    public function phoneNumber(?string $format = null, string $separator = '', ?string $prefix = null): string
    {
        if ($prefix === $this->indicator) {
            $prefix .= $separator;
        }

        return parent::phoneNumber($format, $separator, $prefix);
    }
}
