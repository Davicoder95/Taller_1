@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-3">
        <a href="{{ route('users.index') }}" class="btn btn-dark">Volver</a>
    </div>

    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Detalles del Usuario</h4>
        </div>
        <div class="card-body">
            <div class="row g-4">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Nombres</label>
                    <p class="form-control-plaintext border rounded px-3 py-2">{{ $user->name }}</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Apellidos</label>
                    <p class="form-control-plaintext border rounded px-3 py-2">{{ $user->lastname }}</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Correo</label>
                    <p class="form-control-plaintext border rounded px-3 py-2">{{ $user->email }}</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Género</label>
                    <p class="form-control-plaintext border rounded px-3 py-2">{{ $user->gender }}</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Teléfono</label>
                    <p class="form-control-plaintext border rounded px-3 py-2">{{ $user->phone }}</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Dirección</label>
                    <p class="form-control-plaintext border rounded px-3 py-2">{{ $user->address }}</p>
                </div>
                <div class="col-md-12">
                    <label class="form-label fw-bold">País</label>
                    <p class="form-control-plaintext border rounded px-3 py-2">{{ $user->country ? $user->country->name : 'No country assigned' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
