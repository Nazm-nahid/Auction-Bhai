<?php

namespace App\Services;

use App\Repository\LotRepository;

class LotService{
  private LotRepository $lotRepository;

  public function __construct(LotRepository $lotRepository) {
      $this->lotRepository = $lotRepository;
    }

  public function showLots($lotOwnerId)
  {
    return $this->lotRepository->showLots($lotOwnerId);
  }

  public function createLot($lotOwnerId, $cultivationType, $plantedCountry, $harvestDate, $totalWeight)
  {
    $this->lotRepository->createLot($lotOwnerId, $cultivationType, $plantedCountry, $harvestDate, $totalWeight);
  }

  public function updateLot($id, $harvestDate)
  {
    return $this->lotRepository->updateLot($id, $harvestDate);
  }
}
