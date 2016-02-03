<?php
namespace Acme\TrackBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Acme\TrackBundle\Entity\Track;

class LoadUserData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 15; $i++) {
            $Track = new Track();
            $Track->setDomain('test.com');
            $Track->setRaw(rand(100, 1000));
            $Track->setUniq(rand(50, 200));
            $Track->setDate(new \DateTime("-$i day"));

            $manager->persist($Track);
            $manager->flush();
        }
        
        
    }
}