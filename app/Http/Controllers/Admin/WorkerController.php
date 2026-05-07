<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Otdel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workers = Worker::with('otdel','special')->get()->sortBy('special.sort');
        return view('admin.worker.index', compact('workers'));
    }

    public function show($id){
        $workers = Worker::with('otdel', 'special')->get()->where('otdel_id', $id)->sortBy('sort')->sortBy('special.sort');
        $otdel = Otdel::find($id);
        return view('admin.worker.show', compact('workers', 'otdel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $otdels = DB::table('otdels')->pluck('f_name','id');
        $specials = DB::table('specials')->orderBy('sort')->pluck('name','id');
        return view('admin.worker.create', compact('otdels', 'specials'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'vts' => 'nullable|max:14',
            'gts' => 'nullable|max:14',
            'kab' => 'nullable|max:4',
            'sort' => 'nullable|max:3',
            'slug' => 'nullable|max:10',
        ];

        $messages = [
            'name.required' => 'Поле обязательно для заполнения',
        ];

        $validateData = Validator::make($request->all(), $rules, $messages)->validate();

        Worker::create($request->all());
        $request->session()->flash('success', 'Данные успешно добавлены');
        return redirect(session('links')[2]); // Will redirect 2 links back // see AdminMiddleware
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $worker = Worker::find($id);
        $otdels = DB::table('otdels')->pluck('f_name','id');
        $specials = DB::table('specials')->orderBy('sort')->pluck('name','id');
        return view('admin.worker.edit', compact('worker', 'otdels', 'specials'));
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
        $rules = [
            'name' => 'required|max:255',
            'vts' => 'nullable|max:14',
            'kab' => 'nullable|max:4',
            'sort' => 'nullable|max:3',
            'slug' => 'nullable|max:10',
        ];

        $messages = [
            'name.required' => 'Поле обязательно для заполнения',
            'sort.integer' => 'Введите число от 0 до 500',
            'sort.max' => 'Введите число от 0 до 500',
        ];

        $validateData = Validator::make($request->all(), $rules, $messages)->validate();

        $worker = Worker::find($id);
        $worker->update($request->all());
        return redirect(session('links')[2])->with('success', 'Данные успешно сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $worker = Worker::find($id);
        $worker->delete();
        return redirect()->back()->with('success', 'Сотрудник успешно удален!');
    }
}
