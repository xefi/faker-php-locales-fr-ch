<?php

namespace Xefi\Faker\FrCh\Extensions;

use Xefi\Faker\Extensions\ColorsExtension as BaseColorsExtension;

class ColorsExtension extends BaseColorsExtension
{
    public function getLocale(): string|null
    {
        return 'fr_CH';
    }

    protected array $safeColorNames = [
        'Noir', 'Marron', 'Vert', 'Bleu marine', 'Olive',
        'Pourpre', 'Sarcelle', 'Vert citron', 'Bleu', 'Argent',
        'Gris', 'Jaune', 'Fuchsia', 'Aqua', 'Blanc',
    ];

    protected array $colorNames = [
        'Bleu Alice', 'Blanc antique', 'Aqua', 'Aigue-marine', 'Azur',
        'Beige', 'Bisque', 'Noir', 'Blanc cassé', 'Bleu',
        'Bleu violet', 'Brun', 'Bois brut', 'Bleu cadet', 'Chartreuse',
        'Chocolat', 'Corail', 'Bleuet', 'Jaune maïs', 'Cramoisi',
        'Cyan', 'Bleu foncé', 'Cyan foncé', 'Or foncé', 'Gris foncé',
        'Vert foncé', 'Kaki foncé', 'Magenta foncé', 'Olive foncé', 'Orange foncé',
        'Orchidée foncée', 'Rouge foncé', 'Saumon foncé', 'Vert mer foncé', 'Bleu ardoise foncé',
        'Gris ardoise foncé', 'Turquoise foncé', 'Violet foncé', 'Rose profond', 'Bleu ciel profond',
        'Gris sombre', 'Gris terne', 'Bleu électrique', 'Rouge brique', 'Blanc floral',
        'Vert forêt', 'Fuchsia', 'Gainsboro', 'Blanc fantôme', 'Or',
        'Gris', 'Vert', 'Jaune vert', 'Miellat', 'Rose vif',
        'Rouge indien', 'Indigo', 'Ivoire', 'Kaki', 'Lavande',
        'Lavande rosée', 'Vert pelouse', 'Vert citron', 'Bleu clair', 'Corail clair',
        'Cyan clair', 'Jaune pâle', 'Gris clair', 'Vert clair', 'Rose clair',
        'Saumon clair', 'Vert mer clair', 'Bleu ciel clair', 'Gris ardoise clair', 'Bleu acier clair',
        'Jaune clair', 'Citron vert', 'Lin', 'Magenta', 'Jaune',
        'Marron', 'Aigue-marine moyenne', 'Bleu moyen', 'Orchidée moyenne', 'Pourpre moyen',
        'Vert mer moyen', 'Bleu ardoise moyen', 'Vert printemps moyen', 'Turquoise moyen', 'Violet rouge moyen',
        'Bleu minuit', 'Crème menthe', 'Rose brumeux', 'Mocassin', 'Blanc navajo',
        'Bleu marine', 'Dentelle ancienne', 'Olive', 'Kaki olive', 'Orange',
        'Rouge orangé', 'Orchidée', 'Vert pâle', 'Turquoise pâle', 'Violet rouge pâle',
        'Papaye clair', 'Pêche clair', 'Pérou', 'Rose', 'Prune',
        'Bleu poudre', 'Pourpre', 'Rouge', 'Brun rosé', 'Bleu royal',
        'Brun selle', 'Saumon', 'Brun sableux', 'Vert mer', 'Coquille',
        'Terre de Sienne', 'Argent', 'Bleu ciel', 'Bleu ardoise', 'Gris ardoise',
        'Neige', 'Vert printemps', 'Bleu acier', 'Brun clair', 'Sarcelle',
        'Chardon', 'Tomate', 'Turquoise', 'Violet', 'Blé',
        'Blanc', 'Blanc fumé',
    ];
}
