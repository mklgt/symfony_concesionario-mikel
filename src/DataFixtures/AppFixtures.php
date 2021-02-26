<?php

namespace App\DataFixtures;

use \App\Entity\Sellers;
use Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use \App\Entity\Offers;

class AppFixtures extends Fixture {

    public function load(ObjectManager $manager) {
        for ($i = 0; $i < 20; $i++) {
            $jobFaker = Faker\Factory::create();
            // Seller
            $seller = new Sellers();

            $seller->setDni("12345678Z");
            $seller->setUsername("Cuatrovientos_$i");
            $seller->setEmail("car_$i@gmail.com");
            $seller->setPassword("4Vientos");
            $seller->setIsActive(true);
            $seller->setRoles("Ofertador");
            $seller->setName("Cuatrovientos_$i");
            $seller->setSurname("Federico");
            $seller->setAddress($jobFaker->address);
            $seller->setContactPhone($jobFaker->phoneNumber);
            $seller->setContactMail($jobFaker->companyEmail);
            $seller->setCreationUser("InitialFixture");
            $seller->setCreationDate(new \DateTime("2018-6-1"));
            $seller->setModificationUser("InitialFixture");
            $seller->setModificationDate(new \DateTime("2018-6-1"));

            $manager->persist($seller);
            // Offer
            $offer = new Offers();
            $offer->setTitle("Offer $i");
            $offer->setPrice(2552.99);
            $offer->setSeller($seller);
            
            $manager->persist($offer);
        }$manager->flush();
    }

}
