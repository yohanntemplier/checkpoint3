<?php

namespace App\Service;

use App\Repository\TileRepository;
use App\Entity\Tile;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Boat;

class MapManagerService
{
    private $tileRepo;
    private $manager;

    public function __construct(TileRepository $repo, ObjectManager $objectManager)
    {
        $this->tileRepo = $repo;
        $this->manager = $objectManager;
    }

    public function tileExists(int $x, int $y) :bool
    {
        if ($this->tileRepo->findOneByCoordX($x) and $this->tileRepo->findOneByCoordY($y) ) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Reset Treasures and select a random island
     * @return Tile
     */
    public function getRandomIsland() : Tile
    {
        $islands =$this->tileRepo->findByType('island');
        foreach ($islands as $island) {
            $island->setHasTreasure(0);
            $this->manager->persist($island);
        }
        $this->manager->flush();
        return $islands[array_rand($islands)];
    }

    /**
     * @param Boat $boat
     * @return bool
     */
    public function checkTreasure(Boat $boat)
    {
        $tile = $this->tileRepo->findBy(["coordX" => $boat->getCoordX(), "coordY" => $boat->getCoordY()]);
        if ($tile[0]->getHasTreasure() === true) {
            return true;
        } else {
            return false;
        }
    }
}