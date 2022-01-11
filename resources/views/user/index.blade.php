@extends('layouts.app')

@section('content')
    <div class="container shadow rounded-2 p-0">


        <div class="card">
            <div class="card-header bg-info">
                <div class="card-title text-light">
                    <h2>Utilisateurs</h2>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Nom et prénom</td>
                                <td>Login</td>
                                <td>Rôle</td>
                                <td>Supprimer</td>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->roles()->first()->name }}</td>
                                    <td>
                                        <form action="{{ route('user.destroy', ['id' => $user->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn text-danger" > <i class="bi-x-square-fill"></i> </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <h5>Pas de status pour les rendez-vous</h5>
                            @endforelse
                            </tbody>
                        </table>
                        <div class="row">
                            {{ $users->links('vendor.pagination.stc') }}
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-header">
                                <h3>Ajotuer utilisateur</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('register') }}" method="post">
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                        <label for="floatingInput">Nom & Prénom</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                             </span>
                                        @enderror


                                        <label for="floatingInput">Email</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror


                                        <label for="floatingInput">Mot de passe</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror


                                        <label for="floatingInput">Confirmer mot de passe</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <select name="role" id="role" class="form-select">
                                            <option value="manager">Manager</option>
                                            <option value="agent">Agent</option>
                                        </select>


                                        <label for="floatingInput">Rôle</label>
                                    </div>

                                    <button type="submit" class="btn btn-info btn-lg text-light my-2 w-100"><i
                                            class="bi-plus-lg"></i> Ajouter utilisateur
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>


    </div>
@endsection
