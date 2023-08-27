<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Category::query()->orderBy('nome')->get();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string',
            'email' => 'required|email',
            'senha' => 'required|string'
        ]);

        $hashedPassword = bcrypt($validatedData['senha']);
        $client = Client::create([
            'nome' => $validatedData['nome'],
            'email' => $validatedData['email'],
            'senha' => $hashedPassword
        ]);

        return response()->json($client, 201);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string',
            'email' => 'required|email',
            'senha' => 'required|string'
        ]);

        return response()->json(Client::findOrFail($id)->update($validatedData), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $client = Client::findOrFail($id);
            $client->delete();
            return response()->json(['message' => 'Cliente excluido'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Cliente não encontrado'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro interno do servidor: ' . $e->getMessage()], 500);
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'senha' => 'required|string',
        ]);

        $client = Client::where('email', $credentials['email'])->first();

        if (!$client || !password_verify($credentials['senha'], $client->senha)) {
            return response()->json(['message' => 'Credenciais inválidas'], 401);
        }

        return response()->json(['message' => 'Login bem-sucedido', 'user' => $client], 200);
    }
}
