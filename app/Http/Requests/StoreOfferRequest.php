<?php

namespace Sinjirite\Http\Requests;

class StoreOfferRequest extends Request
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
            'title' => 'required',
            'published_at' => 'required',
            'down_at' => 'required',
            'body' => 'required',
            'image' => 'required|image'
        ];
    }
}
