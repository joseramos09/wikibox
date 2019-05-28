<?php

namespace App\Http\Controllers;

use App\Archivos;
use Illuminate\Http\Request;
use App\Http\Requests\FileRequest;

class FileController extends Controller
{
    /**
     * FileController constructor
     *
     * Mediante una policy se dan los permisos de autorización para la modificación de los elementos claves
     * de la aplicación
     */

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
     * Se muestra una lista de archivos en la pagina principal.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $files = Archivos::paginate(15);

        return view('public.files.index') -> withFiles($files);
    }

    /**
     * Sube un nuevo archivo de un usuario.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('public.files.create');

    }

    /**
     * Crea un archivo en el storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FileRequest $request)
    {

        $files = $request -> file('files');

        $request -> validate([
           $files => 'required|file|max:20000'
        ]);

            Archivos::create([
                'user_id' => $request->user()->id,
                'name' => request('name'),
                'description' => request('description'),
                'slug' => request('slug'),
                'file' => $files->store('file','public')

        ]);

        return redirect('/');

    }

    /**
     * Muestra la información del archivo creado.
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
     * Edita los archivos creados anteriormente.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Archivos $file)
    {
        return view('public.files.edit', ['file' => $file]);
    }

    /**
     * Update de edit del archivo en el storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FileRequest $request, Archivos $file)
    {
        $file = $request->file('archivo');

        $file->update([
            'name' => request('name'),
            'slug' => str_slug(request('name'), "-"),
            'description' => request('description'),
            'file' => $file->store('file','public'),
        ]);
        return redirect('/files/'.$file->slug);
    }

    /**
     * Elimina el archivo del storage.
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
