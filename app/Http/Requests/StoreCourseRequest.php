<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name'=>'required|unique:courses|max:255',
            'content'=>'required',
            'price'=>'required',
        ];
    }


}
