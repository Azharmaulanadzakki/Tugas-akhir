<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $adminCount = User::where('role', 'admin')->count();

        return view('admin.dashboard', [
            'adminCount' => $adminCount,
        ]);
    }
}
