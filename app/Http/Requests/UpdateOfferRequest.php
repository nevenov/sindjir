<?php

namespace Sinjirite\Http\Requests;

class UpdateOfferRequest extends StoreOfferRequest
{
    public function rules()
    {
        return [
            'title' => 'required',
            'published_at' => 'required',
            'down_at' => 'required',
            'body' => 'required',
            'image' => 'image'
        ];
    }
}
