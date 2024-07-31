<?php

namespace App\Http\Controllers;

use App\Services\AuctionService;
use App\Http\Requests\AuthorizeAuctionRequest;
use App\Http\Requests\CreateAuctionRequest;
use Illuminate\Http\JsonResponse;


class AuctionController extends Controller
{
    private AuctionService $auctionService;

    public function __construct(AuctionService $auctionService) 
    {
        $this->auctionService = $auctionService;
    }


    public function showActions() : JsonResponse
    {
        $auctions = $this->auctionService->showActions();

        return response()->json([
            "status" => true,
            "message" => "Successful",
            'data'=>$auctions,
        ],200);
    }
    

    public function createAuction(CreateAuctionRequest $request) : JsonResponse
    {
        $data = $request->validated();
        
        $lotOwnerId = auth()->user()->id;
        $lotId = $data['lot_id'];
        $bidPrice = $data['bid_price'];
        $auctionDate = $data['auction_date'];
        $duration = $data['duration'];

        $status = $this->auctionService->createAuction($lotOwnerId, $lotId, $bidPrice, $auctionDate,
        $duration);
        
        return response()->json(['data'=>'successfully added your auction!'],201);

    }

    public function endAuction(AuthorizeAuctionRequest $request, $id ) : JsonResponse
    {
        
        $lotOwnerId = auth()->user()->id;

        $this->auctionService->endAuction($id, $lotOwnerId);

        return response()->json(['data'=>'successfully end your auction!'],201);
    }


    public function deleteAuction(AuthorizeAuctionRequest $request, $id) : JsonResponse
    {
        $this->auctionService->deleteAuction($id);

        return response()->json(['data'=>'successfully removed your auction!'],201);
    }


}
