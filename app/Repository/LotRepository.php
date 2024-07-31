<?php

namespace App\Repository;

use App\Models\Lot;

class LotRepository{

  public function showLots($lotOwnerId)
  {
    return Lot::where("user_id","=",$lotOwnerId)
              ->get(); //pagination
  }

  public function createLot($lotOwnerId, $cultivationType, $plantedCountry, $harvestDate, $totalWeight)
  {
    $lots = new Lot();

    $lots->user_id = $lotOwnerId;
    $lots->cultiver_type = $cultivationType;
    $lots->planted_country = $plantedCountry;
    $lots->harvest_date = $harvestDate;
    $lots->total_weight = $totalWeight;

    $lots->save();
 }




  public function updateLot($id, $harvestDate)
  {

    $lots = Lot::findOrFail($id);
    $lots->harvest_date = $harvestDate;
    
    $lots->save();   
   }
}
