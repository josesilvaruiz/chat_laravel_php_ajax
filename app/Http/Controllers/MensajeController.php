<?php

namespace App\Http\Controllers;

use App\Mensaje;
use App\User;
use Illuminate\Http\Request;

class MensajeController extends Controller
{
    public function index($user_id=0)
    {
        $users = User::where('id', '<>', auth()->user()->id)
            ->orderBy('name', 'ASC')
            ->get();
        $userTalk = User::find($user_id);

        $mensajes = Mensaje::Where(function ($query) use($user_id) {
                $query->where('emisor', auth()->user()->id)
                ->where('receptor', $user_id);
        })
            ->orWhere(function ($query) use($user_id) {
                $query->where('receptor', auth()->user()->id)
                    ->where('emisor', $user_id);
            })
            ->orderBy('created_at', 'ASC')
            ->get();
        ;
        return view('chat', compact(
            'users',
            'userTalk',
            'mensajes'
        ));
    }
    public function save(Request $request)
    {
        $user = auth()->user();
        $mensaje = $request->input('mensaje');
        $receptor = $request->input('receptor_id', 0);
        // Asigno valores a mi nuevo objeto
        $new_mensaje = new Mensaje;
        $new_mensaje->mensaje = $mensaje;
        $new_mensaje->emisor = $user->id;
        $new_mensaje->receptor = $receptor;
        $new_mensaje->leido = false;
        // dd($new_mensaje);
         //Guardar en la bd
         $new_mensaje->save();
        return response()->json(['success' => 'success'], 200);
    }

}
