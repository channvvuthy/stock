<?php

namespace App\Modules\Auth;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserReq extends FormRequest
{
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email'=>'required|email',
            'password' => 'required|min:8|confirmed',
        ];
    }
}
