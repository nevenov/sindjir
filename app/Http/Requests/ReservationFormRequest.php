<?php

namespace Sinjirite\Http\Requests;

use Sinjirite\Http\Requests\Request;

class ReservationFormRequest extends Request
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
            'name' => 'required',
            'email' => 'email',
            'phone' => 'required',
            'arrive_date' => 'required|date',
            'leave_date' => 'required|date',
            'adults' => 'required|integer|min:1',
            'children' => 'integer|min:0',
            'g-recaptcha-response' => 'required|captcha'
        ];
    }

    public function messages()
    {
        return [
            'arrive_date.required' => trans('site.arrive_date_required'),
            'leave_date.required' => trans('site.leave_date_required'),
            'adults.required' => trans('site.adults_required'),
            'adults.integer' => trans('site.adults_integer'),
            'adults.min' => trans('site.adults_min'),
            'children.integer' => trans('site.children_integer'),
            'children.min' => trans('site.children_min'),
        ];
    }

}
