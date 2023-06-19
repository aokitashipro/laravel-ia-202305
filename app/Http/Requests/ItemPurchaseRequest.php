<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class ItemPurchaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
     // 入力値を受け取る
     $itemId = $this->request->get('item_id');

        return [
            'item_id' => ['required'],
            'amount' => ['required', 'numeric', 'max:' . Item::find($itemId)->current_stock ],
            'point' => ['required', 'numeric', 'max:' . User::find(Auth::id())->total_point ],  
        ];
    }
}
