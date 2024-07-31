<?php

namespace App\Repository;

use App\Models\Bid;

use Illuminate\Database\QueryException;


class BidRepository{

    public function showBisOnAuctions($id)
    {

        $bids = Bid::select([
                        'lots.id as lot_id',
                        'lots.cultiver_type',
                        'lots.planted_country',
                        'lots.harvest_date',
                        'lots.total_weight',
                        'bids.bid_price', 
                        'bidder.name as  bidder_name'])
        ->join('auctions', 'auctions.id','=','bids.auction_id')
        ->join('lots', 'lots.id','=','auctions.lot_id')
        ->join('users as bidder', 'bidder.id','=','bids.user_id')
        ->join('users as owner', 'owner.id','=','lots.user_id')
        ->where('owner.id', $id)
        ->get();

        return $bids;
    }

    public function createBid($bidderId ,$auctionId ,$bidPrice)
    {
            $bids = new Bid();

            $bids->user_id = $bidderId;
            $bids->auction_id = $auctionId;
            $bids->bid_price = $bidPrice;

            try {
                $bids->save();
                return true;
              }
              catch(QueryException $e) {
                return false;
              }
    }

}
