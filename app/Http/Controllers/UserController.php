<?php

namespace App\Http\Controllers;
use App\usuario;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Session;



class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function logout()
    {
        session()->forget('cliente');
        session()->forget('key');
        Auth::logout();
        return redirect('/login');
    }


    public function index()
    {
    	$users = DB::table('usuarios')->get();
    	
    	return view('users.usuarios', compact('users'));
    }

    public function show($id)
    {
    	//$user= User::find($id);

    	$user = DB::table('usuarios')->where('id',$id)->get();	

    	return view('users.show', compact('user'));

    }

    public function create()
    {

        $empresas = DB::table('empresas')->get();
        return view('users.create', compact('empresas'));
    }

    public function store()
    {
        $data = request()->validate([
            'name'=>'required',
            'apellidos'=>'required',
            'email'=>'required|unique:usuarios',
            'password'=>'required',
            'cargo'=>'required',
            'empresa'=>'required'
        ], ['name.required' =>'El campo nombre es obligatorio']);

        usuario::create([
            'nombre'=>$data['name'],
            'apellido'=>$data['apellidos'],
            'cargo'=>$data['cargo'],
            'email'=>$data['email'],
            'password'=> bcrypt($data['password']),            
            'empresa_id'=>$data['empresa']
        ]);

        return redirect('usuarios');
    }

    public function password(Request $request)
    {
        $pass = $request->validate([
            'password'=>'required']);

        $data = usuario::findOrFail($request->id);

        $data->update([
            'password'=> bcrypt($pass['password'])
            ]);

        return redirect()->back();
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name'=>'required',
            'apellidos'=>'required',
            'email'=>'required|unique:usuarios,email,'.$request->id,
            'cargo'=>'required',
            'empresa'=>'required'
        ], ['name.required' =>'El campo nombre es obligatorio']);

        $user = usuario::findOrFail($request->id);

        $user->update([
            'nombre'=>$data['name'],
            'apellido'=>$data['apellidos'],
            'cargo'=>$data['cargo'],
            'email'=>$data['email'],         
            'empresa_id'=>$data['empresa']
        ]);

        return redirect()->back();
    }

    public function dashboard()
    {   
        return view('dashboard.dashboard');
    }

    public function perfil()
    {
        $id = session('id');
        $user = DB::table('usuarios')->where('email',$id)->get();  

        return view('users.perfil', compact('user'));
    }
}
