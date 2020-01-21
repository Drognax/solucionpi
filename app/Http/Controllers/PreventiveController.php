<?php

namespace App\Http\Controllers;
use App\preventivo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class PreventiveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function list($id)
    {
        $empresa = $id;

        $fecha = Carbon::now()->format('Y-m-d');

    	$preventive = DB::table('planPreventivo')->where('empresa_id',$id)->get();

        $company = DB::table('empresas')->select('id','nombre')->where('id',$id)->get();

        $aspecto = DB::table('aspectos')->get();

        $first = $company->first();
        $last = $company->last();

        return view('preventive.list', compact('preventive', 'first', 'last', 'aspecto', 'fecha'));
    }

    public function show($id)
    {
        $empresa = $id;

        $fecha = Carbon::now()->format('Y-m-d');

    	$plan = DB::table('planPreventivo')->where('id',$id)->get();	

        $doc = DB::table('aspectos')->where('planPreventivo_id',$id)->get();

    	return view('preventive.details', compact('plan', 'doc', 'empresa', 'fecha'));

    }

    public function create($id)
    {

        $company = DB::table('empresas')->where('id',$id)->get();

        return view('plant.create', compact('company'));
    }


    public function store()
    {
        $data = request()->validate([
            'name'=>'required',
            'gestion'=>'required',
            'observaciones'=>'required',
            'id'=>'required'
        ]);

        $idplan = preventivo::create([
            'nombre'=>$data['name'],
            'estadoGestion'=>$data['gestion'],
            'observaciones'=>$data['observaciones'],
            'empresa_id'=>$data['id']
        ]);

        Storage::makeDirectory($data['id'].'/planPreventivo/plan_'.$idplan->id, 0777, true, true);        

        return redirect()->back();
    }

    public function edit(Request $plan)
    {
        
        $validador = $plan->validate([
            'nombre'=>'required',
            'estadoGestion'=>'required',
            'observaciones'=>'required',
            'empresa'=>'required', 
        ]);

        $data = preventivo::findOrFail($plan->id);

        //$data = empresa::findOrFail($empresa->id);

        $data->update([
            'nombre'=>$plan->nombre,
            'estadoGestion'=>$plan->estadoGestion,
            'observaciones'=>$plan->observaciones,
        ]);

        return redirect()->back();
    }

    public function editdoc(Request $request)
    {
        $validador = $request->validate([
            'name'=>'required',
            'indicador'=>'required',
            'observaciones'=>'required',
            'dato'=>'numeric|required',
            'data'=>'numeric|required'
        ]);

        if($request['docs'] != NULL)
        {
            $archivo = DB::table('aspectos')->where('id',$request['documento'])->get('documento')->first(); 
            //dd($archivo);
            foreach ($archivo as $key) 
            {   
                Storage::delete($key);
            }   
            $file = request()->file('docs');
            $filename1 = $request['name'].'_'.$request['dato'].'.'.$file->getClientOriginalExtension();
            $path1= $file->storeAs($request['data'].'/planPreventivo/plan_'.$request['dato'].'/aspecto_'.$request['documento'], $filename1);
            $data = DB::table('aspectos')
            ->where('id',$request['documento'])
            ->update(['documento'=>$path1]);
        }

        DB::table('aspectos')
        ->where('id',$request['documento'])
        ->update(['nombre'=>$request->name,
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

        DB::table('aspectos')->where('id', $request['id'])->delete();

        return redirect()->back();
    }

    public function delplan(Request $request)
    {
        $validador = $request->validate([
            'id'=>'numeric|required',
            'empresa'=>'numeric|required']);

        //$docs = DB::table('aspectos')->where('planPreventivo_id', $request['id'])->get();

        //if($docs->isEmpty()) { 
            $directory = $request['empresa']."/planPreventivo/plan_".$request['id'];
            Storage::deleteDirectory($directory);
       // }
        /*
        foreach ($docs as $documentos) {
            //dd($documentos);
            $directory = $request['empresa']."/equipamentos/equipamento_".$documentos->id;
            //dd($directory);
            Storage::deleteDirectory($directory);
        }*/
        DB::table('aspectos')->where('planPreventivo_id', $request['id'])->delete();
        DB::table('planPreventivo')->where('id', $request['id'])->delete();
        return redirect()->back();
    }

    public function dashboard()
    {
        $empresa = session('cliente');

        $fecha = Carbon::now()->format('Y-m-d');

        $preventive = DB::table('planPreventivo')->where('empresa_id',$empresa)->get();

        $company = DB::table('empresas')->select('id','nombre')->where('id',$empresa)->get();

        $aspecto = DB::table('aspectos')->get();

        $first = $company->first();
        $last = $company->last();

        return view('dashboard.dashpreventivo', compact('preventive', 'first', 'last', 'aspecto', 'fecha'));
    }


}
