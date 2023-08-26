<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PlantController extends Controller
{
    public function index()
    {
        $plants = Plant::all();

        $plants = $plants->map(function ($plant) {
            $plant->imagem = url("storage/{$plant->imagem}");
            return $plant;
        });

        return response()->json($plants, 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string',
            'desc' => 'required|string',
            'preco' => 'required|numeric',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => [
                'required',
                Rule::exists('categories', 'id'),
            ],
        ]);

        try {
            $category = Category::findOrFail($validatedData['category_id']);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        $plant = new Plant([
            'nome' => $validatedData['nome'],
            'desc' => $validatedData['desc'],
            'preco' => $validatedData['preco'],
            'imagem' => '',
            'category_id' => $validatedData['category_id'],
        ]);

        if ($request->hasFile('imagem')) {
            $image = $request->file('imagem');
            $imageName = Str::uuid().'.'.$image->getClientOriginalExtension();
            $imagePath = $image->storeAs('public/plant_images', $imageName);
            $plant->imagem = 'plant_images/' . $imageName;
        }

        $plant->save();

        return response()->json($plant, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $plant = Plant::findOrFail($id);

        $plant->imagem = url("storage/{$plant->imagem}");

        return response()->json($plant, 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $plant = Plant::findOrFail($id);

        $validatedData = $request->validate([
            'nome' => 'string',
            'desc' => 'string',
            'preco' => 'numeric',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => [
                Rule::exists('categories', 'id'),
            ],
        ]);

        if ($request->hasFile('imagem')) {
            Storage::delete('public/' . $plant->imagem);

            $image = $request->file('imagem');
            $imageName = Str::uuid().'.'.$image->getClientOriginalExtension();
            $imagePath = $image->storeAs('public/plant_images', $imageName);
            $validatedData['imagem'] = 'plant_images/' . $imageName;
        }

        $plant->fill($validatedData);
        $plant->save();

        return response()->json($plant, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $plant = Plant::findOrFail($id);

            Storage::delete('public/' . $plant->imagem);

            $plant->delete();

            return response()->json(null, 204);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Planta não encontrada'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro interno do servidor'], 500);
        }
    }
}
