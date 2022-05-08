<?php

namespace App\DataFixtures;

use App\Entity\Section;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class SectionFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $data = [
            "GL2",
            "GL3",
            "GL4",
            "GL5",
            "RT2",
            "RT3",
            "RT4",
            "RT5",
            "IMI2",
            "IMI3",
            "IMI4",
            "IMI5",
            "IIA2",
            "IIA3",
            "IIA4",
            "IIA5",
            "MPI",
            "CBA",
            "BIO",
            "CH"
        ];
        $faker = Factory::create();
        for ($i = 0; $i < count($data); $i++) {
            $section = new Section();
            $section->setDesignation($data[$i]);
            $manager->persist($section);
        }
        $manager->flush();
    }
}
