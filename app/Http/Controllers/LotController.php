<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLotRequest;
use App\Services\LotService;
use App\Http\Requests\UpdateLotRequest;

class LotController extends Controller
{

    private LotService $lotService;

    public function __construct(LotService $lotService) {
        $this->lotService = $lotService;
    }

    public function showLots()
    {
        $lotOwnerId = auth()->user()->id;
        return response()->json(['data'=> $this->lotService->showLots($lotOwnerId) ,200]);
    }


    public function createLot(CreateLotRequest $request)
    {
        $data = $request->validated();


        $lotOwnerId = auth()->user()->id;
        $cultivationType = $data['cultivation_type'];
        $plantedCountry = $data['planted_country'];
        $harvestDate = $data['harvest_date'];
        $totalWeight = $data['total_weight'];

        $this->lotService->createLot($lotOwnerId, $cultivationType, $plantedCountry, $harvestDate, $totalWeight);

        return response()->json(['data'=>'successfully added your lot!'],201);

    }




    public function updateLot(UpdateLotRequest $request , $id)
    {
        $data = $request->validate();

        $harvestDate = $data['harvest_date'];

        $this->lotService->updateLot($id, $harvestDate);

        return response()->json(['data'=>'successfully updated your lot!'],202);
    }
}
