<?php

namespace App\Modules\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginReq extends FormRequest
{
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email'=>'required|email',
            'password' => 'required'
        ];
    }
}
