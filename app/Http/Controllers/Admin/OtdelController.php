<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Otdel;
use App\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OtdelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return redirect()->route('login');
        $otdels = Otdel::all()->sortBy('sort');
        return view('admin.otdel.index', compact('otdels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.otdel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'f_name' => 'required|max:255',
            's_name' => 'required|max:10',
            'sort' => 'nullable|max:4',
        ];

        $messages = [
            'f_name.required' => 'Поле обязательно для заполнения',
            's_name.required' => 'Поле обязательно для заполнения',
            'sort.required' => 'Поле обязательно для заполнения',
            's_name.max' => 'Поле не должно содержать больше 10 символов',
            'f_name.max' => 'Поле не должно содержать больше 255 символов',
            'sort.max' => 'Поле не должно содержать больше 4 символов',
        ];

        $validateData = Validator::make($request->all(), $rules, $messages)->validate();

        Otdel::create($request->all());
        $request->session()->flash('success', 'Данные успешно добавлены');
        return redirect()->route('otdel.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $otdel = Otdel::find($id);
        return view('admin.otdel.edit', compact('otdel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'f_name' => 'required|max:255',
            's_name' => 'required|max:10',
            'sort' => 'required|max:4',
        ];

        $messages = [
            'f_name.required' => 'Поле обязательно для заполнения',
            's_name.required' => 'Поле обязательно для заполнения',
            'sort.required' => 'Поле обязательно для заполнения',
            's_name.max' => 'Поле не должно содержать больше 10 символов',
            'f_name.max' => 'Поле не должно содержать больше 255 символов',
            'sort.max' => 'Поле не должно содержать больше 4 символов',
        ];

        $validateData = Validator::make($request->all(), $rules, $messages)->validate();

        $otdel = Otdel::find($id);
        $otdel->update($request->all());
        return redirect()->route('otdel.index')->with('success', 'Данные успешно сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $otdel = Otdel::find($id);
        $workers = Worker::with('otdel')->get()->where('otdel_id', $id);
        foreach ($workers as $worker) {
            $worker->delete();
        };
        $otdel->delete();
        return redirect()->route('otdel.index')->with('success', 'Отдел успешно удален!');
    }
}
