<?php

namespace App\Repository;


use App\Models\Auction;


use Exception;

class AuctionRepository{

  public function showActions()
  {
    $auctions = Auction::all();

    return $auctions;
  }
  public function createAuction($lotWonerId, $lotId, $bidPrice, $auctionDate, $duration)
  {
    $auctions = new Auction();

    $auctions->user_id = $lotWonerId;
    $auctions->lot_id = $lotId;
    $auctions->bid_price = $bidPrice;
    $auctions->auction_date = $auctionDate;
    $auctions->duration = $duration;
    $auctions->auction_status = true;

    $auctions->save();        
  }

  public function endAuction($id)
  {
          $auctions = Auction::findOrFail($id);
          $auctions->auction_status = false;

          $auctions->save();
  }

  public function deleteAuction($id)
  {
    $auctions = Auction::findOrFail($id);
    
    $auctions->delete();
  }
}
