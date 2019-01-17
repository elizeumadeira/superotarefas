<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tarefas;

class TarefasController extends Controller
{
    private $rules_validation = [
        'titulo' => 'required|max:255',
        'descricao' => 'required',
    ];
    public function index()
    {
        $tarefas = Tarefas::all();
        return response()->json($tarefas);
    }

    public function show($id)
    {
        $tarefa = Tarefas::find($id);

        if (!$tarefa) {
            return response()->json([
                'message' => 'Tarefa não encontrada'
            ], 404);
        }

        return response()->json($tarefa, 201);
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), $this->rules_validation);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Falha na validação dos dados. Verifique os dados enviados e submeta-os novamente.'
            ], 404);
        }

        $tarefa = new Tarefas;
        $tarefa->fill($request->all());
        $tarefa->save();
        return response()->json($tarefa, 201);
    }

    public function update(Request $request, $id)
    {
        $tarefa =  Tarefas::find($id);

        $validator = \Validator::make($request->all(), $this->rules_validation);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Falha na validação dos dados. Verifique os dados enviados e submeta-os novamente.'
            ], 404);
        }

        if (!$tarefa) {
            return response()->json([
                'message' => 'Tarefa não encontrado'
            ], 404);
        }

        $tarefa->fill($request->all());
        $tarefa->save();

        return  response()->json($tarefa, 201);
    }

    public function destroy($id)
    {
        $tarefa =  Tarefas::find($id);

        if (!$tarefa) {
            return response()->json([
                'message' => 'Tarefa não encontrada'
            ], 404);
        }
        
        $tarefa->delete();

        return response()->json([
            'message' => 'Tarefa excluída com sucesso'
        ], 200);
    }
}
