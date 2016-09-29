<?php

namespace App\Http\Requests\Admin\Ext;

use App\Http\Requests\Request;

abstract class BaseRequest extends Request
{

    public function messages()
    {
        return [
            'required' => trans('validation.required'),
            'unique' => trans('validation.unique'),
            'numeric' => trans('validation.numeric'),
            'min' => trans('validation.min.string'),
            'max' => trans('validation.max.string'),
            'email' => trans('validation.email'),
        ];
    }
}
