<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Session;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'=>'required',
            'password'=>'required']);

        if (Auth::attempt($credentials)) {
            session(['id'=>$request['email']]);
            $power=DB::table('usuarios')->where('email', $request['email'])->get('super');
            foreach ($power as $poder) {}
            session(['key' => $poder->super]);
            if($poder->super == '1')
            {
               return redirect('empresas'); 
            }
            elseif ($poder->super == '0')
            {
                $id=DB::table('usuarios')->where('email', $request['email'])->get('empresa_id');
                foreach ($id as $empresa) {}
                session(['cliente' => $empresa->empresa_id]);
                return redirect('dashboard');
            }
            else
            {
                return redirect('login');
            }
            
        }
        else
        {
            return redirect()->back();
        }

    }
}
