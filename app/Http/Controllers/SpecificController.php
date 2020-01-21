<?php

namespace App\Http\Controllers;
use App\especifica;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class SpecificController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function list($id)
    {
        $empresa = $id;

        $fecha = Carbon::now()->format('Y-m-d');

        $especifico = DB::table('especifica')->where('empresa_id',$id)->get();

        $company = DB::table('empresas')->select('id','nombre')->where('id',$id)->get();

        $first = $company->first();
        $last = $company->last();

        return view('company.specific', compact('especifico', 'first', 'last', 'fecha'));
    }

    public function store()
    {
        $data = request()->validate([
            'name'=>'required',
            'indicador'=>'required',
            'observaciones'=>'required',
            'docs'=>'required',
            'dato'=>'required'
        ], ['name.required' =>'El campo nombre es obligatorio']);


        $idspc= especifica::create([
            'nombre'=>$data['name'],
            'actividad'=>$data['name'],
            'indicador'=>$data['indicador'],
            'observaciones'=>$data['observaciones'],
            'empresa_id'=>$data['dato']
        ]);

        $ide = DB::getPdo()->lastInsertId();

        $file = request()->file('docs');
        $filename1 = $data['name'].'_'.$ide.'.'.$file->getClientOriginalExtension();
        $path1= $file->storeAs($data['dato'].'/documentos', $filename1);

         $data = DB::table('especifica')
        ->where('id',$ide)
        ->update(['actividad'=>$path1]);

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

        DB::table('especifica')->where('id', $request['id'])->delete();

        return redirect()->back();
    }

    public function dashboard()
    {
        $empresa = session('cliente');

        $fecha = Carbon::now()->format('Y-m-d');

        $especifico = DB::table('especifica')->where('empresa_id',$empresa)->get();

        $company = DB::table('empresas')->select('id','nombre')->where('id',$empresa)->get();

        $first = $company->first();
        $last = $company->last();

        return view('dashboard.dashspecific', compact('especifico', 'first', 'last', 'fecha'));
    }

    
}