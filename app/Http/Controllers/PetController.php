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
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $query = Pet::query();
        if ($request->has('pesquisa')) {
            $query->where('nome', 'like', "%{$request->get('pesquisa')}%");
        }
        $query->with('atendimentos');
        $data = $query->paginate(20);
        return response()->json($data);
    }

    /**
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
