<?php

namespace App\Service;

use App\Repository\TileRepository;

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
}