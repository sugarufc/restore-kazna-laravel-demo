<?php

namespace App\Http\Controllers;

use App\Ipaddress;
use App\Otdel;
use App\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{
    public function index()
    {
        return redirect()->route('workers');
    }

    public function workers()
    {
        $workers = Worker::with('otdel', 'special')->get()->sortBy('special.sort');
        $otdels = Otdel::all()->sortBy('sort');
        return view('index', compact('workers', 'otdels'));
    }

    public function worker($id)
    {
        $workers = Worker::with('otdel', 'special')->get()->where('otdel_id', $id)->sortBy('sort')->sortBy('special.sort');
        $otdels = Otdel::all()->sortBy('sort');
        $otd_name = Otdel::find($id);
        return view('index', compact('workers',  'otd_name','otdels'));
    }

    public function ip()
    {
        $ip = Ipaddress::all();
        return view('ip', compact('ip'));
    }
}
