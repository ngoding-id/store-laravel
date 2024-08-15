<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $customerCount = User::count();
        return view('dashboard.dashboard', compact('customerCount'));
    }
}
