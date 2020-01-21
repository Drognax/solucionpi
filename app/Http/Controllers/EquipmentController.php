<?php

namespace App\Http\Controllers;
use App\equipo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;


class EquipmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function list($id)
    {
        $empresa = $id;

    	$equip = DB::table('equipo')->where('empresa_id',$id)->get();

        $company = DB::table('empresas')->select('id','nombre')->where('id',$id)->get();
        $first = $company->first();
        $last = $company->last();

        return view('equipment.list', compact('equip', 'first', 'last'));
    }

    public function show($id)
    {
        $empresa = $id;

        $fecha = Carbon::now()->format('Y-m-d');

    	$equip = DB::table('equipo')->where('id',$id)->get();	

        $doc = DB::table('documentosEquipo')->where('equipo_id',$id)->get();

    	return view('equipment.details', compact('equip', 'doc', 'empresa', 'fecha'));

    }

    public function create($id)
    {

        $company = DB::table('empresas')->where('id',$id)->get();

        return view('equipment.create', compact('company'));
    }

    public function documento($id)
    {
        $doc = DB::table('documentos')->where('trabajador_id',$id)->get();

        return view('workers.documents');
    }

    public function store()
    {
        $data = request()->validate([
            'nombre'=>'required',
            'referencia'=>'required|unique:equipo',
            'modelo'=>'required',
            'marca'=>'required',
            'id'=>'required',
            'empresa'=>'required'
        ]);

        $idequipo = equipo::create([
            'nombre'=>$data['nombre'],
            'referencia'=>$data['referencia'],
            'modelo'=>$data['modelo'],
            'marca'=>$data['marca'],
            'empresa_id'=>$data['empresa']
        ]);

        Storage::makeDirectory($data['empresa'].'/equipamentos/equipamento_'.$idequipo->id, 0777, true, true);        

        return redirect('equipamento/'.$data['empresa']);
    }

    public function edit(Request $equipo)
    {
        
        $validador = $equipo->validate([
            'nombre'=>'required',
            'referencia'=>'required|unique:equipo,referencia,'.$equipo->id,
            'modelo'=>'required',
            'marca'=>'required',
 
        ]);

        $data = equipo::findOrFail($equipo->id);

        //$data = empresa::findOrFail($empresa->id);

        $data->update([
            'nombre'=>$equipo->nombre,
            'referencia'=>$equipo->referencia,
            'modelo'=>$equipo->modelo,
            'marca'=>$equipo->marca,
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
            $archivo = DB::table('documentosEquipo')->where('id',$request['documento'])->get('actividad')->first(); 
            //dd($archivo);
            foreach ($archivo as $key) 
            {   
                Storage::delete($key);
            }   
            $file = request()->file('docs');
            $filename1 = $request['name'].'_'.$request['dato'].'.'.$file->getClientOriginalExtension();
            $path1= $file->storeAs($request['data'].'/equipamentos/equipamento_'.$request['dato'], $filename1);
            $data = DB::table('documentosEquipo')
            ->where('id',$request['documento'])
            ->update(['actividad'=>$path1]);
        }

        DB::table('documentosEquipo')
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

        DB::table('documentosEquipo')->where('id', $request['id'])->delete();

        return redirect()->back();
    }

    public function delequip(Request $request)
    {
        $validador = $request->validate([
            'id'=>'numeric|required',
            'empresa'=>'numeric|required']);

        $docs = DB::table('documentosEquipo')->where('equipo_id', $request['id'])->get();

        //if($docs->isEmpty()) { 
            $directory = $request['empresa']."/equipamentos/equipamento_".$request['id'];
            Storage::deleteDirectory($directory);
       // }
        /*
        foreach ($docs as $documentos) {
            //dd($documentos);
            $directory = $request['empresa']."/equipamentos/equipamento_".$documentos->id;
            //dd($directory);
            Storage::deleteDirectory($directory);
        }*/
        DB::table('documentosEquipo')->where('equipo_id', $request['id'])->delete();
        DB::table('equipo')->where('id', $request['id'])->delete();
        return redirect()->back();
    }

    public function dashboard()
    {
        $empresa = session('cliente');

        $equip = DB::table('equipo')->where('empresa_id',$empresa)->get();

        $company = DB::table('empresas')->select('id','nombre')->where('id',$empresa)->get();

        $fecha = Carbon::now()->format('Y-m-d');

        $documentos = DB::table('documentosEquipo')->get();
        $first = $company->first();
        $last = $company->last();

        return view('dashboard.dashequip', compact('equip', 'first', 'last', 'documentos', 'fecha'));
    }


}
