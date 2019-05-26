<?php

namespace App\Http\Controllers;

use App\Archivos;
use Illuminate\Http\Request;
use App\Http\Requests\FileRequest;

class FileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', [
            'only' => ['create' , 'store', 'edit', 'update', 'destroy']
        ]);
        $this->middleware('can:touch,file',[
            'only' => ['edit','update','destroy']
        ]);
    }
    /**
     *
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $files = Archivos::paginate(15);

        return view('public.files.index') -> withFiles($files);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('public.files.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $file = $request -> file('file');

        $request -> validate([
           $file => 'required|file|max:20000'
        ]);

        $file = Archivos::create([
           'user_id' => $request->user()->id,
            'name' => request('name'),
            'description' => request('description'),
            'slug' => request('slug')

        ]);

        return redirect('/');

        $file -> users() -> sync(request('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $file = Archivos::where('slug', $slug)->firstOrFail();
        return view('public.files.show', ['file' => $file]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Archivos $file)
    {
        return view('public.files.edit', ['file' => $file]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FileRequest $request, Archivos $file)
    {
        $archivo = $request->file('archivo');
        $file->update([
            'name' => request('name'),
            'slug' => str_slug(request('name'), "-"),
            'description' => request('description'),
            'archivo' => $archivo->store('archivos','public'),
        ]);
        return redirect('/files/'.$file->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Archivos $file)
    {
        $file->delete();

        return redirect('/');
    }
}
