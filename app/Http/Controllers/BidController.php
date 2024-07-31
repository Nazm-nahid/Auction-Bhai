<?php

namespace App\Http\Controllers;

use App\Services\BidService;
use App\Http\Requests\CreateBidRequest;

class BidController extends Controller
{
    private BidService $bidService;

    public function __construct(BidService $bidService) {
        $this->bidService = $bidService;
    }



    public function showBisOnAuctions()
    {
        $lotOwnerId = auth()->user()->id;
        $bids = $this->bidService->showBisOnAuctions($lotOwnerId);

        return response()->json(['bids'=>$bids],200);
    }

    public function createBid(CreateBidRequest $request)
    {
        $data = $request->validated();

        $bidderId = auth()->user()->id;
        $auctionId = $data['auction_id'];
        $bidPrice = $data['bid_price'];
        $this->bidService->createBid($bidderId ,$auctionId ,$bidPrice);

        return response()->json(['data'=>'successfully added your bid!'],201);
    }
}
