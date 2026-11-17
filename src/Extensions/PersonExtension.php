<?php

namespace Xefi\Faker\FrCh\Extensions;

use Xefi\Faker\Extensions\PersonExtension as BasePersonExtension;

class PersonExtension extends BasePersonExtension
{
    public function getLocale(): ?string
    {
        return 'fr_CH';
    }

    protected $firstNameMale = [
        'Luca', 'Noah', 'Léo', 'Ethan', 'Nathan', 'Liam', 'Matteo', 'Gabriel', 'Julien', 'Maxime',
        'Bastien', 'Florian', 'Adrien', 'Samuel', 'Robin', 'Killian', 'Mathis', 'Alexandre', 'Sacha', 'Elias',
    ];

    protected $firstNameFemale = [
        'Emma', 'Lina', 'Mia', 'Léa', 'Chloé', 'Anna', 'Zoé', 'Camille', 'Jade', 'Sara',
        'Laura', 'Julia', 'Elena', 'Noémie', 'Lucie', 'Nina', 'Lisa', 'Clara', 'Amélie', 'Alicia',
    ];

    protected $lastName = [
        'Müller', 'Meier', 'Schmid', 'Keller', 'Weber', 'Huber', 'Moser', 'Gerber', 'Steiner', 'Baumann',
        'Fischer', 'Brunner', 'Zimmermann', 'Schneider', 'Martin', 'Léonard', 'Perret', 'Mercier', 'Dubois', 'Favre',
        'Durand', 'Rossier', 'Mayor', 'Berger', 'Rochat', 'Richard', 'Gillet', 'Delacroix', 'Rey', 'Monnier',
    ];

    protected $titleMale = ['M.', 'Dr.', 'Prof.', 'Me'];
    protected $titleFemale = ['Mme', 'Dr.', 'Prof.', 'Me'];

    /**
     * Return a Swiss social security number (AHV) with a valid EAN-13 check digit.
     *
     * @param bool $formatted Format the number as 756.XXXX.XXXX.XX
     *
     * @return string
     */
    public function avs(bool $formatted = false): string
    {
        $avs = '756'.$this->randomizer->getBytesFromString('0123456789', 9);
        $avs .= $this->ean13CheckDigit($avs);

        if ($formatted) {
            $avs = sprintf('%s.%s.%s.%s', substr($avs, 0, 3), substr($avs, 3, 4), substr($avs, 7, 4), substr($avs, 11, 2));
        }

        return $avs;
    }

    /**
     * Compute the EAN-13 check digit of a twelve-digit number.
     *
     * @param string $number
     *
     * @return int
     */
    protected function ean13CheckDigit(string $number): int
    {
        $sum = 0;

        foreach (str_split($number) as $index => $digit) {
            $sum += (int) $digit * ($index % 2 === 0 ? 1 : 3);
        }

        return (10 - $sum % 10) % 10;
    }
}
