<?php

namespace Xefi\Faker\FrCh\Extensions;

use Xefi\Faker\Extensions\Extension;

class AddressExtension extends Extension
{
    public function getLocale(): string|null
    {
        return 'fr_CH';
    }

    protected $provinces = [
        'Vaud', 'Genève', 'Fribourg', 'Neuchâtel', 'Jura', 'Valais', 'Berne', 'Tessin',
    ];

    protected $regions = [
        'Suisse romande', 'Suisse alémanique', 'Suisse italienne',
    ];

    protected $cities = [
        'Lausanne', 'Genève', 'Fribourg', 'Neuchâtel', 'Sion', 'Delémont', 'Yverdon-les-Bains', 'Bienne', 'Vevey',
        'Montreux', 'Nyon', 'Payerne', 'Morges', 'Martigny', 'Sierre', 'Bulle', 'La Chaux-de-Fonds', 'Le Locle',
        'Carouge', 'Versoix', 'Renens', 'Ecublens', 'Onex',
    ];

    protected $streetTypes = ['Rue', 'Avenue', 'Boulevard', 'Chemin', 'Impasse', 'Place', 'Quai', 'Allée', 'Route'];

    protected $streetNames = [
        'Victor Hugo', 'Jean Jaurès', 'de la Paix', 'des Lilas', 'du Sapin', 'de l\'Église', 'de la République',
        'du Rhône', 'Molière', 'Voltaire', 'Pasteur', 'des Alpes', 'de la Gare', 'des Écoles', 'de la Poste',
        'des Prés', 'des Vignes', 'des Platanes', 'du Simplon', 'de la Forêt', 'de la Fontaine', 'du Collège',
        'des Cerisiers', 'du Marché', 'des Peupliers', 'de Bellevue', 'des Marronniers', 'du Signal', 'du Lac',
    ];

    public function region(): string
    {
        return $this->pickArrayRandomElement($this->regions);
    }

    public function province(): string
    {
        return $this->pickArrayRandomElement($this->provinces);
    }

    public function city(): string
    {
        return $this->pickArrayRandomElement($this->cities);
    }

    public function postcode(): int
    {
        return $this->randomizer->getInt(1000, 9658);
    }

    public function houseNumber(): int
    {
        return $this->randomizer->getInt(1, 200);
    }

    public function streetName(): string
    {
        $streetType = $this->pickArrayRandomElement($this->streetTypes);
        $name = $this->pickArrayRandomElement($this->streetNames);

        return sprintf('%s %s', $streetType, $name);
    }

    public function streetAddress(): string
    {
        $streetName = $this->streetName();
        $houseNumber = $this->houseNumber();

        return sprintf('%s %d', $streetName, $houseNumber);
    }

    public function fullAddress(): string
    {
        $streetAddress = $this->streetAddress();
        $postcode = $this->postcode();
        $city = $this->city();
        return sprintf('%s, %s %s', $streetAddress, $postcode, $city);
    }
}
