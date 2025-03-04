<?php

namespace App\Repositories;

use App\DTOs\JogadoresDTO;
use App\Interfaces\JogadoresInterface;
use App\Models\Jogadores;
use Exception;

class JogadoresRepository implements JogadoresInterface {

    public function getAllJogadores(){
        $jogadores = Jogadores::get();
        return $jogadores;
    }

    public function create(JogadoresDTO $dto): array
    {
        try{

            $jogador = Jogadores::create($dto->toArray());

            return [
                'success' => true,
                'message' => 'Jogador Cadastrado com sucesso',
                'data' => $jogador
            ];

        }catch(Exception $e){

            return [
                'success'=>false,
                'message'=>'Erro ao cadastrar o jogador',
                'error'=>$e->getMessage()
            ];

        }
    }

    public function getJogadorByid($id): array
    {
        try{
            $jogador = Jogadores::findOrFail($id);
            return [
                'success'=>true,
                'data'=>$jogador
            ];
        }catch(Exception $e){
            return [
                'success'=>false,
                'message'=>'Jogador não encontrado',
                'error'=>$e->getMessage()
            ];
        }
    }

    public function update($id, JogadoresDTO $dto): array
    {

        try{

            $jogador = Jogadores::findOrFail($id);
            $jogador->update($dto->toArray());

            return [
                'success'=>true,
                'message'=>'Jogador tualizado com sucesso',
                'data'=>$jogador
            ];

        }catch(Exception $e){

            return [
                'success'=>false,
                'message'=>'Erro ao atualizar o Jogador',
                'error' => $e->getMessage()
            ];

        }

    }

    public function delete($id): array
    {

        try{

            $jogador = Jogadores::findOrFail($id);

            $jogador->delete();

            return [
                'success'=>true,
                'message'=>'Jogador excluído com sucesso'
            ];

        }catch(Exception $e){

            return [
                'success'=>false,
                'message'=>'Erro ao excluir o jogador',
                'error' => $e->getMessage()
            ];

        }

    }
}