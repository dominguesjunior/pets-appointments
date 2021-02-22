<?php

namespace App\Http\Controllers;

use App\Atendimento;
use App\Http\Requests\StoreAtendimento;
use Exception;
use Illuminate\Http\JsonResponse;

class AtendimentoController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $query = Atendimento::query();
        $query->with('pet');
        $data = $query->paginate(20);
        return response()->json($data);
    }

    /**
     * @param StoreAtendimento $request
     * @return JsonResponse
     */
    public function store(StoreAtendimento $request): JsonResponse
    {
        $atendimento = new Atendimento();
        $atendimento = $atendimento->create($request->all());
        return response()->json($atendimento);
    }

    /**
     * @param Atendimento $atendimento
     * @return JsonResponse
     */
    public function show(Atendimento $atendimento): JsonResponse
    {
        $atendimento->pet;
        return response()->json($atendimento);
    }

    /**
     * @param Atendimento $atendimento
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Atendimento $atendimento): JsonResponse
    {
        $atendimento->delete();
        return response()->json([
            "status" => true,
            'url' => $atendimento->id != null ?
                route('atendimentos.destroy',$atendimento->id) : route('atendimentos.destroy'),
            "mensagem" => "Atendimento excluido com sucesso.",
            "atendimento" => $atendimento->toArray()
        ]);
    }
}
