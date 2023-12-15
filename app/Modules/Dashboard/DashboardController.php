<?php
namespace App\Modules\Dashboard;
use App\Http\Controllers\Controller;

class DashboardController extends Controller{

    public function index()
    {
        return view('admin.index');
    }
}