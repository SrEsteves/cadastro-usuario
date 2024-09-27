@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1 class="mb-4 text-center">Lista de Usuários</h1>
            
            <form action="{{ route('users.index') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Buscar por nome ou email" value="{{ request('search') }}">
                    <button class="btn btn-outline-primary" type="submit">Buscar</button>
                </div>
            </form>

            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Data de Criação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="d-flex justify-content-center mt-4">
                {{ $users->appends(['search' => request('search')])->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    body {
        background-color: #f8f9fa;
    }
    .card {
        border: none;
        border-radius: 15px;
    }
    .table {
        margin-bottom: 0;
    }
    .table th {
        border-top: none;
        font-weight: 600;
        color: #495057;
    }
    .table td {
        vertical-align: middle;
    }
    .table-hover tbody tr:hover {
        background-color: #f1f3f5;
    }
    .btn-outline-primary {
        border-color: #007bff;
        color: #007bff;
    }
    .btn-outline-primary:hover {
        background-color: #007bff;
        color: white;
    }
</style>
@endsection
