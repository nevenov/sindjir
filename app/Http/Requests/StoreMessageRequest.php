<?php

namespace Sinjirite\Http\Requests;

class StoreMessageRequest extends Request
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
            'published_at' => 'required',
            'down_at' => 'required',
            'body' => 'required',
        ];
    }
}
