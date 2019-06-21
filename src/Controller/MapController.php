<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Tile;
use App\Repository\BoatRepository;
use App\Entity\Boat;
use App\Service\MapManagerService;
use Doctrine\Common\Persistence\ObjectManager;


class MapController extends AbstractController
{
    /**
     * @Route("/map", name="map")
     */
    public function displayMap(BoatRepository $boatRepository) :Response
    {
        $em = $this->getDoctrine()->getManager();
        $tiles = $em->getRepository(Tile::class)->findAll();
        foreach ($tiles as $tile) {
            $map[$tile->getCoordX()][$tile->getCoordY()] = $tile;
        }
        $boat = $boatRepository->findOneBy([]);
        return $this->render('map/index.html.twig', [
            'map'  => $map ?? [],
            'boat' => $boat,
        ]);
    }

    /**
     * @Route("/map/start/{id}", name="game_start")
     * @param MapManagerService $mapManagerService
     * @param ObjectManager $objectManager
     * @param Boat $boat
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function start(MapManagerService $mapManagerService, ObjectManager $objectManager, Boat $boat)
    {
        $boat->setCoordX(0);
        $boat->setCoordY(0);
        $objectManager->persist($boat);
        $tileWithTreasure = $mapManagerService->getRandomIsland();
        $tileWithTreasure->setHasTreasure(1);


        $objectManager->persist($tileWithTreasure);
        $objectManager->flush();

        return $this->redirectToRoute('map');
    }
}
