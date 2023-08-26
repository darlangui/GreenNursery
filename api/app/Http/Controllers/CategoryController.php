<?php

namespace App\Http\Controllers;

use App\Models\Category;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        return Category::query()->orderBy('nome')->get();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $validatedData = $request->validate([
            'nome' => 'required|string',
            'desc' => 'required|string',
        ]);

        $category = Category::create($validatedData);

        return response()->json($category, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): \Illuminate\Http\JsonResponse
    {
        return response()->json(Category::with('plants')->findOrFail($id));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string',
            'desc' => 'required|string',
        ]);

        return response()->json(Category::findOrFail($id)->update($validatedData), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $category = Category::findOrFail($id);

            foreach ($category->plants as $plant) {
                Storage::delete('public/' . $plant->imagem);
                $plant->delete();
            }


            Storage::delete('public/' . $category->imagem);

            $category->delete();

            return response()->json(['message' => 'Categoria e plantas associadas foram excluídas'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Categoria não encontrada'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro interno do servidor: ' . $e->getMessage()], 500);
        }
    }
}
