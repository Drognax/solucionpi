<?php

namespace App\Http\Controllers;
use App\trabajador;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class WorkerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function list($id)
    {
        $empresa = $id;

    	$worker = DB::table('trabajador')->where('empresa_id',$id)->get();

        $company = DB::table('empresas')->select('id','nombre')->where('id',$id)->get();
        $first = $company->first();
        $last = $company->last();

        return view('workers.list', compact('worker', 'first', 'last'));
    }

    public function show($id)
    {
    	//$user= User::find($id);
        $empresa = $id;

        $fecha = Carbon::now()->format('Y-m-d');

    	$worker = DB::table('trabajador')->where('id',$id)->get();	

        $doc = DB::table('documentos')->where('trabajador_id',$id)->get();

    	return view('workers.details', compact('worker', 'doc', 'empresa', 'fecha'));

    }

    public function create($id)
    {

        $company = DB::table('empresas')->where('id',$id)->get();

        return view('workers.create', compact('company'));
    }

    public function documento($id)
    {
        $doc = DB::table('documentos')->where('trabajador_id',$id)->get();

        return view('workers.documents');
    }

    public function store()
    {
        $data = request()->validate([
            'name'=>'required',
            'rut'=>'required|unique:trabajador',
            'cargo'=>'required',
            'actividades'=>'required',
            'empresa' =>'required',
            'id'=>'required',
        ], ['name.required' =>'El campo nombre es obligatorio']);

        $idtrabajador = trabajador::create([
            'nombre'=>$data['name'],
            'rut'=>$data['rut'],
            'cargo'=>$data['cargo'],
            'actividades'=>$data['actividades'],
            'empresa_id'=>$data['empresa']
        ]);

        Storage::makeDirectory($data['empresa'].'/trabajadores/trabajador_'.$idtrabajador->id, 0777, true, true);        

        return redirect('/trabajadores/'.$data['empresa']);
    }

    public function edit(Request $trabajador)
    {
        
        $validador = $trabajador->validate([
            'nombre'=>'required',
            'rut'=>'required|unique:trabajador,rut,'.$trabajador->id,
            'cargo'=>'required',
            'actividades'=>'required',
 
        ]);

        $data = trabajador::findOrFail($trabajador->id);

        //$data = empresa::findOrFail($empresa->id);

        $data->update([
            'nombre'=>$trabajador->nombre,
            'rut'=>$trabajador->rut,
            'cargo'=>$trabajador->cargo,
            'actividades'=>$trabajador->actividades,
        ]);

        return redirect()->back();
    }


    public function editdoc(Request $request)
    {
        $validador = $request->validate([
            'name'=>'required',
            'gestion'=>'required',
            'indicador'=>'required',
            'observaciones'=>'required',
            'dato'=>'numeric|required',
            'data'=>'numeric|required'
        ]);

        if($request['docs'] != NULL)
        {
            $archivo = DB::table('documentos')->where('id',$request['documento'])->get('actividad')->first(); 
            //dd($archivo);
            foreach ($archivo as $key) 
            {   
                Storage::delete($key);
            }   
            $file = request()->file('docs');
            $filename1 = $request['name'].'_'.$request['dato'].'.'.$file->getClientOriginalExtension();
            $path1= $file->storeAs($request['data'].'/trabajadores/trabajador_'.$request['dato'], $filename1);
            $data = DB::table('documentos')
            ->where('id',$request['documento'])
            ->update(['actividad'=>$path1]);
        }

        DB::table('documentos')
        ->where('id',$request['documento'])
        ->update(['nombre'=>$request->name,
            'estado'=>$request->gestion,
            'indicador'=>$request->indicador,
            'observaciones'=>$request->observaciones
        ]);

        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $validador = $request->validate([
            'id'=>'numeric|required',
            'act'=>'required']);
        //$variable = $request['act']."/equipamentos/equipamento_".$request['id'];
        //dd($variable);
        //Storage::delete($request['act']);
        //dd($request['act']);
        Storage::delete($request['act']);
        //Storage::deleteDirectory($variable);

        DB::table('documentos')->where('id', $request['id'])->delete();

        return redirect()->back();
    }

    public function delwork(Request $request)
    {
        $validador = $request->validate([
            'id'=>'numeric|required',
            'empresa'=>'numeric|required']);

        //$docs = DB::table('documentos')->where('equipo_id', $request['id'])->get();

        //if($docs->isEmpty()) { 
            $directory = $request['empresa']."/trabajadores/trabajador_".$request['id'];
            Storage::deleteDirectory($directory);
       // }
        /*
        foreach ($docs as $documentos) {
            //dd($documentos);
            $directory = $request['empresa']."/equipamentos/equipamento_".$documentos->id;
            //dd($directory);
            Storage::deleteDirectory($directory);
        }*/
        DB::table('documentos')->where('trabajador_id', $request['id'])->delete();
        DB::table('trabajador')->where('id', $request['id'])->delete();
        return redirect()->back();
    }

    public function dashboard()
    {
        $empresa = session('cliente');

        $worker = DB::table('trabajador')->where('empresa_id',$empresa)->get();

        $company = DB::table('empresas')->select('id','nombre')->where('id',$empresa)->get();

        $fecha = Carbon::now()->format('Y-m-d');

        $documentos = DB::table('documentos')->get();
        $first = $company->first();
        $last = $company->last();

        return view('dashboard.dashtrabajadores', compact('worker', 'first', 'last', 'documentos', 'fecha'));
    }


}
