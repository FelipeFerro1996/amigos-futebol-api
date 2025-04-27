<?php

namespace App\Repositories;

use App\DTOs\CampeonatosDTO;
use App\Interfaces\CampeonatosInterface;
use App\Models\Campeonatos;
use Exception;

class CampeonatosRepository implements CampeonatosInterface
{

    public function getAllCampeonatos($request = NULL){
        $campeonatos = new Campeonatos();

        if(!empty($request->nome)){
            $campeonatos = $campeonatos->where('nome', 'LIKE', "%{$request->nome}%");
        }

        return $campeonatos->paginate($request->rowsPerPage??10);
    }

    public function create(CampeonatosDTO $dto): array
    {
        try {
            $campeonato = Campeonatos::create($dto->toArray());
    
            return [
                'success'=> true,
                'message'=> 'Campeonato cadastrado com sucesso',
                'data'=>$campeonato
            ];
        } catch (Exception $e) {
            return [
                'success'=>false,
                'message'=>'Erro ao cadastrar o campeonato',
                'error'=>$e->getMessage()
            ];
        }
    }

    public function getCampeonatoById($id): array
    {
        try{
            $campeonato = Campeonatos::findOrFail($id);

            return [
                'sucess'=>true,
                'data'=>$campeonato
            ];
        }catch(Exception $e){
            return [
                'success'=>false,
                'message'=>'Campeonato não encontrado',
                'error'=>$e->getMessage()
            ];
        }
    }

    public function update($id, CampeonatosDTO $dto): array
    {
        try {
            $campeonato = Campeonatos::findOrFail($id);
            
            $campeonato->update($dto->toArray());

            return [
                'success'=>true,
                'message'=>'Campeonato cadastrado com sucesso',
                'data'=>$campeonato
            ];
        } catch (Exception $e) {
            return [
                'success'=>false,
                'message'=>'Erro ao atualizar o campeonato',
                'error'=>$e->getMessage()
            ];
        }
    }

    public function delete($id): array
    {
        try {
            $campeonato = Campeonatos::findOrFail($id);

            $campeonato->delete();

            return [
                'success'=>true,
                'message'=>'campeonato excluído com sucesso'
            ];
        } catch (Exception $e) {
            return [
                'success'=>false,
                'message'=>'Erro ao excluir o campeonato',
                'error'=>$e->getMessage()
            ];
        }
    }
}