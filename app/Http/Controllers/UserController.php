<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select('users.*', 'tipo_documentos.descripcion as tipo_doc')
            ->join('tipo_documentos', 'tipo_documentos.id', '=', 'users.tipo_documento_id')
            ->paginate(10);
        return response()->json($users);
    }

    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required|string|min:1|max:100',
            'apellido' => 'required|string|min:1|max:100',
            'email' => 'required|email|min:1|max:100',
            'tipo_documento_id' => 'required|exists:tipo_documentos,id',
        ];
        $validator = Validator::make($request->input, $rules);
        if ($validator->fails()) {
            return response()->json(([
                'status' => false,
                'erros' => $validator->errors()->all()
            ]), 400);
        } else {
            $newUser = new User($request->input());
            $newUser->save();

            return response()->json(([
                'status' => true,
                'message' => "User created succesfully"
            ]), 200);
        }
    }

    public function show(User $user)
    {
        return response()->json(['status' => true, 'data' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $rules = [
            'nombre' => 'required|string|min:1|max:100',
            'apellido' => 'required|string|min:1|max:100',
            'email' => 'required|email|min:1|max:100',
            'tipo_documento_id' => 'required|exists:tipo_documentos,id',
        ];
        $validator = Validator::make($request->input, $rules);
        if ($validator->fails()) {
            return response()->json(([
                'status' => false,
                'erros' => $validator->errors()->all()
            ]), 400);
        } else {
            $user->update($request->input());

            return response()->json(([
                'status' => true,
                'message' => "User updated succesfully"
            ]), 200);
        }
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(([
            'status' => true,
            'message' => "User deleted succesfully"
        ]), 200);
    }

    public function all()
    {
        $users = User::select('users.*', 'tipo_documentos.descripcion as tipo_doc')
            ->join('tipo_documentos', 'tipo_documentos.id', '=', 'users.tipo_documento_id')
            ->get();
        return response()->json($users);
    }
}
