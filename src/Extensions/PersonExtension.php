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

    public function avs(bool $formatted = false): string
    {
        $avs = '756' . sprintf('%09d', $this->randomizer->getInt(000000000, 999999999));

        $fullNumber = $avs;
        $avs .= $this->swissModulo10Recursive($fullNumber);

        if ($formatted) {
            $avs = substr($avs, 0, 3) . '.' . substr($avs, 3, 4) . '.' . substr($avs, 7, 4) . '.' . substr($avs, 11, 2);
        }

        return $avs;
    }

    protected function swissModulo10Recursive(string $number): int
    {
        // ISO 7064 Mod 10 Rec
        $table = [0, 9, 4, 6, 8, 2, 7, 1, 3, 5];
        $carry = 0;

        foreach (str_split($number) as $digit) {
            $carry = $table[($carry + (int)$digit) % 10];
        }

        return (10 - $carry) % 10;
    }
}
