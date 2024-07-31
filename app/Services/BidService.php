<?php

namespace App\Services;

use App\Repository\BidRepository;



class BidService{

    private BidRepository $bidRepository;

    public function __construct(BidRepository $bidRepository) {
        $this->bidRepository = $bidRepository;
      }


    public function showBisOnAuctions($lotWonerId)
    {

        return $this->bidRepository->showBisOnAuctions($lotWonerId);
    }

    public function createBid($bidderId ,$auctionId ,$bidPrice)
    {


            if($this->bidRepository->createBid($bidderId ,$auctionId ,$bidPrice)) {
                return true;
              }
            else {
                return false;
              }
    }
}
