<?php

namespace App\Http\Requests;

use App\Models\Subscription;
use App\Rules\OrderPriceRule;
use App\Rules\SubscriptionRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubscriptionStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => [
                'required',
                'exists:plans,id',
//                new SubscriptionRule()
            ],
            'name' => [
                'required',
                'max:255',
            ]
        ];
    }
}
