<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Ipaddress;
use Illuminate\Http\Request;

class IpaddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ip = Ipaddress::all()->sortBy('ip');
        return view('admin.ip.index', compact('ip'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ip.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Ipaddress::create($request->all());
        $request->session()->flash('success', 'Данные успешно добавлены');
        return redirect()->route('ip.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return __METHOD__;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ip = Ipaddress::find($id);
        return view('admin.ip.edit', compact('ip'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ip = Ipaddress::find($id);
        $ip->update($request->all());
        return redirect()->route('ip.index')->with('success','Данные успешно сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ip = Ipaddress::find($id);
        $ip->delete();
        return redirect()->route('ip.index')->with('success', 'Сотрудник успешно удален!');
    }
}
