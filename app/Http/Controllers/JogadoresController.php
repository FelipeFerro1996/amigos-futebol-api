<?php

namespace App\Http\Controllers;

use App\DTOs\JogadoresDTO;
use App\Http\Requests\JogadoresRequest;
use App\Interfaces\JogadoresInterface;
use Illuminate\Http\Request;

class JogadoresController extends Controller
{
    public function __construct(public JogadoresInterface $jogadores_repository) {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jogadores = $this->jogadores_repository->getAllJogadores();
        return response()->json([
            'dados'=>$jogadores
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JogadoresRequest $request)
    {

        $jogadorDTO = JogadoresDTO::fromArray($request->validated());
 
        $response = $this->jogadores_repository->create($jogadorDTO);

        return response()->json($response, $response['success'] ? 200 : 500);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $response = $this->jogadores_repository->getJogadorByid($id);

        return response()->json($response, $response['success'] ? 200 : 500);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JogadoresRequest $request, string $id)
    {
        
        $jogadorDTO = JogadoresDTO::fromArray($request->validated());

        $response = $this->jogadores_repository->update($id, $jogadorDTO);

        return response()->json($response, $response['success'] ? 200 : 500);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = $this->jogadores_repository->delete($id);

        return response()->json($response, $response['success'] ? 200 : 500);
    }
}
