<?php

namespace App\Http\Requests;

use App\Models\Auction;
use Illuminate\Foundation\Http\FormRequest;

class AuthorizeAuctionRequest extends FormRequest
{
    public function authorize(): bool
    {
        $auction = Auction::where( "id", "=" , $this->id)
        ->where( "user_id" , "=" , auth()->user()->id )
        ->first();

        return  $auction && true;
    }
}
