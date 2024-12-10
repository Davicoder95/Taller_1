@extends('layouts.app')

@section('content')
<div class="container">
    <h1>User Details</h1>
    <table class="table">
        <tr>
            <th>Name:</th>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th>Lastname:</th>
            <td>{{ $user->lastname }}</td>
        </tr>
        <tr>
            <th>Email:</th>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th>Phone:</th>
            <td>{{ $user->phone }}</td>
        </tr>
        <tr>
            <th>Address:</th>
            <td>{{ $user->address }}</td>
        </tr>
        <tr>
            <th>Gender:</th>
            <td>{{ $user->gender }}</td>
        </tr>
        <tr>
            <th>Country:</th>
            <td>{{ $user->country ? $user->country->name : 'No country assigned' }}</td>
        </tr>
    </table>
    <a href="{{ route('users.index') }}" class="btn btn-primary">Back to List</a>
</div>
@endsection
