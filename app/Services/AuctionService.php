<?php

namespace App\Services;

use App\Repository\AuctionRepository;



class AuctionService{

    private AuctionRepository $auctionRepository;

    public function __construct(AuctionRepository $auctionRepository) {
        $this->auctionRepository = $auctionRepository;
      }

    public function showActions() 
    {
        return $this->auctionRepository->showActions();
    }


    public function createAuction( $lotOwnerId, $lotId, $bidPrice, $auctionDate, $duration)
    {

        return ($this->auctionRepository->createAuction($lotOwnerId, $lotId, $bidPrice, $auctionDate, $duration));
    }

    public function endAuction($id)
    {
        return $this->auctionRepository->endAuction($id);
    }

    public function deleteAuction($id)
    {
        return $this->auctionRepository->deleteAuction($id);
    }
}
