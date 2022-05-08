<?php

namespace App\DataFixtures;

use App\Entity\Etudiant;
use App\Entity\Section;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class EtudiantFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {   $faker = Factory::create();
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
        for ($i = 0; $i < 20; $i++) {
            $etudiant = new Etudiant();
            $etudiant->setPrenom($faker->firstName);
            $etudiant->setNom($faker->lastName);
            $lucky=$faker->numberBetween(0,1);
            if ($lucky==1){
                $section = new Section();
                $section->setDesignation($data[$faker->numberBetween(0,19)]);
                $etudiant->setSection($section);
                $manager->persist($section);
            }
            $manager->persist($etudiant);
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
