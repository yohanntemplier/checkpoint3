<?php

namespace App\Service;

use App\Repository\TileRepository;
use App\Entity\Tile;

class MapManagerService
{
    private $tileRepo;

    public function __construct(TileRepository $repo)
    {
        $this->tileRepo = $repo;
    }

    public function tileExists(int $x, int $y) :bool
    {
        if ($this->tileRepo->findOneByCoordX($x) and $this->tileRepo->findOneByCoordY($y) ) {
            return true;
        } else {
            return false;
        }
    }

    public function getRandomIsland(array $islands) : Tile
    {
        return $islands[array_rand($islands)];
    }
}