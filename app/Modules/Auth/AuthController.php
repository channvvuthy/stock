<?php


namespace App\Modules\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function index()
    {
        return view('admin.pages.components.login');
    }

    public function login(Request $req)
    {
        return $req->all();
    }

    public function register()
    {
        return view('admin.pages.components.register');
    }

}
