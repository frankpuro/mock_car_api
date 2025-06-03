<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\veiculo;

class ApiController extends Controller
{
    public function index(Request $request)
    {
        try {
            // Validar los parámetros de búsqueda
            $request->validate([
                'marca' => 'nullable|string',
                'ano' => 'nullable|integer',
            ]);

            // Crear la consulta base
            $query = veiculo::query();

            // Filtrar por marca si existe en la solicitud
            if ($request->filled('marca')) {
                $query->where('marca', $request->marca);
            }

            // Filtrar por año si existe en la solicitud
            if ($request->filled('ano')) {
                $query->where('ano', $request->ano);
            }

            // Obtener los datos y devolver en formato JSON
            return response()->json(
                [
                    'success' => true,
                    'data' => $query->get(),
                ],
                200,
            );
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Responder con errores de validación en formato JSON
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Erro de validação',
                ],
                422,
            );
        }
    }

    public function store(Request $request)
    {
        try {
            // Validação dos dados
            $validated = $request->validate([
                'veiculo' => 'required|string',
                'marca' => 'required|string',
                'ano' => 'required|integer',
                'descricao' => 'nullable|string',
                'vendido' => 'required|boolean',
            ]);

            // Salvar o veículo no banco de dados
            $addveiculo = veiculo::create($validated);

            // Resposta JSON de sucesso
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Veículo cadastrado com sucesso',
                    'data' => $addveiculo,
                ],
                201,
            );
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Capturar erros de validação e formatá-los
            $errosFormatados = [];
            foreach ($e->errors() as $campo => $mensagens) {
                foreach ($mensagens as $mensagem) {
                    $errosFormatados[] = [
                        'campo' => $campo,
                        'mensagem' => $mensagem,
                    ];
                }
            }

            return response()->json(
                [
                    'success' => false,
                    'message' => 'Ocorreram erros na validação dos dados',
                    'errors' => $errosFormatados,
                ],
                422,
            );
        } catch (\Exception $e) {
            // Capturar erros inesperados e retornar uma resposta clara
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Erro inesperado ao cadastrar o veículo',
                    'error' => $e->getMessage(),
                ],
                500,
            );
        }
    }

    public function show($id)
    {
        try {
            // Buscar el vehículo por ID
            $veiculo = veiculo::findOrFail($id);

            // Retornar los datos en JSON
            return response()->json(
                [
                    'success' => true,
                    'data' => $veiculo,
                ],
                200,
            );
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Manejar error cuando el vehículo no existe
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Vehículo no encontrado',
                ],
                404,
            );
        } catch (\Exception $e) {
            // Manejar otros errores inesperados
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Error inesperado al buscar el vehículo',
                ],
                500,
            );
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // Validar que TODOS los campos estén presentes
            $validated = $request->validate([
                'veiculo' => 'required|string',
                'marca' => 'required|string',
                'ano' => 'required|integer',
                'descricao' => 'required|string',
                'vendido' => 'required|boolean',
            ]);

            // Buscar el vehículo por ID
            $veiculo = veiculo::findOrFail($id);

            // Actualizar los datos SOLO si todos los campos fueron enviados correctamente
            $veiculo->update($validated);

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Veículo atualizado com sucesso',
                    'data' => $veiculo,
                ],
                200,
            );
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Erro de validação',
                ],
                422,
            );
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Veículo não encontrado',
                ],
                404,
            );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Erro inesperado ao atualizar o veículo',
                ],
                500,
            );
        }
    }

    public function partialUpdate(Request $request, $id)
    {
        try {
            // Buscar el vehículo por ID
            $veiculo = veiculo::findOrFail($id);

            // Validar los datos antes de la actualización
            $validated = $request->validate([
                'veiculo' => 'nullable|string',
                'marca' => 'nullable|string',
                'ano' => 'nullable|integer',
                'descricao' => 'nullable|string',
                'vendido' => 'nullable|boolean',
            ]);

            // Actualizar solo los campos enviados en la solicitud
            $veiculo->update($validated);

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Veículo atualizado parcialmente',
                    'data' => $veiculo,
                ],
                200,
            );
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Erro de validação',
                ],
                422,
            );
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Veículo não encontrado',
                ],
                404,
            );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Erro inesperado ao atualizar o veículo',
                ],
                500,
            );
        }
    }

    public function destroy($id)
    {
        try {
            // Buscar el vehículo por ID antes de eliminarlo
            $veiculo = veiculo::findOrFail($id);

            // Eliminar el vehículo de la base de datos
            $veiculo->delete();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Veículo apagado com sucesso',
                ],
                200,
            );
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Veículo não encontrado',
                ],
                404,
            );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Erro inesperado ao apagar o veículo',
                ],
                500,
            );
        }
    }
}
