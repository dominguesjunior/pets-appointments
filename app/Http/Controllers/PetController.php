<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePet;
use App\Pet;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(Pet::all());
    }

    /**
     * Cadastra um novo Pet.
     * @param StorePet $request
     * @return Pet
     */
    public function store(StorePet $request): Pet
    {
        $pet = new Pet();
        return $pet->create($request->all());
    }

    /**
     * Mostra os dados de um pet
     *
     * @param Pet $pet
     * @return JsonResponse
     */
    public function show(Pet $pet): JsonResponse
    {
        return response()->json($pet);
    }

    /**
     * Exclui todos os registros de um Pet
     *
     * @param Pet $pet
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Pet $pet): JsonResponse
    {
        $pet->delete();
        return response()->json([
            "status" => true,
            'url' => $pet->id != null ? route('pets.destroy',$pet->id) : route('pets.destroy'),
            "mensagem" => "Pet excluido com sucesso.",
            "pet" => $pet->toArray()
        ]);
    }
}
