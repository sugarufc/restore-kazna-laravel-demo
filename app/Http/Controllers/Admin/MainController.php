<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Otdel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MainController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function settings()
    {
        return view('admin.settings.index');
    }
}
