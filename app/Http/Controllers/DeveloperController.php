<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Developer;
use Exception;
use App\Http\Requests\StorePostRequestDeveloper;

class DeveloperController extends Controller
{
    protected $developer;

    public function __construct(Developer $developer)
    {
        $this->developer = $developer;
    }

    public function index()
    {
        try {
            $developers = $this->developer->findAllDevelopers();

            return response()->json($developers, 200);
        } catch (Exception $e) {
            return response()->json(["message" => "Erro ao carregar dados.", "error_code" => $e->getCode()], 404);
        }
    }

    public function show(int $id)
    {
        try {
            $developer = $this->developer->findDeveloper($id);

            return response()->json($developer, 200);
        } catch (Exception $e) {
            return response()->json(["message" => "Erro ao carregar dados.", "error_code" => $e->getCode()], 404);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nome' => 'required',
                'sexo' => 'required',
                'idade' => 'required',
                'hobby' => 'required',
                'datanascimento' => 'required',
            ]);

            return response()->json($this->developer->storeDeveloper($request->toArray()), 201);
        } catch (Exception $e) {
            return response()->json(["message" => "Erro ao salvar dados.", "error_code" => $e->getCode()], 400);
        }
    }

    public function update(int $id, Request $request)
    {
        try {
            $request->validate([
                'nome' => 'required',
                'sexo' => 'required',
                'idade' => 'required',
                'hobby' => 'required',
                'datanascimento' => 'required',
            ]);

            return response()->json($this->developer->updateDeveloper($id, $request->toArray()), 200);
        } catch (Exception $e) {
            return response()->json(["message" => "Erro ao atualizar dados.", "error_code" => $e->getCode()], 400);
        }
    }

    public function delete(int $id)
    {
        try {
            return response()->json($this->developer->deleteDeveloper($id), 204);
        } catch (Exception $e) {
            return response()->json(["message" => "Erro ao deletar dados.", "error_code" => $e->getCode()], 400);
        }
    }
}
