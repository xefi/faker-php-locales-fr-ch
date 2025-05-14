<?php

namespace Xefi\Faker\FrCh\Extensions;

use Xefi\Faker\Extensions\Extension;

class CompanyExtension extends Extension
{
    private array $companies = [
        "Migros SA", "Nestlé Suisse SA", "PostFinance AG", "Credit Suisse Group AG",
        "Swisscom SA", "Hôpitaux Universitaires de Genève", "Université de Lausanne",
        "EPFL Lausanne", "Banque Cantonale Vaudoise", "SIG Genève",
        "Manor SA", "CFF – Chemins de fer fédéraux suisses", "Romande Energie SA",
        "Retraites Populaires", "CHUV – Centre hospitalier universitaire vaudois",
        "Helvetia Assurances", "Groupe Mutuel", "Swiss Life Suisse",
        "Rolex SA", "Logitech International", "Richemont SA",
        "Givaudan SA", "Université de Genève", "Banque Cantonale de Genève",
        "Tamedia Publications", "Romandie Technologies", "Vaudoise Assurances",
        "BCN – Banque Cantonale Neuchâteloise", "Groupe Coop", "Alpiq SA"
    ];

    public function company(): string
    {
        return $this->pickArrayRandomElement($this->companies);
    }

    public function companyNumber(): string
    {
        $block1 = $this->randomizer->getInt(100, 999);
        $block2 = $this->randomizer->getInt(100, 999);
        $block3 = $this->randomizer->getInt(100, 999);
        return sprintf('CHE-%d.%d.%d', $block1, $block2, $block3);
    }

    public function vat(): string
    {
        return $this->companyNumber() . ' TVA';
    }
}
