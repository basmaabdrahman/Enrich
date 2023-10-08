<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name'=>'required|max:255',
            'email'=>'required|unique:students',
            'phone'=>'required|max:11',
            'img'=>'required|mimes:jpg,jpeg,png',
        ];
    }
}
