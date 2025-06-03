@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Lista de Veículos</h1>
    <a href="{{ route('veiculos.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Nuevo Vehículo</a>
    <table class="min-w-full mt-4 border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Veículo</th>
                <th class="border px-4 py-2">Marca</th>
                <th class="border px-4 py-2">Ano</th>
                <th class="border px-4 py-2">Descrição</th>
                <th class="border px-4 py-2">Vendido</th>
                <th class="border px-4 py-2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($veiculos as $veiculo)
            <tr class="border">
                <td class="border px-4 py-2">{{ $veiculo->id }}</td>
                <td class="border px-4 py-2">{{ $veiculo->veiculo }}</td>
                <td class="border px-4 py-2">{{ $veiculo->marca }}</td>
                <td class="border px-4 py-2">{{ $veiculo->ano }}</td>
                <td class="border px-4 py-2">{{ $veiculo->descricao }}</td>
                <td class="border px-4 py-2">{{ $veiculo->vendido ? 'Sí' : 'No' }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('veiculos.edit', $veiculo->id) }}" class="text-blue-600">Editar</a>
                    <form action="{{ route('veiculos.destroy', $veiculo->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection