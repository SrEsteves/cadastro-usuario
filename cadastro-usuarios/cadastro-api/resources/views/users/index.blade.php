@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Lista de Usuários</h1>

    <form action="{{ route('users.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Buscar por nome ou e-mail" value="{{ $search }}">
            <button class="btn btn-outline-primary" type="submit">Buscar</button>
        </div>
    </form>

    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
