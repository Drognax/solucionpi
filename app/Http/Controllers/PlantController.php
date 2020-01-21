<?php

namespace App\Http\Controllers;
use App\instalaciones;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class PlantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function list($id)
    {
        $empresa = $id;

    	$plant = DB::table('local')->where('empresa_id',$id)->get();

        $company = DB::table('empresas')->select('id','nombre')->where('id',$id)->get();
        $first = $company->first();
        $last = $company->last();

        return view('plant.list', compact('plant', 'first', 'last'));
    }

    public function show($id)
    {
        $empresa = $id;

        $fecha = Carbon::now()->format('Y-m-d');

    	$plant = DB::table('local')->where('id',$id)->get();	

        $doc = DB::table('documentosLocal')->where('local_id',$id)->get();

    	return view('plant.details', compact('plant', 'doc', 'empresa', 'fecha'));

    }

    public function create($id)
    {

        $company = DB::table('empresas')->where('id',$id)->get();

        return view('plant.create', compact('company'));
    }


    public function store()
    {
        $data = request()->validate([
            'faena'=>'required',
            'direccion'=>'required',
            'area'=>'required',
            'actividades'=>'required',
            'id'=>'required',
            'empresa'=>'required'
        ]);

        $idplant = instalaciones::create([
            'faena'=>$data['faena'],
            'direccion'=>$data['direccion'],
            'area'=>$data['area'],
            'actividades'=>$data['actividades'],
            'empresa_id'=>$data['empresa']
        ]);

        Storage::makeDirectory($data['empresa'].'/instalaciones/instalacion_'.$idplant->id, 0777, true, true);        

       return redirect('instalaciones/'.$data['empresa']);
    }

    public function edit(Request $plant)
    {
        
        $validador = $plant->validate([
            'faena'=>'required',
            'direccion'=>'required',
            'area'=>'required',
            'actividades'=>'required',
 
        ]);

        $data = instalaciones::findOrFail($plant->id);

        //$data = empresa::findOrFail($empresa->id);

        $data->update([
            'faena'=>$plant->faena,
            'direccion'=>$plant->direccion,
            'area'=>$plant->area,
            'actividades'=>$plant->actividades,
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
            $archivo = DB::table('documentosLocal')->where('id',$request['documento'])->get('actividad')->first(); 
            //dd($archivo);
            foreach ($archivo as $key) 
            {   
                Storage::delete($key);
            }   
            $file = request()->file('docs');
            $filename1 = $request['name'].'_'.$request['dato'].'.'.$file->getClientOriginalExtension();
            $path1= $file->storeAs($request['data'].'/instalaciones/instalacion_'.$request['dato'], $filename1);
            $data = DB::table('documentosLocal')
            ->where('id',$request['documento'])
            ->update(['actividad'=>$path1]);
        }

        DB::table('documentosLocal')
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

        DB::table('documentosLocal')->where('id', $request['id'])->delete();

        return redirect()->back();
    }

    public function delplan(Request $request)
    {
        $validador = $request->validate([
            'id'=>'numeric|required',
            'empresa'=>'numeric|required']);

        $docs = DB::table('documentosLocal')->where('local_id', $request['id'])->get();

        //if($docs->isEmpty()) { 
            $directory = $request['empresa']."/instalaciones/instalacion_".$request['id'];
            Storage::deleteDirectory($directory);
       // }
        /*
        foreach ($docs as $documentos) {
            //dd($documentos);
            $directory = $request['empresa']."/equipamentos/equipamento_".$documentos->id;
            //dd($directory);
            Storage::deleteDirectory($directory);
        }*/
        DB::table('documentosLocal')->where('local_id', $request['id'])->delete();
        DB::table('local')->where('id', $request['id'])->delete();
        return redirect()->back();
    }

    public function dashboard()
    {
        $empresa = session('cliente');

        $plant = DB::table('local')->where('empresa_id',$empresa)->get();

        $company = DB::table('empresas')->select('id','nombre')->where('id',$empresa)->get();

         $fecha = Carbon::now()->format('Y-m-d');

        $documentos = DB::table('documentosLocal')->get();
        $first = $company->first();
        $last = $company->last();

        return view('dashboard.dashlocal', compact('plant', 'first', 'last', 'fecha', 'documentos'));
    }
}
