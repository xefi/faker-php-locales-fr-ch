<?php

namespace Xefi\Faker\FrCh\Tests\Unit;

use Random\Randomizer;
use ReflectionClass;
use Xefi\Faker\FrCh\Extensions\PersonExtension;

final class PersonExtensionTest extends TestCase
{
    protected array $firstNameMale = [];
    protected array $firstNameFemale = [];
    protected array $lastName = [];
    protected array $titleMale = [];
    protected array $titleFemale = [];

    protected function setUp(): void
    {
        parent::setUp();

        $personExtension = new PersonExtension(new Randomizer());
        $this->firstNameMale = (new ReflectionClass($personExtension))->getProperty('firstNameMale')->getValue($personExtension);
        $this->firstNameFemale = (new ReflectionClass($personExtension))->getProperty('firstNameFemale')->getValue($personExtension);
        $this->lastName = (new ReflectionClass($personExtension))->getProperty('lastName')->getValue($personExtension);
        $this->titleMale = (new ReflectionClass($personExtension))->getProperty('titleMale')->getValue($personExtension);
        $this->titleFemale = (new ReflectionClass($personExtension))->getProperty('titleFemale')->getValue($personExtension);
    }

    public function testFirstNameFemale(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->firstNameFemale); $i++) {
            $results[] = $this->faker->unique()->firstName(\Xefi\Faker\Extensions\PersonExtension::GENDER_FEMALE);
        }

        $this->assertEqualsCanonicalizing(
            $this->firstNameFemale,
            $results
        );
    }

    public function testFirstNameMale(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->firstNameMale); $i++) {
            $results[] = $this->faker->unique()->firstName(PersonExtension::GENDER_MALE);
        }

        $this->assertEqualsCanonicalizing(
            $this->firstNameMale,
            $results
        );
    }

    public function testFirstName(): void
    {
        $results = [];
        $firstnames = array_unique(array_merge($this->firstNameMale, $this->firstNameFemale));
        for ($i = 0; $i < count($firstnames); $i++) {
            $results[] = $this->faker->unique()->firstName();
        }

        $this->assertEqualsCanonicalizing(
            $firstnames,
            $results
        );
    }

    public function testLastName(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->lastName); $i++) {
            $results[] = $this->faker->unique()->lastName();
        }

        $this->assertEqualsCanonicalizing(
            $this->lastName,
            $results
        );
    }

    public function testNameMale(): void
    {
        $results = [];
        for ($i = 0; $i < 100; $i++) {
            $results[] = $this->faker->name(PersonExtension::GENDER_MALE);
        }

        foreach ($results as $result) {
            $matchesFirstName = array_filter($this->firstNameMale, function ($firstName) use ($result) {
                return str_contains($result, $firstName);
            });
            $this->assertNotEmpty($matchesFirstName, "The first part of the result '{$result}' does not match any first name.");

            $matchesLastName = array_filter($this->lastName, function ($lastName) use ($result) {
                return str_contains($result, $lastName);
            });
            $this->assertNotEmpty($matchesLastName, "The second part of the result '{$result}' does not match any last name.");
        }
    }

    public function testNameFemale(): void
    {
        $results = [];
        for ($i = 0; $i < 100; $i++) {
            $results[] = $this->faker->name(PersonExtension::GENDER_FEMALE);
        }

        foreach ($results as $result) {
            $matchesFirstName = array_filter($this->firstNameFemale, function ($firstName) use ($result) {
                return str_contains($result, $firstName);
            });
            $this->assertNotEmpty($matchesFirstName, "The first part of the result '{$result}' does not match any first name.");

            $matchesLastName = array_filter($this->lastName, function ($lastName) use ($result) {
                return str_contains($result, $lastName);
            });
            $this->assertNotEmpty($matchesLastName, "The second part of the result '{$result}' does not match any last name.");
        }
    }

    public function testName(): void
    {
        $results = [];
        for ($i = 0; $i < 100; $i++) {
            $results[] = $this->faker->name();
        }

        foreach ($results as $result) {
            $matchesFirstName = array_filter(array_merge($this->firstNameFemale, $this->firstNameMale), function ($firstName) use ($result) {
                return str_contains($result, $firstName);
            });
            $this->assertNotEmpty($matchesFirstName, "The first part of the result '{$result}' does not match any first name.");

            $matchesLastName = array_filter($this->lastName, function ($lastName) use ($result) {
                return str_contains($result, $lastName);
            });
            $this->assertNotEmpty($matchesLastName, "The second part of the result '{$result}' does not match any last name.");
        }
    }

    public function testTitleFemale(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->titleFemale); $i++) {
            $results[] = $this->faker->unique()->title(PersonExtension::GENDER_FEMALE);
        }

        $this->assertEqualsCanonicalizing(
            $this->titleFemale,
            $results
        );
    }

    public function testTitleMale(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->titleMale); $i++) {
            $results[] = $this->faker->unique()->title(PersonExtension::GENDER_MALE);
        }

        $this->assertEqualsCanonicalizing(
            $this->titleMale,
            $results
        );
    }

    public function testTitle(): void
    {
        $titles = array_unique(array_merge($this->titleFemale, $this->titleMale));

        $results = [];
        for ($i = 0; $i < count($titles); $i++) {
            $results[] = $this->faker->unique()->title();
        }

        $this->assertEqualsCanonicalizing(
            $titles,
            $results
        );
    }

    public function testAvsReturnsCorrectFormatUnformatted(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $avs = $this->faker->avs();

            $this->assertMatchesRegularExpression('/^756\d{10}$/', $avs, 'AVS should match 756 + 9 digits + 1 control digit');
        }
    }

    public function testAvsReturnsCorrectFormatFormatted(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $avs = $this->faker->avs(true);

            $this->assertMatchesRegularExpression('/^756\.\d{4}\.\d{4}\.\d{2}$/', $avs, 'Formatted AVS should be like 756.XXXX.XXXX.XX');
        }
    }

    public function testAvsChecksumIsValid(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $avs = $this->faker->avs();

            $sum = 0;
            foreach (str_split(substr($avs, 0, 12)) as $index => $digit) {
                $sum += (int) $digit * ($index % 2 === 0 ? 1 : 3);
            }

            $this->assertSame((10 - $sum % 10) % 10, (int) substr($avs, -1), 'The AVS check digit should be a valid EAN-13 check digit.');
        }
    }
}
