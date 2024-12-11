@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Contenedor flex para organizar los elementos en la parte superior -->
    <div class="d-flex justify-content-between align-items-center mb-3">

        <!-- Botón de "Crear nuevo usuario" que ocupará el espacio disponible -->
        <a href="{{ route('users.create') }}" class="btn btn-dark flex-grow-2">Crear nuevo usuario</a>

        <form action="{{ route('users.index') }}" method="GET" class="mb-3 d-flex ms-2">
            <input type="text" name="search" class="form-control" placeholder="Buscar usuarios..." value="{{ request()->query('search') }}">
            <button type="submit" class="btn btn-primary ms-2">Buscar</button>
            @if(request()->query('search'))
            <a href="{{ route('users.index') }}" class="btn btn-secondary ms-2">Cancelar</a>
        @endif
        </form>
        <div class="d-flex align-items-center">
            <div class="rounded-circle bg-secondary text-white d-flex justify-content-center align-items-center" style="width: 40px; height: 40px; font-size: 15px;">
                <strong>{{ strtoupper(substr(auth()->user()->name, 0, 1) . substr(auth()->user()->lastname, 0, 1)) }}</strong>
            </div>
            <form method="POST" action="{{ route('logout') }}" class="ms-2">
                @csrf
                <button type="submit" class="btn bg-secondary text-white">Logout</button>
            </form>
        </div>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered text-center">
        <thead class="table-light">
            <tr>
                <th>NOMBRES</th>
                <th>APELLIDOS</th>
                <th>CORREO</th>
                <th>GENERO</th>
                <th>PAIS</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->lastname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->gender }}</td>
                    <td>{{ $user->country->name }}</td>
                    <td>
                        <a href="{{ route('users.show', $user) }}" class="text-decoration-none text-info">Detalles</a> |
                        <a href="{{ route('users.edit', $user) }}" class="text-decoration-none text-warning">Editar</a> |
                        <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-decoration-none text-danger border-0 bg-transparent p-0" onclick="return confirm('¿Está seguro de eliminar este usuario?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="text-center mt-3">
        {{ $users->count() }} resultados
    </div>
</div>
@endsection
