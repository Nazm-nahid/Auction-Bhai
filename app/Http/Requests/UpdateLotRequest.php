<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Lot;

class UpdateLotRequest extends FormRequest
{
    public function authorize(): bool
    {
        $lot = Lot::where( "id", "=" , $this['lot_id'])
        ->where( "user_id" , "=" , auth()->user()->id )
        ->first();

        return  $lot && true;
    }

    public function rules(): array
    {
        return [
            'harvest_date'=>'required' //date validation
        ];
    }
}
