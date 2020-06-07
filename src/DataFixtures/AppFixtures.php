<?php

namespace App\DataFixtures;

use App\Entity\Candidat;
use App\Entity\Empresa;
use App\Entity\Oferta;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i=0; $i<10; $i++){
            $correu = 'empresa'.$i.'@gmail.cat';
            $logo = 'logo-'.$i.'.png';
            $tipus = 'empresa -'.$i;
            $nom = 'empresa '.$i;
            $empresa = new Empresa();
            $empresa->setCorreu($correu)
                ->setLogo($logo)
                ->setTipus($tipus)
                ->setNom($nom);
            $manager->persist($empresa);

            $descripcio = 'descripcio '.$i;
            $titol = 'Oferta - '.$i;
            $oferta = new Oferta();
            $oferta ->setDataPub(new \DateTime())
                ->setDescripcio($descripcio)
                ->setEmpresa($empresa)
                ->setTitol($titol);
            $manager->persist($oferta);

            $nom = 'Candidat - '.$i;
            $cognoms = 'Cognoms';
            $estudis = 'Estudis';
            $candidat = new Candidat();
            $candidat ->setNom($nom)
                ->setCognom($cognoms)
                ->setTelefon($i)
                ->setOferta($oferta)
                ->setEstudis($estudis);
            $manager->persist($candidat);

        }

        for ($i=0; $i<10; $i++){
            $nom = 'Candidat -'.$i;
            $cognoms = 'Cognom';
            $telefon = $i.$i.$i.$i;
            $candidat = new Candidat();
            $candidat ->setNom($nom)
                ->setCognom($cognoms)
                ->setTelefon($telefon);
            $manager->persist($candidat);
        }
        $manager->flush();
    }
}
