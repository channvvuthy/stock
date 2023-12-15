<?php


namespace App\Modules\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function index()
    {
        return view('admin.pages.components.login');
    }

    public function login(Request $req){
        return $req->all();
    }
    
}
