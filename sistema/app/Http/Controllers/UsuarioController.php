<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['usuarios']=Usuario::paginate(10);
        return view('usuarios.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $campos=[
            'Nombre'=>'required|string|max:100',
            'Apellido'=>'required|string|max:100',
            'Genero'=>'required|string|max:100',
            'Edad'=>'required|string|max:10',


        ];

        $mensaje=[

            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request,$campos,$mensaje);
        $datosUsuarios = request()->except('_token');

        Usuario::insert($datosUsuarios);
        return redirect('usuarios')->with('mensaje','Usuario agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.edit',compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Apellido'=>'required|string|max:100',
            'Genero'=>'required|string|max:100',
            'Edad'=>'required|string|max:10',


        ];

        $mensaje=[

            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request,$campos,$mensaje);
        $datosUsuarios = request()->except(['_token','_method']);
        Usuario::where('id','=',$id)->update($datosUsuarios);
        $usuario = Usuario::findOrFail($id);
        //return view('usuarios.edit',compact('usuario') );}
        return redirect('usuarios')->with('mensaje','Usuario Modificado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Usuario::destroy($id);
        return redirect('usuarios')->with('mensaje','Usuario Borrado');

    }
}
