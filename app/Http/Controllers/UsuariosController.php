<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Mail\welcome;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre = $request->get('nombre');
        $usuarios = User::Search($request->nombre)->orderBy('id', 'DESC')->paginate(4);
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $this->validate($request,[ 'name'=>'required', 'email'=>'required', 'password'=>'required', 'cedula'=>'required', 'fecha_nacimiento'=>'required' ]);
        $request['password'] = password_hash($request->password, PASSWORD_BCRYPT);
        User::create($request->all());
        $request->email;
        Mail::to($request->email)->send(new welcome('Bienvenido a la aplicacion de mascotas, '.$request->name.'!') );
        return redirect()->route('usuarios.index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuarios = User::find($id);
        return view('usuarios.show',compact('usuarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuarios = User::find($id);
        return view('usuarios.edit',compact('usuarios'));
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
        $this->validate($request,[ 'name'=>'required', 'email'=>'required', 'password'=>'required', 'cedula'=>'required', 'fecha_nacimiento'=>'required' ]);
        $request['password'] = password_hash($request->password, PASSWORD_BCRYPT);
        User::find($id)->update($request->all());
        return redirect()->route('usuarios.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('usuarios.index')->with('success','Registro eliminado satisfactoriamente');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}