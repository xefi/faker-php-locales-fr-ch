<?php

namespace Xefi\Faker\FrCh\Tests\Unit;

use Xefi\Faker\Container\Container;

class TestCase extends \PHPUnit\Framework\TestCase
{
    protected Container $faker;

    protected function setUp(): void
    {
        Container::packageManifestPath('/tmp/packages.php');

        (new \Xefi\Faker\FrCh\FakerFrChServiceProvider())->boot();

        $this->faker = (new Container(false))->locale('fr_CH');
    }
}
