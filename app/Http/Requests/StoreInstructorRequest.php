<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInstructorRequest extends FormRequest
{

    public function rules()
    {
        return [
            ''=>'required|max:255',
            'email'=>'required|unique:instructors',
            'img'=>'required|mimes:jpg,png',
        ];
    }
}
