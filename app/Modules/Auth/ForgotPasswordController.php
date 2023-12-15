<?php


namespace App\Modules\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function index(){
        return view('admin.pages.components.forgot-password');
    }
}