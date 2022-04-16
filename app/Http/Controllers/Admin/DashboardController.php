<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;

class DashboardController extends Controller
{
    public function Index(){
        Alert::success('Success', 'Welcome to dashboard');
        return view('admin.pages.dashboard');
    }
}
