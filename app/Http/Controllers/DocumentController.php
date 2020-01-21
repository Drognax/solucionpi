<?php

namespace App\Http\Controllers;
use App\documento;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store()
    {
        $data = request()->validate([
            'name'=>'required',
            'gestion'=>'required',
            'indicador'=>'required',
            'observaciones'=>'required',
            'docs'=>'required',
            'dato'=>'required'
        ], ['name.required' =>'El campo nombre es obligatorio']);
 
        $user = DB::table('trabajador')->where('rut', $data['dato'])->value('id');

        $empresa = DB::table('trabajador')->where('rut', $data['dato'])->value('empresa_id');

        $ruta = DB::table('empresas')->where('id', $empresa)->value('id');

        documento::create([
            'nombre'=>$data['name'],
            'estado'=>$data['gestion'],
            'actividad'=>$data['name'],
            'indicador'=>$data['indicador'],
            'observaciones'=>$data['observaciones'],
            'trabajador_id'=>$user
        ]);

        $ide = DB::getPdo()->lastInsertId();

        $file = request()->file('docs');
        $filename1 = $data['name'].'_'.$ide.'.'.$file->getClientOriginalExtension();
        $path1= $file->storeAs($ruta.'/trabajadores/trabajador_'.$user, $filename1);

        $data = DB::table('documentos')
        ->where('id',$ide)
        ->update(['actividad'=>$path1]);

        
        return redirect()->back();
    }

    public function storeEquip()
    {
        $data = request()->validate([
            'name'=>'required',
            'gestion'=>'required',
            'indicador'=>'required',
            'observaciones'=>'required',
            'docs'=>'required',
            'dato'=>'required'
        ], ['name.required' =>'El campo nombre es obligatorio']);
 
        $equip = DB::table('equipo')->where('id', $data['dato'])->value('empresa_id');

        $ruta = DB::table('empresas')->where('id', $equip)->value('id');

        DB::table('documentosEquipo')->insert([
            'nombre'=>$data['name'],
            'estado'=>$data['gestion'],
            'actividad'=>$data['name'],
            'indicador'=>$data['indicador'],
            'observaciones'=>$data['observaciones'],
            'equipo_id'=>$data['dato']
        ]);
        $ide = DB::getPdo()->lastInsertId();
        
        $file = request()->file('docs');
        $filename1 = $data['name'].'_'.$ide.'.'.$file->getClientOriginalExtension();
        $path1= $file->storeAs($ruta.'/equipamentos/equipamento_'.$data['dato'], $filename1);

         $data = DB::table('documentosEquipo')
        ->where('id',$ide)
        ->update(['actividad'=>$path1]);

        return redirect()->back();
    }

    public function storePlant()
    {
        $data = request()->validate([
            'name'=>'required',
            'gestion'=>'required',
            'indicador'=>'required',
            'observaciones'=>'required',
            'docs'=>'required',
            'dato'=>'required'
        ], ['name.required' =>'El campo nombre es obligatorio']);

 
        $plant = DB::table('local')->where('id', $data['dato'])->value('empresa_id');

        $ruta = DB::table('empresas')->where('id', $plant)->value('id');

        DB::table('documentosLocal')->insert([
            'nombre'=>$data['name'],
            'estado'=>$data['gestion'],
            'actividad'=>$data['name'],
            'indicador'=>$data['indicador'],
            'observaciones'=>$data['observaciones'],
            'local_id'=>$data['dato']
        ]);

        $ide = DB::getPdo()->lastInsertId();

        $file = request()->file('docs');
        $filename1 = $data['name'].'_'.$ide.'.'.$file->getClientOriginalExtension();
        $path1= $file->storeAs($ruta.'/instalaciones/instalacion_'.$data['dato'], $filename1);

        $data = DB::table('documentosLocal')
        ->where('id',$ide)
        ->update(['actividad'=>$path1]);
        
        return redirect()->back();
    }

    public function storePrev()
    {
        $data = request()->validate([
            'name'=>'required',
            'indicador'=>'required',
            'observaciones'=>'required',
            'docs'=>'required',
            'dato'=>'required'
        ], ['name.required' =>'El campo nombre es obligatorio']);
 
        $plan = DB::table('planPreventivo')->where('id', $data['dato'])->value('empresa_id');

        $ruta = DB::table('empresas')->where('id', $plan)->value('id');

        DB::table('aspectos')->insert([
            'nombre'=>$data['name'],
            'documento'=>$data['name'],
            'indicador'=>$data['indicador'],
            'observaciones'=>$data['observaciones'],
            'planPreventivo_id'=>$data['dato']
        ]);

        $ide = DB::getPdo()->lastInsertId();
        
        $file = request()->file('docs');
        $filename1 = $data['name'].'_'.$ide.'.'.$file->getClientOriginalExtension();
        $path1= $file->storeAs($ruta.'/planPreventivo/plan_'.$data['dato'].'/aspecto_'.$ide, $filename1);

        $data = DB::table('aspectos')
        ->where('id',$ide)
        ->update(['documento'=>$path1]);

        
        return redirect()->back();
    }
    
}