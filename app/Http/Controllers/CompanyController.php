<?php

namespace App\Http\Controllers;


use App\empresa;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        if(session('key')==1)
        {
           $company = DB::table('empresas')->get();
        
            return view('company.empresa', compact('company')); 
        }
        else { abort(403, 'Unauthorized action.');}
    	
    }

    public function show($id)
    {
    	//$user= User::find($id);

    	$company = DB::table('empresas')->where('id',$id)->get();	

    	return view('company.show', compact('company'));

    }

    public function create()
    {
        return view('company.create');
    }

    public function trabajador()
    {
        $worker = DB::table('trabajador')->get();
        
        return view('company.trabajadores', compact('worker'));
    }

    public function store()
    {
        $data = request()->validate([
            'name'=>'required',
            'rut'=>'required|unique:empresas',
            'giro'=>'required',
            'representante'=>'required',
            'contacto'=>'required',
            'direccion'=>'required',
            'certificado'=>'required',
            'cotizacion'=>'required',
            'trabajadores'=>'numeric|required',
            'contrato'=>'required'
        ], ['name.required' =>'El campo nombre es obligatorio']);
 
        $idempresa= empresa::create([
            'nombre'=>$data['name'],
            'rut'=>$data['rut'],
            'giro'=>$data['giro'],
            'representante'=>$data['representante'],
            'contacto'=>$data['contacto'],
            'direccion'=>$data['direccion'],
            'certificado'=>$data['rut'],
            'cotizacion'=>$data['cotizacion'],
            'trabajadores'=>$data['trabajadores'],
            'contrato'=>$data['rut']
        ]);

            Storage::makeDirectory($idempresa->id, 0777, true, true);

            $file = request()->file('certificado');
            $filename1 = 'certificado'.$idempresa->id.'.'.$file->getClientOriginalExtension();
            $path1= $file->storeAs($idempresa->id, $filename1);
            //dd($path1);

             //$contents = Storage::get($path1);
             //dd($contents);

            $file = request()->file('contrato');
            $filename2 = 'contrato'.$idempresa->id.'.'.$file->getClientOriginalExtension();
            $path2= $file->storeAs($idempresa->id, $filename2);

            //$file = request()->file('certificado');
            //$nombre = 'certificado'.$data['rut'];
           // Storage::disk($data['rut'], 'public')->put($nombre,  \File::get($file));
            $actualizar = empresa::find($idempresa);
            foreach ($actualizar as $a) {
            $a->certificado = $path1;
            $a->contrato = $path2;
            $a->save();
            }

        return redirect('empresas');
    }

    public function edit(Request $empresa)
    {
        
        $valido = $empresa->validate([
            'nombre'=>'required',
            'rut'=>'required|unique:empresas,rut,'.$empresa->id,
            'giro'=>'required',
            'representante'=>'required',
            'contacto'=>'required',
            'direccion'=>'required',
            'cotizacion'=>'required',
            'trabajadores'=>'numeric|required'
        ]);

        $data = empresa::findOrFail($empresa->id);

        //$data = empresa::findOrFail($empresa->id);

        $data->update([
            'nombre'=>$empresa->nombre,
            'rut'=>$empresa->rut,
            'giro'=>$empresa->giro,
            'representante'=>$empresa->representante,
            'contacto'=>$empresa->contacto,
            'direccion'=>$empresa->direccion,
            'cotizacion'=>$empresa->cotizacion,
            'trabajadores'=>$empresa->trabajadores,
        ]);

        return redirect()->back();
    }

    public function updateDocument(Request $request)
    {

        $data = $request->validate([
            'id' => 'numeric|required',
            'contrato' => 'required',
            'documento' => 'required'
        ]);
        $first = head($data); 
        $last = last($data);
        Storage::delete($last);



        $file = request()->file('documento');
        $filename = 'contrato'.$first.'.'.$file->getClientOriginalExtension();
        $path= $file->storeAs($first, $filename);

        $doc = empresa::findOrFail($request->id);
        $doc->update(['contrato'=>$path]);

        return redirect()->back();
    }

    public function updateCert(Request $request)
    {

        $data = $request->validate([
            'id' => 'numeric|required',
            'certificado' => 'required',
            'documento' => 'required'
        ]);
        $first = head($data); 
        $last = last($data);

        Storage::delete($last);


        $file = request()->file('documento');
        $filename = 'certificado'.$first.'.'.$file->getClientOriginalExtension();
        $path= $file->storeAs($first, $filename);

        $doc = empresa::findOrFail($request->id);
        $doc->update(['certificado'=>$path]);

        return redirect()->back();
    }

    public function delete(Resquest $request)
    {

        //$company = DB::table('empresas')->where('id', $request['id'])->value('id');

        //$plan = DB::table('planPreventivo')->where('id', $company)->value('id');

        //Storage::delete();
    }
}