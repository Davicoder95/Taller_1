@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Editar Usuario</h2>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Volver</a>
    </div>

    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <!-- Nombre -->
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label">Nombres</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
            </div>

            <!-- Apellido -->
            <div class="col-md-6 mb-3">
                <label for="lastname" class="form-label">Apellidos</label>
                <input type="text" name="lastname" id="lastname" class="form-control" value="{{ $user->lastname }}" required>
            </div>
        </div>

        <div class="row">
            <!-- Correo -->
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
            </div>

            <!-- Teléfono -->
            <div class="col-md-6 mb-3">
                <label for="phone" class="form-label">Teléfono</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ $user->phone }}">
            </div>
        </div>

        <div class="row">
            <!-- Dirección -->
            <div class="col-md-6 mb-3">
                <label for="address" class="form-label">Dirección</label>
                <input type="text" name="address" id="address" class="form-control" value="{{ $user->address }}">
            </div>

            <!-- Género -->
            <div class="col-md-6 mb-3">
                <label for="gender" class="form-label">Género</label>
                <select name="gender" id="gender" class="form-control" required>
                    <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Masculino</option>
                    <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Femenino</option>
                </select>
            </div>
        </div>

        <div class="row">
            <!-- País -->
            <div class="col-md-12 mb-3">
                <label for="country_id" class="form-label">Pais</label>
                <select name="country_id" id="country_id" class="form-control" required>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}" {{ $user->country_id == $country->id ? 'selected' : '' }}>
                            {{ $country->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Botón de envío -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </form>
</div>
@endsection
