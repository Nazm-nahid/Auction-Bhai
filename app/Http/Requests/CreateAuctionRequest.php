<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Lot;

class CreateAuctionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $lot = Lot::where( "id", "=" , $this['lot_id'])
        ->where( "user_id" , "=" , auth()->user()->id )
        ->first();

        return  $lot && true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        
        return [
            'lot_id'=>[
                    'required',
                    'integer',
                ], //integer validation
                'bid_price'=>[
                    'required',
                    'integer',
                    'min : 0'
                ], // negative , min ,max validation
                'auction_date'=>[
                    'required',
                    'date',
                ],//date validation
                'duration'=>[
                    'required',
                    'integer'
                ]
        ];
    }
}
