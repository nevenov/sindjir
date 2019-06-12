<?php

namespace Sinjirite\Http\Requests;

class UpdateMessageRequest extends StoreMessageRequest
{
    public function rules()
    {
        return [
            'published_at' => 'required',
            'down_at' => 'required',
            'body' => 'required',
        ];
    }
}
